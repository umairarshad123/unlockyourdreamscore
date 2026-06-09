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
            --gold:        #c9a84c;
            --gold-light:  #dfc070;
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
            min-height: 100vh; display: flex; align-items: center; justify-content: center;
            padding: 40px 20px;
        }
        .card {
            background: var(--dark-card); border: 1px solid var(--border-gold);
            max-width: 560px; width: 100%;
            padding: 50px 40px; border-radius: 16px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.5); text-align: center;
        }
        .icon {
            width: 84px; height: 84px; margin: 0 auto 22px; border-radius: 50%;
            background: rgba(74, 222, 128, 0.12); color: var(--success);
            display: flex; align-items: center; justify-content: center; font-size: 40px;
        }
        h1 { font-size: 30px; font-weight: 900; margin-bottom: 12px; color: var(--white); letter-spacing: -0.5px; }
        h1 strong, p.lead strong { color: var(--white); }
        p.lead { color: var(--gray); font-size: 16px; line-height: 1.6; margin-bottom: 26px; }
        .next {
            text-align: left; background: var(--dark-card2);
            border: 1px solid var(--border); border-radius: 12px;
            padding: 22px; margin-bottom: 24px;
        }
        .next h3 {
            font-size: 13px; text-transform: uppercase; letter-spacing: 1.5px;
            color: var(--gold); font-weight: 800; margin-bottom: 12px;
        }
        .next ol { padding-left: 20px; color: var(--gray); font-size: 14px; line-height: 1.7; }
        .home-btn {
            display: inline-block; background: var(--gold); color: #000;
            text-decoration: none; padding: 14px 28px; border-radius: 6px;
            font-weight: 800; font-size: 14px; letter-spacing: 1px; text-transform: uppercase;
            transition: all .2s ease;
        }
        .home-btn:hover { background: var(--gold-light); transform: translateY(-2px); box-shadow: 0 8px 24px rgba(201, 168, 76, 0.35); }
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
