<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms of Service - DreamScore</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background: linear-gradient(135deg, #008eaa 0%, #006d85 100%);
            overflow-x: hidden;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header */
        .header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(15px);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            box-shadow: 0 2px 20px rgba(0, 142, 170, 0.1);
            transition: all 0.3s ease;
        }

        .header.scrolled {
            background: rgba(255, 255, 255, 0.98);
            box-shadow: 0 2px 30px rgba(0, 142, 170, 0.2);
        }

        .nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 0;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 1.8rem;
            font-weight: bold;
            color: #008eaa;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .logo:hover {
            transform: scale(1.05);
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #008eaa, #00b4d1);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 1.2rem;
            box-shadow: 0 4px 15px rgba(0, 142, 170, 0.3);
            animation: logoRotate 4s ease-in-out infinite;
            position: relative;
            overflow: hidden;
        }

        .logo-icon::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            animation: logoShine 3s linear infinite;
        }

        @keyframes logoRotate {
            0%, 100% { transform: translateY(0) rotate(0deg) scale(1); }
            25% { transform: translateY(-3px) rotate(5deg) scale(1.05); }
            75% { transform: translateY(3px) rotate(-5deg) scale(0.95); }
        }

        @keyframes logoShine {
            0% { transform: rotate(0deg) translate(-50%, -50%); }
            100% { transform: rotate(360deg) translate(-50%, -50%); }
        }

        .nav-links {
            display: flex;
            gap: 20px;
            font-size: 0.9rem;
            color: #666;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 5px;
            transition: color 0.3s ease;
        }

        .nav-item:hover {
            color: #008eaa;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, #008eaa 0%, #006d85 100%);
            color: white;
            padding: 120px 0 80px;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                linear-gradient(45deg, transparent 40%, rgba(255, 255, 255, 0.1) 50%, transparent 60%),
                radial-gradient(circle at 30% 70%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
            animation: heroPattern 8s ease-in-out infinite;
        }

        @keyframes heroPattern {
            0%, 100% { 
                transform: translate(0, 0) rotate(0deg);
                opacity: 0.7;
            }
            50% { 
                transform: translate(20px, -20px) rotate(5deg);
                opacity: 1;
            }
        }

        .hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
            animation: fadeInUp 1s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hero h1 {
            font-size: 4.2rem;
            font-weight: 700;
            margin-bottom: 1rem;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            animation: titleWave 4s ease-in-out infinite;
            background: linear-gradient(45deg, #ffffff, #b3e5fc, #ffffff, #81d4fa);
            background-size: 400% 400%;
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        @keyframes titleWave {
            0%, 100% { 
                background-position: 0% 50%;
                transform: translateY(0);
            }
            25% { 
                background-position: 100% 50%;
                transform: translateY(-5px);
            }
            75% { 
                background-position: 50% 100%;
                transform: translateY(5px);
            }
        }

        .hero p {
            font-size: 1.4rem;
            margin-bottom: 2rem;
            opacity: 0.95;
            animation: fadeInUp 1s ease-out 0.3s both;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }

        .hero-badge {
            background: rgba(255, 255, 255, 0.2);
            padding: 12px 25px;
            border-radius: 50px;
            display: inline-block;
            animation: fadeInUp 1s ease-out 0.6s both;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .hero-badge::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            animation: badgeGlow 2s ease-in-out infinite;
        }

        @keyframes badgeGlow {
            0% { left: -100%; }
            100% { left: 100%; }
        }

        .hero-badge:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        }

        /* Progress Bar */
        .progress-bar {
            position: fixed;
            top: 0;
            left: 0;
            width: 0;
            height: 4px;
            background: linear-gradient(90deg, #008eaa, #00b4d1, #008eaa);
            background-size: 200% 100%;
            z-index: 10000;
            transition: width 0.1s ease;
            animation: progressGlow 2s linear infinite;
        }

        @keyframes progressGlow {
            0% { background-position: 0% 50%; }
            100% { background-position: 100% 50%; }
        }

        /* Main Content */
        .main-content {
            background: white;
            margin-top: -50px;
            border-radius: 30px 30px 0 0;
            position: relative;
            z-index: 10;
            box-shadow: 0 -10px 50px rgba(0, 142, 170, 0.1);
        }

        .content-wrapper {
            padding: 80px 0;
        }

        .section {
            background: linear-gradient(135deg, #ffffff 0%, #f8fdff 100%);
            border-radius: 20px;
            padding: 2.5rem;
            margin-bottom: 2.5rem;
            box-shadow: 0 8px 30px rgba(0, 142, 170, 0.08);
            border: 1px solid rgba(0, 142, 170, 0.1);
            position: relative;
            overflow: hidden;
            opacity: 0;
            transform: translateX(-30px);
            transition: all 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        .section.visible {
            opacity: 1;
            transform: translateX(0);
        }

        .section:nth-child(even) {
            transform: translateX(30px);
        }

        .section:nth-child(even).visible {
            transform: translateX(0);
        }

        .section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #008eaa, #00b4d1, #008eaa);
            background-size: 300% 100%;
            animation: sectionGlow 4s ease-in-out infinite;
        }

        @keyframes sectionGlow {
            0%, 100% { 
                background-position: 0% 50%;
                opacity: 0.7;
            }
            50% { 
                background-position: 100% 50%;
                opacity: 1;
            }
        }

        .section:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 20px 50px rgba(0, 142, 170, 0.15);
        }

        .section-header {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .section-number {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #008eaa, #00b4d1);
            color: white;
            border-radius: 50%;
            font-weight: bold;
            font-size: 1.2rem;
            margin-right: 20px;
            box-shadow: 0 6px 20px rgba(0, 142, 170, 0.3);
            animation: numberPulse 3s ease-in-out infinite;
            position: relative;
            overflow: hidden;
        }

        .section-number::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            animation: numberShine 2s linear infinite;
        }

        @keyframes numberPulse {
            0%, 100% { 
                transform: scale(1);
                box-shadow: 0 6px 20px rgba(0, 142, 170, 0.3);
            }
            50% { 
                transform: scale(1.05);
                box-shadow: 0 8px 25px rgba(0, 142, 170, 0.4);
            }
        }

        @keyframes numberShine {
            0% { transform: rotate(0deg) translate(-50%, -50%); }
            100% { transform: rotate(360deg) translate(-50%, -50%); }
        }

        .section h2 {
            font-size: 1.8rem;
            color: #008eaa;
            font-weight: 700;
            position: relative;
        }

        .section h2::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, #008eaa, #00b4d1);
            border-radius: 2px;
        }

        .section-content {
            color: #555;
            font-size: 1.1rem;
            line-height: 1.7;
        }

        .section-content p {
            margin-bottom: 1rem;
        }

        .section-content ul {
            margin: 1rem 0 1rem 2rem;
        }

        .section-content li {
            margin-bottom: 0.5rem;
            position: relative;
        }

        .section-content li::before {
            content: '▸';
            position: absolute;
            left: -20px;
            color: #008eaa;
            font-weight: bold;
            animation: listItemBounce 2s ease-in-out infinite;
        }

        @keyframes listItemBounce {
            0%, 100% { transform: translateX(0); }
            50% { transform: translateX(3px); }
        }

        .highlight {
            background: linear-gradient(120deg, rgba(0, 142, 170, 0.1), rgba(0, 142, 170, 0.05));
            padding: 20px;
            border-radius: 15px;
            border-left: 4px solid #008eaa;
            margin: 1.5rem 0;
            position: relative;
            overflow: hidden;
        }

        .highlight::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, #008eaa, transparent);
            animation: highlightShimmer 2s ease-in-out infinite;
        }

        @keyframes highlightShimmer {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }

        .pricing-box {
            background: linear-gradient(135deg, #008eaa, #006d85);
            color: white;
            padding: 2rem;
            border-radius: 20px;
            text-align: center;
            margin: 2rem 0;
            position: relative;
            overflow: hidden;
            box-shadow: 0 15px 40px rgba(0, 142, 170, 0.3);
        }

        .pricing-box::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: linear-gradient(45deg, #008eaa, #00b4d1, #008eaa);
            background-size: 300% 300%;
            border-radius: 22px;
            z-index: -1;
            animation: pricingBorder 4s ease-in-out infinite;
        }

        @keyframes pricingBorder {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }

        .pricing-options {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-top: 1rem;
        }

        .pricing-option {
            background: rgba(255, 255, 255, 0.1);
            padding: 1.5rem;
            border-radius: 15px;
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }

        .pricing-option:hover {
            transform: translateY(-5px);
            background: rgba(255, 255, 255, 0.2);
        }

        .contact-section {
            background: linear-gradient(135deg, #008eaa, #006d85);
            color: white;
            padding: 4rem;
            border-radius: 30px;
            text-align: center;
            margin: 4rem 0 0;
            position: relative;
            overflow: hidden;
        }

        .contact-section::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 2px, transparent 2px);
            background-size: 25px 25px;
            animation: contactPattern 15s linear infinite;
        }

        @keyframes contactPattern {
            from { transform: rotate(0deg) scale(1); }
            to { transform: rotate(360deg) scale(1.1); }
        }

        .contact-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
            position: relative;
            z-index: 2;
        }

        .contact-item {
            background: rgba(255, 255, 255, 0.1);
            padding: 2rem;
            border-radius: 20px;
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .contact-item:hover {
            transform: translateY(-5px) scale(1.05);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
        }

        .footer {
            background: #333;
            color: white;
            text-align: center;
            padding: 3rem 0;
            margin-top: 0;
        }

        .footer p {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        /* Page Loader */
        .page-loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #008eaa, #006d85);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            transition: opacity 0.5s ease, visibility 0.5s ease;
        }

        .page-loader.hidden {
            opacity: 0;
            visibility: hidden;
        }

        .loader {
            width: 60px;
            height: 60px;
            border: 4px solid rgba(255, 255, 255, 0.3);
            border-top: 4px solid white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Floating Elements */
        .floating-elements {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            pointer-events: none;
            overflow: hidden;
        }

        .floating-element {
            position: absolute;
            font-size: 2rem;
            opacity: 0.1;
            animation: float 8s ease-in-out infinite;
        }

        .floating-element:nth-child(1) {
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }

        .floating-element:nth-child(2) {
            top: 60%;
            right: 15%;
            animation-delay: 2s;
        }

        .floating-element:nth-child(3) {
            top: 40%;
            left: 70%;
            animation-delay: 4s;
        }

        @keyframes float {
            0%, 100% { transform: translate(0, 0) rotate(0deg); opacity: 0.1; }
            25% { transform: translate(20px, -30px) rotate(90deg); opacity: 0.2; }
            50% { transform: translate(-10px, 20px) rotate(180deg); opacity: 0.15; }
            75% { transform: translate(30px, 10px) rotate(270deg); opacity: 0.2; }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.8rem;
            }

            .hero p {
                font-size: 1.2rem;
            }

            .nav-links {
                display: none;
            }

            .nav {
                padding: 0.8rem 0;
            }

            .hero {
                padding: 100px 0 60px;
            }

            .content-wrapper {
                padding: 40px 0;
            }

            .section {
                padding: 2rem;
            }

            .section-number {
                width: 40px;
                height: 40px;
                font-size: 1rem;
                margin-right: 15px;
            }

            .section h2 {
                font-size: 1.5rem;
            }

            .contact-section {
                padding: 2.5rem;
            }

            .pricing-options {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 480px) {
            .hero h1 {
                font-size: 2.2rem;
            }

            .section {
                padding: 1.5rem;
            }

            .container {
                padding: 0 15px;
            }

            .pricing-box {
                padding: 1.5rem;
            }

            .contact-section {
                padding: 2rem;
            }
        }
    </style>
</head>
<body>
    <!-- Progress Bar -->
    <div class="progress-bar" id="progressBar"></div>

    <!-- Page Loader -->
    <div class="page-loader" id="pageLoader">
        <div class="loader"></div>
    </div>

    <!-- Header -->
    <header class="header" id="header">
        <div class="container">
            <nav class="nav">
                <a href="index.html" class="logo">
  
  <img src="{{ asset('images/logo.png') }}" style="width:200px; height:auto;">
</a>
                <div class="nav-links">
                    <div class="nav-item">📋 Terms & Conditions</div>
                    <div class="nav-item">✉️ support@unlockyourdreamscore.com</div>
                </div>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="floating-elements">
            <div class="floating-element">📜</div>
            <div class="floating-element">⚖️</div>
            <div class="floating-element">🤝</div>
        </div>
        <div class="container">
            <div class="hero-content">
                <h1>Terms of Service</h1>
                <p>Clear, fair, and transparent terms that protect both you and DreamScore in our partnership</p>
                <div class="hero-badge">📅 Effective: September 11, 2025</div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <div class="content-wrapper">

                <div class="section">
                    <div class="section-header">
                        <div class="section-number">1</div>
                        <h2>Agreement</h2>
                    </div>
                    <div class="section-content">
                        <p>By using our website or services, you accept these Terms of Service in full. If you do not agree with any part of these terms, please discontinue use of our services immediately.</p>
                    </div>
                </div>

                <div class="section">
                    <div class="section-header">
                        <div class="section-number">2</div>
                        <h2>What We Do</h2>
                    </div>
                    <div class="section-content">
                        <p>DreamScore specializes in:</p>
                        <ul>
                            <li>Credit repair and optimization services</li>
                            <li>Credit inquiry removal assistance</li>
                            <li>Comprehensive credit education</li>
                            <li>Funding guidance and consultation</li>
                        </ul>
                        <div class="highlight">
                            <strong>Important:</strong> We are not a law firm, credit bureau, or lender. Individual results may vary based on your unique credit situation.
                        </div>
                    </div>
                </div>

                <div class="section">
                    <div class="section-header">
                        <div class="section-number">3</div>
                        <h2>Eligibility Requirements</h2>
                    </div>
                    <div class="section-content">
                        <p>To use our services, you must:</p>
                        <ul>
                            <li>Be at least <strong>18 years of age</strong></li>
                            <li>Have legal capacity to enter into contracts</li>
                            <li>Provide accurate and truthful information</li>
                            <li>Use our services for lawful purposes only</li>
                        </ul>
                    </div>
                </div>

                <div class="section">
                    <div class="section-header">
                        <div class="section-number">4</div>
                        <h2>Your Responsibilities</h2>
                    </div>
                    <div class="section-content">
                        <p>As our client, you agree to:</p>
                        <ul>
                            <li>Share correct information and documents promptly</li>
                            <li>Sign required authorizations and disclosures (CROA/FCRA)</li>
                            <li>Follow your personalized action plan diligently</li>
                            <li>Make payments on time and address updates as needed</li>
                            <li>Handle credit freezes/unfreezes when advised</li>
                            <li>Use our services legally and ethically</li>
                        </ul>
                    </div>
                </div>

                <div class="section">
                    <div class="section-header">
                        <div class="section-number">5</div>
                        <h2>Credit Monitoring Policy</h2>
                    </div>
                    <div class="section-content">
                        <div class="highlight">
                            <strong>No Hard Credit Pulls:</strong> We never perform hard inquiries that could impact your credit score.
                        </div>
                        <p>We may access your credit information through:</p>
                        <ul>
                            <li>Credit reports you voluntarily upload</li>
                            <li>Soft pulls through approved monitoring partners (with your consent)</li>
                            <li>Third-party credit monitoring services you authorize</li>
                        </ul>
                    </div>
                </div>

                <div class="section">
                    <div class="section-header">
                        <div class="section-number">6</div>
                        <h2>Pricing & Payment Terms</h2>
                    </div>
                    <div class="section-content">
                        <div class="pricing-box">
                            <h3>Service Options</h3>
                            <div class="pricing-options">
                                <div class="pricing-option">
                                    <h4>Monthly Plan</h4>
                                    <p><strong>$297</strong> down payment</p>
                                    <p><strong>$100/month</strong> subscription</p>
                                    <small>Ongoing support & monitoring</small>
                                </div>
                                <div class="pricing-option">
                                    <h4>One-Time Payment</h4>
                                    <p><strong>$697</strong> total</p>
                                    <p>Complete service package</p>
                                    <small>All services included</small>
                                </div>
                            </div>
                        </div>
                        <p>Payment processing:</p>
                        <ul>
                            <li>Payments processed via Authorize.net and other approved methods</li>
                            <li>Monthly subscriptions billed every 30 days until canceled</li>
                            <li>Failed payments may result in service suspension</li>
                        </ul>
                    </div>
                </div>

                <div class="section">
                    <div class="section-header">
                        <div class="section-number">7</div>
                        <h2>Refunds & Cancellation Policy</h2>
                    </div>
                    <div class="section-content">
                        <div class="highlight">
                            <h4>90-Day Effort Guarantee</h4>
                            <p>Follow your personalized plan for 90 days. If there's no improvement in your credit profile, request a partial or full refund (based on your package) within 30 days after the first 90-day period.</p>
                        </div>
                        <p><strong>Cancellation Policy:</strong></p>
                        <ul>
                            <li>Cancel anytime by emailing support@unlockyourdreamscore.com</li>
                            <li>Include your name and reason for cancellation</li>
                            <li>Cancellation stops future renewals only</li>
                            <li>Past service periods are non-refundable unless guarantee applies</li>
                        </ul>
                    </div>
                </div>

                <div class="section">
                    <div class="section-header">
                        <div class="section-number">8</div>
                        <h2>Communications & E-Sign Consent</h2>
                    </div>
                    <div class="section-content">
                        <p>By using our services, you consent to:</p>
                        <ul>
                            <li>Receive emails, text messages, and calls about your account</li>
                            <li>Marketing communications and service offers</li>
                            <li>Automated dialing and recorded messages where allowed</li>
                            <li>Electronic signatures and digital record keeping (E-SIGN Act)</li>
                        </ul>
                        <div class="highlight">
                            <strong>Opt-Out:</strong> Reply "STOP" to end SMS messages or use unsubscribe links in emails.
                        </div>
                    </div>
                </div>

                <div class="section">
                    <div class="section-header">
                        <div class="section-number">9</div>
                        <h2>Legal Compliance</h2>
                    </div>
                    <div class="section-content">
                        <p>DreamScore operates in full compliance with:</p>
                        <ul>
                            <li><strong>Credit Repair Organizations Act (CROA)</strong></li>
                            <li><strong>Fair Credit Reporting Act (FCRA)</strong></li>
                            <li>All applicable state and federal regulations</li>
                        </ul>
                        <div class="highlight">
                            <strong>Ethical Practices:</strong> We never dispute accurate negative items or suggest creating new credit identities.
                        </div>
                    </div>
                </div>

                <div class="section">
                    <div class="section-header">
                        <div class="section-number">10</div>
                        <h2>Funding Guidance Disclaimer</h2>
                    </div>
                    <div class="section-content">
                        <p>Our funding guidance services include consultation and education only. Please understand:</p>
                        <ul>
                            <li>Lenders make all final decisions on approvals, limits, rates, and terms</li>
                            <li>We do not guarantee funding or specific loan outcomes</li>
                            <li>You maintain full decision-making authority</li>
                            <li>Individual results depend on your financial profile</li>
                        </ul>
                    </div>
                </div>

                <div class="section">
                    <div class="section-header">
                        <div class="section-number">11</div>
                        <h2>Intellectual Property Rights</h2>
                    </div>
                    <div class="section-content">
                        <p>All content on our platform is protected by intellectual property laws:</p>
                        <ul>
                            <li>Logos, text, designs, and software belong to DreamScore or our licensors</li>
                            <li>Educational materials and methodologies are proprietary</li>
                            <li>Copying, reproduction, or unauthorized use is prohibited</li>
                            <li>Contact us for permission requests</li>
                        </ul>
                    </div>
                </div>

                <div class="section">
                    <div class="section-header">
                        <div class="section-number">12</div>
                        <h2>Prohibited Uses</h2>
                    </div>
                    <div class="section-content">
                        <p>Users are prohibited from:</p>
                        <ul>
                            <li>Fraudulent activities or misrepresentation</li>
                            <li>System abuse, scraping, or hacking attempts</li>
                            <li>Interfering with our services or other users</li>
                            <li>Violating any applicable laws or third-party rights</li>
                            <li>Reverse engineering our proprietary systems</li>
                        </ul>
                    </div>
                </div>

                <div class="section">
                    <div class="section-header">
                        <div class="section-number">13</div>
                        <h2>Warranty Disclaimer</h2>
                    </div>
                    <div class="section-content">
                        <div class="highlight">
                            <p>Our services are provided <strong>"as is"</strong> without any implied warranties. We make no guarantees regarding specific outcomes or results.</p>
                        </div>
                        <p>While we work diligently to provide quality service, credit improvement depends on many factors beyond our control.</p>
                    </div>
                </div>

                <div class="section">
                    <div class="section-header">
                        <div class="section-number">14</div>
                        <h2>Liability Limitations</h2>
                    </div>
                    <div class="section-content">
                        <p>DreamScore's liability is limited as follows:</p>
                        <ul>
                            <li>No liability for indirect, special, incidental, or consequential damages</li>
                            <li>No liability for lost profits or business interruption</li>
                            <li>Total liability capped at amounts paid in the last <strong>3 months</strong></li>
                            <li>These limitations apply to the fullest extent permitted by law</li>
                        </ul>
                    </div>
                </div>

                <div class="section">
                    <div class="section-header">
                        <div class="section-number">15</div>
                        <h2>Indemnification</h2>
                    </div>
                    <div class="section-content">
                        <p>You agree to indemnify and hold DreamScore harmless against claims arising from:</p>
                        <ul>
                            <li>Your misuse of our services</li>
                            <li>Breach of these Terms of Service</li>
                            <li>Violation of applicable laws or third-party rights</li>
                            <li>Inaccurate information you provide</li>
                        </ul>
                    </div>
                </div>

                <div class="section">
                    <div class="section-header">
                        <div class="section-number">16</div>
                        <h2>Governing Law & Disputes</h2>
                    </div>
                    <div class="section-content">
                        <p>Legal framework:</p>
                        <ul>
                            <li><strong>Governing Law:</strong> State of Texas</li>
                            <li><strong>Venue:</strong> Courts in Texas</li>
                            <li><strong>Dispute Resolution:</strong> Good faith negotiation first</li>
                            <li><strong>Small Claims:</strong> Small claims court jurisdiction accepted</li>
                        </ul>
                        <div class="highlight">
                            <p>We encourage resolving disputes through direct communication before pursuing legal action.</p>
                        </div>
                    </div>
                </div>

                <div class="section">
                    <div class="section-header">
                        <div class="section-number">17</div>
                        <h2>Terms Updates</h2>
                    </div>
                    <div class="section-content">
                        <p>We may update these Terms of Service periodically:</p>
                        <ul>
                            <li>Changes will be posted on this page with updated effective date</li>
                            <li>Continued use after changes constitutes acceptance</li>
                            <li>Significant changes may be communicated via email</li>
                            <li>Review terms regularly to stay informed</li>
                        </ul>
                    </div>
                </div>

                <div class="contact-section">
                    <div class="section-header" style="justify-content: center; color: white;">
                        <div class="section-number" style="background: rgba(255,255,255,0.2);">18</div>
                        <h2 style="color: white;">Contact Information</h2>
                    </div>
                    <p style="font-size: 1.2rem; margin-bottom: 2rem; position: relative; z-index: 2;">Questions about these terms? We're here to help clarify anything you need!</p>
                    <div class="contact-grid">
                        <div class="contact-item">
                            <h3>✉️ Email Support</h3>
                            <p><strong><a href="mailto:support@unlockyourdreamscore.com" style="color:inherit; text-decoration:none;">support@unlockyourdreamscore.com</a></strong></p>
                            <small>Primary support channel — we respond within 24 hours</small>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2025 DreamScore. All rights reserved. | Building your financial future with integrity and expertise.</p>
        </div>
    </footer>

    <script>
        // Page loader
        window.addEventListener('load', function() {
            const loader = document.getElementById('pageLoader');
            setTimeout(() => {
                loader.classList.add('hidden');
            }, 1000);
        });

        // Progress bar
        window.addEventListener('scroll', function() {
            const scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
            const scrollHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            const scrollPercent = (scrollTop / scrollHeight) * 100;
            document.getElementById('progressBar').style.width = scrollPercent + '%';
        });

        // Header scroll effect
        window.addEventListener('scroll', function() {
            const header = document.getElementById('header');
            if (window.scrollY > 100) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });

        // Intersection Observer for section animations
        const observerOptions = {
            threshold: 0.15,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);

        // Observe all sections
        document.querySelectorAll('.section').forEach((section, index) => {
            section.style.transitionDelay = `${index * 0.1}s`;
            observer.observe(section);
        });

        // Parallax effect for hero
        window.addEventListener('scroll', function() {
            const scrolled = window.pageYOffset;
            const hero = document.querySelector('.hero');
            if (hero && scrolled < window.innerHeight) {
                hero.style.transform = `translateY(${scrolled * 0.3}px)`;
            }
        });

        // Interactive section effects
        document.querySelectorAll('.section').forEach(section => {
            section.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-10px) scale(1.02)';
                this.style.boxShadow = '0 25px 60px rgba(0, 142, 170, 0.2)';
            });

            section.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
                this.style.boxShadow = '0 8px 30px rgba(0, 142, 170, 0.08)';
            });
        });

        // Section number interactions
        document.querySelectorAll('.section-number').forEach(number => {
            number.addEventListener('mouseenter', function() {
                this.style.animation = 'none';
                this.style.transform = 'scale(1.2) rotate(15deg)';
                this.style.boxShadow = '0 12px 30px rgba(0, 142, 170, 0.5)';
            });

            number.addEventListener('mouseleave', function() {
                this.style.animation = 'numberPulse 3s ease-in-out infinite';
                this.style.transform = 'scale(1) rotate(0deg)';
                this.style.boxShadow = '0 6px 20px rgba(0, 142, 170, 0.3)';
            });
        });

        // Floating elements interaction
        document.querySelectorAll('.floating-element').forEach((element, index) => {
            element.addEventListener('mouseenter', function() {
                this.style.animation = 'none';
                this.style.transform = 'scale(2) rotate(45deg)';
                this.style.opacity = '0.4';
            });

            element.addEventListener('mouseleave', function() {
                this.style.animation = 'float 8s ease-in-out infinite';
                this.style.animationDelay = `${index * 2}s`;
                this.style.opacity = '0.1';
            });
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add special effects for pricing box
        const pricingBox = document.querySelector('.pricing-box');
        if (pricingBox) {
            pricingBox.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.05)';
                this.style.boxShadow = '0 25px 60px rgba(0, 142, 170, 0.4)';
            });

            pricingBox.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1)';
                this.style.boxShadow = '0 15px 40px rgba(0, 142, 170, 0.3)';
            });
        }

        // Dynamic background effects
        setInterval(() => {
            document.querySelectorAll('.section::before').forEach((element, index) => {
                if (Math.random() > 0.7) {
                    element.style.animationDuration = (Math.random() * 2 + 3) + 's';
                }
            });
        }, 5000);
    </script>
</body>
</html>