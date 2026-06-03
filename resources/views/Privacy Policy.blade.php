<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy Policy - DreamScore</title>
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
            backdrop-filter: blur(10px);
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
            transition: transform 0.3s ease;
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
        }

        @keyframes logoFloat {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
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
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse"><path d="M 10 0 L 0 0 0 10" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="0.5"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
            animation: backgroundMove 20s linear infinite;
        }

        @keyframes backgroundMove {
            0% { transform: translate(0, 0); }
            100% { transform: translate(-10px, -10px); }
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
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
            animation: titleGlow 2s ease-in-out infinite alternate;
        }

        @keyframes titleGlow {
            from { text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3); }
            to { text-shadow: 0 2px 20px rgba(255, 255, 255, 0.3); }
        }

        .hero p {
            font-size: 1.3rem;
            margin-bottom: 2rem;
            opacity: 0.9;
            animation: fadeInUp 1s ease-out 0.3s both;
        }

        .effective-date {
            background: rgba(255, 255, 255, 0.2);
            padding: 10px 20px;
            border-radius: 50px;
            display: inline-block;
            animation: fadeInUp 1s ease-out 0.6s both;
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
            margin-bottom: 4rem;
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.6s ease;
        }

        .section.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .section-number {
            display: inline-block;
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #008eaa, #00b4d1);
            color: white;
            border-radius: 50%;
            text-align: center;
            line-height: 40px;
            font-weight: bold;
            margin-right: 15px;
            box-shadow: 0 4px 15px rgba(0, 142, 170, 0.3);
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); box-shadow: 0 4px 15px rgba(0, 142, 170, 0.3); }
            50% { transform: scale(1.05); box-shadow: 0 6px 20px rgba(0, 142, 170, 0.4); }
        }

        .section h2 {
            font-size: 2rem;
            color: #008eaa;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            position: relative;
        }

        .section h2::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 55px;
            width: 100px;
            height: 3px;
            background: linear-gradient(90deg, #008eaa, transparent);
            border-radius: 2px;
        }

        .section h3 {
            font-size: 1.3rem;
            color: #333;
            margin: 1.5rem 0 0.8rem;
            font-weight: 600;
        }

        .section p {
            margin-bottom: 1rem;
            color: #555;
            font-size: 1.1rem;
        }

        .section ul {
            margin: 1rem 0 1rem 2rem;
        }

        .section li {
            margin-bottom: 0.5rem;
            color: #555;
            font-size: 1.1rem;
            position: relative;
        }

        .section li::before {
            content: '▸';
            position: absolute;
            left: -20px;
            color: #008eaa;
            font-weight: bold;
        }

        .highlight {
            background: linear-gradient(120deg, rgba(0, 142, 170, 0.1), rgba(0, 142, 170, 0.05));
            padding: 20px;
            border-radius: 15px;
            border-left: 4px solid #008eaa;
            margin: 2rem 0;
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
            animation: shimmer 2s ease-in-out infinite;
        }

        @keyframes shimmer {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }

        .contact-section {
            background: linear-gradient(135deg, #008eaa, #006d85);
            color: white;
            padding: 60px 0;
            margin-top: 4rem;
            text-align: center;
            border-radius: 30px;
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
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 1px, transparent 1px);
            background-size: 20px 20px;
            animation: rotate 20s linear infinite;
        }

        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .contact-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
            position: relative;
            z-index: 2;
        }

        .contact-item-large {
            background: rgba(255, 255, 255, 0.1);
            padding: 1.5rem;
            border-radius: 15px;
            backdrop-filter: blur(10px);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .contact-item-large:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .footer {
            background: #333;
            color: white;
            text-align: center;
            padding: 2rem 0;
            margin-top: 0;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.5rem;
            }

            .hero p {
                font-size: 1.1rem;
            }

            .section h2 {
                font-size: 1.5rem;
            }

            .section h2::after {
                left: 45px;
                width: 60px;
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

            .contact-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 480px) {
            .hero h1 {
                font-size: 2rem;
            }

            .section {
                margin-bottom: 2.5rem;
            }

            .container {
                padding: 0 15px;
            }
        }

        /* Scroll animations */
        .fade-in-section {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }

        .fade-in-section.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Loading animation */
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
    </style>
</head>
<body>
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
                    <div class="contact-item">✉️ support@unlockyourdreamscore.com</div>
                </div>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h1>Privacy Policy</h1>
                <p>Your privacy is our priority. We're committed to transparency and protecting your personal information.</p>
                <div class="effective-date">Effective: September 11, 2025</div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <div class="content-wrapper">

                <div class="section fade-in-section">
                    <h2><span class="section-number">1</span>What this policy means</h2>
                    <div class="highlight">
                        <p>We respect your privacy. We collect only what we need. We keep it safe. We never sell your data. This policy explains what we collect, why, and how you can control it.</p>
                    </div>
                </div>

                <div class="section fade-in-section">
                    <h2><span class="section-number">2</span>What we collect</h2>
                    
                    <h3>You give us:</h3>
                    <ul>
                        <li>Name, email, phone, address</li>
                        <li>DOB and last 4 of SSN (only if you choose to share)</li>
                        <li>Credit reports/details you upload or authorize</li>
                        <li>Business info for funding help</li>
                        <li>Messages, forms, bookings, and documents</li>
                        <li>Payment info (handled by our PCI-compliant processor)</li>
                    </ul>

                    <h3>We collect automatically:</h3>
                    <ul>
                        <li>IP, device, browser, pages viewed, time on page</li>
                        <li>Cookies and pixels (e.g., Meta Pixel/CAPI, analytics)</li>
                    </ul>

                    <h3>From partners (only with consent):</h3>
                    <ul>
                        <li>GoHighLevel/Calendly for booking/CRM</li>
                        <li>Authorize.net for payments</li>
                        <li>Credit monitoring/report tools you connect</li>
                    </ul>

                    <div class="highlight">
                        <p><strong>No hard pulls.</strong> We never do a hard inquiry.</p>
                    </div>
                </div>

                <div class="section fade-in-section">
                    <h2><span class="section-number">3</span>Why we use your info</h2>
                    <ul>
                        <li>Deliver services: credit review, disputes, coaching, funding help</li>
                        <li>Book calls, send reminders, provide support</li>
                        <li>Take payments, handle invoices, process refunds</li>
                        <li>Improve the site and fight fraud</li>
                        <li>Send updates and marketing (opt out any time)</li>
                        <li>Follow the law (CROA, FCRA, FTC rules)</li>
                    </ul>
                </div>

                <div class="section fade-in-section">
                    <h2><span class="section-number">4</span>Legal bases (plain English)</h2>
                    <ul>
                        <li><strong>Consent:</strong> You said yes</li>
                        <li><strong>Contract:</strong> We need it to serve you</li>
                        <li><strong>Legitimate interest:</strong> Improve service / prevent abuse</li>
                        <li><strong>Legal duty:</strong> We must keep records when required</li>
                    </ul>
                </div>

                <div class="section fade-in-section">
                    <h2><span class="section-number">5</span>Sharing</h2>
                    <div class="highlight">
                        <p>We <strong>do not sell</strong> your data. We share only with:</p>
                    </div>
                    <ul>
                        <li><strong>Vendors/Processors:</strong> Authorize.net, GoHighLevel/Calendly, email/SMS tools, analytics/pixels</li>
                        <li><strong>Compliance:</strong> Courts, regulators, lawful requests</li>
                        <li><strong>Business transfer:</strong> If we sell or merge, your data stays protected</li>
                    </ul>
                </div>

                <div class="section fade-in-section">
                    <h2><span class="section-number">6</span>Cookies & tracking</h2>
                    <p>We use cookies/pixels for site performance, analytics, and ads measurement. You can block cookies in your browser. Some features may stop working if you do.</p>
                </div>

                <div class="section fade-in-section">
                    <h2><span class="section-number">7</span>Data security</h2>
                    <p>We protect data with technical and organizational safeguards. No system is 100% secure. Payments run through PCI-compliant processors (e.g., Authorize.net).</p>
                </div>

                <div class="section fade-in-section">
                    <h2><span class="section-number">8</span>Data retention</h2>
                    <p>We keep data only as long as needed for services, legal reasons, or accounting. Then we delete or anonymize it.</p>
                </div>

                <div class="section fade-in-section">
                    <h2><span class="section-number">9</span>Your choices</h2>
                    <ul>
                        <li>Access, update, or delete data: email us</li>
                        <li>Marketing opt-out: click "Unsubscribe"; reply "STOP" to SMS</li>
                        <li>We do not respond to browser "Do Not Track" signals today</li>
                        <li>Extra rights (like CA/other state laws) honored where applicable</li>
                    </ul>
                </div>

                <div class="section fade-in-section">
                    <h2><span class="section-number">10</span>Children</h2>
                    <p>Our services are for adults. We do not knowingly collect data from children under 13.</p>
                </div>

                <div class="section fade-in-section">
                    <h2><span class="section-number">11</span>International users</h2>
                    <p>We are U.S.-based. By using our site, you agree your data may be processed in the U.S.</p>
                </div>

                <div class="section fade-in-section">
                    <h2><span class="section-number">12</span>Changes</h2>
                    <p>If we update this policy, we'll change the date above and post it here.</p>
                </div>

                <div class="contact-section">
                    <h2 style="color: white; text-align: center; margin-bottom: 2rem;">
                        <span class="section-number">13</span>Contact Us
                    </h2>
                    <p style="font-size: 1.2rem; margin-bottom: 2rem;">Questions or requests? We're here to help!</p>
                    <div class="contact-grid">
                        <div class="contact-item-large">
                            <h3>✉️ Email</h3>
                            <p><a href="mailto:support@unlockyourdreamscore.com" style="color:inherit; text-decoration:none;">support@unlockyourdreamscore.com</a></p>
                            <small>We respond within 24 hours</small>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2025 DreamScore. All rights reserved. | Your financial dreams, our expertise.</p>
        </div>
    </footer>

    <script>
        // Page loader
        window.addEventListener('load', function() {
            const loader = document.getElementById('pageLoader');
            setTimeout(() => {
                loader.classList.add('hidden');
            }, 500);
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

        // Intersection Observer for animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    entry.target.style.transitionDelay = '0.1s';
                }
            });
        }, observerOptions);

        // Observe all fade-in sections
        document.querySelectorAll('.fade-in-section').forEach((section, index) => {
            section.style.transitionDelay = `${index * 0.1}s`;
            observer.observe(section);
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

        // Add parallax effect to hero
        window.addEventListener('scroll', function() {
            const scrolled = window.pageYOffset;
            const hero = document.querySelector('.hero');
            if (hero) {
                hero.style.transform = `translateY(${scrolled * 0.5}px)`;
            }
        });

        // Add floating animation to section numbers on hover
        document.querySelectorAll('.section-number').forEach(number => {
            number.addEventListener('mouseenter', function() {
                this.style.animation = 'none';
                this.style.transform = 'scale(1.1) translateY(-2px)';
                this.style.boxShadow = '0 8px 25px rgba(0, 142, 170, 0.4)';
            });
            
            number.addEventListener('mouseleave', function() {
                this.style.animation = 'pulse 2s ease-in-out infinite';
                this.style.transform = 'scale(1)';
                this.style.boxShadow = '0 4px 15px rgba(0, 142, 170, 0.3)';
            });
        });
    </script>
</body>
</html>