<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Checkout — {{ $planLabel }} | DreamScore</title>
    <meta name="description" content="Secure checkout for your DreamScore credit transformation plan.">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    {{-- Card data collected server-side (direct card API) — Accept.js not used --}}

    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        :root {
            --primary: #008eaa;
            --primary-dark: #007899;
            --gray: #caccd1;
            --background: #fefefe;
            --white: #ffffff;
            --text-dark: #2c3e50;
            --text-medium: #5a6c7d;
            --text-light: #7a8a9a;
            --error: #d9534f;
            --success: #28a745;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background: linear-gradient(135deg, var(--background) 0%, rgba(0, 142, 170, 0.05) 100%);
            color: var(--text-dark);
            line-height: 1.6;
            min-height: 100vh;
        }

        .checkout-nav {
            background: rgba(254, 254, 254, 0.95);
            backdrop-filter: blur(20px);
            padding: 18px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .checkout-nav-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .checkout-logo {
            font-size: 28px;
            font-weight: 900;
            color: var(--primary);
            letter-spacing: -1px;
            text-decoration: none;
        }

        .secure-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--text-medium);
            font-size: 14px;
            font-weight: 600;
        }

        .secure-badge i { color: var(--success); }

        .checkout-wrapper {
            max-width: 1100px;
            margin: 0 auto;
            padding: 50px 30px;
            display: grid;
            grid-template-columns: 1fr 380px;
            gap: 40px;
            align-items: start;
        }

        .checkout-form-card,
        .checkout-summary-card {
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            padding: 40px;
        }

        .checkout-summary-card {
            position: sticky;
            top: 100px;
        }

        .checkout-form-card h1 {
            font-size: 28px;
            font-weight: 900;
            color: var(--text-dark);
            margin-bottom: 8px;
        }

        .checkout-form-card .subhead {
            color: var(--text-medium);
            font-size: 15px;
            margin-bottom: 32px;
        }

        .form-section-title {
            font-size: 13px;
            font-weight: 700;
            color: var(--primary);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin: 28px 0 16px;
        }

        .form-section-title:first-child { margin-top: 0; }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .form-row.three { grid-template-columns: 2fr 1fr 1fr; }

        .form-group { margin-bottom: 16px; }

        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: var(--text-medium);
            margin-bottom: 6px;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 12px 14px;
            border: 1.5px solid #e3e8ed;
            border-radius: 10px;
            font-size: 15px;
            color: var(--text-dark);
            font-family: inherit;
            background: #fff;
            transition: border-color .2s, box-shadow .2s;
        }

        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(0, 142, 170, 0.12);
        }

        .form-group input.error {
            border-color: var(--error);
            box-shadow: 0 0 0 3px rgba(217, 83, 79, 0.12);
        }

        .agree-row {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-top: 24px;
            font-size: 14px;
            color: var(--text-medium);
        }

        .agree-row input[type="checkbox"] {
            margin-top: 4px;
            accent-color: var(--primary);
            width: 16px;
            height: 16px;
            flex-shrink: 0;
        }

        .agree-row a {
            color: var(--primary);
            font-weight: 600;
            text-decoration: none;
        }

        .agree-row a:hover { text-decoration: underline; }

        .submit-btn {
            display: block;
            width: 100%;
            margin-top: 28px;
            background: var(--primary);
            color: #fff;
            border: none;
            padding: 16px 24px;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            cursor: pointer;
            transition: all .25s ease;
            font-family: inherit;
        }

        .submit-btn:hover:not(:disabled) {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 142, 170, 0.3);
        }

        .submit-btn:disabled {
            opacity: 0.7;
            cursor: not-allowed;
            transform: none;
        }

        .submit-btn .spinner {
            display: none;
            width: 16px;
            height: 16px;
            border: 2px solid rgba(255,255,255,0.3);
            border-top-color: #fff;
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
            vertical-align: middle;
            margin-right: 8px;
        }

        .submit-btn.loading .spinner { display: inline-block; }
        .submit-btn.loading .label { vertical-align: middle; }

        @keyframes spin { to { transform: rotate(360deg); } }

        .form-error,
        .form-success {
            margin-top: 18px;
            padding: 14px 16px;
            border-radius: 10px;
            font-size: 14px;
            display: none;
        }

        .form-error {
            background: rgba(217, 83, 79, 0.08);
            border: 1px solid rgba(217, 83, 79, 0.25);
            color: var(--error);
        }

        .form-success {
            background: rgba(40, 167, 69, 0.08);
            border: 1px solid rgba(40, 167, 69, 0.25);
            color: var(--success);
        }

        /* Summary card */
        .checkout-summary-card .summary-eyebrow {
            font-size: 12px;
            font-weight: 700;
            color: var(--primary);
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 12px;
        }

        .checkout-summary-card h2 {
            font-size: 22px;
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 24px;
            line-height: 1.25;
        }

        .summary-line {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            padding: 12px 0;
            font-size: 15px;
            color: var(--text-medium);
            border-bottom: 1px solid rgba(0, 142, 170, 0.1);
        }

        .summary-line:last-of-type { border-bottom: none; }

        .summary-total {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            padding: 18px 0 8px;
            border-top: 2px solid rgba(0, 142, 170, 0.15);
            margin-top: 8px;
        }

        .summary-total .label {
            font-size: 14px;
            font-weight: 600;
            color: var(--text-medium);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .summary-total .price {
            font-size: 36px;
            font-weight: 900;
            color: var(--primary);
            letter-spacing: -1px;
        }

        .summary-recurring-note {
            margin-top: 16px;
            padding: 12px 14px;
            background: rgba(0, 142, 170, 0.06);
            border-radius: 10px;
            font-size: 13px;
            color: var(--text-medium);
            line-height: 1.45;
        }

        .summary-recurring-note strong { color: var(--text-dark); }

        .trust-list {
            list-style: none;
            margin-top: 24px;
            padding: 0;
        }

        .trust-list li {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 8px 0;
            font-size: 13px;
            color: var(--text-medium);
        }

        .trust-list i {
            color: var(--primary);
            font-size: 14px;
            width: 18px;
            text-align: center;
        }

        @media (max-width: 900px) {
            .checkout-wrapper {
                grid-template-columns: 1fr;
                gap: 24px;
                padding: 30px 18px;
            }
            .checkout-summary-card {
                position: static;
                order: -1;
            }
            .checkout-form-card,
            .checkout-summary-card { padding: 28px; }
            .form-row,
            .form-row.three { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
    <nav class="checkout-nav">
        <div class="checkout-nav-container">
            <a href="{{ url('/') }}" class="checkout-logo">DreamScore</a>
            <span class="secure-badge"><i class="fas fa-lock"></i> Secure 256-bit SSL Checkout</span>
        </div>
    </nav>

    <main class="checkout-wrapper">
        <section class="checkout-form-card">
            <h1>Secure Checkout</h1>
            <p class="subhead">Complete your enrollment for <strong>{{ $planLabel }}</strong>. Your payment is processed securely over an encrypted connection through Authorize.Net.</p>

            <form id="payment-form" novalidate>
                <input type="hidden" name="selected_plan" value="{{ $planKey }}">

                <div class="form-section-title">Your Information</div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" id="first_name" name="first_name" required>
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" id="last_name" name="last_name" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="tel" id="phone" name="phone" required>
                    </div>
                </div>

                <div class="form-section-title">Billing Address</div>
                <div class="form-group">
                    <label for="address">Street Address</label>
                    <input type="text" id="address" name="address" required>
                </div>
                <div class="form-row three">
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" id="city" name="city" required>
                    </div>
                    <div class="form-group">
                        <label for="state">State</label>
                        <input type="text" id="state" name="state" maxlength="2" placeholder="TX" required>
                    </div>
                    <div class="form-group">
                        <label for="zip">ZIP</label>
                        <input type="text" id="zip" name="zip" required>
                    </div>
                </div>

                <div class="form-section-title">Card Details</div>
                <div class="form-group">
                    <label for="cardName">Name on Card</label>
                    <input type="text" id="cardName" name="cardName" required>
                </div>
                <div class="form-group">
                    <label for="cardNumber">Card Number</label>
                    <input type="text" id="cardNumber" inputmode="numeric" autocomplete="cc-number" placeholder="1234 5678 9012 3456" maxlength="19" required>
                </div>
                <div class="form-row three">
                    <div class="form-group">
                        <label for="expMonth">Exp. Month</label>
                        <input type="text" id="expMonth" inputmode="numeric" autocomplete="cc-exp-month" placeholder="MM" maxlength="2" required>
                    </div>
                    <div class="form-group">
                        <label for="expYear">Exp. Year</label>
                        <input type="text" id="expYear" inputmode="numeric" autocomplete="cc-exp-year" placeholder="YYYY" maxlength="4" required>
                    </div>
                    <div class="form-group">
                        <label for="cardCode">CVV</label>
                        <input type="text" id="cardCode" inputmode="numeric" autocomplete="cc-csc" placeholder="123" maxlength="4" required>
                    </div>
                </div>

                <label class="agree-row">
                    <input type="checkbox" name="agree_terms" id="agree_terms" value="1" required>
                    <span>
                        I agree to the
                        <a href="{{ route('terms.service') }}" target="_blank">Terms of Service</a> and
                        <a href="{{ route('privacy.policy') }}" target="_blank">Privacy Policy</a>,
                        and authorize DreamScore to charge my card for the amount shown.
                    </span>
                </label>

                <button type="submit" class="submit-btn" id="submit-btn">
                    <span class="spinner"></span>
                    <span class="label">Complete Secure Payment — ${{ $amount }}</span>
                </button>

                <div class="form-error" id="form-error"></div>
                <div class="form-success" id="form-success"></div>
            </form>
        </section>

        <aside class="checkout-summary-card">
            <div class="summary-eyebrow">Order Summary</div>
            <h2>{{ $planLabel }}</h2>

            <div class="summary-line">
                <span>{{ $planLabel }}</span>
                <span>${{ $amount }}</span>
            </div>

            <div class="summary-total">
                <span class="label">Charged Today</span>
                <span class="price">${{ $amount }}</span>
            </div>

            @if($recurringAmt)
                <div class="summary-recurring-note">
                    <strong>Recurring:</strong> ${{ $recurringAmt }}/month starting in 30 days. Cancel anytime after 90 days.
                </div>
            @endif

            <ul class="trust-list">
                <li><i class="fas fa-shield-alt"></i> Bank-grade 256-bit SSL encryption</li>
                <li><i class="fas fa-lock"></i> Payments processed securely via Authorize.Net</li>
                <li><i class="fas fa-headset"></i> Dedicated US-based support</li>
                <li><i class="fas fa-undo-alt"></i> Cancel anytime after 90 days</li>
            </ul>
        </aside>
    </main>

    <script>
        (function () {
            const ACCEPT_API_LOGIN_ID = @json($apiLoginId);
            const ACCEPT_CLIENT_KEY   = @json($acceptJsClient);

            const form        = document.getElementById('payment-form');
            const submitBtn   = document.getElementById('submit-btn');
            const errorBox    = document.getElementById('form-error');
            const successBox  = document.getElementById('form-success');

            function showError(msg) {
                errorBox.textContent = msg;
                errorBox.style.display = 'block';
                successBox.style.display = 'none';
                window.scrollTo({ top: form.offsetTop - 80, behavior: 'smooth' });
            }

            function showSuccess(msg) {
                successBox.textContent = msg;
                successBox.style.display = 'block';
                errorBox.style.display = 'none';
            }

            function setLoading(state) {
                if (state) {
                    submitBtn.classList.add('loading');
                    submitBtn.disabled = true;
                    submitBtn.querySelector('.label').textContent = 'Processing securely…';
                } else {
                    submitBtn.classList.remove('loading');
                    submitBtn.disabled = false;
                    submitBtn.querySelector('.label').textContent = 'Complete Secure Payment — ${{ $amount }}';
                }
            }

            // Light input formatting
            document.getElementById('cardNumber').addEventListener('input', function (e) {
                let v = e.target.value.replace(/\D/g, '').slice(0, 19);
                e.target.value = v.replace(/(\d{4})(?=\d)/g, '$1 ').trim();
            });
            ['expMonth', 'expYear', 'cardCode', 'zip'].forEach(id => {
                document.getElementById(id).addEventListener('input', e => {
                    e.target.value = e.target.value.replace(/\D/g, '');
                });
            });

            form.addEventListener('submit', function (ev) {
                ev.preventDefault();
                errorBox.style.display = 'none';

                if (!document.getElementById('agree_terms').checked) {
                    showError('Please agree to the Terms and Privacy Policy.');
                    return;
                }

                // Basic field check
                const required = ['first_name','last_name','email','phone','address','city','state','zip','cardName'];
                for (const id of required) {
                    if (!document.getElementById(id).value.trim()) {
                        showError('Please fill in all required fields.');
                        document.getElementById(id).focus();
                        return;
                    }
                }

                const cardNumberRaw = document.getElementById('cardNumber').value.replace(/\s+/g,'');
                if (cardNumberRaw.length < 13) { showError('Please enter a valid card number.'); return; }

                const expMonth = document.getElementById('expMonth').value.padStart(2, '0');
                const expYear  = document.getElementById('expYear').value.trim();
                const cardCode = document.getElementById('cardCode').value.trim();

                if (expMonth.length !== 2)  { showError('Please enter a valid expiry month (MM).'); return; }
                if (expYear.length !== 4)   { showError('Please enter a valid expiry year (YYYY).'); return; }
                if (cardCode.length < 3)    { showError('Please enter a valid CVV.'); return; }

                setLoading(true);

                // Direct card API — raw card fields are sent server-side; the
                // controller charges Authorize.Net with the creditCard payload.
                const fd = new FormData(form);
                fd.set('cardNumber', cardNumberRaw);
                fd.set('expMonth', expMonth);
                fd.set('expYear', expYear);
                fd.set('cardCode', cardCode);
                fd.append('agree_terms', '1');

                fetch(@json(url('/checkout/process')), {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content,
                        'Accept': 'application/json'
                    },
                    body: fd
                })
                .then(r => r.json().then(d => ({ status: r.status, body: d })))
                .then(({ status, body }) => {
                    if (body.success) {
                        showSuccess('Payment successful! Redirecting…');
                        window.location.href = body.redirect;
                    } else {
                        setLoading(false);
                        showError(body.message || 'Payment failed. Please try a different card or contact support.');
                    }
                })
                .catch(err => {
                    setLoading(false);
                    showError('Network error: ' + err.message);
                });
            });
        })();
    </script>
</body>
</html>
