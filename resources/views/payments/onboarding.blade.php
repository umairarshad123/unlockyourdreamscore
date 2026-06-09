<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Welcome — Quick Onboarding | DreamScore</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        :root {
            --gold:        #c9a84c;
            --gold-light:  #dfc070;
            --gold-dim:    rgba(201,168,76,0.12);
            --dark:        #080808;
            --card:        #111111;
            --card2:       #191919;
            --border:      rgba(255,255,255,0.08);
            --border-gold: rgba(201,168,76,0.30);
            --white:       #ffffff;
            --gray:        #a0a0a0;
            --dim:         #606060;
            --success:     #4ade80;
            --error:       #ff6b6b;
        }
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background: var(--dark);
            color: var(--white);
            color-scheme: dark;
            min-height: 100vh;
            padding: 32px 16px 60px;
        }
        .wrap { max-width: 820px; margin: 0 auto; }
        .header-card {
            background: linear-gradient(135deg, var(--card2) 0%, var(--card) 100%);
            border: 1px solid var(--border-gold);
            color: var(--white);
            border-radius: 16px;
            padding: 28px 32px;
            margin-bottom: 24px;
            box-shadow: 0 20px 50px rgba(0,0,0,.5);
        }
        .header-card h1 { font-size: 26px; font-weight: 800; margin-bottom: 6px; letter-spacing: -0.5px; }
        .header-card p { color: var(--gray); font-size: 15px; }
        .receipt-strip {
            display: flex; flex-wrap: wrap; gap: 18px;
            margin-top: 16px; padding-top: 16px;
            border-top: 1px solid var(--border-gold);
            font-size: 13px;
        }
        .receipt-strip span { color: var(--white); }
        .receipt-strip span strong { display: block; color: var(--gold); font-weight: 700; font-size: 11px; text-transform: uppercase; letter-spacing: .5px; margin-bottom: 2px; }

        .card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 28px 32px;
            margin-bottom: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,.4);
        }
        .card h2 {
            font-size: 14px; text-transform: uppercase; letter-spacing: 1.5px;
            color: var(--gold); margin-bottom: 18px; font-weight: 800;
        }
        .field-row {
            display: grid; grid-template-columns: 1fr 1fr; gap: 14px;
            margin-bottom: 14px;
        }
        .field-row.three { grid-template-columns: 2fr 1fr 1fr; }
        .field-row.full { grid-template-columns: 1fr; }
        .field { display: flex; flex-direction: column; gap: 6px; }
        .field label {
            font-size: 13px; font-weight: 600; color: var(--gray);
        }
        .field label .req { color: var(--gold); }
        .field input, .field select, .field textarea {
            width: 100%; padding: 12px 14px; border: 1px solid var(--border);
            border-radius: 8px; font-size: 15px; font-family: inherit; color: var(--white);
            background: var(--card2); transition: border-color .15s ease, box-shadow .15s ease;
        }
        .field input::placeholder, .field textarea::placeholder { color: var(--dim); }
        .field input:focus, .field select:focus, .field textarea:focus {
            outline: none; border-color: var(--gold);
            box-shadow: 0 0 0 3px var(--gold-dim);
        }
        .field textarea { min-height: 90px; resize: vertical; }
        .help { font-size: 12px; color: var(--gray); }

        .submit-row {
            display: flex; align-items: center; justify-content: space-between;
            gap: 16px; margin-top: 8px;
        }
        .submit-btn {
            background: var(--gold); color: #000; border: none; border-radius: 6px;
            padding: 16px 32px; font-size: 15px; font-weight: 800; cursor: pointer;
            letter-spacing: 1px; text-transform: uppercase;
            transition: transform .15s ease, background .15s ease, box-shadow .15s ease;
        }
        .submit-btn:hover:not(:disabled) { background: var(--gold-light); transform: translateY(-1px); box-shadow: 0 8px 24px rgba(201,168,76,.35); }
        .submit-btn:disabled { opacity: .6; cursor: not-allowed; transform: none; }

        .form-msg { font-size: 14px; min-height: 20px; margin-top: 12px; }
        .form-msg.is-error { color: var(--error); }
        .form-msg.is-success { color: var(--success); font-weight: 600; }

        .secure-note {
            font-size: 12px; color: var(--gray); display: flex; gap: 8px; align-items: center; margin-top: 14px;
        }
        .secure-note i { color: var(--gold); }

        @media (max-width: 700px) {
            .field-row, .field-row.three { grid-template-columns: 1fr; }
            .header-card, .card { padding: 22px; }
        }
    </style>
</head>
<body>
<div class="wrap">

    <div class="header-card">
        <h1>Welcome to DreamScore — let's get you started.</h1>
        <p>Your payment is confirmed. We just need a few more details to begin filing your disputes within 48 hours.</p>
        <div class="receipt-strip">
            <span><strong>Plan</strong> {{ $planLabel }}</span>
            <span><strong>Invoice</strong> {{ $invoice }}</span>
            <span><strong>Charged</strong> ${{ $amount }}</span>
            <span><strong>Transaction</strong> {{ $transId }}</span>
        </div>
    </div>

    <form id="onboardingForm" novalidate>
        <input type="hidden" name="invoice_number" value="{{ $invoice }}">
        <input type="hidden" name="plan_key"       value="{{ $planKey }}">

        <div class="card">
            <h2>Personal Information</h2>
            <div class="field-row">
                <div class="field">
                    <label>First Name <span class="req">*</span></label>
                    <input type="text" name="first_name" value="{{ $prefill['first_name'] }}" required>
                </div>
                <div class="field">
                    <label>Last Name <span class="req">*</span></label>
                    <input type="text" name="last_name" value="{{ $prefill['last_name'] }}" required>
                </div>
            </div>
            <div class="field-row three">
                <div class="field">
                    <label>Middle Name</label>
                    <input type="text" name="middle_name">
                </div>
                <div class="field">
                    <label>Suffix</label>
                    <input type="text" name="suffix" placeholder="Jr., Sr., III">
                </div>
                <div class="field">
                    <label>Date of Birth <span class="req">*</span></label>
                    <input type="date" name="date_of_birth" required>
                </div>
            </div>
            <div class="field-row">
                <div class="field">
                    <label>Email <span class="req">*</span></label>
                    <input type="email" name="email" value="{{ $prefill['email'] }}" required>
                </div>
                <div class="field">
                    <label>Phone <span class="req">*</span></label>
                    <input type="tel" name="phone" value="{{ $prefill['phone'] }}" required>
                </div>
            </div>
        </div>

        <div class="card">
            <h2>Identity Verification</h2>
            <div class="field-row three">
                <div class="field">
                    <label>Last 4 of SSN <span class="req">*</span></label>
                    <input type="text" name="ssn_last4" inputmode="numeric" maxlength="4" pattern="[0-9]{4}" required>
                    <span class="help">Used by bureaus to confirm identity. Encrypted in transit.</span>
                </div>
                <div class="field">
                    <label>Driver's License #</label>
                    <input type="text" name="dl_number">
                </div>
                <div class="field">
                    <label>DL State</label>
                    <input type="text" name="dl_state" maxlength="2" placeholder="TX">
                </div>
            </div>
        </div>

        <div class="card">
            <h2>Mailing Address</h2>
            <div class="field-row full">
                <div class="field">
                    <label>Street Address <span class="req">*</span></label>
                    <input type="text" name="address" value="{{ $prefill['address'] }}" required>
                </div>
            </div>
            <div class="field-row three">
                <div class="field">
                    <label>City <span class="req">*</span></label>
                    <input type="text" name="city" value="{{ $prefill['city'] }}" required>
                </div>
                <div class="field">
                    <label>State <span class="req">*</span></label>
                    <input type="text" name="state" value="{{ $prefill['state'] }}" maxlength="2" required>
                </div>
                <div class="field">
                    <label>ZIP <span class="req">*</span></label>
                    <input type="text" name="zip" value="{{ $prefill['zip'] }}" required>
                </div>
            </div>
            <div class="field-row full">
                <div class="field">
                    <label>Previous Address (if moved within 2 years)</label>
                    <input type="text" name="previous_address" placeholder="Street, City, State, ZIP">
                </div>
            </div>
        </div>

        <div class="card">
            <h2>Employment & Background</h2>
            <div class="field-row">
                <div class="field">
                    <label>Current Employer</label>
                    <input type="text" name="employer">
                </div>
                <div class="field">
                    <label>Monthly Income</label>
                    <input type="text" name="monthly_income" placeholder="e.g. $5,000">
                </div>
            </div>
            <div class="field-row full">
                <div class="field">
                    <label>How did you hear about us?</label>
                    <select name="how_heard">
                        <option value="">Select…</option>
                        <option>Google search</option>
                        <option>Friend or family</option>
                        <option>Social media</option>
                        <option>YouTube</option>
                        <option>Podcast / radio</option>
                        <option>Other</option>
                    </select>
                </div>
            </div>
            <div class="field-row full">
                <div class="field">
                    <label>What's your main credit goal?</label>
                    <textarea name="goal_notes" placeholder="e.g. Buy a home in 6 months, qualify for business funding, etc."></textarea>
                </div>
            </div>
        </div>

        @if ($planKey === 'couple')
        <div class="card">
            <h2>Spouse / Partner Information</h2>
            <div class="field-row">
                <div class="field">
                    <label>First Name <span class="req">*</span></label>
                    <input type="text" name="spouse_first_name" required>
                </div>
                <div class="field">
                    <label>Last Name <span class="req">*</span></label>
                    <input type="text" name="spouse_last_name" required>
                </div>
            </div>
            <div class="field-row">
                <div class="field">
                    <label>Email <span class="req">*</span></label>
                    <input type="email" name="spouse_email" required>
                </div>
                <div class="field">
                    <label>Phone <span class="req">*</span></label>
                    <input type="tel" name="spouse_phone" required>
                </div>
            </div>
            <div class="field-row">
                <div class="field">
                    <label>Date of Birth <span class="req">*</span></label>
                    <input type="date" name="spouse_date_of_birth" required>
                </div>
                <div class="field">
                    <label>Last 4 of SSN <span class="req">*</span></label>
                    <input type="text" name="spouse_ssn_last4" inputmode="numeric" maxlength="4" pattern="[0-9]{4}" required>
                </div>
            </div>
        </div>
        @endif

        <div class="card">
            <div class="submit-row">
                <button type="submit" class="submit-btn">
                    <span class="btn-label">Complete Onboarding</span>
                    <span class="btn-spinner" hidden>Submitting…</span>
                </button>
                <p class="secure-note"><i class="fas fa-lock"></i> Your information is transmitted securely.</p>
            </div>
            <p class="form-msg" role="status" aria-live="polite"></p>
        </div>
    </form>
</div>

<script>
(function() {
    const form = document.getElementById('onboardingForm');
    if (!form) return;

    form.addEventListener('submit', async function(e) {
        e.preventDefault();

        const submitBtn = form.querySelector('.submit-btn');
        const btnLabel  = form.querySelector('.btn-label');
        const btnSpin   = form.querySelector('.btn-spinner');
        const msg       = form.querySelector('.form-msg');

        msg.textContent = '';
        msg.className = 'form-msg';
        submitBtn.disabled = true;
        btnLabel.hidden = true;
        btnSpin.hidden = false;

        const fd = new FormData(form);
        const payload = Object.fromEntries(fd.entries());

        try {
            const csrf = document.querySelector('meta[name="csrf-token"]').content;
            const resp = await fetch('{{ route('onboarding.submit') }}', {
                method: 'POST',
                headers: {
                    'Content-Type':     'application/json',
                    'Accept':           'application/json',
                    'X-CSRF-TOKEN':     csrf,
                    'X-Requested-With': 'XMLHttpRequest',
                },
                body: JSON.stringify(payload),
            });

            const data = await resp.json().catch(() => ({}));

            if (resp.status === 422) {
                msg.classList.add('is-error');
                const firstError = data.errors ? Object.values(data.errors)[0][0] : (data.message || 'Please check the form.');
                msg.textContent = firstError;
                submitBtn.disabled = false;
                btnLabel.hidden = false;
                btnSpin.hidden = true;
                return;
            }

            if (!resp.ok || !data.success) {
                msg.classList.add('is-error');
                msg.textContent = data.message || 'Something went wrong. Please try again.';
                submitBtn.disabled = false;
                btnLabel.hidden = false;
                btnSpin.hidden = true;
                return;
            }

            msg.classList.add('is-success');
            msg.textContent = 'Onboarding submitted — redirecting…';
            window.location.href = data.redirect;
        } catch (err) {
            msg.classList.add('is-error');
            msg.textContent = 'Network error. Please try again.';
            submitBtn.disabled = false;
            btnLabel.hidden = false;
            btnSpin.hidden = true;
        }
    });
})();
</script>
</body>
</html>
