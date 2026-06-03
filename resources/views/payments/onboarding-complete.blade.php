<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>You're All Set — DreamScore</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        :root {
            --primary: #008eaa;
            --primary-dark: #007899;
            --bg: #fefefe;
            --text-dark: #2c3e50;
            --text-medium: #5a6c7d;
            --success: #28a745;
        }
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background: linear-gradient(135deg, var(--bg) 0%, rgba(0, 142, 170, 0.05) 100%);
            color: var(--text-dark);
            min-height: 100vh; display: flex; align-items: center; justify-content: center;
            padding: 40px 20px;
        }
        .card {
            background: #fff; max-width: 560px; width: 100%;
            padding: 50px 40px; border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08); text-align: center;
        }
        .icon {
            width: 84px; height: 84px; margin: 0 auto 22px; border-radius: 50%;
            background: rgba(40, 167, 69, 0.12); color: var(--success);
            display: flex; align-items: center; justify-content: center; font-size: 40px;
        }
        h1 { font-size: 30px; font-weight: 900; margin-bottom: 12px; }
        p.lead { color: var(--text-medium); font-size: 16px; line-height: 1.6; margin-bottom: 26px; }
        .next {
            text-align: left; background: rgba(0, 142, 170, 0.04);
            border: 1px solid rgba(0, 142, 170, 0.12); border-radius: 14px;
            padding: 22px; margin-bottom: 24px;
        }
        .next h3 {
            font-size: 13px; text-transform: uppercase; letter-spacing: 1px;
            color: var(--primary); font-weight: 700; margin-bottom: 12px;
        }
        .next ol { padding-left: 20px; color: var(--text-medium); font-size: 14px; line-height: 1.7; }
        .home-btn {
            display: inline-block; background: var(--primary); color: #fff;
            text-decoration: none; padding: 14px 28px; border-radius: 10px;
            font-weight: 700; font-size: 15px; transition: all .2s ease;
        }
        .home-btn:hover { background: var(--primary-dark); transform: translateY(-2px); }
    </style>
</head>
<body>
    <div class="card">
        <div class="icon"><i class="fas fa-check"></i></div>
        <h1>You're All Set!</h1>
        <p class="lead">
            Thank you{{ $email ? ', ' : '' }}<strong>{{ $email }}</strong>. Your onboarding is complete and our team is already preparing your file.
            Reference: <strong>{{ $invoice }}</strong> · {{ $planLabel }}
        </p>

        <div class="next">
            <h3>What Happens Next</h3>
            <ol>
                <li>You'll receive a welcome email with your client portal login.</li>
                <li>A specialist will reach out within 1 business day to verify your file.</li>
                <li>First disputes filed within 48 hours; first results in 30 days.</li>
            </ol>
        </div>

        <a href="{{ url('/') }}" class="home-btn">Back to DreamScore</a>
    </div>
</body>
</html>
