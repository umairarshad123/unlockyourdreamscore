<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>DreamScore — Credit Repair That Actually Delivers Results, Not Excuses</title>
    <meta name="description" content="We've helped thousands of clients remove negative items and rebuild their credit. Real results — we show receipts.">
    <script src="https://link.msgsndr.com/js/form_embed.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* === RESET & FOUNDATION === */
        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }
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
            --dim:         #606060;
        }
        html { scroll-behavior: smooth; }
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background: var(--dark);
            color: var(--white);
            line-height: 1.6;
            overflow-x: hidden;
        }
        section[id] { scroll-margin-top: 80px; }
        a { color: inherit; }

        /* === NAVBAR === */
        nav {
            position: fixed;
            top: 0; left: 0; right: 0;
            z-index: 1000;
            background: rgba(8,8,8,0.96);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border);
            padding: 14px 0;
            transition: padding 0.3s;
        }
        nav.scrolled { padding: 10px 0; }
        .nav-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logo img { width: 160px; height: auto; display: block; }
        .nav-collapse {
            display: flex;
            align-items: center;
            gap: 40px;
            flex: 1;
            justify-content: flex-end;
        }
        .nav-menu {
            display: flex;
            align-items: center;
            gap: 30px;
            list-style: none;
        }
        .nav-menu a {
            color: var(--gray);
            font-size: 13px;
            font-weight: 700;
            text-decoration: none;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: color 0.2s;
        }
        .nav-menu a:hover { color: var(--gold); }
        .nav-collapse-actions { display: flex; align-items: center; }
        .nav-cta {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--gold);
            color: #000;
            padding: 10px 22px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 800;
            text-decoration: none;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: all 0.2s;
            white-space: nowrap;
        }
        .nav-cta:hover { background: var(--gold-light); transform: translateY(-1px); }
        .nav-toggle {
            display: none;
            background: none;
            border: none;
            color: var(--white);
            font-size: 22px;
            cursor: pointer;
            padding: 8px;
        }

        @media (max-width: 900px) {
            .nav-container { padding: 0 20px; }
            .nav-toggle { display: block; }
            .nav-collapse {
                position: absolute;
                top: 100%; left: 0; right: 0;
                flex-direction: column;
                align-items: stretch;
                gap: 0;
                background: rgba(8,8,8,0.98);
                border-top: 1px solid var(--border);
                padding: 0 20px;
                opacity: 0;
                transform: translateY(-10px);
                pointer-events: none;
                max-height: 0;
                overflow: hidden;
                transition: opacity 0.25s, transform 0.25s, max-height 0.35s;
            }
            .nav-collapse.open {
                opacity: 1;
                transform: translateY(0);
                pointer-events: auto;
                max-height: 100vh;
            }
            .nav-menu {
                flex-direction: column;
                gap: 0;
                padding: 20px 0 8px;
                text-align: center;
            }
            .nav-menu a {
                display: block;
                padding: 12px 0;
                border-bottom: 1px solid var(--border);
            }
            .nav-collapse-actions {
                padding: 16px 0 24px;
                text-align: center;
            }
            .nav-cta { width: 100%; justify-content: center; padding: 14px; }
        }

        /* === HERO === */
        /* ── HERO ── */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 100px 20px 60px;
            position: relative;
            overflow: hidden;
            background: #050505;
        }
        #heroCanvas {
            position: absolute;
            inset: 0;
            z-index: 0;
            pointer-events: none;
        }
        .hero-glow {
            position: absolute;
            inset: 0;
            z-index: 0;
            pointer-events: none;
            background:
                radial-gradient(ellipse 100% 60% at 50% 0%, rgba(212,160,23,.15) 0%, transparent 60%),
                radial-gradient(ellipse 50% 50% at 80% 75%, rgba(139,92,246,.1) 0%, transparent 55%),
                radial-gradient(ellipse 45% 45% at 15% 55%, rgba(0,212,255,.08) 0%, transparent 55%);
        }
        .hero-grid {
            position: absolute;
            inset: 0;
            z-index: 0;
            pointer-events: none;
            background-image:
                linear-gradient(rgba(255,255,255,.018) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,.018) 1px, transparent 1px);
            background-size: 72px 72px;
            -webkit-mask-image: radial-gradient(ellipse 80% 80% at 50% 50%, black 20%, transparent 72%);
            mask-image: radial-gradient(ellipse 80% 80% at 50% 50%, black 20%, transparent 72%);
        }
        .hero-container {
            max-width: 860px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
        }
        /* entrance animations */
        @keyframes heroSlideDown { from { opacity:0; transform:translateY(-22px); } to { opacity:1; transform:translateY(0); } }
        @keyframes heroSlideUp   { from { opacity:0; transform:translateY(34px);  } to { opacity:1; transform:translateY(0); } }
        @keyframes heroFadeIn    { from { opacity:0; } to { opacity:1; } }
        @keyframes heroPulse     { 0%,100%{ box-shadow:0 0 0 0 rgba(212,160,23,.7); } 50%{ box-shadow:0 0 0 7px rgba(212,160,23,0); } }
        @keyframes heroShimmer   { 0%,100%{ background-position:0%; } 50%{ background-position:100%; } }
        @keyframes heroBtnSheen  { 0%,100%{ left:-80%; } 40%,60%{ left:130%; } }
        @keyframes heroFloat     { 0%,100%{ transform:translateY(0); } 50%{ transform:translateY(-8px); } }
        @keyframes heroBounce    { 0%,100%{ transform:translateY(0); opacity:.8; } 50%{ transform:translateY(6px); opacity:.4; } }

        .hero-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: rgba(212,160,23,.08);
            border: 1px solid rgba(212,160,23,.28);
            color: var(--gold);
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 3px;
            text-transform: uppercase;
            padding: 8px 20px;
            border-radius: 100px;
            margin-bottom: 36px;
            opacity: 0;
            animation: heroSlideDown .8s .15s cubic-bezier(.16,1,.3,1) forwards;
        }
        .hero-eyebrow-dot {
            width: 7px;
            height: 7px;
            background: var(--gold);
            border-radius: 50%;
            animation: heroPulse 2s ease-in-out infinite;
            flex-shrink: 0;
        }
        .hero-title {
            font-size: clamp(32px, 5.5vw, 70px);
            font-weight: 900;
            line-height: 1.05;
            letter-spacing: -2px;
            margin-bottom: 20px;
            opacity: 0;
            animation: heroSlideUp .9s .3s cubic-bezier(.16,1,.3,1) forwards;
        }
        .hero-title-gold-inline {
            background: linear-gradient(135deg, #d4a017 0%, #ffc822 40%, #d4a017 70%, #a07010 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            background-size: 200%;
            animation: heroShimmer 4s 1.6s ease-in-out infinite;
        }
        .hero-title-gold {
            display: block;
            font-size: clamp(54px, 9vw, 102px);
            font-weight: 900;
            line-height: .9;
            letter-spacing: -4px;
            margin-bottom: 26px;
            background: linear-gradient(135deg, #d4a017 0%, #ffc822 40%, #d4a017 70%, #a07010 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            background-size: 200%;
        }
        .hero-divider {
            width: 60px;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--gold), transparent);
            margin: 0 auto 24px;
            opacity: 0;
            animation: heroFadeIn .8s .58s forwards;
        }
        .hero-subtitle {
            font-size: clamp(15px, 2vw, 18px);
            color: var(--gray);
            max-width: 580px;
            margin: 0 auto 40px;
            line-height: 1.6;
            opacity: 0;
            animation: heroSlideUp .8s .7s cubic-bezier(.16,1,.3,1) forwards;
        }
        .hero-stats {
            display: flex;
            justify-content: center;
            margin-bottom: 44px;
            background: rgba(255,255,255,.03);
            border: 1px solid rgba(255,255,255,.07);
            border-radius: 14px;
            backdrop-filter: blur(12px);
            overflow: hidden;
            opacity: 0;
            animation: heroSlideUp .8s .85s cubic-bezier(.16,1,.3,1) forwards;
        }
        .hero-stat {
            padding: 18px 32px;
            text-align: center;
            flex: 1;
            position: relative;
        }
        .hero-stat + .hero-stat::before {
            content: '';
            position: absolute;
            left: 0; top: 15%; height: 70%; width: 1px;
            background: linear-gradient(transparent, rgba(212,160,23,.3), transparent);
        }
        .hero-stat-num {
            font-size: clamp(24px, 3.5vw, 38px);
            font-weight: 900;
            color: var(--gold);
            display: block;
            line-height: 1;
        }
        .hero-stat-label {
            font-size: 10px;
            color: var(--dim);
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-top: 5px;
            display: block;
        }
        .hero-buttons {
            display: flex;
            gap: 14px;
            justify-content: center;
            flex-wrap: wrap;
            opacity: 0;
            animation: heroSlideUp .8s 1s cubic-bezier(.16,1,.3,1) forwards;
        }
        .btn-gold {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            background: linear-gradient(135deg, var(--gold), #a07010);
            color: #000;
            padding: 17px 38px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 800;
            text-decoration: none;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: all .3s;
            border: none;
            cursor: pointer;
            font-family: inherit;
            position: relative;
            overflow: hidden;
        }
        .btn-gold::before {
            content: '';
            position: absolute;
            top: -50%; left: -80%;
            width: 50%; height: 200%;
            background: linear-gradient(105deg, transparent, rgba(255,255,255,.4), transparent);
            transform: skewX(-20deg);
            animation: heroBtnSheen 3.5s 2s ease-in-out infinite;
        }
        .btn-gold:hover { background: linear-gradient(135deg, var(--gold-light), var(--gold)); transform: translateY(-3px); box-shadow: 0 16px 40px rgba(212,160,23,.4); }
        .btn-outline-gold {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            background: rgba(255,255,255,.04);
            color: var(--white);
            padding: 16px 38px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            letter-spacing: 1px;
            text-transform: uppercase;
            border: 1px solid rgba(255,255,255,.14);
            transition: all .3s;
            backdrop-filter: blur(10px);
        }
        .btn-outline-gold:hover { border-color: rgba(255,255,255,.3); background: rgba(255,255,255,.08); transform: translateY(-2px); }
        .hero-scroll-hint {
            position: absolute;
            bottom: 28px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 6px;
            color: var(--dim);
            font-size: 10px;
            letter-spacing: 2px;
            text-transform: uppercase;
            opacity: 0;
            animation: heroFadeIn .8s 1.4s forwards;
            z-index: 2;
        }
        .hero-scroll-hint i { font-size: 14px; animation: heroBounce 1.6s ease-in-out infinite; }

        @media (max-width: 640px) {
            .hero-stat { padding: 14px 18px; }
            .hero-stat + .hero-stat::before { display: none; }
            .hero-buttons { flex-direction: column; align-items: center; }
            .btn-gold, .btn-outline-gold { width: 100%; max-width: 340px; justify-content: center; }
            .hero-title { letter-spacing: -2px; }
            .hero-title-gold { letter-spacing: -2px; }
        }

        /* === SECTION SHARED === */
        .section-header { text-align: center; margin-bottom: 60px; }
        .section-eyebrow {
            display: block;
            color: var(--gold);
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 3px;
            text-transform: uppercase;
            margin-bottom: 16px;
        }
        .section-title {
            font-size: clamp(30px, 4vw, 52px);
            font-weight: 900;
            line-height: 1.1;
            margin-bottom: 14px;
        }
        .section-subtitle {
            font-size: 17px;
            color: var(--gray);
            max-width: 600px;
            margin: 0 auto;
        }
        .section-container { max-width: 1120px; margin: 0 auto; }

        /* === WHAT WE CAN REMOVE === */
        .remove-section {
            padding: 100px 20px;
            background: var(--dark-card);
        }
        .remove-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
            max-width: 1000px;
            margin: 0 auto;
        }
        .remove-item {
            display: flex;
            align-items: center;
            gap: 14px;
            background: #0c0c0c;
            border: 1px solid rgba(201,168,76,0.22);
            border-radius: 8px;
            padding: 17px 22px;
            transition: all 0.25s;
            cursor: default;
        }
        .remove-item:hover {
            border-color: var(--gold);
            background: rgba(201,168,76,0.05);
            transform: translateY(-2px);
        }
        .remove-check {
            width: 30px;
            height: 30px;
            background: rgba(201,168,76,0.12);
            border: 1px solid var(--border-gold);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            color: var(--gold);
            font-size: 13px;
        }
        .remove-text {
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: var(--white);
        }
        @media (max-width: 720px) {
            .remove-grid { grid-template-columns: 1fr 1fr; gap: 8px; }
            .remove-item { padding: 13px 16px; }
            .remove-text { font-size: 11px; letter-spacing: 1px; }
        }
        @media (max-width: 440px) { .remove-grid { grid-template-columns: 1fr; } }

        /* === AFTER PURCHASE STEPS === */
        .purchase-section {
            padding: 100px 20px;
            background: var(--dark);
        }
        .purchase-steps {
            max-width: 860px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            gap: 16px;
        }
        .step-card {
            background: var(--dark-card);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 36px 40px;
            transition: border-color 0.25s;
        }
        .step-card:hover { border-color: var(--border-gold); }
        .step-num {
            font-size: 56px;
            font-weight: 900;
            color: var(--gold);
            line-height: 1;
            margin-bottom: 10px;
            opacity: 0.9;
        }
        .step-title {
            font-size: 21px;
            font-weight: 800;
            color: var(--white);
            margin-bottom: 6px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .step-price {
            font-size: 14px;
            color: var(--gold);
            font-weight: 800;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 6px;
        }
        .step-mandatory {
            font-size: 13px;
            color: #ff8c42;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 16px;
        }
        .step-desc {
            font-size: 16px;
            color: var(--gray);
            line-height: 1.7;
            margin-bottom: 16px;
        }
        .step-list {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }
        .step-list li {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            color: var(--gray);
            font-size: 15px;
        }
        .step-list li::before {
            content: '•';
            color: var(--gold);
            font-size: 18px;
            line-height: 1.4;
            flex-shrink: 0;
        }
        .step-docs-title {
            font-size: 14px;
            color: var(--white);
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin: 20px 0 10px;
        }
        .step-warning {
            background: rgba(201,168,76,0.07);
            border: 1px solid rgba(201,168,76,0.25);
            border-radius: 8px;
            padding: 16px 20px;
            margin-top: 16px;
        }
        .step-warning-item {
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--gold);
            font-size: 14px;
            font-weight: 700;
            padding: 4px 0;
        }
        .step-no-service {
            font-size: 16px;
            font-weight: 900;
            color: var(--gold);
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-top: 12px;
            display: block;
        }
        .step-important {
            background: rgba(220,38,38,0.07);
            border: 1px solid rgba(220,38,38,0.25);
            border-radius: 8px;
            padding: 20px 24px;
            margin-top: 20px;
        }
        .step-important-title {
            color: #ff6b6b;
            font-weight: 800;
            font-size: 14px;
            margin-bottom: 12px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
        }
        .step-important-list { list-style: none; }
        .step-important-list li {
            color: #ffaaaa;
            font-size: 14px;
            padding: 4px 0;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .step-important-list li::before {
            content: '✕';
            color: #ff6b6b;
            font-size: 12px;
        }
        .step-verdict {
            color: #ff6b6b;
            font-weight: 900;
            font-size: 14px;
            margin-top: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        @media (max-width: 640px) {
            .step-card { padding: 26px 22px; }
            .step-num { font-size: 44px; }
        }

        /* === TESTIMONIALS === */
        .testimonials-section {
            padding: 100px 20px;
            background: var(--dark-card);
        }
        .testimonials-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 24px;
            max-width: 1120px;
            margin: 0 auto;
        }
        .testimonial-card {
            background: #0c0c0c;
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 30px;
            transition: all 0.3s;
        }
        .testimonial-card:hover { border-color: var(--border-gold); transform: translateY(-4px); }
        .stars { color: var(--gold); font-size: 18px; margin-bottom: 14px; letter-spacing: 3px; }
        .testimonial-text {
            color: var(--gray);
            font-size: 16px;
            line-height: 1.6;
            font-style: italic;
            margin-bottom: 18px;
        }
        .testimonial-author { font-weight: 800; color: var(--white); font-size: 16px; margin-bottom: 4px; }
        .testimonial-meta { font-size: 13px; color: var(--gold); margin-bottom: 20px; }
        .before-after-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            margin-bottom: 20px;
        }
        .before-after-item {
            background: #111;
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: 14px;
            text-align: center;
        }
        .score-label { font-size: 11px; color: var(--dim); text-transform: uppercase; letter-spacing: 1px; margin-bottom: 4px; }
        .score-value { font-size: 28px; font-weight: 900; color: var(--gold); }
        .testimonial-image { border-radius: 8px; overflow: hidden; cursor: pointer; }
        .testimonial-image img { width: 100%; border-radius: 8px; transition: transform 0.3s; display: block; }
        .testimonial-image:hover img { transform: scale(1.02); }

        /* === PRICING === */
        .pricing-section { padding: 100px 20px; background: var(--dark); }
        .pricing-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
            max-width: 1120px;
            margin: 0 auto;
        }
        .pricing-card {
            background: var(--dark-card);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 40px 32px;
            display: flex;
            flex-direction: column;
            position: relative;
            transition: all 0.3s;
        }
        .pricing-card:hover { transform: translateY(-6px); border-color: var(--border-gold); }
        .pricing-card.featured {
            border: 2px solid var(--gold);
            background: linear-gradient(160deg, #141407 0%, #111111 100%);
        }
        .pricing-tag {
            position: absolute;
            top: -14px;
            left: 50%;
            transform: translateX(-50%);
            background: var(--gold);
            color: #000;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 2px;
            text-transform: uppercase;
            padding: 5px 16px;
            border-radius: 4px;
            white-space: nowrap;
        }
        .pricing-card-title {
            font-size: 14px;
            font-weight: 700;
            color: var(--gray);
            margin-bottom: 16px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }
        .pricing-price {
            font-size: 56px;
            font-weight: 900;
            color: var(--gold);
            line-height: 1;
            margin-bottom: 8px;
            letter-spacing: -2px;
        }
        .pricing-meta { font-size: 14px; color: var(--dim); margin-bottom: 28px; }
        .pricing-divider { height: 1px; background: var(--border); margin: 0 0 24px; }
        .pricing-features { list-style: none; padding: 0; margin: 0 0 32px; flex-grow: 1; }
        .pricing-features li {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 10px 0;
            color: var(--gray);
            font-size: 15px;
            line-height: 1.5;
            border-bottom: 1px solid var(--border);
        }
        .pricing-features li:last-child { border-bottom: none; }
        .pricing-features li i { color: var(--gold); font-size: 14px; margin-top: 3px; flex-shrink: 0; }
        .pricing-cta {
            display: block;
            width: 100%;
            text-align: center;
            background: var(--gold);
            color: #000;
            padding: 15px 24px;
            border-radius: 4px;
            font-weight: 800;
            font-size: 12px;
            letter-spacing: 2px;
            text-transform: uppercase;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: all 0.3s;
            font-family: inherit;
        }
        .pricing-cta:hover { background: var(--gold-light); transform: translateY(-2px); }
        .pricing-card:not(.featured) .pricing-cta { background: transparent; color: var(--gold); border: 2px solid var(--gold); }
        .pricing-card:not(.featured) .pricing-cta:hover { background: var(--gold); color: #000; }
        @media (max-width: 960px) { .pricing-grid { grid-template-columns: 1fr; max-width: 420px; } }

        /* === FAQ === */
        .faq-section { padding: 100px 20px; background: var(--dark-card); }
        .faq-container { max-width: 800px; margin: 0 auto; }
        .faq-item {
            border: 1px solid var(--border);
            border-radius: 8px;
            margin-bottom: 10px;
            overflow: hidden;
            transition: border-color 0.25s;
        }
        .faq-item.open { border-color: var(--border-gold); }
        .faq-question {
            width: 100%;
            background: none;
            border: none;
            padding: 20px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            cursor: pointer;
            color: var(--white);
            font-size: 15px;
            font-weight: 700;
            text-align: left;
            font-family: inherit;
            gap: 16px;
            transition: color 0.2s;
        }
        .faq-question:hover { color: var(--gold); }
        .faq-icon { color: var(--gold); font-size: 22px; flex-shrink: 0; transition: transform 0.3s; }
        .faq-item.open .faq-icon { transform: rotate(45deg); }
        .faq-answer { max-height: 0; overflow: hidden; transition: max-height 0.4s ease; }
        .faq-item.open .faq-answer { max-height: 600px; }
        .faq-answer-inner {
            padding: 0 24px 22px;
            color: var(--gray);
            font-size: 15px;
            line-height: 1.75;
        }

        /* === BOOKING === */
        .booking-section { padding: 100px 20px; background: var(--dark); }
        .booking-container { max-width: 1000px; margin: 0 auto; text-align: center; }
        .calendar-wrapper {
            background: var(--dark-card);
            border: 1px solid var(--border-gold);
            border-radius: 12px;
            padding: 24px;
            margin-top: 40px;
            overflow: hidden;
        }

        /* === FOUNDER === */
        .founder-section { padding: 100px 20px; background: var(--dark-card); }
        .founder-content {
            display: grid;
            grid-template-columns: 1.3fr 360px;
            gap: 60px;
            align-items: center;
            max-width: 1100px;
            margin: 0 auto;
        }
        .founder-title { font-size: clamp(32px, 4vw, 50px); font-weight: 900; margin-bottom: 8px; }
        .founder-sub { font-size: 17px; color: var(--gold); font-weight: 600; margin-bottom: 28px; }
        .founder-body { color: var(--gray); font-size: 17px; line-height: 1.8; }
        .founder-body p + p { margin-top: 16px; }
        .founder-highlights { list-style: none; margin-top: 28px; display: flex; flex-direction: column; gap: 10px; }
        .founder-highlights li {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 16px;
            color: var(--white);
            font-weight: 600;
        }
        .founder-highlights li i { color: var(--gold); }
        .image-wrapper {
            border-radius: 14px;
            overflow: hidden;
            border: 2px solid var(--border-gold);
            position: relative;
        }
        .founder-photo { width: 100%; display: block; object-fit: cover; aspect-ratio: 3/4; }
        .image-badge {
            position: absolute;
            bottom: 0; left: 0; right: 0;
            background: rgba(0,0,0,0.85);
            backdrop-filter: blur(12px);
            padding: 14px;
            text-align: center;
        }
        .badge-text { color: var(--gold); font-weight: 700; font-size: 15px; }
        @media (max-width: 900px) {
            .founder-content { grid-template-columns: 1fr; gap: 40px; }
            .image-wrapper { max-width: 300px; margin: 0 auto; }
        }

        /* === LEAD CTA SECTION === */
        .lead-cta-section {
            padding: 100px 20px;
            background: linear-gradient(135deg, #0a0a0a 0%, #121208 100%);
            border-top: 1px solid var(--border-gold);
            border-bottom: 1px solid var(--border-gold);
        }
        .lead-cta-container {
            max-width: 1100px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1.1fr 1fr;
            gap: 60px;
            align-items: center;
        }
        .lead-cta-title { font-size: clamp(26px, 3.5vw, 44px); font-weight: 900; line-height: 1.15; margin-bottom: 16px; }
        .lead-cta-title span { color: var(--gold); }
        .lead-cta-subtitle { font-size: 17px; color: var(--gray); line-height: 1.65; }
        .lead-cta-form {
            background: var(--dark-card);
            border: 1px solid var(--border-gold);
            padding: 32px;
            border-radius: 12px;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }
        .lead-cta-row { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }
        .lead-cta-input {
            width: 100%;
            padding: 14px 15px;
            background: #0a0a0a;
            border: 1.5px solid var(--border);
            border-radius: 6px;
            font-size: 15px;
            font-family: inherit;
            color: var(--white);
            transition: border-color 0.15s;
        }
        .lead-cta-input::placeholder { color: #444; }
        .lead-cta-input:focus { outline: none; border-color: var(--gold); }
        .lead-cta-submit {
            background: var(--gold);
            color: #000;
            border: none;
            border-radius: 6px;
            padding: 16px;
            font-size: 14px;
            font-weight: 800;
            cursor: pointer;
            transition: all 0.15s;
            font-family: inherit;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-top: 4px;
        }
        .lead-cta-submit:hover:not(:disabled) { background: var(--gold-light); transform: translateY(-1px); }
        .lead-cta-submit:disabled { opacity: 0.5; cursor: not-allowed; }
        .lead-cta-msg { font-size: 13px; min-height: 18px; }
        .lead-cta-msg.is-error { color: #ff6b6b; }
        .lead-cta-msg.is-success { color: #4ade80; font-weight: 700; }
        @media (max-width: 800px) {
            .lead-cta-container { grid-template-columns: 1fr; gap: 30px; }
            .lead-cta-row { grid-template-columns: 1fr; }
        }

        /* === FINAL CTA === */
        .final-cta {
            padding: 100px 20px;
            text-align: center;
            background: radial-gradient(ellipse 100% 100% at 50% 0%, rgba(201,168,76,0.14) 0%, transparent 60%), #050505;
            border-top: 1px solid var(--border-gold);
        }
        .final-container { max-width: 820px; margin: 0 auto; }
        .final-eyebrow {
            display: inline-block;
            color: var(--gold);
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 3px;
            text-transform: uppercase;
            margin-bottom: 24px;
            background: var(--gold-dim);
            padding: 8px 20px;
            border-radius: 4px;
            border: 1px solid var(--border-gold);
        }
        .final-title { font-size: clamp(32px, 5vw, 56px); font-weight: 900; margin-bottom: 20px; }
        .final-title span { color: var(--gold); }
        .final-subtitle { font-size: 19px; color: var(--gray); margin-bottom: 44px; }
        .final-actions {
            display: flex;
            gap: 16px;
            justify-content: center;
            flex-wrap: wrap;
            margin-bottom: 28px;
        }
        .final-trust {
            font-size: 13px;
            color: var(--dim);
            display: flex;
            gap: 24px;
            justify-content: center;
            flex-wrap: wrap;
        }
        .final-trust span { display: inline-flex; align-items: center; gap: 6px; }
        .final-trust i { color: var(--gold); }

        /* === FOOTER === */
        footer {
            background: #030303;
            color: var(--white);
            padding: 60px 20px 30px;
            border-top: 1px solid var(--border);
        }
        .footer-container { max-width: 1200px; margin: 0 auto; }
        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 40px;
            margin-bottom: 40px;
        }
        .footer-column h3 {
            font-size: 11px;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            margin-bottom: 20px;
            color: var(--gold);
        }
        .footer-description { font-size: 14px; line-height: 1.7; color: var(--dim); margin-top: 12px; }
        .footer-item { margin-bottom: 10px; font-size: 14px; color: var(--dim); }
        .footer-link { color: var(--dim); text-decoration: none; transition: color 0.2s; }
        .footer-link:hover { color: var(--gold); }
        .social-icons { display: flex; flex-wrap: wrap; gap: 10px; }
        .social-icon {
            width: 40px;
            height: 40px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
            color: #fff;
            text-decoration: none;
            transition: transform 0.2s, opacity 0.2s;
        }
        .social-icon:hover { transform: translateY(-2px); opacity: 0.85; }
        .social-icon.facebook  { background: #1877F2; }
        .social-icon.youtube   { background: #FF0000; }
        .social-icon.linkedin  { background: #0A66C2; }
        .social-icon.instagram { background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%); }
        .social-icon.twitter   { background: #199dc5; }
        .footer-bottom {
            text-align: center;
            padding-top: 30px;
            border-top: 1px solid var(--border);
            font-size: 13px;
            color: var(--dim);
        }
        @media (max-width: 768px) {
            .footer-grid { grid-template-columns: 1fr 1fr; gap: 28px; }
            .footer-column { text-align: center; }
            .social-icons { justify-content: center; }
        }
        @media (max-width: 480px) { .footer-grid { grid-template-columns: 1fr; } }

        /* === CREDIT POPUP (DARK THEME) === */
        .credit-popup-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.88);
            backdrop-filter: blur(10px);
            z-index: 99999;
            display: none;
            opacity: 0;
            transition: opacity 0.4s;
        }
        .credit-popup-overlay.popup-active { display: flex; align-items: center; justify-content: center; padding: 20px; }
        .credit-popup-overlay.popup-show { opacity: 1; }
        .credit-popup-content {
            background: var(--dark-card);
            border: 1px solid var(--border-gold);
            border-radius: 16px;
            width: 100%;
            max-width: 480px;
            height: 620px;
            transform: scale(0.85);
            transition: transform 0.4s;
            box-shadow: 0 30px 80px rgba(0,0,0,0.7);
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }
        .credit-popup-overlay.popup-show .credit-popup-content { transform: scale(1); }
        .credit-popup-header {
            background: linear-gradient(135deg, #1a1a08, #0f0f0f);
            border-bottom: 1px solid var(--border-gold);
            padding: 22px 20px;
            text-align: center;
            position: relative;
            flex-shrink: 0;
        }
        .credit-popup-close {
            position: absolute;
            top: 14px; right: 14px;
            width: 30px; height: 30px;
            background: rgba(255,255,255,0.1);
            border: none;
            border-radius: 50%;
            color: var(--white);
            font-size: 18px;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .credit-popup-close:hover { background: rgba(255,255,255,0.2); transform: rotate(90deg); }
        .credit-popup-title { font-size: 20px; font-weight: 900; color: var(--white); margin-bottom: 6px; }
        .credit-popup-subtitle { font-size: 13px; color: var(--gray); }
        .credit-progress-container { background: #1a1a1a; height: 4px; flex-shrink: 0; }
        .credit-progress-bar { height: 100%; background: var(--gold); width: 20%; transition: width 0.4s; }
        .credit-step-indicator {
            display: flex;
            justify-content: center;
            padding: 12px;
            background: #0e0e0e;
            gap: 8px;
            flex-shrink: 0;
        }
        .credit-step-dot {
            width: 10px; height: 10px;
            border-radius: 50%;
            background: #2a2a2a;
            transition: all 0.3s;
        }
        .credit-step-dot.dot-active { background: var(--gold); transform: scale(1.3); }
        .credit-step-dot.dot-completed { background: var(--gold); }
        .credit-popup-body {
            flex: 1;
            display: flex;
            flex-direction: column;
            padding: 22px;
            min-height: 0;
        }
        .credit-popup-step { display: none; flex: 1; min-height: 0; }
        .credit-popup-step.step-active { display: flex; flex-direction: column; }
        .question-container { flex: 1; display: flex; flex-direction: column; justify-content: center; min-height: 0; }
        .credit-step-question {
            font-size: 19px;
            font-weight: 700;
            color: var(--white);
            text-align: center;
            margin-bottom: 26px;
            line-height: 1.25;
            flex-shrink: 0;
        }
        .credit-options-grid {
            display: flex;
            flex-direction: column;
            gap: 10px;
            flex: 1;
            justify-content: center;
            max-height: 280px;
        }
        .credit-option-button {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 14px 20px;
            background: #0c0c0c;
            border: 1.5px solid var(--border);
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.25s;
            font-size: 15px;
            font-weight: 600;
            color: var(--gray);
            min-height: 52px;
            flex-shrink: 0;
        }
        .credit-option-button:hover { border-color: var(--gold); color: var(--white); background: rgba(201,168,76,0.05); }
        .credit-option-button.option-selected { border-color: var(--gold); background: rgba(201,168,76,0.10); color: var(--gold); }
        .credit-popup-navigation {
            display: flex;
            justify-content: space-between;
            gap: 12px;
            flex-shrink: 0;
            margin-top: 18px;
        }
        .credit-nav-btn {
            flex: 1;
            padding: 13px 20px;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.25s;
            font-family: inherit;
        }
        .credit-btn-back { background: #1a1a1a; color: var(--gray); border: 1px solid var(--border); }
        .credit-btn-back:hover { background: #222; }
        .credit-btn-next { background: var(--gold); color: #000; }
        .credit-btn-next:hover:not(:disabled) { background: var(--gold-light); }
        .credit-btn-next:disabled { opacity: 0.35; cursor: not-allowed; }
        .credit-popup-lead-form { display: flex; flex-direction: column; gap: 10px; margin-top: 8px; }
        .credit-popup-input {
            width: 100%;
            padding: 12px 14px;
            background: #0c0c0c;
            border: 1.5px solid var(--border);
            border-radius: 8px;
            font-size: 14px;
            color: var(--white);
            font-family: inherit;
            transition: border-color 0.15s;
        }
        .credit-popup-input::placeholder { color: #444; }
        .credit-popup-input:focus { outline: none; border-color: var(--gold); }
        .credit-popup-submit-btn {
            background: var(--gold);
            color: #000;
            border: none;
            border-radius: 8px;
            padding: 14px;
            font-size: 15px;
            font-weight: 800;
            cursor: pointer;
            transition: all 0.15s;
            font-family: inherit;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .credit-popup-submit-btn:hover:not(:disabled) { background: var(--gold-light); }
        .credit-popup-submit-btn:disabled { opacity: 0.5; cursor: not-allowed; }
        .credit-popup-form-msg { font-size: 13px; min-height: 18px; color: var(--gray); }
        .credit-popup-form-msg.is-error { color: #ff6b6b; }
        .credit-popup-form-msg.is-success { color: #4ade80; font-weight: 700; }
        @media (max-width: 480px) { .credit-popup-content { max-width: 98%; height: 95vh; } }

        /* === IMAGE MODAL === */
        .image-modal {
            display: none;
            position: fixed;
            z-index: 99999;
            inset: 0;
            background: rgba(0,0,0,0.94);
            animation: fadeInModal 0.3s ease;
        }
        .image-modal.show { display: flex; align-items: center; justify-content: center; }
        .modal-image { width: 100%; height: auto; border-radius: 10px; }
        .close-button {
            position: fixed !important;
            top: 24px !important; right: 24px !important;
            background: var(--gold) !important;
            color: #000 !important;
            border: none !important;
            width: 50px !important; height: 50px !important;
            border-radius: 50% !important;
            cursor: pointer !important;
            font-size: 26px !important;
            font-weight: 900 !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            z-index: 100000 !important;
            transition: transform 0.2s !important;
            font-family: Arial, sans-serif !important;
        }
        .close-button:hover { transform: scale(1.1) !important; }
        @keyframes fadeInModal { from { opacity: 0; } to { opacity: 1; } }

        /* === FORM MODAL === */
        .modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.8);
            backdrop-filter: blur(10px);
            z-index: 2000;
            display: none;
            opacity: 0;
            transition: opacity 0.3s;
        }
        .modal-overlay.active { display: flex; align-items: center; justify-content: center; }
        .modal-overlay.show { opacity: 1; }
        .modal-content {
            background: var(--dark-card);
            border: 1px solid var(--border-gold);
            border-radius: 20px;
            max-width: 560px;
            width: 90%;
            max-height: 90vh;
            overflow-y: auto;
            transform: scale(0.9);
            transition: transform 0.3s;
        }
        .modal-overlay.show .modal-content { transform: scale(1); }
        .modal-header {
            background: linear-gradient(135deg, #1a1a08, #0f0f0f);
            padding: 28px 28px 22px;
            text-align: center;
            border-radius: 20px 20px 0 0;
            border-bottom: 1px solid var(--border-gold);
            position: relative;
        }
        .modal-close {
            position: absolute;
            top: 18px; right: 18px;
            width: 36px; height: 36px;
            background: rgba(255,255,255,0.1);
            border: none;
            border-radius: 50%;
            color: var(--white);
            font-size: 22px;
            cursor: pointer;
            transition: all 0.3s;
        }
        .modal-close:hover { background: rgba(255,255,255,0.2); transform: rotate(90deg); }
        .modal-title { font-size: 24px; font-weight: 900; color: var(--white); margin-bottom: 8px; }
        .modal-subtitle { font-size: 14px; color: var(--gray); }
        .modal-body { padding: 28px; }
        .form-group { margin-bottom: 16px; }
        .form-label {
            display: block;
            font-weight: 700;
            color: var(--gray);
            margin-bottom: 6px;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .form-input {
            width: 100%;
            padding: 13px 14px;
            background: #0a0a0a;
            border: 1.5px solid var(--border);
            border-radius: 8px;
            font-size: 15px;
            color: var(--white);
            font-family: inherit;
            transition: border-color 0.15s;
        }
        .form-input::placeholder { color: #444; }
        .form-input:focus { outline: none; border-color: var(--gold); }
        .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }
        .form-navigation { margin-top: 22px; }
        .btn-submit {
            width: 100%;
            padding: 16px;
            background: var(--gold);
            color: #000;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 800;
            cursor: pointer;
            transition: all 0.25s;
            font-family: inherit;
            text-transform: uppercase;
            letter-spacing: 1.5px;
        }
        .btn-submit:hover { background: var(--gold-light); transform: translateY(-2px); }
        @media (max-width: 480px) { .form-row { grid-template-columns: 1fr; } }
    </style>
</head>
<body>

<!-- ═══════════════════════════════════════
     CREDIT ASSESSMENT POPUP
════════════════════════════════════════ -->
<div class="credit-popup-overlay" id="creditAssessmentPopup">
    <div class="credit-popup-content">
        <div class="credit-popup-header">
            <button class="credit-popup-close" onclick="closeCreditPopup()">&times;</button>
            <h3 class="credit-popup-title">Free Credit Assessment</h3>
            <p class="credit-popup-subtitle">Get your personalized credit improvement plan</p>
        </div>
        <div class="credit-progress-container">
            <div class="credit-progress-bar" id="creditProgressBar"></div>
        </div>
        <div class="credit-step-indicator">
            <span class="credit-step-dot dot-active"></span>
            <span class="credit-step-dot"></span>
            <span class="credit-step-dot"></span>
            <span class="credit-step-dot"></span>
            <span class="credit-step-dot"></span>
        </div>
        <div class="credit-popup-body">
            <!-- Step 1 -->
            <div class="credit-popup-step step-active" data-credit-step="1">
                <div class="question-container">
                    <h4 class="credit-step-question">What's your current credit score range?</h4>
                    <div class="credit-options-grid">
                        <div class="credit-option-button" data-credit-value="below-600"><span>Below 600</span></div>
                        <div class="credit-option-button" data-credit-value="600-679"><span>600–679</span></div>
                        <div class="credit-option-button" data-credit-value="680-749"><span>680–749</span></div>
                        <div class="credit-option-button" data-credit-value="750+"><span>750+</span></div>
                    </div>
                </div>
            </div>
            <!-- Step 2 -->
            <div class="credit-popup-step" data-credit-step="2">
                <div class="question-container">
                    <h4 class="credit-step-question">How much available credit do you have?</h4>
                    <div class="credit-options-grid">
                        <div class="credit-option-button" data-credit-value="0-1000"><span>$0 – $1,000</span></div>
                        <div class="credit-option-button" data-credit-value="1000-5000"><span>$1,000 – $5,000</span></div>
                        <div class="credit-option-button" data-credit-value="5000-25000"><span>$5,000 – $25,000</span></div>
                        <div class="credit-option-button" data-credit-value="25000+"><span>$25,000+</span></div>
                    </div>
                </div>
            </div>
            <!-- Step 3 -->
            <div class="credit-popup-step" data-credit-step="3">
                <div class="question-container">
                    <h4 class="credit-step-question">What's your main credit goal?</h4>
                    <div class="credit-options-grid">
                        <div class="credit-option-button" data-credit-value="buy-home"><span>Buy a home</span></div>
                        <div class="credit-option-button" data-credit-value="get-funding"><span>Get business funding</span></div>
                        <div class="credit-option-button" data-credit-value="improve-score"><span>Improve credit score</span></div>
                        <div class="credit-option-button" data-credit-value="remove-negatives"><span>Remove negative items</span></div>
                    </div>
                </div>
            </div>
            <!-- Step 4 -->
            <div class="credit-popup-step" data-credit-step="4">
                <div class="question-container">
                    <h4 class="credit-step-question">When do you need results?</h4>
                    <div class="credit-options-grid">
                        <div class="credit-option-button" data-credit-value="30-days"><span>Within 30 days</span></div>
                        <div class="credit-option-button" data-credit-value="3-months"><span>Within 3 months</span></div>
                        <div class="credit-option-button" data-credit-value="6-months"><span>Within 6 months</span></div>
                        <div class="credit-option-button" data-credit-value="no-rush"><span>No specific timeline</span></div>
                    </div>
                </div>
            </div>
            <!-- Step 5: Lead Form -->
            <div class="credit-popup-step" data-credit-step="5">
                <div class="question-container">
                    <h4 class="credit-step-question">Get Your Free Credit Analysis</h4>
                    <p style="color:var(--gray);font-size:13px;text-align:center;margin-bottom:16px;">Tell us where to send your personalized improvement plan.</p>
                    <form id="creditPopupLeadForm" class="credit-popup-lead-form" novalidate>
                        <div style="display:grid;grid-template-columns:1fr 1fr;gap:10px;">
                            <input type="text"  name="first_name" placeholder="First Name" required class="credit-popup-input">
                            <input type="text"  name="last_name"  placeholder="Last Name"  required class="credit-popup-input">
                        </div>
                        <input type="email" name="email" placeholder="Email Address" required class="credit-popup-input">
                        <input type="tel"   name="phone" placeholder="Phone Number"  required class="credit-popup-input">
                        <button type="submit" class="credit-popup-submit-btn">
                            <span class="btn-label">Get My Free Plan</span>
                            <span class="btn-spinner" hidden>Sending…</span>
                        </button>
                        <p class="credit-popup-form-msg" role="status" aria-live="polite"></p>
                    </form>
                </div>
            </div>
            <!-- Navigation -->
            <div class="credit-popup-navigation" id="creditPopupNavigation">
                <button class="credit-nav-btn credit-btn-back" onclick="prevCreditStep()" style="display:none;">← Back</button>
                <button class="credit-nav-btn credit-btn-next" onclick="nextCreditStep()" disabled>Next →</button>
            </div>
        </div>
    </div>
</div>

<!-- ═══════════════════════════════════════
     NAVBAR
════════════════════════════════════════ -->
<nav id="navbar">
    <div class="nav-container">
        <a href="{{ url('/') }}" class="logo" aria-label="DreamScore Home">
            <img src="{{ asset('images/logo.png') }}" alt="DreamScore Logo">
        </a>

        <button type="button" class="nav-toggle" id="navToggle" aria-label="Open menu" aria-expanded="false" aria-controls="navCollapse">
            <i class="fas fa-bars" aria-hidden="true"></i>
        </button>

        <div class="nav-collapse" id="navCollapse">
            <ul class="nav-menu">
                <li><a href="#home">Home</a></li>
                <li><a href="#remove">What We Remove</a></li>
                <li><a href="#process">After Purchase</a></li>
                <li><a href="#pricing">Pricing</a></li>
                <li><a href="#testimonials">Results</a></li>
                <li><a href="#faq">FAQ</a></li>
            </ul>
            <div class="nav-collapse-actions">
                <a href="https://api.leadconnectorhq.com/widget/booking/EzwplJXjhDjj4GFSqiXG"
                   target="_blank" rel="noopener"
                   class="nav-cta">
                    <i class="fas fa-calendar-check"></i> Free Consultation
                </a>
            </div>
        </div>
    </div>
</nav>

<!-- ═══════════════════════════════════════
     HERO
════════════════════════════════════════ -->
<section class="hero" id="home">
    <canvas id="heroCanvas"></canvas>
    <div class="hero-glow"></div>
    <div class="hero-grid"></div>

    <div class="hero-container">
        <div class="hero-eyebrow">
            <span class="hero-eyebrow-dot"></span>
            The Credit Repair Company That Actually Delivers
        </div>

        <h1 class="hero-title">Join the Credit Repair Company<br>That Delivers <span class="hero-title-gold-inline">Results.</span></h1>
        <div class="hero-divider"></div>

        <p class="hero-subtitle">
            We remove foreclosures, collections, bankruptcies &amp; more — on all 3 bureaus. Legally. Aggressively. Fast.
        </p>

        <div class="hero-stats">
            <div class="hero-stat">
                <span class="hero-stat-num" data-target="30000" data-suffix="K+">0</span>
                <span class="hero-stat-label">Clients Served</span>
            </div>
            <div class="hero-stat">
                <span class="hero-stat-num" data-target="100" data-prefix="$" data-suffix="M+">0</span>
                <span class="hero-stat-label">Debt Removed</span>
            </div>
            <div class="hero-stat">
                <span class="hero-stat-num" data-target="6" data-suffix="">0</span>
                <span class="hero-stat-label">Dispute Rounds</span>
            </div>
        </div>

        <div class="hero-buttons">
            <a href="#pricing" class="btn-gold"><i class="fas fa-bolt"></i> Get Started Now</a>
            <a href="https://api.leadconnectorhq.com/widget/booking/EzwplJXjhDjj4GFSqiXG"
               target="_blank" rel="noopener"
               class="btn-outline-gold">Free Consultation →</a>
        </div>
    </div>

    <div class="hero-scroll-hint">
        <span>Scroll</span>
        <i class="fas fa-chevron-down"></i>
    </div>
</section>

<!-- ═══════════════════════════════════════
     WHAT WE CAN REMOVE
════════════════════════════════════════ -->
<section class="remove-section" id="remove">
    <div class="section-header">
        <span class="section-eyebrow">Negative Items We Target</span>
        <h2 class="section-title">What We Can Remove</h2>
        <p class="section-subtitle">We dispute every type of negative item across all 3 credit bureaus — simultaneously.</p>
    </div>

    <div class="remove-grid">
        <div class="remove-item">
            <div class="remove-check"><i class="fas fa-check"></i></div>
            <span class="remove-text">Foreclosures</span>
        </div>
        <div class="remove-item">
            <div class="remove-check"><i class="fas fa-check"></i></div>
            <span class="remove-text">Collections</span>
        </div>
        <div class="remove-item">
            <div class="remove-check"><i class="fas fa-check"></i></div>
            <span class="remove-text">Charge-Offs</span>
        </div>
        <div class="remove-item">
            <div class="remove-check"><i class="fas fa-check"></i></div>
            <span class="remove-text">Student Loans</span>
        </div>
        <div class="remove-item">
            <div class="remove-check"><i class="fas fa-check"></i></div>
            <span class="remove-text">Judgments</span>
        </div>
        <div class="remove-item">
            <div class="remove-check"><i class="fas fa-check"></i></div>
            <span class="remove-text">Medical Bills</span>
        </div>
        <div class="remove-item">
            <div class="remove-check"><i class="fas fa-check"></i></div>
            <span class="remove-text">Late Payments</span>
        </div>
        <div class="remove-item">
            <div class="remove-check"><i class="fas fa-check"></i></div>
            <span class="remove-text">Repossessions</span>
        </div>
        <div class="remove-item">
            <div class="remove-check"><i class="fas fa-check"></i></div>
            <span class="remove-text">Public Records</span>
        </div>
        <div class="remove-item">
            <div class="remove-check"><i class="fas fa-check"></i></div>
            <span class="remove-text">Bankruptcies</span>
        </div>
        <div class="remove-item">
            <div class="remove-check"><i class="fas fa-check"></i></div>
            <span class="remove-text">Child-Support</span>
        </div>
        <div class="remove-item">
            <div class="remove-check"><i class="fas fa-check"></i></div>
            <span class="remove-text">Hard Inquiries</span>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════
     PRICING
════════════════════════════════════════ -->
<section class="pricing-section" id="pricing">
    <div class="section-header">
        <span class="section-eyebrow">Investment Options</span>
        <h2 class="section-title">Choose Your Plan</h2>
        <p class="section-subtitle">Every plan includes 6 rounds of aggressive 3-bureau disputes. No fluff — just results.</p>
    </div>

    <div class="pricing-grid">
        <div class="pricing-card">
            <div class="pricing-card-title">Monthly Investment</div>
            <div class="pricing-price">$297</div>
            <p class="pricing-meta">$197 + $100/mo after</p>
            <div class="pricing-divider"></div>
            <ul class="pricing-features">
                <li><i class="fas fa-check-circle"></i><span>Full 90-Day Credit Transformation</span></li>
                <li><i class="fas fa-check-circle"></i><span>Aggressive 3-bureau disputes</span></li>
                <li><i class="fas fa-check-circle"></i><span>Monthly progress updates</span></li>
                <li><i class="fas fa-check-circle"></i><span>Cancel anytime after 90 days</span></li>
            </ul>
            <a href="{{ url('/checkout/monthly') }}" class="pricing-cta">Get Started Monthly</a>
        </div>

        <div class="pricing-card featured">
            <span class="pricing-tag">Most Popular</span>
            <div class="pricing-card-title">One-Time Investment</div>
            <div class="pricing-price">$497</div>
            <p class="pricing-meta">Pay once — no recurring fees</p>
            <div class="pricing-divider"></div>
            <ul class="pricing-features">
                <li><i class="fas fa-check-circle"></i><span>One payment — no surprises</span></li>
                <li><i class="fas fa-check-circle"></i><span>Priority dispute filing</span></li>
                <li><i class="fas fa-check-circle"></i><span>Fast results in 30–45 days</span></li>
                <li><i class="fas fa-check-circle"></i><span>Full support throughout</span></li>
            </ul>
            <a href="{{ url('/checkout/onetime') }}" class="pricing-cta">Pay One Time</a>
        </div>

        <div class="pricing-card">
            <div class="pricing-card-title">Couple's Fast Sweep</div>
            <div class="pricing-price">$900</div>
            <p class="pricing-meta">For both partners</p>
            <div class="pricing-divider"></div>
            <ul class="pricing-features">
                <li><i class="fas fa-check-circle"></i><span>Full program for both partners</span></li>
                <li><i class="fas fa-check-circle"></i><span>Dual credit restoration setup</span></li>
                <li><i class="fas fa-check-circle"></i><span>Coordinated 3-bureau attacks</span></li>
                <li><i class="fas fa-check-circle"></i><span>Shared funding preparation</span></li>
            </ul>
            <a href="{{ url('/checkout/couple') }}" class="pricing-cta">Start Couple Plan</a>
        </div>
    </div>

    <p style="text-align:center;margin-top:32px;color:var(--gray);font-size:14px;">
        * All plans require Smart Credit activation ($39/month) to begin service.
        <a href="#process" style="color:var(--gold);text-decoration:underline;margin-left:4px;">Learn more</a>
    </p>
</section>

<!-- ═══════════════════════════════════════
     FOUNDER SECTION
════════════════════════════════════════ -->
<section class="founder-section" id="about">
    <div class="founder-content">
        <div class="founder-text">
            <h2 class="founder-title">Meet Your Credit Expert</h2>
            <p class="founder-sub">The person behind your transformation</p>
            <div class="founder-body">
                <p>Welcome to DreamScore! I'm Taletha, and I founded DreamScore out of a genuine passion for helping people unlock their financial potential. My journey into credit repair began with a simple realization: so many people have dreams that feel out of reach — not because they lack ambition, but because they need a trusted guide to help rebuild their credit and reclaim their financial freedom.</p>
                <p>I created DreamScore to be that guide. With a background in financial services and a commitment to empowering others, I built a place where clients feel supported, educated, and confident in their financial future.</p>
                <p>At DreamScore, we believe in turning credit scores into stepping stones toward your biggest goals — whether that's owning a home, starting a business, or simply feeling in control of your money. Thank you for letting us be part of your story.</p>
            </div>
            <ul class="founder-highlights">
                <li><i class="fas fa-check-circle"></i> Helped thousands of clients rebuild their credit</li>
                <li><i class="fas fa-check-circle"></i> Expert in 3-bureau dispute strategies</li>
                <li><i class="fas fa-check-circle"></i> Committed to real results — not empty promises</li>
            </ul>
        </div>
        <div class="founder-image">
            <div class="image-wrapper">
                <img src="{{ asset('images/Founder.jpg') }}" alt="Taletha Crow — Credit Expert" class="founder-photo">
                <div class="image-badge">
                    <span class="badge-text">Taletha Crow — Founder, DreamScore</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════
     WHAT HAPPENS AFTER PURCHASE
════════════════════════════════════════ -->
<section class="purchase-section" id="process">
    <div class="section-header">
        <span class="section-eyebrow">Your Roadmap</span>
        <h2 class="section-title">What Happens<br><span style="color:var(--gold)">After Purchase?</span></h2>
        <p class="section-subtitle">Follow these steps exactly — every step is required to start your service.</p>
    </div>

    <div class="purchase-steps">
        <!-- Step 01 -->
        <div class="step-card">
            <div class="step-num">01</div>
            <div class="step-title">Purchase Your Plan</div>
            <p class="step-desc">Secure your spot and get started. Choose the plan that fits your goals — monthly, one-time, or couples.</p>
        </div>

        <!-- Step 02 -->
        <div class="step-card">
            <div class="step-num">02</div>
            <div class="step-title">Activate Smart Credit</div>
            <div class="step-price">($39/Month Required)</div>
            <div class="step-mandatory">Mandatory to Start Your Service</div>
            <ul class="step-list">
                <li>Must be activated immediately after purchase</li>
                <li>We cannot access or work your credit without it</li>
                <li>Pay the $39 Smart Credit fee to unlock your account</li>
            </ul>
            <div class="step-warning">
                <div class="step-warning-item"><i class="fas fa-exclamation-triangle"></i> NO SMART CREDIT = NO SERVICE</div>
                <div class="step-warning-item"><i class="fas fa-lock"></i> ACCOUNT WILL BE PLACED ON HOLD</div>
            </div>
        </div>

        <!-- Step 03 -->
        <div class="step-card">
            <div class="step-num">03</div>
            <div class="step-title">Complete Onboarding + Submit Documents</div>
            <p class="step-desc">Check your email immediately after purchase and complete your onboarding form.</p>
            <div class="step-docs-title">Required Documents (Non-Negotiable)</div>
            <ul class="step-list">
                <li>Valid Government-Issued ID</li>
                <li>Social Security Card or SSN Documentation</li>
                <li>Proof of Address (dated within the last 30 days)</li>
            </ul>
            <div class="step-docs-title" style="margin-top:16px;">Acceptable Proof of Address</div>
            <ul class="step-list">
                <li>Utility bill</li>
                <li>Bank statement</li>
                <li>Lease or mortgage statement</li>
            </ul>
        </div>

        <!-- Step 04 -->
        <div class="step-card">
            <div class="step-num">04</div>
            <div class="step-title">We Begin Your Disputes</div>
            <p class="step-desc">Once Smart Credit is active and onboarding is complete, we get to work immediately.</p>
            <ul class="step-list">
                <li>Your 1st round of disputes is sent after onboarding is complete</li>
                <li>You receive 6 total rounds of disputes (unless on the Unlimited plan)</li>
                <li>A new round is sent every 30–45 days</li>
                <li>We handle the entire process — you focus on your results</li>
            </ul>

            <div class="step-important">
                <div class="step-important-title">⚠ Important — Your Account Will Not Be Started If:</div>
                <ul class="step-important-list">
                    <li>Smart Credit is not activated</li>
                    <li>Onboarding is not completed</li>
                    <li>Documents have not been submitted</li>
                </ul>
                <div class="step-verdict">All 3 Steps Must Be Complete Before Work Begins</div>
            </div>
        </div>
    </div>

    <div style="text-align:center;margin-top:48px;">
        <a href="#pricing" class="btn-gold" style="font-size:17px;padding:20px 52px;">Get Started Today →</a>
    </div>
</section>

<!-- ═══════════════════════════════════════
     TESTIMONIALS
════════════════════════════════════════ -->
<section class="testimonials-section" id="testimonials">
    <div class="section-header">
        <span class="section-eyebrow">Client Results</span>
        <h2 class="section-title">Real People. Real Results.</h2>
        <p class="section-subtitle">We show receipts — not just promises. Here's what our clients have achieved.</p>
    </div>

    <div class="testimonials-grid">
        <div class="testimonial-card">
            <div class="stars">★★★★★</div>
            <p class="testimonial-text">"DreamScore removed 17 negative items including a bankruptcy. My score went from 372 to 719 in just 45 days!"</p>
            <div class="testimonial-author">Marcus Johnson</div>
            <div class="testimonial-meta">Real Estate Investor • Houston, TX</div>
            <div class="before-after-container">
                <div class="before-after-item">
                    <div class="score-label">Before</div>
                    <div class="score-value">372</div>
                </div>
                <div class="before-after-item">
                    <div class="score-label">After</div>
                    <div class="score-value">719</div>
                </div>
            </div>
            <div class="testimonial-image">
                <img src="{{ asset('images/test1.jpg') }}" alt="Client result screenshot">
            </div>
        </div>

        <div class="testimonial-card">
            <div class="stars">★★★★★</div>
            <p class="testimonial-text">"Collections stopped calling and I got approved for $75K in funding. My salon is thriving now!"</p>
            <div class="testimonial-author">Keisha Williams</div>
            <div class="testimonial-meta">Salon Owner • Atlanta, GA</div>
            <div class="before-after-container">
                <div class="before-after-item">
                    <div class="score-label">Before</div>
                    <div class="score-value">496</div>
                </div>
                <div class="before-after-item">
                    <div class="score-label">After</div>
                    <div class="score-value">755</div>
                </div>
            </div>
            <div class="testimonial-image">
                <img src="{{ asset('images/test2.jpg') }}" alt="Client result screenshot">
            </div>
        </div>

        <div class="testimonial-card">
            <div class="stars">★★★★★</div>
            <p class="testimonial-text">"My divorce destroyed my credit. DreamScore rebuilt everything in 30 days. Just bought my dream car!"</p>
            <div class="testimonial-author">Jennifer Martinez</div>
            <div class="testimonial-meta">Entrepreneur • Los Angeles, CA</div>
            <div class="before-after-container">
                <div class="before-after-item">
                    <div class="score-label">Before</div>
                    <div class="score-value">428</div>
                </div>
                <div class="before-after-item">
                    <div class="score-label">After</div>
                    <div class="score-value">801</div>
                </div>
            </div>
            <div class="testimonial-image">
                <img src="{{ asset('images/test3.jpg') }}" alt="Client result screenshot">
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════
     FAQ
════════════════════════════════════════ -->
<section class="faq-section" id="faq">
    <div class="section-header">
        <span class="section-eyebrow">Still Not Sure?</span>
        <h2 class="section-title">Frequently Asked Questions</h2>
        <p class="section-subtitle">Everything you need to know before you get started.</p>
    </div>

    <div class="faq-container">
        <div class="faq-item">
            <button class="faq-question" onclick="toggleFaq(this)">
                Do I need a consultation before purchasing?
                <span class="faq-icon">+</span>
            </button>
            <div class="faq-answer">
                <div class="faq-answer-inner">No consultation is required — you can get started directly by choosing a plan. However, a free consultation is available if you'd like to discuss your specific situation, understand the process, or figure out which plan is right for you before committing.</div>
            </div>
        </div>

        <div class="faq-item">
            <button class="faq-question" onclick="toggleFaq(this)">
                How long does it take to see results?
                <span class="faq-icon">+</span>
            </button>
            <div class="faq-answer">
                <div class="faq-answer-inner">Most clients begin seeing initial removals within 30–45 days after their first round of disputes is sent. We send 6 total rounds, each spaced 30–45 days apart. Results vary based on the number and type of negative items on your report, but you'll be updated every step of the way.</div>
            </div>
        </div>

        <div class="faq-item">
            <button class="faq-question" onclick="toggleFaq(this)">
                What items can you remove?
                <span class="faq-icon">+</span>
            </button>
            <div class="faq-answer">
                <div class="faq-answer-inner">We dispute foreclosures, student loans, late payments, bankruptcies, collections, judgments, repossessions, child support, charge-offs, medical bills, public records, and hard inquiries — across all 3 bureaus simultaneously. No item is off-limits for dispute.</div>
            </div>
        </div>

        <div class="faq-item">
            <button class="faq-question" onclick="toggleFaq(this)">
                How can I improve my credit score faster?
                <span class="faq-icon">+</span>
            </button>
            <div class="faq-answer">
                <div class="faq-answer-inner">In addition to our dispute process, we recommend: keeping credit utilization below 30%, making all payments on time, avoiding opening too many new accounts at once, and maintaining older accounts to build history. We'll give you specific guidance during onboarding.</div>
            </div>
        </div>

        <div class="faq-item">
            <button class="faq-question" onclick="toggleFaq(this)">
                Where can I see my credit reports? Is there a charge?
                <span class="faq-icon">+</span>
            </button>
            <div class="faq-answer">
                <div class="faq-answer-inner">You can access free reports at AnnualCreditReport.com. We also require Smart Credit ($39/month) which gives you live, real-time access to all 3 bureau reports and allows us to monitor changes as disputes are processed. Smart Credit is mandatory to begin your service.</div>
            </div>
        </div>

        <div class="faq-item">
            <button class="faq-question" onclick="toggleFaq(this)">
                How long does it take to fix my credit?
                <span class="faq-icon">+</span>
            </button>
            <div class="faq-answer">
                <div class="faq-answer-inner">Most standard programs run 3–6 months depending on your credit profile. Our service includes 6 rounds of disputes. Clients with more complex files or the Unlimited plan continue until they reach their goals. You will see incremental improvements throughout the process — not just at the end.</div>
            </div>
        </div>

        <div class="faq-item">
            <button class="faq-question" onclick="toggleFaq(this)">
                How do I get started?
                <span class="faq-icon">+</span>
            </button>
            <div class="faq-answer">
                <div class="faq-answer-inner">It's simple: (1) Select a plan above, (2) Activate Smart Credit ($39/month) immediately after purchase, (3) Complete your onboarding form and submit required documents, (4) We begin your first round of disputes. That's it — we handle everything from there.</div>
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════
     LEAD CTA
════════════════════════════════════════ -->
<section class="lead-cta-section" id="lead-cta">
    <div class="lead-cta-container">
        <div class="lead-cta-copy">
            <h2 class="lead-cta-title">Ready to <span>Transform Your Credit</span> and Take Control?</h2>
            <p class="lead-cta-subtitle">Get a free, no-obligation credit consultation. We'll show you exactly which negative items can come off — and how fast. No pressure, no hard pull.</p>
        </div>
        <form id="leadCtaForm" class="lead-cta-form" novalidate>
            <div class="lead-cta-row">
                <input type="text"  name="first_name" placeholder="First Name" required class="lead-cta-input">
                <input type="text"  name="last_name"  placeholder="Last Name"  required class="lead-cta-input">
            </div>
            <input type="email" name="email" placeholder="Email Address" required class="lead-cta-input">
            <input type="tel"   name="phone" placeholder="Phone Number"  required class="lead-cta-input">
            <button type="submit" class="lead-cta-submit">
                <span class="btn-label">Get My Free Consultation</span>
                <span class="btn-spinner" hidden>Sending…</span>
            </button>
            <p class="lead-cta-msg" role="status" aria-live="polite"></p>
        </form>
    </div>
</section>

<!-- ═══════════════════════════════════════
     FINAL CTA
════════════════════════════════════════ -->
<section class="final-cta">
    <div class="final-container">
        <span class="final-eyebrow">Stop Waiting — Start Winning</span>
        <h2 class="final-title">Every Day You Wait Is<br><span>Money You're Losing.</span></h2>
        <p class="final-subtitle">Thousands of clients have already fixed their credit and unlocked opportunities they once thought were impossible. You're next.</p>

        <div class="final-actions">
            <a href="#pricing" class="btn-gold" style="font-size:18px;padding:20px 52px;">Get Started Today →</a>
            <a href="https://api.leadconnectorhq.com/widget/booking/EzwplJXjhDjj4GFSqiXG"
               target="_blank" rel="noopener"
               class="btn-outline-gold">Free Consultation</a>
        </div>

        <div class="final-trust">
            <span><i class="fas fa-shield-alt"></i> No Hard Pull</span>
            <span><i class="fas fa-lock"></i> Secure &amp; Private</span>
            <span><i class="fas fa-times-circle"></i> Cancel Anytime</span>
            <span><i class="fas fa-star"></i> 30,000+ Clients Served</span>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════
     FOOTER
════════════════════════════════════════ -->
<footer>
    <div class="footer-container">
        <div class="footer-grid">
            <div class="footer-column">
                <a href="{{ url('/') }}" aria-label="DreamScore Home">
                    <img src="{{ asset('images/footerlogo.jpg') }}" alt="DreamScore Logo" style="width:180px;display:block;margin-bottom:12px;">
                </a>
                <p class="footer-description">Transform your credit, transform your life. DreamScore is committed to helping you achieve real financial freedom through proven credit repair strategies.</p>
            </div>

            <div class="footer-column">
                <h3>Contact</h3>
                <div class="footer-item">✉️ <a href="mailto:support@unlockyourdreamscore.com" class="footer-link">support@unlockyourdreamscore.com</a></div>
                <div class="footer-item">🕒 Mon–Fri 9am–6pm CST</div>
            </div>

            <div class="footer-column">
                <h3>Connect</h3>
                <div class="social-icons">
                    <a href="https://facebook.com/YourPage"           class="social-icon facebook"  target="_blank" rel="noopener" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://youtube.com/@YourChannel"        class="social-icon youtube"   target="_blank" rel="noopener" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                    <a href="https://linkedin.com/company/YourCompany" class="social-icon linkedin"  target="_blank" rel="noopener" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    <a href="https://instagram.com/YourHandle"        class="social-icon instagram" target="_blank" rel="noopener" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="https://twitter.com/YourHandle"          class="social-icon twitter"   target="_blank" rel="noopener" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                </div>
            </div>

            <div class="footer-column">
                <h3>Legal</h3>
                <div class="footer-item"><a href="{{ route('privacy.policy') }}" class="footer-link">Privacy Policy</a></div>
                <div class="footer-item"><a href="{{ route('terms.service') }}"  class="footer-link">Terms of Service</a></div>
                <div class="footer-item"><a href="{{ route('disclaimer') }}"     class="footer-link">Disclaimer</a></div>
            </div>
        </div>

        <div class="footer-bottom">
            © 2025 DreamScore. All Rights Reserved. Credit repair results vary. Individual results are not guaranteed.
        </div>
    </div>
</footer>

<!-- ═══════════════════════════════════════
     SIMPLE FORM MODAL
════════════════════════════════════════ -->
<div class="modal-overlay" id="formModal">
    <div class="modal-content">
        <div class="modal-header">
            <button class="modal-close" onclick="closeFormModal()">×</button>
            <h3 class="modal-title">Get Your Free Consultation</h3>
            <p class="modal-subtitle">Complete this quick form to get started</p>
        </div>
        <div class="modal-body">
            <form id="multiStepForm" onsubmit="handleSubmit(event)">
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">First Name *</label>
                        <input type="text" class="form-input" name="firstName" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Last Name *</label>
                        <input type="text" class="form-input" name="lastName" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Email Address *</label>
                    <input type="email" class="form-input" name="email" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Phone Number *</label>
                    <input type="tel" class="form-input" name="phone" required>
                </div>
                <div class="form-navigation">
                    <button type="submit" class="btn-submit">Fix My Credit Now</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://link.msgsndr.com/js/form_embed.js" type="text/javascript"></script>

<script>
// ── Hero Canvas Particles ──────────────────────────────────
(function() {
    const canvas = document.getElementById('heroCanvas');
    if (!canvas) return;
    const ctx = canvas.getContext('2d');
    let W, H, particles = [];

    function resize() {
        W = canvas.width  = canvas.offsetWidth;
        H = canvas.height = canvas.offsetHeight;
    }
    resize();
    window.addEventListener('resize', function() { resize(); spawnAll(); }, { passive: true });

    function Particle() { this.reset(true); }
    Particle.prototype.reset = function(init) {
        this.x  = Math.random() * W;
        this.y  = init ? Math.random() * H : H + 16;
        this.r  = Math.random() * 1.4 + 0.3;
        this.vy = Math.random() * 0.65 + 0.18;
        this.op = Math.random() * 0.45 + 0.1;
        this.wb = Math.random() * Math.PI * 2;
        this.ws = (Math.random() - 0.5) * 0.028;
        this.color = Math.random() > 0.5 ? '#d4a017' : '#00d4ff';
    };

    function spawnAll() {
        particles = [];
        for (var i = 0; i < 120; i++) particles.push(new Particle());
    }
    spawnAll();

    var raf;
    function draw() {
        ctx.clearRect(0, 0, W, H);
        for (var i = 0; i < particles.length; i++) {
            var p = particles[i];
            p.y  -= p.vy;
            p.wb += p.ws;
            p.x  += Math.sin(p.wb) * 0.38;
            p.op -= 0.00075;
            if (p.y < -12 || p.op <= 0) p.reset(false);
            ctx.save();
            ctx.globalAlpha = Math.max(0, p.op);
            ctx.fillStyle   = p.color;
            ctx.beginPath();
            ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
            ctx.fill();
            ctx.restore();
        }
        raf = requestAnimationFrame(draw);
    }
    draw();
    document.addEventListener('visibilitychange', function() {
        if (document.hidden) cancelAnimationFrame(raf); else draw();
    });
})();

// ── Hero Counter Animation ─────────────────────────────────
function animateCounter(el) {
    var target   = parseFloat(el.dataset.target) || 0;
    var prefix   = el.dataset.prefix || '';
    var suffix   = el.dataset.suffix || '';
    var duration = 2200;
    var start    = performance.now();
    function step(now) {
        var p = Math.min((now - start) / duration, 1);
        var e = 1 - Math.pow(1 - p, 4);
        var v = Math.floor(e * target);
        if (target >= 1000) el.textContent = prefix + Math.floor(v / 1000) + suffix;
        else el.textContent = prefix + v + suffix;
        if (p < 1) requestAnimationFrame(step);
        else {
            if (target >= 1000) el.textContent = prefix + Math.floor(target / 1000) + suffix;
            else el.textContent = prefix + target + suffix;
        }
    }
    requestAnimationFrame(step);
}
var countersDone = false;
function checkCounters() {
    if (countersDone) return;
    var stats = document.querySelector('.hero-stats');
    if (!stats) return;
    if (stats.getBoundingClientRect().top < window.innerHeight * 0.95) {
        countersDone = true;
        document.querySelectorAll('.hero-stat-num[data-target]').forEach(function(el) {
            animateCounter(el);
        });
    }
}
window.addEventListener('scroll', checkCounters, { passive: true });
// Auto-start counters after hero animations settle
setTimeout(function() {
    if (!countersDone) {
        countersDone = true;
        document.querySelectorAll('.hero-stat-num[data-target]').forEach(function(el) {
            animateCounter(el);
        });
    }
}, 1200);

// ── Navbar scroll ──────────────────────────────────────────
document.addEventListener('DOMContentLoaded', function() {
    const navbar    = document.getElementById('navbar');
    const navToggle = document.getElementById('navToggle');
    const navCollapse = document.getElementById('navCollapse');

    if (navbar) {
        const onScroll = () => navbar.classList.toggle('scrolled', window.scrollY > 30);
        window.addEventListener('scroll', onScroll, { passive: true });
        onScroll();
    }

    // Mobile nav toggle
    if (navToggle && navCollapse) {
        const setOpen = (open) => {
            navCollapse.classList.toggle('open', open);
            navToggle.setAttribute('aria-expanded', open ? 'true' : 'false');
            navToggle.querySelector('i').className = open ? 'fas fa-times' : 'fas fa-bars';
            document.body.style.overflow = open ? 'hidden' : '';
        };
        navToggle.addEventListener('click', () => setOpen(!navCollapse.classList.contains('open')));
        navCollapse.querySelectorAll('a').forEach(a => a.addEventListener('click', () => setOpen(false)));
        document.addEventListener('keydown', e => { if (e.key === 'Escape') setOpen(false); });
        window.addEventListener('resize', () => { if (window.innerWidth > 900) setOpen(false); });
    }
});

// ── FAQ accordion ─────────────────────────────────────────
function toggleFaq(btn) {
    const item = btn.closest('.faq-item');
    const isOpen = item.classList.contains('open');
    document.querySelectorAll('.faq-item.open').forEach(i => i.classList.remove('open'));
    if (!isOpen) item.classList.add('open');
}

// ── Form modal ────────────────────────────────────────────
function openFormModal() {
    const modal = document.getElementById('formModal');
    if (!modal) return;
    modal.classList.add('active');
    setTimeout(() => modal.classList.add('show'), 10);
    document.body.style.overflow = 'hidden';
}

function closeFormModal() {
    const modal = document.getElementById('formModal');
    if (!modal) return;
    modal.classList.remove('show');
    setTimeout(() => { modal.classList.remove('active'); document.body.style.overflow = ''; }, 300);
}

document.getElementById('formModal').addEventListener('click', e => {
    if (e.target === e.currentTarget) closeFormModal();
});

const BOOKING_URL = "https://api.leadconnectorhq.com/widget/booking/EzwplJXjhDjj4GFSqiXG";

function handleSubmit(event) {
    event.preventDefault();
    closeFormModal();
    window.open(BOOKING_URL, '_blank');
}

// ── Image popup ───────────────────────────────────────────
document.addEventListener('DOMContentLoaded', function() {
    const modalHTML = `
        <div id="imageModal" class="image-modal">
            <div style="position:relative;max-width:90%;max-height:90%;">
                <img id="modalImage" class="modal-image" src="" alt="Enlarged view">
            </div>
            <button class="close-button" onclick="closeImageModal()" type="button">&times;</button>
        </div>`;
    document.body.insertAdjacentHTML('beforeend', modalHTML);

    const modal = document.getElementById('imageModal');
    document.querySelectorAll('.testimonial-image img').forEach(img => {
        img.addEventListener('click', function() { openImageModal(this.src, this.alt); });
    });
    modal.addEventListener('click', e => { if (e.target === modal || e.target.closest('div') === modal.firstElementChild === false) closeImageModal(); });
    document.addEventListener('keydown', e => { if (e.key === 'Escape' && modal.classList.contains('show')) closeImageModal(); });
});

function openImageModal(src, alt) {
    const modal = document.getElementById('imageModal');
    document.getElementById('modalImage').src = src;
    document.getElementById('modalImage').alt = alt;
    modal.classList.add('show');
    document.body.style.overflow = 'hidden';
}

function closeImageModal() {
    document.getElementById('imageModal').classList.remove('show');
    document.body.style.overflow = '';
}

// ── Credit popup ──────────────────────────────────────────
let creditCurrentStep = 1;
const creditTotalSteps = 5;
let creditAnswers = {};

document.addEventListener('DOMContentLoaded', function() {
    setTimeout(openCreditPopup, 10000);
    initCreditPopup();
});

function initCreditPopup() {
    updateCreditProgressBar();
    updateCreditStepIndicators();
    updateCreditNavigation();
}

function openCreditPopup() {
    const popup = document.getElementById('creditAssessmentPopup');
    if (!popup) return;
    creditCurrentStep = 1;
    creditAnswers = {};
    popup.classList.add('popup-active');
    setTimeout(() => popup.classList.add('popup-show'), 10);
    document.body.style.overflow = 'hidden';
    showCreditStep(1);
    initCreditPopup();
}

function closeCreditPopup() {
    const popup = document.getElementById('creditAssessmentPopup');
    if (!popup) return;
    popup.classList.remove('popup-show');
    setTimeout(() => { popup.classList.remove('popup-active'); document.body.style.overflow = ''; }, 300);
}

function showCreditStep(step) {
    document.querySelectorAll('.credit-popup-step').forEach(s => s.classList.remove('step-active'));
    const el = document.querySelector(`[data-credit-step="${step}"]`);
    if (el) el.classList.add('step-active');
    updateCreditProgressBar();
    updateCreditStepIndicators();
    updateCreditNavigation();
}

function updateCreditProgressBar() {
    const bar = document.getElementById('creditProgressBar');
    if (bar) bar.style.width = `${(creditCurrentStep / creditTotalSteps) * 100}%`;
}

function updateCreditStepIndicators() {
    document.querySelectorAll('.credit-step-dot').forEach((dot, i) => {
        const s = i + 1;
        dot.classList.remove('dot-active', 'dot-completed');
        if (s < creditCurrentStep) dot.classList.add('dot-completed');
        else if (s === creditCurrentStep) dot.classList.add('dot-active');
    });
}

function updateCreditNavigation() {
    const backBtn = document.querySelector('.credit-btn-back');
    const nextBtn = document.querySelector('.credit-btn-next');
    const nav     = document.getElementById('creditPopupNavigation');
    if (!backBtn || !nextBtn || !nav) return;

    if (creditCurrentStep === 5) { nav.style.display = 'none'; return; }
    nav.style.display = 'flex';
    backBtn.style.display = creditCurrentStep === 1 ? 'none' : 'block';

    const sel = document.querySelector(`[data-credit-step="${creditCurrentStep}"] .credit-option-button.option-selected`);
    nextBtn.disabled = !sel;
}

function nextCreditStep() {
    const sel = document.querySelector(`[data-credit-step="${creditCurrentStep}"] .credit-option-button.option-selected`);
    if (!sel) { alert('Please select an option to continue.'); return; }
    creditAnswers[`step${creditCurrentStep}`] = sel.dataset.creditValue;
    if (creditCurrentStep < creditTotalSteps) { creditCurrentStep++; showCreditStep(creditCurrentStep); }
}

function prevCreditStep() {
    if (creditCurrentStep > 1) { creditCurrentStep--; showCreditStep(creditCurrentStep); }
}

document.addEventListener('click', function(e) {
    const opt = e.target.closest('.credit-option-button');
    if (!opt) return;
    const step = opt.closest('.credit-popup-step');
    if (!step) return;
    step.querySelectorAll('.credit-option-button').forEach(o => o.classList.remove('option-selected'));
    opt.classList.add('option-selected');
    updateCreditNavigation();
});

document.addEventListener('click', function(e) {
    const popup = document.getElementById('creditAssessmentPopup');
    if (e.target === popup) closeCreditPopup();
});

document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        const popup = document.getElementById('creditAssessmentPopup');
        if (popup && popup.classList.contains('popup-show')) closeCreditPopup();
    }
});

// ── Generic lead form handler ─────────────────────────────
function wireLeadForm({ formId, endpoint, extraData = () => ({}), onSuccess = null }) {
    const form = document.getElementById(formId);
    if (!form) return;

    form.addEventListener('submit', async function(e) {
        e.preventDefault();
        const submitBtn = form.querySelector('button[type="submit"]');
        const btnLabel  = form.querySelector('.btn-label');
        const btnSpin   = form.querySelector('.btn-spinner');
        const msg       = form.querySelector('[role="status"]');

        if (msg) { msg.textContent = ''; msg.className = msg.className.replace(/\bis-(error|success)\b/g, '').trim(); }
        submitBtn.disabled = true;
        if (btnLabel) btnLabel.hidden = true;
        if (btnSpin)  btnSpin.hidden  = false;

        const payload = Object.assign({}, Object.fromEntries(new FormData(form).entries()), extraData());

        try {
            const csrf = document.querySelector('meta[name="csrf-token"]').content;
            const resp = await fetch(endpoint, {
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

            if (!resp.ok || !data.success) {
                if (msg) { msg.classList.add('is-error'); msg.textContent = data.message || 'Something went wrong. Please try again.'; }
                submitBtn.disabled = false;
                if (btnLabel) btnLabel.hidden = false;
                if (btnSpin)  btnSpin.hidden  = true;
                return;
            }

            if (msg) { msg.classList.add('is-success'); msg.textContent = data.message || 'Thanks — we will be in touch shortly!'; }
            form.reset();
            if (typeof onSuccess === 'function') onSuccess();
        } catch {
            if (msg) { msg.classList.add('is-error'); msg.textContent = 'Network error. Please try again.'; }
            submitBtn.disabled = false;
            if (btnLabel) btnLabel.hidden = false;
            if (btnSpin)  btnSpin.hidden  = true;
        }
    });
}

document.addEventListener('DOMContentLoaded', function() {
    wireLeadForm({
        formId:   'creditPopupLeadForm',
        endpoint: '/leads/popup',
        extraData: () => ({
            credit_score:     creditAnswers.step1 || null,
            available_credit: creditAnswers.step2 || null,
            credit_goal:      creditAnswers.step3 || null,
            timeline:         creditAnswers.step4 || null,
        }),
        onSuccess: () => setTimeout(closeCreditPopup, 2200),
    });

    wireLeadForm({
        formId:   'leadCtaForm',
        endpoint: '/leads/cta',
    });
});
</script>

<script
  src="https://widgets.leadconnectorhq.com/loader.js"
  data-resources-url="https://widgets.leadconnectorhq.com/chat-widget/loader.js"
  data-widget-id="68c33bf986462d48f88a2f88">
</script>
</body>
</html>
