<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Disclaimer - DreamScore</title>
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
            transform: translateY(0);
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
            animation: logoFloat 3s ease-in-out infinite;
            position: relative;
            overflow: hidden;
        }

        .logo-icon::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: linear-gradient(45deg, #008eaa, #00b4d1, #008eaa);
            border-radius: 14px;
            z-index: -1;
            animation: borderGlow 2s linear infinite;
        }

        @keyframes logoFloat {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-5px) rotate(2deg); }
        }

        @keyframes borderGlow {
            0%, 100% { opacity: 0.8; }
            50% { opacity: 1; }
        }

        .contact-info {
            display: flex;
            gap: 20px;
            font-size: 0.9rem;
            color: #666;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 5px;
            transition: color 0.3s ease;
        }

        .contact-item:hover {
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
                radial-gradient(circle at 20% 80%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
            animation: floatingOrbs 8s ease-in-out infinite;
        }

        @keyframes floatingOrbs {
            0%, 100% { transform: translate(0, 0) scale(1); }
            33% { transform: translate(10px, -10px) scale(1.1); }
            66% { transform: translate(-10px, 10px) scale(0.9); }
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
            font-size: 4rem;
            font-weight: 700;
            margin-bottom: 1rem;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            animation: titlePulse 3s ease-in-out infinite;
            background: linear-gradient(45deg, #ffffff, #e0f7ff, #ffffff);
            background-size: 200% 200%;
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        @keyframes titlePulse {
            0%, 100% { 
                text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
                background-position: 0% 50%;
            }
            50% { 
                text-shadow: 0 6px 30px rgba(255, 255, 255, 0.2);
                background-position: 100% 50%;
            }
        }

        .hero p {
            font-size: 1.4rem;
            margin-bottom: 2rem;
            opacity: 0.95;
            animation: fadeInUp 1s ease-out 0.3s both;
            max-width: 800px;
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
        }

        .hero-badge:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
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

        .disclaimer-grid {
            display: grid;
            gap: 3rem;
            margin-bottom: 4rem;
        }

        .disclaimer-card {
            background: linear-gradient(135deg, #ffffff 0%, #f8fdff 100%);
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: 0 8px 30px rgba(0, 142, 170, 0.08);
            border: 1px solid rgba(0, 142, 170, 0.1);
            position: relative;
            overflow: hidden;
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }

        .disclaimer-card.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .disclaimer-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #008eaa, #00b4d1, #008eaa);
            background-size: 200% 100%;
            animation: gradientShift 3s ease-in-out infinite;
        }

        @keyframes gradientShift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }

        .disclaimer-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 142, 170, 0.15);
        }

        .card-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #008eaa, #00b4d1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
            font-size: 1.8rem;
            color: white;
            box-shadow: 0 6px 20px rgba(0, 142, 170, 0.3);
            animation: iconBounce 2s ease-in-out infinite;
        }

        @keyframes iconBounce {
            0%, 100% { transform: translateY(0) scale(1); }
            50% { transform: translateY(-3px) scale(1.05); }
        }

        .card-title {
            font-size: 1.6rem;
            font-weight: 700;
            color: #008eaa;
            margin-bottom: 1rem;
            position: relative;
        }

        .card-title::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 40px;
            height: 3px;
            background: linear-gradient(90deg, #008eaa, #00b4d1);
            border-radius: 2px;
        }

        .card-content {
            color: #555;
            font-size: 1.1rem;
            line-height: 1.7;
        }

        .card-content strong {
            color: #008eaa;
            font-weight: 600;
        }

        .important-notice {
            background: linear-gradient(135deg, #008eaa, #006d85);
            color: white;
            padding: 3rem;
            border-radius: 25px;
            text-align: center;
            margin: 4rem 0;
            position: relative;
            overflow: hidden;
        }

        .important-notice::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 2px, transparent 2px);
            background-size: 30px 30px;
            animation: backgroundRotate 20s linear infinite;
        }

        @keyframes backgroundRotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .important-notice h2 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            position: relative;
            z-index: 2;
        }

        .important-notice p {
            font-size: 1.3rem;
            opacity: 0.95;
            position: relative;
            z-index: 2;
            max-width: 600px;
            margin: 0 auto;
        }

        .contact-section {
            background: linear-gradient(135deg, #f8fdff 0%, #ffffff 100%);
            padding: 4rem;
            border-radius: 25px;
            text-align: center;
            border: 2px solid rgba(0, 142, 170, 0.1);
            position: relative;
            overflow: hidden;
        }

        .contact-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, transparent 49%, rgba(0, 142, 170, 0.03) 50%, transparent 51%);
            animation: diagonalShift 4s ease-in-out infinite;
        }

        @keyframes diagonalShift {
            0%, 100% { transform: translateX(-100%); }
            50% { transform: translateX(100%); }
        }

        .contact-section h2 {
            color: #008eaa;
            font-size: 2.2rem;
            margin-bottom: 1rem;
            position: relative;
            z-index: 2;
        }

        .contact-section p {
            color: #666;
            font-size: 1.2rem;
            margin-bottom: 2rem;
            position: relative;
            z-index: 2;
        }

        .contact-button {
            display: inline-block;
            background: linear-gradient(135deg, #008eaa, #00b4d1);
            color: white;
            padding: 15px 30px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            font-size: 1.1rem;
            box-shadow: 0 6px 20px rgba(0, 142, 170, 0.3);
            transition: all 0.3s ease;
            position: relative;
            z-index: 2;
            overflow: hidden;
        }

        .contact-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .contact-button:hover::before {
            left: 100%;
        }

        .contact-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(0, 142, 170, 0.4);
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

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.8rem;
            }

            .hero p {
                font-size: 1.2rem;
            }

            .contact-info {
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

            .disclaimer-card {
                padding: 2rem;
            }

            .important-notice {
                padding: 2rem;
            }

            .important-notice h2 {
                font-size: 2rem;
            }

            .contact-section {
                padding: 2.5rem;
            }
        }

        @media (max-width: 480px) {
            .hero h1 {
                font-size: 2.2rem;
            }

            .disclaimer-card {
                padding: 1.5rem;
            }

            .container {
                padding: 0 15px;
            }

            .card-title {
                font-size: 1.4rem;
            }
        }

        /* Scroll Progress Bar */
        .progress-bar {
            position: fixed;
            top: 0;
            left: 0;
            width: 0;
            height: 3px;
            background: linear-gradient(90deg, #008eaa, #00b4d1);
            z-index: 10000;
            transition: width 0.1s ease;
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
        .floating-element {
            position: absolute;
            pointer-events: none;
            opacity: 0.1;
        }

        .floating-element:nth-child(1) {
            top: 20%;
            left: 10%;
            animation: float1 6s ease-in-out infinite;
        }

        .floating-element:nth-child(2) {
            top: 60%;
            right: 15%;
            animation: float2 8s ease-in-out infinite;
        }

        @keyframes float1 {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            50% { transform: translate(20px, -30px) rotate(180deg); }
        }

        @keyframes float2 {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            50% { transform: translate(-30px, 20px) rotate(-180deg); }
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
                <div class="contact-info">
                    <div class="contact-item">💼 Credit Experts</div>
                    <div class="contact-item">✉️ support@unlockyourdreamscore.com</div>
                </div>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="floating-element">💎</div>
        <div class="floating-element">⚡</div>
        <div class="container">
            <div class="hero-content">
                <h1>Important Disclaimer</h1>
                <p>Understanding our services, limitations, and your responsibilities for informed financial decisions</p>
                <div class="hero-badge">📋 Transparency & Trust</div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <div class="content-wrapper">

                <div class="disclaimer-grid">
                    <div class="disclaimer-card">
                        <div class="card-icon">⚖️</div>
                        <h2 class="card-title">No Legal, Tax, or Investment Advice</h2>
                        <div class="card-content">
                            Our site, emails, SMS, calls, and materials are <strong>educational only</strong>. We do not provide legal, tax, accounting, or investment advice. For professional guidance in these areas, please consult with a licensed professional who can address your specific situation.
                        </div>
                    </div>

                    <div class="disclaimer-card">
                        <div class="card-icon">🎯</div>
                        <h2 class="card-title">No Guaranteed Results</h2>
                        <div class="card-content">
                            Credit outcomes depend on multiple factors including your credit history, the credit bureaus, creditors, and your personal actions. <strong>We cannot promise</strong> specific removals, score changes, loan approvals, or funding amounts. Every situation is unique, and results will vary.
                        </div>
                    </div>

                    <div class="disclaimer-card">
                        <div class="card-icon">🔍</div>
                        <h2 class="card-title">What We Dispute</h2>
                        <div class="card-content">
                            We dispute <strong>only items that are inaccurate, incomplete, or unverifiable</strong> according to credit reporting laws. We will not dispute accurate negative items or suggest creating a new credit identity. Our approach is ethical and compliant with all applicable regulations.
                        </div>
                    </div>

                    <div class="disclaimer-card">
                        <div class="card-icon">💰</div>
                        <h2 class="card-title">Funding Examples</h2>
                        <div class="card-content">
                            Any funding examples or case studies shown are <strong>for illustration purposes only</strong>. Lenders independently determine approvals, interest rates, credit limits, and loan terms. We do not make lending decisions or guarantee any specific funding outcomes.
                        </div>
                    </div>

                    <div class="disclaimer-card">
                        <div class="card-icon">⭐</div>
                        <h2 class="card-title">Client Testimonials</h2>
                        <div class="card-content">
                            Client stories and testimonials are <strong>real and authentic</strong>. Some names and images may be anonymized for privacy or used with explicit permission. Individual results vary significantly, and past success does not guarantee future outcomes for any particular client.
                        </div>
                    </div>

                    <div class="disclaimer-card">
                        <div class="card-icon">📊</div>
                        <h2 class="card-title">No Hard Credit Pulls</h2>
                        <div class="card-content">
                            <strong>We do not run hard inquiries</strong> that could impact your credit score. With your consent, we may use credit reports you upload or perform soft pulls through our approved monitoring partners, which do not affect your credit score.
                        </div>
                    </div>

                    <div class="disclaimer-card">
                        <div class="card-icon">🔗</div>
                        <h2 class="card-title">Third-Party Services</h2>
                        <div class="card-content">
                            We may link to or integrate with third-party services (scheduling systems, CRM platforms, payment processors). <strong>These services have their own terms and privacy policies</strong>. We are not responsible for their practices, availability, or performance.
                        </div>
                    </div>
                </div>

                <div class="important-notice">
                    <h2>🛡️ Your Protection Matters</h2>
                    <p>This disclaimer helps protect both you and DreamScore by clearly outlining our services and limitations. We believe in transparency and want you to make informed decisions about your financial future.</p>
                </div>

                <div class="contact-section">
                    <h2>❓ Questions About This Disclaimer?</h2>
                    <p>We're here to clarify any concerns and ensure you fully understand our services and limitations.</p>
                    <a href="mailto:support@unlockyourdreamscore.com" class="contact-button">
                        Contact Our Support Team
                    </a>
                </div>

            </div>
        </div>
    </main>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2025 DreamScore. All rights reserved. | Empowering your credit journey with transparency and integrity.</p>
        </div>
    </footer>

    <script>
        // Page loader
        window.addEventListener('load', function() {
            const loader = document.getElementById('pageLoader');
            setTimeout(() => {
                loader.classList.add('hidden');
            }, 800);
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

        // Intersection Observer for card animations
        const observerOptions = {
            threshold: 0.2,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);

        // Observe all disclaimer cards
        document.querySelectorAll('.disclaimer-card').forEach((card, index) => {
            card.style.transitionDelay = `${index * 0.1}s`;
            observer.observe(card);
        });

        // Parallax effect for hero
        window.addEventListener('scroll', function() {
            const scrolled = window.pageYOffset;
            const hero = document.querySelector('.hero');
            if (hero && scrolled < window.innerHeight) {
                hero.style.transform = `translateY(${scrolled * 0.5}s)`;
            }
        });

        // Interactive card hover effects
        document.querySelectorAll('.disclaimer-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-8px) scale(1.02)';
                this.style.boxShadow = '0 20px 50px rgba(0, 142, 170, 0.2)';
            });

            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
                this.style.boxShadow = '0 8px 30px rgba(0, 142, 170, 0.08)';
            });
        });

        // Icon animation on scroll
        window.addEventListener('scroll', function() {
            const scrollY = window.scrollY;
            document.querySelectorAll('.card-icon').forEach((icon, index) => {
                const speed = 0.1 + (index * 0.02);
                icon.style.transform = `translateY(${scrollY * speed}px) rotate(${scrollY * 0.1}deg)`;
            });
        });

        // Smooth scrolling for any anchor links
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

        // Add floating animation to floating elements
        document.querySelectorAll('.floating-element').forEach((element, index) => {
            element.addEventListener('mouseenter', function() {
                this.style.animation = 'none';
                this.style.transform = 'scale(1.5) rotate(20deg)';
                this.style.opacity = '0.3';
            });

            element.addEventListener('mouseleave', function() {
                this.style.animation = index === 0 ? 'float1 6s ease-in-out infinite' : 'float2 8s ease-in-out infinite';
                this.style.opacity = '0.1';
            });
        });

        // Add special effects on important notice
        const importantNotice = document.querySelector('.important-notice');
        if (importantNotice) {
            importantNotice.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.02)';
                this.style.boxShadow = '0 20px 60px rgba(0, 142, 170, 0.3)';
            });

            importantNotice.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1)';
                this.style.boxShadow = 'none';
            });
        }
    </script>
</body>
</html>