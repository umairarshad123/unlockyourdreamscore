<?php

use App\Http\Controllers\AcceptJsPaymentController;
use App\Http\Controllers\AuthorizeNetWebhookController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\OnboardingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});


// Privacy Policy page
Route::view('/privacy-policy', 'Privacy Policy')->name('privacy.policy');

// Terms of Service page
Route::view('/terms-of-service', 'termsofservice')->name('terms.service');

// Disclaimer page
Route::view('/disclaimer', 'disclaimer')->name('disclaimer');

// Checkout (Authorize.Net Accept.js)
Route::get('/checkout/success', [AcceptJsPaymentController::class, 'showSuccess'])->name('checkout.success');
Route::post('/checkout/process', [AcceptJsPaymentController::class, 'processPayment'])->name('checkout.process');
Route::get('/checkout/{plan}', [AcceptJsPaymentController::class, 'showCheckout'])
    ->where('plan', 'monthly|onetime|couple|starter')
    ->name('checkout.show');

// Lead capture (GHL only)
Route::post('/leads/popup', [LeadController::class, 'popup'])->name('leads.popup');
Route::post('/leads/cta',   [LeadController::class, 'lead'])->name('leads.cta');

// Onboarding (post-payment) — sends to GHL + CRC
Route::get( '/onboarding',          [OnboardingController::class, 'show'])->name('onboarding.show');
Route::post('/onboarding',          [OnboardingController::class, 'submit'])->name('onboarding.submit');
Route::get( '/onboarding/complete', [OnboardingController::class, 'complete'])->name('onboarding.complete');

// Authorize.Net webhook (signature-verified, forwards to GHL).
// Production canonical path matches the Authorize.Net dashboard config.
Route::post('/authorize.net/notification', [AuthorizeNetWebhookController::class, 'handle'])
    ->name('authorize.net.webhook');
// Alias retained because PHP's built-in dev server (artisan serve) mishandles dotted paths.
// Apache/nginx in production handle the canonical path correctly; this alias is harmless to keep.
Route::post('/webhooks/authorize-net', [AuthorizeNetWebhookController::class, 'handle'])
    ->name('authorize.net.webhook.alt');