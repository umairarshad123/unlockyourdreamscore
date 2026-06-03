<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class AcceptJsPaymentController extends Controller
{
    /**
     * Plans for DreamScore
     *  - monthly:  charge $297 today, then $100/mo recurring starting in 30 days
     *  - onetime:  charge $497 once, no recurring
     *  - couple:   charge $900 once, no recurring
     */
    private function planMap(): array
    {
        return [
            'monthly' => [
                'amount'    => '297.00',
                'recurring' => '100.00',
                'label'     => 'Monthly Investment',
            ],
            'onetime' => [
                'amount'    => '497.00',
                'recurring' => null,
                'label'     => 'One-Time Investment',
            ],
            'couple' => [
                'amount'    => '900.00',
                'recurring' => null,
                'label'     => 'Fast Sweep (Couple Special)',
            ],
        ];
    }

    public function showCheckout(string $plan = 'monthly')
    {
        $planMap = $this->planMap();

        if (!isset($planMap[$plan])) {
            $plan = 'monthly';
        }

        Log::info('Accept.js checkout page opened', [
            'ip'         => request()->ip(),
            'plan'       => $plan,
            'session_id' => session()->getId(),
        ]);

        return view('payments.checkout', [
            'planKey'        => $plan,
            'planLabel'      => $planMap[$plan]['label'],
            'amount'         => $planMap[$plan]['amount'],
            'recurringAmt'   => $planMap[$plan]['recurring'],
            'acceptJsClient' => config('services.authorize_net.client_key'),
            'apiLoginId'     => config('services.authorize_net.api_login_id'),
            'environment'    => config('services.authorize_net.environment', 'sandbox'),
        ]);
    }

    public function processPayment(Request $request)
    {
        Log::info('Accept.js payment request started', [
            'ip'                     => $request->ip(),
            'selected_plan_raw'      => $request->input('selected_plan'),
            'request_has_descriptor' => $request->filled('dataDescriptor'),
            'request_has_data_value' => $request->filled('dataValue'),
        ]);

        $validated = $request->validate([
            'dataDescriptor'   => 'required|string',
            'dataValue'        => 'required|string',
            'first_name'       => 'required|string|max:100',
            'last_name'        => 'required|string|max:100',
            'email'            => 'required|email|max:150',
            'phone'            => 'required|string|max:30',
            'address'          => 'required|string|max:255',
            'city'             => 'required|string|max:100',
            'state'            => 'required|string|max:10',
            'zip'              => 'required|string|max:20',
            'cardName'         => 'required|string|max:150',
            'selected_plan'    => 'required|string|in:monthly,onetime,couple',
            'agree_terms'      => 'required|accepted',
        ]);

        $planMap   = $this->planMap();
        $planKey   = $validated['selected_plan'];
        $planLabel = $planMap[$planKey]['label'];
        $amount    = $planMap[$planKey]['amount'];
        $recurring = $planMap[$planKey]['recurring'];

        $invoiceNumber = 'DS-' . time();

        Log::info('Plan resolved', [
            'invoice'    => $invoiceNumber,
            'plan_key'   => $planKey,
            'plan_label' => $planLabel,
            'amount'     => $amount,
            'recurring'  => $recurring,
        ]);

        $environment = config('services.authorize_net.environment');
        $apiLoginId  = config('services.authorize_net.api_login_id');
        $txKey       = config('services.authorize_net.transaction_key');

        if (!$apiLoginId || !$txKey) {
            Log::error('Authorize.Net credentials not configured', [
                'invoice' => $invoiceNumber,
            ]);
            return response()->json([
                'success' => false,
                'message' => 'Payment processing is not configured. Please contact support.',
            ], 500);
        }

        $endpoint = $environment === 'production'
            ? 'https://api.authorize.net/xml/v1/request.api'
            : 'https://apitest.authorize.net/xml/v1/request.api';

        $payload = [
            'createTransactionRequest' => [
                'merchantAuthentication' => [
                    'name'           => $apiLoginId,
                    'transactionKey' => $txKey,
                ],
                'refId' => (string) Str::uuid(),
                'transactionRequest' => [
                    'transactionType' => 'authCaptureTransaction',
                    'amount'          => $amount,
                    'payment'         => [
                        'opaqueData' => [
                            'dataDescriptor' => $validated['dataDescriptor'],
                            'dataValue'      => $validated['dataValue'],
                        ],
                    ],
                    'order' => [
                        'invoiceNumber' => $invoiceNumber,
                        'description'   => $planLabel,
                    ],
                    'customer' => [
                        'email' => $validated['email'],
                    ],
                    'billTo' => [
                        'firstName' => $validated['first_name'],
                        'lastName'  => $validated['last_name'],
                        'address'   => $validated['address'],
                        'city'      => $validated['city'],
                        'state'     => $validated['state'],
                        'zip'       => $validated['zip'],
                        'country'   => 'USA',
                    ],
                    'customerIP' => $request->ip(),
                ],
            ],
        ];

        try {
            $httpResponse = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Accept'       => 'application/json',
            ])->post($endpoint, $payload);

            $rawBody = preg_replace('/^\xEF\xBB\xBF/', '', $httpResponse->body());
            $rawBody = trim($rawBody);
            $responseData = json_decode($rawBody, true);

            $resultCode    = data_get($responseData, 'messages.resultCode');
            $txCode        = data_get($responseData, 'transactionResponse.responseCode');
            $transId       = data_get($responseData, 'transactionResponse.transId');
            $authCode      = data_get($responseData, 'transactionResponse.authCode');
            $messageText   = data_get($responseData, 'transactionResponse.messages.0.description')
                ?? data_get($responseData, 'messages.message.0.text')
                ?? 'Payment failed.';

            Log::info('Authorize.Net response', [
                'invoice'    => $invoiceNumber,
                'resultCode' => $resultCode,
                'txCode'     => $txCode,
                'transId'    => $transId,
                'message'    => $messageText,
            ]);

            if ($resultCode !== 'Ok' || $txCode !== '1') {
                $transactionErrors = data_get($responseData, 'transactionResponse.errors', []);
                Log::warning('Payment declined / failed at Authorize.Net', [
                    'invoice' => $invoiceNumber,
                    'message' => $messageText,
                    'errors'  => $transactionErrors,
                ]);

                return response()->json([
                    'success'            => false,
                    'message'            => $messageText,
                    'transaction_errors' => $transactionErrors,
                ], 422);
            }

            // Recurring subscription via CIM + ARB (only when plan has recurring)
            $customerProfileId        = null;
            $customerPaymentProfileId = null;
            $subscriptionId           = null;

            if ($recurring !== null) {
                [$customerProfileId, $customerPaymentProfileId, $subscriptionId, $subError] =
                    $this->createRecurringSubscription(
                        $endpoint,
                        $apiLoginId,
                        $txKey,
                        $transId,
                        $validated['email'],
                        $planLabel,
                        $recurring,
                        $invoiceNumber
                    );

                if ($subError !== null) {
                    return response()->json([
                        'success' => false,
                        'message' => $subError . ' Your one-time charge of $' . $amount . ' was completed (invoice ' . $invoiceNumber . '). Please contact support to set up the recurring portion.',
                    ], 422);
                }
            }

            // Persist
            try {
                Subscription::create([
                    'first_name'                  => $validated['first_name'],
                    'last_name'                   => $validated['last_name'],
                    'email'                       => $validated['email'],
                    'phone'                       => $validated['phone'],
                    'address'                     => $validated['address'],
                    'city'                        => $validated['city'],
                    'state'                       => $validated['state'],
                    'zip'                         => $validated['zip'],
                    'plan_key'                    => $planKey,
                    'plan_label'                  => $planLabel,
                    'amount'                      => $amount,
                    'recurring_amount'            => $recurring,
                    'invoice_number'              => $invoiceNumber,
                    'transaction_id'              => $transId,
                    'auth_code'                   => $authCode,
                    'arb_subscription_id'         => $subscriptionId,
                    'customer_profile_id'         => $customerProfileId,
                    'customer_payment_profile_id' => $customerPaymentProfileId,
                    'status'                      => 'active',
                    'subscribed_at'               => now(),
                    'next_billing_date'           => $recurring !== null ? now()->addMonth() : null,
                ]);
            } catch (\Throwable $dbEx) {
                Log::error('Failed to save subscription to database', [
                    'invoice' => $invoiceNumber,
                    'error'   => $dbEx->getMessage(),
                ]);
                // Continue — don't fail the customer's order over a DB write
            }

            session([
                'checkout_success' => true,
                'checkout_invoice' => $invoiceNumber,
                'checkout_transId' => $transId,
                'checkout_plan'    => $planLabel,
                'checkout_amount'  => $amount,
                'checkout_email'   => $validated['email'],
            ]);

            Cache::put('checkout_customer_' . $invoiceNumber, [
                'first_name' => $validated['first_name'],
                'last_name'  => $validated['last_name'],
                'email'      => $validated['email'],
                'plan_label' => $planLabel,
                'amount'     => $amount,
            ], now()->addMinutes(120));

            return response()->json([
                'success'  => true,
                'message'  => 'Payment successful.',
                'invoice'  => $invoiceNumber,
                'redirect' => url('/onboarding'),
            ]);

        } catch (\Throwable $e) {
            Log::error('Accept.js payment exception', [
                'invoice' => $invoiceNumber ?? 'N/A',
                'message' => $e->getMessage(),
                'file'    => $e->getFile(),
                'line'    => $e->getLine(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Server error: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function showSuccess()
    {
        if (!session('checkout_success')) {
            return redirect('/');
        }

        return view('payments.success', [
            'invoice'   => session('checkout_invoice'),
            'transId'   => session('checkout_transId'),
            'planLabel' => session('checkout_plan'),
            'amount'    => session('checkout_amount'),
            'email'     => session('checkout_email'),
        ]);
    }

    /**
     * Returns [customerProfileId, customerPaymentProfileId, subscriptionId, errorMessageOrNull]
     */
    private function createRecurringSubscription(
        string $endpoint,
        string $apiLoginId,
        string $txKey,
        string $transId,
        string $email,
        string $planLabel,
        string $recurringAmount,
        string $invoice
    ): array {
        // 1) CIM profile from completed transaction
        $cimPayload = [
            'createCustomerProfileFromTransactionRequest' => [
                'merchantAuthentication' => [
                    'name'           => $apiLoginId,
                    'transactionKey' => $txKey,
                ],
                'transId'  => $transId,
                'customer' => ['email' => $email],
            ],
        ];

        $cimResp = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept'       => 'application/json',
        ])->post($endpoint, $cimPayload);

        $cimRaw  = preg_replace('/^\xEF\xBB\xBF/', '', $cimResp->body());
        $cimData = json_decode(trim($cimRaw), true);

        $cimResult                = data_get($cimData, 'messages.resultCode');
        $customerProfileId        = data_get($cimData, 'customerProfileId');
        $customerPaymentProfileId = data_get($cimData, 'customerPaymentProfileIdList.numericString.0')
            ?? data_get($cimData, 'customerPaymentProfileIdList.0');

        if ($cimResult !== 'Ok' || !$customerProfileId || !$customerPaymentProfileId) {
            Log::error('CIM profile creation failed', [
                'invoice'  => $invoice,
                'response' => $cimData,
            ]);
            return [null, null, null, 'Could not set up recurring billing.'];
        }

        // Authorize.Net needs a moment to commit the new CIM profile
        sleep(1);

        // 2) ARB subscription against the CIM profile
        $arbPayload = [
            'ARBCreateSubscriptionRequest' => [
                'merchantAuthentication' => [
                    'name'           => $apiLoginId,
                    'transactionKey' => $txKey,
                ],
                'refId'        => (string) Str::uuid(),
                'subscription' => [
                    'name'            => $planLabel . ' Monthly',
                    'paymentSchedule' => [
                        'interval'         => ['length' => '1', 'unit' => 'months'],
                        'startDate'        => now()->addMonth()->format('Y-m-d'),
                        'totalOccurrences' => '9999',
                        'trialOccurrences' => '0',
                    ],
                    'amount'      => $recurringAmount,
                    'trialAmount' => '0.00',
                    'profile'     => [
                        'customerProfileId'        => $customerProfileId,
                        'customerPaymentProfileId' => $customerPaymentProfileId,
                    ],
                ],
            ],
        ];

        $arbResultCode  = null;
        $subscriptionId = null;
        $arbData        = null;

        for ($attempt = 1; $attempt <= 3; $attempt++) {
            if ($attempt > 1) {
                sleep(1);
            }

            $arbResp = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Accept'       => 'application/json',
            ])->post($endpoint, $arbPayload);

            $arbRaw  = preg_replace('/^\xEF\xBB\xBF/', '', $arbResp->body());
            $arbData = json_decode(trim($arbRaw), true);

            $arbResultCode  = data_get($arbData, 'messages.resultCode');
            $subscriptionId = data_get($arbData, 'subscriptionId');

            if ($arbResultCode === 'Ok' && $subscriptionId) {
                break;
            }
        }

        if ($arbResultCode !== 'Ok' || !$subscriptionId) {
            Log::error('ARB subscription creation failed', [
                'invoice'  => $invoice,
                'response' => $arbData,
            ]);
            return [$customerProfileId, $customerPaymentProfileId, null, 'Could not create the recurring subscription.'];
        }

        return [$customerProfileId, $customerPaymentProfileId, $subscriptionId, null];
    }
}
