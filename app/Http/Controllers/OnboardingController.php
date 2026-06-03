<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class OnboardingController extends Controller
{
    public function show(Request $request)
    {
        if (!session('checkout_success')) {
            return redirect('/');
        }

        $invoice = session('checkout_invoice');
        $cached  = Cache::get('checkout_customer_' . $invoice, []);

        $sub = Subscription::where('invoice_number', $invoice)->first();

        $prefill = [
            'first_name' => $sub->first_name ?? $cached['first_name'] ?? '',
            'last_name'  => $sub->last_name  ?? $cached['last_name']  ?? '',
            'email'      => $sub->email      ?? $cached['email']      ?? session('checkout_email', ''),
            'phone'      => $sub->phone      ?? '',
            'address'    => $sub->address    ?? '',
            'city'       => $sub->city       ?? '',
            'state'      => $sub->state      ?? '',
            'zip'        => $sub->zip        ?? '',
        ];

        return view('payments.onboarding', [
            'invoice'   => $invoice,
            'planLabel' => session('checkout_plan'),
            'planKey'   => $sub->plan_key ?? null,
            'amount'    => session('checkout_amount'),
            'transId'   => session('checkout_transId'),
            'prefill'   => $prefill,
        ]);
    }

    public function submit(Request $request)
    {
        $isCouple = $request->input('plan_key') === 'couple';

        $rules = [
            'invoice_number'   => 'required|string|max:50',
            'first_name'       => 'required|string|max:100',
            'last_name'        => 'required|string|max:100',
            'middle_name'      => 'nullable|string|max:100',
            'suffix'           => 'nullable|string|max:20',
            'email'            => 'required|email|max:150',
            'phone'            => 'required|string|max:30',
            'date_of_birth'    => 'required|date',
            'ssn_last4'        => 'required|string|size:4',
            'dl_number'        => 'nullable|string|max:40',
            'dl_state'         => 'nullable|string|max:10',
            'address'          => 'required|string|max:255',
            'city'             => 'required|string|max:100',
            'state'            => 'required|string|max:10',
            'zip'              => 'required|string|max:20',
            'previous_address' => 'nullable|string|max:255',
            'employer'         => 'nullable|string|max:150',
            'monthly_income'   => 'nullable|string|max:30',
            'how_heard'        => 'nullable|string|max:100',
            'goal_notes'       => 'nullable|string|max:1000',
        ];

        if ($isCouple) {
            $rules = array_merge($rules, [
                'spouse_first_name'    => 'required|string|max:100',
                'spouse_last_name'     => 'required|string|max:100',
                'spouse_email'         => 'required|email|max:150',
                'spouse_phone'         => 'required|string|max:30',
                'spouse_date_of_birth' => 'required|date',
                'spouse_ssn_last4'     => 'required|string|size:4',
            ]);
        }

        $data = $request->validate($rules);

        Log::info('Onboarding form submitted', [
            'invoice' => $data['invoice_number'],
            'email'   => $data['email'],
            'couple'  => $isCouple,
        ]);

        // Persist onboarding data to subscription record
        $sub = Subscription::where('invoice_number', $data['invoice_number'])->first();
        if ($sub) {
            try {
                $sub->update([
                    'phone'   => $data['phone'],
                    'address' => $data['address'],
                    'city'    => $data['city'],
                    'state'   => $data['state'],
                    'zip'     => $data['zip'],
                ]);
            } catch (\Throwable $e) {
                Log::warning('Could not update subscription with onboarding data', [
                    'invoice' => $data['invoice_number'],
                    'error'   => $e->getMessage(),
                ]);
            }
        }

        // 1) GHL onboarding webhook (main fields only, per requirements)
        $ghlPayload = [
            'invoice'        => $data['invoice_number'],
            'first_name'     => $data['first_name'],
            'last_name'      => $data['last_name'],
            'email'          => $data['email'],
            'phone'          => $data['phone'],
            'date_of_birth'  => $data['date_of_birth'],
            'address'        => $data['address'],
            'city'           => $data['city'],
            'state'          => $data['state'],
            'zip'            => $data['zip'],
            'plan_label'     => session('checkout_plan'),
            'plan_key'       => $request->input('plan_key'),
            'amount'         => session('checkout_amount'),
            'transaction_id' => session('checkout_transId'),
            'how_heard'      => $data['how_heard'] ?? null,
            'goal_notes'     => $data['goal_notes'] ?? null,
            'submitted_at'   => now()->toIso8601String(),
        ];

        if ($isCouple) {
            $ghlPayload = array_merge($ghlPayload, [
                'spouse_first_name'    => $data['spouse_first_name'],
                'spouse_last_name'     => $data['spouse_last_name'],
                'spouse_email'         => $data['spouse_email'],
                'spouse_phone'         => $data['spouse_phone'],
                'spouse_date_of_birth' => $data['spouse_date_of_birth'],
            ]);
        }

        $ghlOk = $this->postToGhl($ghlPayload);

        // 2) CRC — create lead/contact (full identity data)
        $crcOk      = false;
        $crcMessage = null;
        [$crcOk, $crcMessage] = $this->postToCrc($data, $isCouple);

        // Don't fail the user if either side hiccups — log it and let support follow up.
        if (!$ghlOk || !$crcOk) {
            Log::warning('Onboarding partial failure', [
                'invoice'    => $data['invoice_number'],
                'ghl_ok'     => $ghlOk,
                'crc_ok'     => $crcOk,
                'crc_msg'    => $crcMessage,
            ]);
        }

        session(['onboarding_complete' => true, 'onboarding_invoice' => $data['invoice_number']]);

        return response()->json([
            'success'  => true,
            'redirect' => url('/onboarding/complete'),
        ]);
    }

    public function complete()
    {
        if (!session('onboarding_complete')) {
            return redirect('/');
        }

        return view('payments.onboarding-complete', [
            'invoice'   => session('onboarding_invoice'),
            'planLabel' => session('checkout_plan'),
            'email'     => session('checkout_email'),
        ]);
    }

    private function postToGhl(array $payload): bool
    {
        $url = config('services.ghl.onboarding_webhook');
        if (!$url) {
            Log::warning('GHL onboarding webhook not configured');
            return false;
        }

        try {
            $resp = Http::timeout(10)->acceptJson()->asJson()->post($url, $payload);
            Log::info('GHL onboarding webhook posted', [
                'invoice' => $payload['invoice'] ?? null,
                'status'  => $resp->status(),
            ]);
            return $resp->successful();
        } catch (\Throwable $e) {
            Log::error('GHL onboarding webhook exception', ['error' => $e->getMessage()]);
            return false;
        }
    }

    /**
     * Credit Repair Cloud Developer API — POST /api/lead/insertRecord
     * Auth params: apiauthkey + secretkey (lowercase). Lead body sent as XML in `xmlData`.
     * For couple plan we insert two Client records (primary + spouse).
     *
     * Returns [ok, errorMessage|null].
     */
    private function postToCrc(array $data, bool $isCouple): array
    {
        $apiKey = config('services.crc.api_key');
        $secret = config('services.crc.secret_key');

        if (!$apiKey || !$secret) {
            return [false, 'CRC credentials not configured.'];
        }

        $memoLines = array_filter([
            'Plan: '       . (session('checkout_plan')   ?? '-'),
            'Invoice: '    . ($data['invoice_number']    ?? '-'),
            'Transaction: '. (session('checkout_transId') ?? '-'),
            'Amount: $'    . (session('checkout_amount') ?? '-'),
            'How heard: '  . ($data['how_heard']  ?? '-'),
            'Goal: '       . ($data['goal_notes'] ?? '-'),
            !empty($data['dl_number'])      ? 'DL: ' . $data['dl_number'] . ' (' . ($data['dl_state'] ?? '') . ')' : null,
            !empty($data['employer'])       ? 'Employer: ' . $data['employer'] : null,
            !empty($data['monthly_income']) ? 'Monthly income: ' . $data['monthly_income'] : null,
        ]);
        $memo = implode("\n", $memoLines);

        $primaryFields = [
            'type'        => 'Client',
            'firstname'   => $data['first_name'],
            'lastname'    => $data['last_name'],
            'middlename'  => $data['middle_name'] ?? '',
            'suffix'      => $data['suffix']      ?? '',
            'email'       => $data['email'],
            'phone_mobile'=> preg_replace('/\D+/', '', $data['phone']),
            'street_address' => $data['address'],
            'city'        => $data['city'],
            'state'       => $data['state'],
            'zip'         => $data['zip'],
            'ssno'        => $data['ssn_last4'],
            'birth_date'  => $this->formatBirthDateForCrc($data['date_of_birth']),
            'memo'        => $memo,
            'previous_mailing_address' => $data['previous_address'] ?? '',
        ];

        [$ok, $msg] = $this->insertCrcRecord($apiKey, $secret, $primaryFields, $data['invoice_number'] ?? null, 'primary');

        if (!$ok || !$isCouple) {
            return [$ok, $msg];
        }

        // Couple plan — also insert spouse as a separate Client record
        $spouseFields = [
            'type'         => 'Client',
            'firstname'    => $data['spouse_first_name'],
            'lastname'     => $data['spouse_last_name'],
            'email'        => $data['spouse_email'],
            'phone_mobile' => preg_replace('/\D+/', '', $data['spouse_phone']),
            'street_address' => $data['address'],
            'city'         => $data['city'],
            'state'        => $data['state'],
            'zip'          => $data['zip'],
            'ssno'         => $data['spouse_ssn_last4'],
            'birth_date'   => $this->formatBirthDateForCrc($data['spouse_date_of_birth']),
            'memo'         => "Spouse of {$data['first_name']} {$data['last_name']}\n" . $memo,
        ];

        [$spouseOk, $spouseMsg] = $this->insertCrcRecord($apiKey, $secret, $spouseFields, $data['invoice_number'] ?? null, 'spouse');

        if (!$spouseOk) {
            return [false, 'Primary client created. Spouse failed: ' . $spouseMsg];
        }

        return [true, null];
    }

    private function insertCrcRecord(string $apiKey, string $secret, array $fields, ?string $invoice, string $tag): array
    {
        $endpoint = rtrim(config('services.crc.base_url'), '/') . '/lead/insertRecord';

        $xml = new \SimpleXMLElement('<crcloud/>');
        $lead = $xml->addChild('lead');
        foreach ($fields as $key => $value) {
            if ($value === null || $value === '') continue;
            // SimpleXMLElement::addChild does not escape the value — wrap in CDATA-safe escaping.
            $child = $lead->addChild($key);
            $node  = dom_import_simplexml($child);
            $node->appendChild($node->ownerDocument->createTextNode((string) $value));
        }
        $xmlData = $xml->asXML();

        try {
            $resp = Http::timeout(20)
                ->asForm()
                ->post($endpoint, [
                    'apiauthkey' => $apiKey,
                    'secretkey'  => $secret,
                    'xmlData'    => $xmlData,
                ]);

            $body   = $resp->body();
            $parsed = $this->parseCrcXml($body);

            Log::info("CRC insertRecord response ({$tag})", [
                'invoice' => $invoice,
                'status'  => $resp->status(),
                'success' => $parsed['success'],
                'crc_id'  => $parsed['id'],
                'message' => $parsed['message'] ?? $parsed['error_message'],
                'error_no'=> $parsed['error_no'],
                'body'    => substr($body, 0, 800),
            ]);

            if (!$resp->successful()) {
                return [false, "CRC HTTP {$resp->status()}"];
            }

            if ($parsed['success'] !== true) {
                $errMsg = $parsed['error_message'] ?? 'CRC rejected the request';
                $errNo  = $parsed['error_no']      ?? '?';
                return [false, "{$errMsg} (code {$errNo})"];
            }

            return [true, null];
        } catch (\Throwable $e) {
            Log::error("CRC insertRecord exception ({$tag})", ['error' => $e->getMessage()]);
            return [false, $e->getMessage()];
        }
    }

    private function formatBirthDateForCrc(string $isoDate): string
    {
        // CRC wants mm/dd/yyyy; our HTML date input produces yyyy-mm-dd.
        try {
            return \Carbon\Carbon::parse($isoDate)->format('m/d/Y');
        } catch (\Throwable $e) {
            return $isoDate;
        }
    }

    private function parseCrcXml(string $body): array
    {
        // Strip leading whitespace CRC often returns before the XML prolog.
        $body = preg_replace('/^\s+/', '', $body);

        $prev = libxml_use_internal_errors(true);
        $xml  = simplexml_load_string($body);
        libxml_use_internal_errors($prev);

        $out = [
            'success'       => null,
            'message'       => null,
            'id'            => null,
            'error_no'      => null,
            'error_message' => null,
        ];

        if ($xml === false) {
            return $out;
        }

        $out['success'] = strtolower(trim((string) ($xml->success ?? ''))) === 'true';

        if (isset($xml->result->message))       $out['message']       = trim((string) $xml->result->message);
        if (isset($xml->result->id))            $out['id']            = trim((string) $xml->result->id);
        if (isset($xml->result->errors->error_no))      $out['error_no']      = trim((string) $xml->result->errors->error_no);
        if (isset($xml->result->errors->error_message)) $out['error_message'] = trim((string) $xml->result->errors->error_message);

        return $out;
    }
}
