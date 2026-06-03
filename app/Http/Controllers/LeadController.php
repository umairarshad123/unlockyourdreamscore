<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class LeadController extends Controller
{
    public function popup(Request $request)
    {
        $data = $request->validate([
            'first_name'      => 'required|string|max:100',
            'last_name'       => 'required|string|max:100',
            'email'           => 'required|email|max:150',
            'phone'           => 'required|string|max:30',
            'credit_score'    => 'nullable|string|max:30',
            'available_credit'=> 'nullable|string|max:30',
            'credit_goal'     => 'nullable|string|max:50',
            'timeline'        => 'nullable|string|max:30',
        ]);

        $payload = array_merge($data, [
            'source'     => 'website-popup',
            'page_url'   => $request->headers->get('referer'),
            'ip'         => $request->ip(),
            'user_agent' => $request->userAgent(),
            'submitted_at' => now()->toIso8601String(),
        ]);

        return $this->forwardToGhl(config('services.ghl.popup_webhook'), $payload, 'popup');
    }

    public function lead(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name'  => 'required|string|max:100',
            'email'      => 'required|email|max:150',
            'phone'      => 'required|string|max:30',
        ]);

        $payload = array_merge($data, [
            'source'       => 'website-cta',
            'page_url'     => $request->headers->get('referer'),
            'ip'           => $request->ip(),
            'user_agent'   => $request->userAgent(),
            'submitted_at' => now()->toIso8601String(),
        ]);

        return $this->forwardToGhl(config('services.ghl.lead_webhook'), $payload, 'lead-cta');
    }

    private function forwardToGhl(?string $url, array $payload, string $tag)
    {
        if (!$url) {
            Log::warning("GHL webhook not configured for {$tag}", ['payload' => $payload]);
            return response()->json([
                'success' => false,
                'message' => 'Webhook not configured.',
            ], 503);
        }

        try {
            $response = Http::timeout(10)
                ->acceptJson()
                ->asJson()
                ->post($url, $payload);

            Log::info("GHL webhook ({$tag}) sent", [
                'status'  => $response->status(),
                'email'   => $payload['email'] ?? null,
            ]);

            if (!$response->successful()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Webhook rejected the request.',
                ], 502);
            }

            return response()->json([
                'success' => true,
                'message' => 'Thanks — we will be in touch shortly.',
            ]);
        } catch (\Throwable $e) {
            Log::error("GHL webhook ({$tag}) exception", [
                'error' => $e->getMessage(),
                'email' => $payload['email'] ?? null,
            ]);
            return response()->json([
                'success' => false,
                'message' => 'Could not submit right now. Please try again.',
            ], 500);
        }
    }
}
