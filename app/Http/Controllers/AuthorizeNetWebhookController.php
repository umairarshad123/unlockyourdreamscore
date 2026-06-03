<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AuthorizeNetWebhookController extends Controller
{
    public function handle(Request $request)
    {
        $rawBody = $request->getContent();

        // 1) Verify HMAC-SHA512 signature
        if (!$this->verifySignature($request, $rawBody)) {
            Log::warning('Authorize.Net webhook signature INVALID', [
                'header' => $request->headers->get('X-ANET-Signature'),
                'ip'     => $request->ip(),
            ]);
            return response('Invalid signature', 401);
        }

        $event = json_decode($rawBody, true);
        if (!is_array($event)) {
            Log::warning('Authorize.Net webhook: malformed JSON');
            return response('Bad JSON', 400);
        }

        $notificationId = $event['notificationId'] ?? null;
        $eventType      = $event['eventType']      ?? null;

        Log::info('Authorize.Net webhook received', [
            'notificationId' => $notificationId,
            'eventType'      => $eventType,
            'invoice'        => data_get($event, 'payload.invoiceNumber'),
            'transId'        => data_get($event, 'payload.id'),
        ]);

        // 2) Idempotency — Authorize.Net retries; ignore duplicates for 24h
        if ($notificationId) {
            $cacheKey = 'anet_webhook:' . $notificationId;
            if (Cache::has($cacheKey)) {
                Log::info('Authorize.Net webhook duplicate, skipping', ['notificationId' => $notificationId]);
                return response('Already processed', 200);
            }
            Cache::put($cacheKey, true, now()->addHours(24));
        }

        // 3) Only forward payment-captured events
        if ($eventType !== 'net.authorize.payment.authcapture.created'
            && $eventType !== 'net.authorize.payment.capture.created') {
            // Ack any other event types so Authorize.Net stops retrying
            return response('OK (ignored)', 200);
        }

        $this->forwardToGhl($event);

        return response('OK', 200);
    }

    private function verifySignature(Request $request, string $rawBody): bool
    {
        $signatureKey = config('services.authorize_net.signature_key');
        if (!$signatureKey) {
            Log::error('Authorize.Net signature key not configured — rejecting webhook');
            return false;
        }

        $header = $request->headers->get('X-ANET-Signature', '');
        if (!str_starts_with(strtolower($header), 'sha512=')) {
            return false;
        }

        $providedHex = strtoupper(substr($header, 7));
        $expectedHex = strtoupper(hash_hmac('sha512', $rawBody, hex2bin($signatureKey)));

        return hash_equals($expectedHex, $providedHex);
    }

    private function forwardToGhl(array $event): void
    {
        $webhookUrl = config('services.ghl.payment_webhook')
            ?: config('services.ghl.onboarding_webhook');

        if (!$webhookUrl) {
            Log::warning('No GHL webhook configured for payment events');
            return;
        }

        $payload  = $event['payload'] ?? [];
        $invoice  = $payload['invoiceNumber']
                 ?? $payload['merchantReferenceId']
                 ?? null;

        // Enrich from our own subscription record if we have it
        $sub = $invoice ? Subscription::where('invoice_number', $invoice)->first() : null;

        $body = [
            'event'          => $event['eventType']    ?? null,
            'event_date'     => $event['eventDate']    ?? null,
            'notificationId' => $event['notificationId'] ?? null,
            'invoice'        => $invoice,
            'transaction_id' => $payload['id']        ?? null,
            'auth_code'      => $payload['authCode'] ?? null,
            'response_code'  => $payload['responseCode'] ?? null,
            'avs_response'   => $payload['avsResponse']  ?? null,
            'amount'         => $payload['authAmount']   ?? null,
            'first_name'     => $sub->first_name ?? null,
            'last_name'      => $sub->last_name  ?? null,
            'email'          => $sub->email      ?? null,
            'phone'          => $sub->phone      ?? null,
            'plan_key'       => $sub->plan_key   ?? null,
            'plan_label'     => $sub->plan_label ?? null,
            'recurring_amount'    => $sub->recurring_amount    ?? null,
            'arb_subscription_id' => $sub->arb_subscription_id ?? null,
            'verified'       => true,
            'source'         => 'authorize.net-webhook',
        ];

        try {
            $resp = Http::timeout(10)->acceptJson()->asJson()->post($webhookUrl, $body);
            Log::info('GHL payment webhook posted', [
                'invoice'  => $invoice,
                'status'   => $resp->status(),
                'sub_found'=> (bool) $sub,
            ]);
        } catch (\Throwable $e) {
            Log::error('GHL payment webhook exception', [
                'invoice' => $invoice,
                'error'   => $e->getMessage(),
            ]);
        }
    }
}
