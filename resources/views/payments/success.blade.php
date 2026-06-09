<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Confirmed — DreamScore</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        :root {
            --gold:        #c9a84c;
            --gold-light:  #dfc070;
            --gold-dim:    rgba(201,168,76,0.12);
            --dark:        #080808;
            --dark-card:   #111111;
            --dark-card2:  #191919;
            --border:      rgba(255,255,255,0.08);
            --border-gold: rgba(201,168,76,0.30);
            --white:       #ffffff;
            --gray:        #a0a0a0;
            --success:     #4ade80;
        }
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background: var(--dark);
            color: var(--white);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
        }
        .success-card {
            background: var(--dark-card);
            border: 1px solid var(--border-gold);
            max-width: 560px;
            width: 100%;
            padding: 50px 40px;
            border-radius: 16px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.5);
            text-align: center;
        }
        .success-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 24px;
            border-radius: 50%;
            background: rgba(74, 222, 128, 0.12);
            color: var(--success);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 38px;
        }
        h1 {
            font-size: 30px;
            font-weight: 900;
            color: var(--white);
            margin-bottom: 12px;
            letter-spacing: -0.5px;
        }
        .lead {
            color: var(--gray);
            font-size: 16px;
            margin-bottom: 32px;
            line-height: 1.6;
        }
        .lead strong { color: var(--white); }
        .receipt {
            background: var(--dark-card2);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 22px;
            text-align: left;
            margin-bottom: 28px;
        }
        .receipt-row {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            font-size: 14px;
            color: var(--gray);
        }
        .receipt-row + .receipt-row { border-top: 1px solid var(--border); }
        .receipt-row .label { font-weight: 600; }
        .receipt-row .value {
            color: var(--white);
            font-family: ui-monospace, 'SF Mono', Menlo, Consolas, monospace;
            font-size: 13px;
        }
        .receipt-row.total .value {
            color: var(--gold);
            font-weight: 900;
            font-family: inherit;
            font-size: 18px;
        }
        .next-steps {
            text-align: left;
            margin-bottom: 28px;
        }
        .next-steps h3 {
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: var(--gold);
            font-weight: 800;
            margin-bottom: 12px;
        }
        .next-steps ol {
            padding-left: 20px;
            color: var(--gray);
            font-size: 14px;
            line-height: 1.7;
        }
        .home-btn {
            display: inline-block;
            background: var(--gold);
            color: #000;
            text-decoration: none;
            padding: 14px 28px;
            border-radius: 6px;
            font-weight: 800;
            font-size: 14px;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: all .25s ease;
        }
        .home-btn:hover {
            background: var(--gold-light);
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(201, 168, 76, 0.35);
        }
    </style>
</head>
<body>
    <div class="success-card">
        <div class="success-icon"><i class="fas fa-check"></i></div>
        <h1>Payment Confirmed</h1>
        <p class="lead">Thank you{{ $email ? ', a confirmation email is on its way to ' : '.' }}<strong>{{ $email }}</strong>. Our team will reach out within 1 business day to begin your <strong>{{ $planLabel }}</strong>.</p>

        <div class="receipt">
            <div class="receipt-row">
                <span class="label">Plan</span>
                <span class="value">{{ $planLabel }}</span>
            </div>
            <div class="receipt-row">
                <span class="label">Invoice</span>
                <span class="value">{{ $invoice }}</span>
            </div>
            <div class="receipt-row">
                <span class="label">Transaction</span>
                <span class="value">{{ $transId }}</span>
            </div>
            <div class="receipt-row total">
                <span class="label">Charged Today</span>
                <span class="value">${{ $amount }}</span>
            </div>
        </div>

        <div class="next-steps">
            <h3>What Happens Next</h3>
            <ol>
                <li>Confirmation email arrives within minutes.</li>
                <li>A specialist calls to verify your details and pull your tri-bureau report.</li>
                <li>Disputes filed within 48 hours — first results in 30 days.</li>
            </ol>
        </div>

        <a href="{{ url('/') }}" class="home-btn">Back to DreamScore</a>
    </div>
</body>
</html>
