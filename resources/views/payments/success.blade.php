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
            --primary: #008eaa;
            --primary-dark: #007899;
            --background: #fefefe;
            --text-dark: #2c3e50;
            --text-medium: #5a6c7d;
            --success: #28a745;
        }
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background: linear-gradient(135deg, var(--background) 0%, rgba(0, 142, 170, 0.05) 100%);
            color: var(--text-dark);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
        }
        .success-card {
            background: #fff;
            max-width: 560px;
            width: 100%;
            padding: 50px 40px;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
            text-align: center;
        }
        .success-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 24px;
            border-radius: 50%;
            background: rgba(40, 167, 69, 0.12);
            color: var(--success);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 38px;
        }
        h1 {
            font-size: 30px;
            font-weight: 900;
            color: var(--text-dark);
            margin-bottom: 12px;
        }
        .lead {
            color: var(--text-medium);
            font-size: 16px;
            margin-bottom: 32px;
            line-height: 1.6;
        }
        .lead strong { color: var(--text-dark); }
        .receipt {
            background: rgba(0, 142, 170, 0.04);
            border: 1px solid rgba(0, 142, 170, 0.12);
            border-radius: 14px;
            padding: 22px;
            text-align: left;
            margin-bottom: 28px;
        }
        .receipt-row {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            font-size: 14px;
            color: var(--text-medium);
        }
        .receipt-row + .receipt-row { border-top: 1px solid rgba(0, 142, 170, 0.1); }
        .receipt-row .label { font-weight: 600; }
        .receipt-row .value {
            color: var(--text-dark);
            font-family: ui-monospace, 'SF Mono', Menlo, Consolas, monospace;
            font-size: 13px;
        }
        .receipt-row.total .value {
            color: var(--primary);
            font-weight: 900;
            font-family: inherit;
            font-size: 18px;
        }
        .next-steps {
            text-align: left;
            margin-bottom: 28px;
        }
        .next-steps h3 {
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--primary);
            font-weight: 700;
            margin-bottom: 12px;
        }
        .next-steps ol {
            padding-left: 20px;
            color: var(--text-medium);
            font-size: 14px;
            line-height: 1.7;
        }
        .home-btn {
            display: inline-block;
            background: var(--primary);
            color: #fff;
            text-decoration: none;
            padding: 14px 28px;
            border-radius: 10px;
            font-weight: 700;
            font-size: 15px;
            letter-spacing: 0.5px;
            transition: all .25s ease;
        }
        .home-btn:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 142, 170, 0.3);
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
