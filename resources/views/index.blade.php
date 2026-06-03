<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>DreamScore - Transform Your Credit Score in 30 Days | Free Consultation</title>
    <meta name="description" content="Remove negative items and get $150K+ in funding. Watch our free video to learn how. Free consultation available.">
    <script src="https://link.msgsndr.com/js/form_embed.js"></script>
    <script src="https://link.msgsndr.com/js/form_embed.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        /* ============================================
           FOUNDATION
           ============================================ */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        :root {
            --primary: #008eaa;
            --gray: #caccd1;
            --background: #fefefe;
            --white: #ffffff;
            --text-dark: #2c3e50;
            --text-medium: #5a6c7d;
            --text-light: #7a8a9a;
        }
        
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background: var(--background);
            color: var(--text-dark);
            line-height: 1.6;
            overflow-x: hidden;
        }
        
        /* ============================================
           NAVIGATION
           ============================================ */
        nav {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            background: rgba(254, 254, 254, 0.95);
            backdrop-filter: blur(20px);
            padding: 20px 0;
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }
        
        nav.scrolled {
            padding: 15px 0;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        
        .nav-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            display: inline-flex;
            align-items: center;
            font-weight: 900;
            color: var(--primary);
            letter-spacing: -1px;
            text-decoration: none;
            flex-shrink: 0;
        }

        .logo img {
            display: block;
            width: 180px;
            height: auto;
        }

        .nav-collapse {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex: 1;
            gap: 32px;
            padding-left: 40px;
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 32px;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .nav-menu a {
            color: var(--text-dark);
            font-size: 15px;
            font-weight: 600;
            text-decoration: none;
            position: relative;
            transition: color 0.2s ease;
        }

        .nav-menu a:hover {
            color: var(--primary);
        }

        .nav-menu a::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -6px;
            width: 0;
            height: 2px;
            background: var(--primary);
            border-radius: 2px;
            transition: width 0.25s ease;
        }

        .nav-menu a:hover::after { width: 100%; }

        .nav-collapse-actions {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .nav-cta {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            background: var(--primary);
            color: #fff;
            padding: 11px 20px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 700;
            text-decoration: none;
            white-space: nowrap;
            transition: all 0.25s ease;
        }

        .nav-cta:hover {
            background: #007899;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 142, 170, 0.3);
        }

        .nav-toggle {
            display: none;
            background: none;
            border: none;
            color: var(--text-dark);
            font-size: 22px;
            line-height: 1;
            cursor: pointer;
            padding: 8px 10px;
            border-radius: 8px;
            transition: background 0.2s ease, color 0.2s ease;
        }

        .nav-toggle:hover { color: var(--primary); background: rgba(0, 142, 170, 0.08); }
        .nav-toggle:focus-visible { outline: 2px solid var(--primary); outline-offset: 2px; }

        html { scroll-behavior: smooth; }
        section[id] { scroll-margin-top: 100px; }

        /* ─── Mobile (≤960px) ─────────────────────────────────────────────── */
        @media (max-width: 960px) {
            nav { padding: 14px 0; }

            .nav-container {
                padding: 0 20px;
                position: relative;
            }

            .logo img { width: 150px; }

            .nav-toggle {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                width: 44px;
                height: 44px;
                font-size: 22px;
                padding: 0;
            }

            /* Collapse panel slides down below the navbar */
            .nav-collapse {
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                flex-direction: column;
                gap: 0;
                padding: 0 24px;
                margin-top: 1px;
                background: rgba(254, 254, 254, 0.98);
                backdrop-filter: blur(20px);
                box-shadow: 0 12px 28px rgba(0, 0, 0, 0.10);
                border-top: 1px solid rgba(0, 142, 170, 0.08);

                /* Hidden by default — animated open */
                opacity: 0;
                transform: translateY(-12px);
                pointer-events: none;
                max-height: 0;
                overflow: hidden;
                transition:
                    opacity 0.25s ease,
                    transform 0.25s ease,
                    max-height 0.35s ease;
            }

            .nav-collapse.open {
                opacity: 1;
                transform: translateY(0);
                pointer-events: auto;
                max-height: calc(100vh - 80px);
            }

            .nav-menu {
                flex-direction: column;
                gap: 0;
                width: 100%;
                padding: 28px 0 8px;
                text-align: center;
            }

            .nav-menu li { width: 100%; }

            .nav-menu a {
                display: block;
                padding: 14px 0;
                font-size: 16px;
                width: 100%;
                color: var(--text-dark);
                border-bottom: 1px solid rgba(0, 142, 170, 0.08);
            }

            .nav-menu li:last-child a { border-bottom: none; }
            .nav-menu a::after { display: none; }

            .nav-collapse-actions {
                width: 100%;
                flex-direction: column;
                gap: 12px;
                padding: 20px 0 28px;
            }

            .nav-cta {
                width: 100%;
                padding: 14px 20px;
                font-size: 15px;
                letter-spacing: 0.3px;
            }
        }

        @media (max-width: 380px) {
            .logo img { width: 130px; }
            .nav-container { padding: 0 16px; }
            .nav-collapse { padding: 0 18px; }
        }

        /* ─── Desktop ≥1024px (850 FICO Club style) ───────────────────────
           Slim, full-width, balanced 3-zone layout: logo · nav · cta.
           Does NOT touch mobile (≤960px) or tablet gap (961–1023px). */
        @media (min-width: 1024px) {
            nav { padding: 12px 0; }
            nav.scrolled { padding: 10px 0; }

            .nav-container {
                max-width: 1440px;
                padding: 0 60px;
                display: grid;
                grid-template-columns: 1fr auto 1fr;
                column-gap: 32px;
                align-items: center;
            }

            .logo {
                grid-column: 1;
                justify-self: start;
            }

            .logo img { width: 160px; }

            /* Wrapper becomes invisible to layout — its children participate
               directly in the 3-column grid. */
            .nav-collapse {
                display: contents;
                position: static;
                background: none;
                box-shadow: none;
                padding: 0;
                opacity: 1;
                transform: none;
                pointer-events: auto;
                max-height: none;
                overflow: visible;
                transition: none;
            }

            .nav-menu {
                grid-column: 2;
                justify-self: center;
                gap: 38px;
                padding: 0;
            }

            .nav-menu a {
                font-size: 15px;
                padding: 0;
                border: none;
                width: auto;
            }

            .nav-collapse-actions {
                grid-column: 3;
                justify-self: end;
                width: auto;
                padding: 0;
                gap: 0;
                flex-direction: row;
            }

            .nav-cta {
                width: auto;
                padding: 11px 24px;
                font-size: 14px;
                letter-spacing: 0.3px;
            }
        }

        @media (min-width: 1280px) {
            .nav-container { padding: 0 80px; }
            .nav-menu { gap: 42px; }
        }

        /* ============================================
           HERO SECTION - FLEXBOX LAYOUT
           ============================================ */
.hero {
    padding: 50px 40px;   /* top + bottom = 50px, left + right = 40px */
    margin-top: 100px;    /* still keeps distance from fixed navbar */
    background: linear-gradient(135deg, var(--background) 0%, rgba(0, 142, 170, 0.05) 100%);
    display: flex;
    align-items: center;
}



        
        .hero-container {
            max-width: 1400px;
            margin: 40px auto;
            width: 100%;
            flex-direction: row-reverse;   /* ensures video left, text right */
            display: flex;
            align-items: center;
            gap: 60px;
        }
        
        /* Video on right */
        .hero-content {
            flex: 1;
            min-width: 0;
        }
        
        /* Text on left */
         .hero-video {
            flex: 1;
            min-width: 0;
        }
        
        .hero-title {
            font-size: clamp(36px, 4vw, 56px);
            font-weight: 900;
            color: var(--text-dark);
            margin-bottom: 24px;
            line-height: 1.1;
        }
        
        .hero-title span {
            color: var(--primary);
        }
        
        .hero-subtitle {
            font-size: 20px;
            color: var(--text-medium);
            margin-bottom: 30px;
        }
        
        .hero-features {
            margin-bottom: 30px;
        }
        
        .feature-item {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 15px;
            font-size: 18px;
            color: var(--text-dark);
        }
        
        .feature-check {
            color: var(--primary);
            font-size: 24px;
        }
        
.video-container {
    position: relative;
    background: #000;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 20px 60px rgba(0, 142, 170, 0.2);
    transition: box-shadow 0.3s ease;
}

.video-container:hover {
    box-shadow: 0 30px 80px rgba(0, 142, 170, 0.3);
}

.video-placeholder {
    position: relative;
    padding-bottom: 56.25%; /* keeps 16:9 ratio */
    background: linear-gradient(135deg, #0a1f26 0%, #001318 100%);
}

.hero-video-el {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    background: #000;
    z-index: 1;
}

/* ── Center play overlay (paused state) ───────────────────────────── */
.video-center-play {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%) scale(1);
    width: 84px;
    height: 84px;
    background: rgba(255, 255, 255, 0.96);
    border: none;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 12px 32px rgba(0, 0, 0, 0.35);
    cursor: pointer;
    z-index: 10;
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.25s ease, transform 0.25s ease;
}

.video-container.is-paused .video-center-play {
    opacity: 1;
    pointer-events: auto;
}

.video-center-play:hover {
    transform: translate(-50%, -50%) scale(1.08);
    background: #fff;
}

.video-center-play .vcp-icon {
    width: 0;
    height: 0;
    border-left: 26px solid var(--primary);
    border-top: 16px solid transparent;
    border-bottom: 16px solid transparent;
    margin-left: 6px;
}

/* ── "Tap for sound" pill (muted state) ───────────────────────────── */
.video-unmute-pill {
    position: absolute;
    top: 16px;
    right: 16px;
    background: rgba(0, 142, 170, 0.95);
    color: #fff;
    border: none;
    padding: 9px 16px;
    border-radius: 999px;
    font-size: 13px;
    font-weight: 700;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    cursor: pointer;
    z-index: 12;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.35);
    backdrop-filter: blur(6px);
    opacity: 0;
    pointer-events: none;
    transform: translateY(-6px);
    transition: opacity 0.25s ease, transform 0.25s ease;
    font-family: inherit;
}

.video-container.is-muted .video-unmute-pill {
    opacity: 1;
    pointer-events: auto;
    transform: translateY(0);
}

.video-unmute-pill:hover { background: var(--primary); }

/* ── Custom control bar ───────────────────────────────────────────── */
.video-controls {
    position: absolute;
    left: 0;
    right: 0;
    bottom: 0;
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 14px 16px 12px;
    background: linear-gradient(to top, rgba(0,0,0,0.78) 0%, rgba(0,0,0,0.55) 60%, rgba(0,0,0,0) 100%);
    color: #fff;
    z-index: 11;
    opacity: 0;
    transform: translateY(8px);
    transition: opacity 0.25s ease, transform 0.25s ease;
}

.video-container:hover .video-controls,
.video-container.is-paused .video-controls,
.video-container.show-controls .video-controls {
    opacity: 1;
    transform: translateY(0);
}

.vc-btn {
    background: none;
    border: none;
    color: #fff;
    font-size: 16px;
    width: 36px;
    height: 36px;
    border-radius: 8px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: background 0.2s ease, transform 0.15s ease;
}

.vc-btn:hover { background: rgba(255, 255, 255, 0.18); }
.vc-btn:active { transform: scale(0.94); }
.vc-btn:focus-visible { outline: 2px solid var(--primary); outline-offset: 2px; }

.vc-progress {
    position: relative;
    flex: 1;
    height: 6px;
    background: rgba(255, 255, 255, 0.22);
    border-radius: 999px;
    cursor: pointer;
    margin: 0 4px;
}

.vc-progress-buffer {
    position: absolute;
    top: 0; left: 0; bottom: 0;
    width: 0;
    background: rgba(255, 255, 255, 0.35);
    border-radius: 999px;
}

.vc-progress-fill {
    position: absolute;
    top: 0; left: 0; bottom: 0;
    width: 0;
    background: var(--primary);
    border-radius: 999px;
}

.vc-progress-handle {
    position: absolute;
    top: 50%;
    left: 0;
    width: 14px;
    height: 14px;
    background: #fff;
    border: 2px solid var(--primary);
    border-radius: 50%;
    transform: translate(-50%, -50%) scale(0);
    transition: transform 0.15s ease;
    pointer-events: none;
}

.vc-progress:hover .vc-progress-handle,
.vc-progress.is-scrubbing .vc-progress-handle {
    transform: translate(-50%, -50%) scale(1);
}

.vc-time {
    font-size: 12px;
    font-weight: 600;
    letter-spacing: 0.3px;
    font-variant-numeric: tabular-nums;
    color: rgba(255, 255, 255, 0.92);
    white-space: nowrap;
    min-width: 80px;
    text-align: center;
}

.video-container:fullscreen .hero-video-el,
.video-container:-webkit-full-screen .hero-video-el {
    object-fit: contain;
    background: #000;
}

@media (max-width: 600px) {
    .video-center-play { width: 64px; height: 64px; }
    .video-center-play .vcp-icon {
        border-left-width: 20px;
        border-top-width: 12px;
        border-bottom-width: 12px;
    }
    .video-controls { padding: 10px 12px 10px; gap: 8px; }
    .vc-btn { width: 32px; height: 32px; font-size: 14px; }
    .vc-time { font-size: 11px; min-width: 70px; }
    .video-unmute-pill { font-size: 12px; padding: 7px 12px; top: 10px; right: 10px; }
}
        
        .video-cta-text {
            text-align: center;
            margin-top: 20px;
            font-size: 16px;
            color: var(--primary);
            font-weight: 600;
        }
       .hero-buttons {
  margin-top: 30px;
  display: flex;
  gap: 20px;             /* space between buttons */
}

.hero-buttons .btn {
  display: inline-block;
  padding: 14px 28px;
  border-radius: 8px;
  font-weight: 600;
  font-size: 16px;
  text-decoration: none;
  transition: all 0.3s ease;
}

.btn-primary {
  background: var(--primary);
  color: #fff;
}

.btn-primary:hover {
  background: #007899; /* darker teal on hover */
}

.btn-secondary {
  background: #fff;
  color: var(--primary);
  border: 2px solid var(--primary);
}

.btn-secondary:hover {
  background: var(--primary);
  color: #fff;
}
 
        /* MOBILE: Better responsive layout - Text then Buttons then Video */
@media (max-width: 768px) {
  .hero-container {
    display: flex;
    flex-direction: column !important; /* text first, video second */
    align-items: center;
    gap: 30px;
    margin: 20px auto;
  }

  /* Center text content */
  .hero-content { 
    text-align: center;
    order: 1; /* Text content comes first */
  }

  /* Buttons get visual separation */
  .hero-buttons {
    margin-top: 40px;
    justify-content: center;
    flex-wrap: wrap;
  }

  /* Video comes last and fills better */
  .hero-video {
    order: 2; /* Video comes second */
    width: 100%;
    max-width: 500px;
  }

  /* Make video container fill better on mobile */
  .video-container {
    border-radius: 15px;
  }

  .video-placeholder {
    padding-bottom: 56.25%; /* maintain 16:9 ratio */
  }
}

.floating-bg {
  position: absolute;
  top: 0; left: 0;
  width: 100%; height: 100%;
  overflow: hidden;
  pointer-events: none; /* ✅ keeps hero clickable */
  z-index: 0;
}

.floating-bg span {
  position: absolute;
  display: inline-block;
  color: #008eaa;
  opacity: 0.4;               /* More visible */
  font-size: 24px;
  animation-iteration-count: infinite;
  animation-timing-function: linear;
}

/* 30 spans with staggered delays + slower speed */
.floating-bg span:nth-child(1)  { left: 10%; bottom: -60px; font-size: 32px; animation: floatUp 10s infinite 0s; }
.floating-bg span:nth-child(2)  { left: 25%; bottom: -60px; font-size: 28px; animation: floatUp 10s infinite 5s; }
.floating-bg span:nth-child(3)  { left: 40%; top: -60px; font-size: 26px; animation: floatDown 10s infinite 10s; }
.floating-bg span:nth-child(4)  { right: -60px; top: 30%; font-size: 34px; animation: floatLeft 10s infinite 3s; }
.floating-bg span:nth-child(5)  { left: -60px; top: 60%; font-size: 40px; animation: floatRight 10s infinite 8s; }
.floating-bg span:nth-child(6)  { left: 70%; top: -60px; font-size: 26px; animation: floatDown 10s infinite 12s; }
.floating-bg span:nth-child(7)  { right: -70px; bottom: 10%; font-size: 36px; animation: floatLeft 10s infinite 6s; }
.floating-bg span:nth-child(8)  { left: -70px; top: 20%; font-size: 30px; animation: floatRight 10s infinite 14s; }
.floating-bg span:nth-child(9)  { left: 20%; bottom: -60px; font-size: 38px; animation: floatUp 10s infinite 7s; }
.floating-bg span:nth-child(10) { left: 80%; top: -60px; font-size: 28px; animation: floatDown 10s infinite 15s; }
.floating-bg span:nth-child(11) { right: -80px; top: 40%; font-size: 30px; animation: floatLeft 10s infinite 9s; }
.floating-bg span:nth-child(12) { left: -90px; top: 70%; font-size: 24px; animation: floatRight 10s infinite 16s; }
.floating-bg span:nth-child(13) { left: 50%; bottom: -60px; font-size: 42px; animation: floatUp 10s infinite 11s; }
.floating-bg span:nth-child(14) { left: 15%; top: -70px; font-size: 22px; animation: floatDown 10s infinite 18s; }
.floating-bg span:nth-child(15) { right: -70px; bottom: 30%; font-size: 28px; animation: floatLeft 10s infinite 13s; }
.floating-bg span:nth-child(16) { left: -70px; top: 50%; font-size: 34px; animation: floatRight 10s infinite 20s; }
.floating-bg span:nth-child(17) { left: 60%; bottom: -60px; font-size: 28px; animation: floatUp 10s infinite 17s; }
.floating-bg span:nth-child(18) { left: 75%; top: -60px; font-size: 36px; animation: floatDown 10s infinite 22s; }
.floating-bg span:nth-child(19) { right: -80px; top: 25%; font-size: 30px; animation: floatLeft 10s infinite 19s; }
.floating-bg span:nth-child(20) { left: -80px; top: 15%; font-size: 32px; animation: floatRight 10s infinite 24s; }
.floating-bg span:nth-child(21) { left: 5%; bottom: -60px; font-size: 26px; animation: floatUp 10s infinite 2s; }
.floating-bg span:nth-child(22) { left: 35%; bottom: -60px; font-size: 30px; animation: floatUp 10s infinite 4s; }
.floating-bg span:nth-child(23) { left: 55%; top: -60px; font-size: 28px; animation: floatDown 10s infinite 6s; }
.floating-bg span:nth-child(24) { right: -60px; top: 70%; font-size: 36px; animation: floatLeft 10s infinite 8s; }
.floating-bg span:nth-child(25) { left: -60px; top: 35%; font-size: 34px; animation: floatRight 10s infinite 10s; }
.floating-bg span:nth-child(26) { left: 85%; bottom: -60px; font-size: 40px; animation: floatUp 10s infinite 12s; }
.floating-bg span:nth-child(27) { left: 65%; top: -60px; font-size: 26px; animation: floatDown 10s infinite 14s; }
.floating-bg span:nth-child(28) { right: -80px; top: 15%; font-size: 32px; animation: floatLeft 10s infinite 16s; }
.floating-bg span:nth-child(29) { left: -90px; top: 45%; font-size: 28px; animation: floatRight 10s infinite 18s; }
.floating-bg span:nth-child(30) { left: 45%; bottom: -60px; font-size: 38px; animation: floatUp 10s infinite 20s; }

/* Animations for different directions */
@keyframes floatUp {
  from { transform: translateY(0) rotate(0deg) scale(1); opacity: 0.4; }
  to   { transform: translateY(-120vh) rotate(360deg) scale(1.3); opacity: 0; }
}
@keyframes floatDown {
  from { transform: translateY(0) rotate(0deg) scale(1); opacity: 0.4; }
  to   { transform: translateY(120vh) rotate(-360deg) scale(1.3); opacity: 0; }
}
@keyframes floatRight {
  from { transform: translateX(0) rotate(0deg) scale(1); opacity: 0.4; }
  to   { transform: translateX(120vw) rotate(360deg) scale(1.3); opacity: 0; }
}
@keyframes floatLeft {
  from { transform: translateX(0) rotate(0deg) scale(1); opacity: 0.4; }
  to   { transform: translateX(-120vw) rotate(-360deg) scale(1.3); opacity: 0; }
}




/* REMOVED: No color overrides on mobile - keep original design */

/* ============================================
   PAIN POINTS - MATCHING SCREENSHOT
   ============================================ */
.pain-section {
    padding: 100px 20px;
    background: var(--primary);
    position: relative;
}

.pain-card:hover {
    background: #008eaa;              /* teal background */
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
}

.pain-card:hover .pain-card-title,
.pain-card:hover .pain-description {
    color: #ffffff;                   /* make text white */
}

/* ✅ removed hover background change for icons */
.pain-card:hover .pain-icon-box {
    background: #ffffff;              /* stays white on hover */
}

.pain-container {
    max-width: 1200px;
    margin: 0 auto;
}

.pain-header {
    text-align: center;
    margin-bottom: 60px;
    color: white;
}

.pain-title {
    font-size: clamp(36px, 4vw, 56px);
    font-weight: 900;
    margin-bottom: 20px;
    text-transform: uppercase;
}

.pain-subtitle {
    font-size: 20px;
    opacity: 0.95;
}

.pain-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 30px;
}

.pain-card {
    background: white;
    border-radius: 20px;
    padding: 30px;
    transition: all 0.3s ease;
    cursor: pointer;
    position: relative;
    overflow: hidden;
}

.pain-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, transparent, rgba(0, 142, 170, 0.05));
    opacity: 0;
    transition: opacity 0.3s ease;
}

.pain-card:hover::before {
    opacity: 1;
}

.pain-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
}

/* Match screenshot styling */
.pain-card.highlighted {
    border: 2px solid var(--primary);
}

.pain-icon-box {
    width: 60px;
    height: 60px;
    background: #ffffff;                 /* always white background */
    border: 2px solid rgba(0,0,0,0.05);  /* subtle border for contrast */
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 20px;
    font-size: 30px;
}

.pain-card.highlighted .pain-icon-box {
    background: #ffffff;   /* stays white when highlighted */
}

.pain-card-title {
    font-size: 22px;
    font-weight: 700;
    color: var(--text-dark);
    margin-bottom: 12px;
}

.pain-description {
    color: var(--text-medium);
    line-height: 1.6;
}

/* ensure hover text is white even on .highlighted cards */
.pain-card:hover .pain-card-title,
.pain-card:hover .pain-description {
  color: #ffffff !important;
}



        /* ============================================
           CONSULTATION BOOKING SECTION
           ============================================ */
        .booking-section {
            padding: 100px 20px;
            background: var(--background);
        }
        
        .booking-container {
            max-width: 1200px;
            margin: 0 auto;
            text-align: center;
        }
        
        .booking-title {
            font-size: clamp(32px, 4vw, 48px);
            font-weight: 900;
            color: var(--text-dark);
            margin-bottom: 20px;
        }
        
        .booking-subtitle {
            font-size: 20px;
            color: var(--text-medium);
            margin-bottom: 40px;
        }
        
        .calendar-wrapper {
            max-width: 100%;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
            padding: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        

/* ============================================
  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Founder Section - Optimized</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        /* OPTIMIZED FOUNDER SECTION */
        .founder-section {
            padding: 80px 20px;
            background: linear-gradient(135deg, #004d5c 0%, #006d85 50%, #008eaa 100%);
            position: relative;
            overflow: hidden;
            min-height: 600px;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

        /* Premium Background Animations */
        .founder-section::before {
            content: '';
            position: absolute;
            inset: 0;
            background: 
                radial-gradient(circle at 20% 20%, rgba(255,255,255,0.1) 2px, transparent 2px),
                radial-gradient(circle at 80% 80%, rgba(255,255,255,0.08) 1px, transparent 1px),
                radial-gradient(circle at 40% 60%, rgba(255,255,255,0.06) 1.5px, transparent 1.5px);
            background-size: 80px 80px, 120px 120px, 100px 100px;
            animation: floatPattern 25s linear infinite;
            opacity: 0.7;
        }

        .founder-section::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: conic-gradient(from 0deg at 50% 50%, transparent 0deg, rgba(255,255,255,0.03) 60deg, transparent 120deg);
            animation: rotateGlow 30s linear infinite;
        }

        /* Floating Geometric Elements */
        .founder-bg-shapes {
            position: absolute;
            inset: 0;
            pointer-events: none;
            overflow: hidden;
        }

        .shape {
            position: absolute;
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.1);
            backdrop-filter: blur(10px);
        }

        .shape-1 {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            top: 20%;
            left: 10%;
            animation: float1 8s ease-in-out infinite;
        }

        .shape-2 {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            top: 60%;
            right: 15%;
            animation: float2 10s ease-in-out infinite reverse;
        }

        .shape-3 {
            width: 80px;
            height: 80px;
            border-radius: 20px;
            bottom: 30%;
            left: 5%;
            animation: float3 12s ease-in-out infinite;
        }

        .shape-4 {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            top: 15%;
            right: 25%;
            animation: float1 15s ease-in-out infinite reverse;
        }

        @keyframes floatPattern {
            0% { transform: translate(0, 0); }
            100% { transform: translate(-80px, -80px); }
        }

        @keyframes rotateGlow {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        @keyframes float1 {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }

        @keyframes float2 {
            0%, 100% { transform: translateX(0) rotate(0deg); }
            50% { transform: translateX(15px) rotate(90deg); }
        }

        @keyframes float3 {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            33% { transform: translate(10px, -15px) rotate(120deg); }
            66% { transform: translate(-10px, -10px) rotate(240deg); }
        }

        /* Container */
        .founder-container {
            max-width: 1100px;
            margin: 0 auto;
            position: relative;
            z-index: 10;
        }

        /* Content Layout */
        .founder-content {
            display: grid;
            grid-template-columns: 1.2fr 380px;
            gap: 50px;
            align-items: center;
            animation: slideUp 1s ease-out 0.3s both;
        }

        /* OPTIMIZED TYPOGRAPHY */
        
        /* Header Section */
        .founder-header {
            margin-bottom: 40px;
            animation: slideDown 1s ease-out;
        }

        .founder-title {
            font-size: clamp(42px, 5vw, 56px);
            font-weight: 800;
            line-height: 1.1;
            letter-spacing: -0.02em;
            background: linear-gradient(135deg, #ffffff 0%, #f0f9ff 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin: 0 0 16px 0;
            position: relative;
        }

        .founder-title::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, #ffffff, rgba(255,255,255,0.3));
            border-radius: 2px;
            animation: underlinePulse 2s ease-in-out infinite;
        }

        @keyframes underlinePulse {
            0%, 100% { opacity: 0.7; width: 60px; }
            50% { opacity: 1; width: 80px; }
        }

        .founder-subtitle {
            font-size: 22px;
            font-weight: 400;
            line-height: 1.4;
            color: rgba(255,255,255,0.85);
            margin: 0;
            letter-spacing: -0.01em;
        }

        /* Story Content */
        .founder-story {
            animation: fadeIn 1s ease-out 0.6s both;
        }

.founder-intro {
    font-size: 20px;
    font-weight: 400;  /* <-- Changed from 600 to 400 */
    line-height: 1.5;
    color: #ffffff;
    margin: 0 0 24px 0;
    letter-spacing: -0.01em;
}

        .founder-description {
            font-size: 18px;
            font-weight: 400;
            line-height: 1.6;
            color: rgba(255,255,255,0.9);
            margin: 0 0 32px 0;
            letter-spacing: -0.005em;
        }

        /* Achievements List */
        .founder-highlights {
            list-style: none;
            margin: 0;
            padding: 0;
            animation: slideUp 1s ease-out 1s both;
        }

        .founder-highlights li {
            display: flex;
            align-items: flex-start;
            margin-bottom: 16px;
            font-size: 17px;
            font-weight: 500;
            line-height: 1.5;
            color: #ffffff;
            letter-spacing: -0.005em;
            animation: fadeInUp 0.6s ease-out forwards;
        }

        .founder-highlights li:nth-child(1) { animation-delay: 1.2s; }
        .founder-highlights li:nth-child(2) { animation-delay: 1.4s; }
        .founder-highlights li:nth-child(3) { animation-delay: 1.6s; }
        .founder-highlights li:last-child { margin-bottom: 0; }

        .founder-highlights li::before {
            content: '✓';
            color: #ffffff;
            font-size: 16px;
            font-weight: 700;
            margin-right: 16px;
            margin-top: 2px;
            background: rgba(255, 255, 255, 0.15);
            width: 24px;
            height: 24px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            border: 1px solid rgba(255,255,255,0.2);
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); background: rgba(255, 255, 255, 0.15); }
            50% { transform: scale(1.05); background: rgba(255, 255, 255, 0.25); }
        }

        /* Enhanced Image */
        .founder-image {
            position: relative;
            animation: slideIn 1s ease-out 0.4s both;
        }

        .image-wrapper {
            position: relative;
            border-radius: 25px;
            overflow: hidden;
            box-shadow: 
                0 20px 60px rgba(0,0,0,0.3),
                0 0 0 1px rgba(255,255,255,0.1) inset;
            transition: all 0.4s ease;
            background: rgba(255,255,255,0.05);
            aspect-ratio: 3/4;
        }

        .image-wrapper::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(255,255,255,0.1), transparent, rgba(0,142,170,0.1));
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: 2;
        }

        .image-wrapper:hover::before {
            opacity: 1;
        }

        .image-wrapper:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 
                0 30px 80px rgba(0,0,0,0.4),
                0 0 0 1px rgba(255,255,255,0.2) inset,
                0 0 40px rgba(0,142,170,0.2);
        }

        .founder-photo {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center top;
            display: block;
            transition: transform 0.4s ease;
        }

        .image-wrapper:hover .founder-photo {
            transform: scale(1.05);
        }

        /* Refined Badge */
        .image-badge {
            position: absolute;
            bottom: 20px;
            left: 20px;
            right: 20px;
            background: rgba(0,142,170,0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255,255,255,0.2);
            border-radius: 12px;
            padding: 16px;
            text-align: center;
            box-shadow: 0 8px 25px rgba(0,0,0,0.3);
            transition: all 0.3s ease;
        }

        .image-badge:hover {
            transform: translateY(-2px);
            background: rgba(0,142,170,1);
        }

        .badge-text {
            color: white;
            font-weight: 600;
            font-size: 16px;
            letter-spacing: -0.005em;
            text-shadow: 0 1px 3px rgba(0,0,0,0.3);
            margin: 0;
        }

        /* Animation Keyframes */
        @keyframes slideDown {
            0% { opacity: 0; transform: translateY(-30px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideUp {
            0% { opacity: 0; transform: translateY(30px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideIn {
            0% { opacity: 0; transform: translateX(30px); }
            100% { opacity: 1; transform: translateX(0); }
        }

        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }

        @keyframes fadeInUp {
            0% { opacity: 0; transform: translateY(15px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        /* Mobile Responsive */
        @media (max-width: 1024px) {
            .founder-content {
                grid-template-columns: 1fr;
                gap: 40px;
                text-align: left;
            }
            
            .founder-image {
                order: -1;
                max-width: 350px;
                margin: 0 auto 20px auto;
            }
            
            .founder-header {
                text-align: center;
                margin-bottom: 30px;
            }
        }

        @media (max-width: 768px) {
            .founder-section {
                padding: 60px 20px;
            }
            
            .founder-title {
                font-size: clamp(36px, 8vw, 42px);
            }
            
            .founder-subtitle {
                font-size: 20px;
            }
            
            .founder-intro {
                font-size: 18px;
            }
            
            .founder-description {
                font-size: 16px;
            }
            
            .founder-highlights li {
                font-size: 16px;
                margin-bottom: 14px;
            }
            
            .founder-highlights li::before {
                width: 22px;
                height: 22px;
                font-size: 14px;
                margin-right: 14px;
            }
            
            .image-wrapper {
                aspect-ratio: 4/5;
            }
        }

        @media (max-width: 480px) {
            .founder-section {
                padding: 50px 16px;
            }
            
            .founder-content {
                gap: 30px;
            }
            
            .founder-header {
                margin-bottom: 24px;
            }
        }
    
        /* ============================================
           SOLUTION SECTION
           ============================================ */
        .solution-section {
            padding: 100px 20px;
            background: linear-gradient(135deg, rgba(0, 142, 170, 0.05) 0%, var(--background) 100%);
        }
        
        .solution-container {
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .solution-header {
            text-align: center;
            margin-bottom: 60px;
        }
        
        .solution-title {
            font-size: clamp(36px, 4vw, 56px);
            font-weight: 900;
            color: var(--text-dark);
            margin-bottom: 20px;
        }
        
        .steps-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }
        
        .step-card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }
        
        .step-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
        }
        
        .step-number {
            width: 50px;
            height: 50px;
            background: var(--primary);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            font-weight: 900;
            margin: 0 auto 20px;
        }
        
        .step-title {
            font-size: 20px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 12px;
        }
        
        .step-description {
            color: var(--text-medium);
            line-height: 1.5;
        }
        
 /* Credit Assessment Popup - Fixed Frame Solution */
:root {
    --popup-primary: #008eaa;
    --popup-gray: #caccd1;
    --popup-white: #ffffff;
    --popup-text-dark: #2c3e50;
    --popup-text-medium: #5a6c7d;
}

.credit-popup-overlay {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.8);
    backdrop-filter: blur(10px);
    z-index: 99999;
    display: none;
    opacity: 0;
    transition: opacity 0.4s ease;
}

.credit-popup-overlay.popup-active {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
}

.credit-popup-overlay.popup-show {
    opacity: 1;
}

.credit-popup-content {
    background: var(--popup-white);
    border-radius: 20px;
    width: 100%;
    max-width: 480px;
    height: 620px;
    transform: scale(0.8);
    transition: transform 0.4s ease;
    box-shadow: 0 25px 80px rgba(0, 0, 0, 0.4);
    display: flex;
    flex-direction: column;
    overflow: hidden;
}

.credit-popup-overlay.popup-show .credit-popup-content {
    transform: scale(1);
}

.credit-popup-header {
    background: linear-gradient(135deg, var(--popup-primary) 0%, rgba(0, 142, 170, 0.9) 100%);
    padding: 25px 20px;
    text-align: center;
    color: var(--popup-white);
    position: relative;
    flex-shrink: 0;
}

.credit-popup-close {
    position: absolute;
    top: 15px;
    right: 15px;
    width: 30px;
    height: 30px;
    background: rgba(255, 255, 255, 0.2);
    border: none;
    border-radius: 50%;
    color: var(--popup-white);
    font-size: 18px;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
}

.credit-popup-close:hover {
    background: rgba(255, 255, 255, 0.3);
    transform: rotate(90deg);
}

.credit-popup-title {
    font-size: 22px;
    font-weight: 900;
    margin-bottom: 8px;
}

.credit-popup-subtitle {
    font-size: 14px;
    opacity: 0.95;
}

.credit-progress-container {
    background: #f8f9fa;
    height: 6px;
    flex-shrink: 0;
}

.credit-progress-bar {
    height: 100%;
    background: linear-gradient(90deg, var(--popup-primary), rgba(0, 142, 170, 0.8));
    width: 20%;
    transition: width 0.4s ease;
}

.credit-step-indicator {
    display: flex;
    justify-content: center;
    padding: 18px;
    background: #f8f9fa;
    gap: 10px;
    flex-shrink: 0;
}

.credit-step-dot {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background: var(--popup-gray);
    transition: all 0.3s ease;
}

.credit-step-dot.dot-active {
    background: var(--popup-primary);
    transform: scale(1.3);
}

.credit-step-dot.dot-completed {
    background: var(--popup-primary);
}

.credit-popup-body {
    flex: 1;
    display: flex;
    flex-direction: column;
    padding: 25px 25px 20px;
    min-height: 0;
}

.credit-popup-step {
    display: none;
    flex: 1;
    min-height: 0;
}

.credit-popup-step.step-active {
    display: flex;
    flex-direction: column;
}

.question-container {
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: center;
    min-height: 0;
}

.credit-step-question {
    font-size: 22px;
    font-weight: 700;
    color: var(--popup-text-dark);
    text-align: center;
    margin-bottom: 35px;
    flex-shrink: 0;
    line-height: 1.2;
}

.credit-options-grid {
    display: flex;
    flex-direction: column;
    gap: 12px;
    flex: 1;
    justify-content: center;
    max-height: 280px;
}

.credit-option-button {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 16px 20px;
    background: var(--popup-white);
    border: 2px solid #e0e0e0;
    border-radius: 12px;
    cursor: pointer;
    transition: all 0.3s ease;
    font-size: 16px;
    font-weight: 500;
    color: var(--popup-text-dark);
    text-align: center;
    min-height: 55px;
    flex-shrink: 0;
}

.credit-option-button:hover {
    border-color: var(--popup-primary);
    background: rgba(0, 142, 170, 0.05);
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0, 142, 170, 0.15);
}

.credit-option-button.option-selected {
    border-color: var(--popup-primary);
    background: rgba(0, 142, 170, 0.1);
    color: var(--popup-primary);
    font-weight: 600;
}

.credit-ghl-form-container {
    flex: 1;
    display: flex;
    flex-direction: column;
    min-height: 378px;
    max-height: 378px;
    background: transparent;
    border-radius: 0;
    padding: 0;
    margin: 0;
    overflow: hidden;
}

.credit-ghl-form-container iframe {
    width: 100% !important;
    height: 378px !important;
    min-height: 378px !important;
    max-height: 378px !important;
    border: none !important;
    border-radius: 3px !important;
    flex: 1;
    display: block !important;
    background: white;
}

/* Ensure Step 5 container accommodates the form */
.credit-popup-step[data-credit-step="5"] .question-container {
    justify-content: flex-start;
}

.credit-popup-step[data-credit-step="5"] .credit-step-question {
    margin-bottom: 20px;
    flex-shrink: 0;
}

.credit-popup-navigation {
    display: flex;
    justify-content: space-between;
    gap: 15px;
    flex-shrink: 0;
    margin-top: 20px;
}

.credit-nav-btn {
    flex: 1;
    padding: 14px 20px;
    border: none;
    border-radius: 10px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
}

.credit-btn-back {
    background: #f0f0f0;
    color: var(--popup-text-dark);
}

.credit-btn-back:hover {
    background: #e0e0e0;
}

.credit-btn-next {
    background: var(--popup-primary);
    color: var(--popup-white);
}

.credit-btn-next:hover {
    background: #007090;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0, 142, 170, 0.3);
}

.credit-btn-next:disabled {
    background: var(--popup-gray);
    cursor: not-allowed;
    transform: none;
    box-shadow: none;
}

/* Mobile Responsive */
@media (max-width: 768px) {
    .credit-popup-content {
        max-width: 95%;
        height: 90vh;
        max-height: 600px;
    }

    .credit-step-question {
        font-size: 20px;
        margin-bottom: 25px;
    }

    .credit-option-button {
        font-size: 15px;
        padding: 14px 18px;
        min-height: 50px;
    }

    .credit-popup-navigation {
        flex-direction: column;
    }
}

@media (max-width: 480px) {
    .credit-popup-content {
        max-width: 98%;
        height: 95vh;
    }

    .credit-popup-body {
        padding: 20px 20px 15px;
    }
}

        /* ============================================
           TESTIMONIALS WITH IMAGE PLACEHOLDERS
           ============================================ */
        .testimonials-section {
            padding: 100px 20px;
            background: white;
        }
        
        .testimonials-container {
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .testimonials-header {
            text-align: center;
            margin-bottom: 60px;
        }
        
        .testimonials-title {
            font-size: clamp(36px, 4vw, 56px);
            font-weight: 900;
            color: var(--text-dark);
            margin-bottom: 20px;
        }
        
        .testimonials-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
        }
        
        .testimonial-card {
            background: var(--background);
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }
        
        .testimonial-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
        }
        
        .testimonial-content {
            margin-bottom: 20px;
        }
        
        .stars {
            color: var(--primary);
            font-size: 24px;
            margin-bottom: 15px;
        }
        
        .testimonial-text {
            font-size: 16px;
            color: var(--text-medium);
            line-height: 1.6;
            margin-bottom: 20px;
            font-style: italic;
        }
        
        .testimonial-author {
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 5px;
        }
        
        .testimonial-meta {
            font-size: 14px;
            color: var(--primary);
            margin-bottom: 20px;
        }
        
        /* Image placeholder for testimonials */
        .testimonial-image {
            background: #008eaa;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            font-size: 14px;
            color: var(--text-medium);
            margin-top: 20px;
        }
        
        /* Before/After mobile-friendly layout */
        .before-after-container {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }
        
        .before-after-item {
            flex: 1;
            background: #f8f9fa;
            border-radius: 10px;
            padding: 15px;
            text-align: center;
        }
        
        .score-label {
            font-size: 12px;
            color: var(--text-medium);
            margin-bottom: 5px;
        }
        
        .score-value {
            font-size: 24px;
            font-weight: 900;
            color: var(--primary);
        }
        
        .image-modal {
    display: none;
    position: fixed;
    z-index: 99999;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.9);
    animation: fadeIn 0.3s ease;
}

.image-modal.show {
    display: flex;
    align-items: center;
    justify-content: center;
}

.modal-content {
    position: relative;
    max-width: 90%;
    max-height: 90%;
    margin: auto;
    animation: scaleIn 0.3s ease;
}

.modal-image {
    width: 100%;
    height: auto;
    border-radius: 10px;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
}

/* GUARANTEED VISIBLE CLOSE BUTTON */
.close-button {
    position: fixed !important;
    top: 30px !important;
    right: 30px !important;
    background: #ff4444 !important;
    color: white !important;
    border: 4px solid white !important;
    width: 70px !important;
    height: 70px !important;
    border-radius: 50% !important;
    cursor: pointer !important;
    font-size: 35px !important;
    font-weight: 900 !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    box-shadow: 0 0 30px rgba(0, 0, 0, 1) !important;
    transition: all 0.3s ease !important;
    z-index: 100000 !important;
    line-height: 1 !important;
    font-family: Arial, sans-serif !important;
}

.close-button:hover {
    background: #ff0000 !important;
    transform: scale(1.1) !important;
    box-shadow: 0 0 40px rgba(255, 0, 0, 0.8) !important;
}

.close-button:active {
    transform: scale(0.95) !important;
}

/* Make testimonial images clickable */
.testimonial-image {
    cursor: pointer;
    transition: all 0.3s ease;
}

.testimonial-image:hover {
    transform: scale(1.02);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

/* Animations */
@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

@keyframes scaleIn {
    from { 
        opacity: 0;
        transform: scale(0.7);
    }
    to { 
        opacity: 1;
        transform: scale(1);
    }
}

/* Mobile specific */
@media (max-width: 768px) {
    .modal-content {
        max-width: 95%;
        max-height: 85%;
    }
    
    .close-button {
        top: 20px !important;
        right: 20px !important;
        width: 80px !important;
        height: 80px !important;
        font-size: 40px !important;
    }
}

@media (max-width: 480px) {
    .close-button {
        top: 15px !important;
        right: 15px !important;
        width: 90px !important;
        height: 90px !important;
        font-size: 45px !important;
    }
}
/* ============================================
   FINAL CTA (Upgraded)
   ============================================ */
.final-cta {
  --ink: #000;
  --paper: #fff;
  --brand: #008eaa;

  position: relative;
  overflow: hidden;
  padding: 100px 20px;
  text-align: center;
  color: var(--paper);
  background: linear-gradient(135deg, var(--primary) 0%, rgba(0, 142, 170, 0.9) 100%);
  isolation: isolate;
}

.final-container {
  max-width: 800px;
  margin: 0 auto;
  position: relative;
  z-index: 1;
}

.final-title {
  font-size: clamp(36px, 4vw, 56px);
  font-weight: 900;
  margin-bottom: 24px;
  text-shadow: 0 2px 0 rgba(0,0,0,.25);
}

.final-subtitle {
  font-size: 22px;
  margin-bottom: 40px;
  opacity: 0.95;
}

.final-actions {
  display: grid;
  gap: 12px;
  justify-content: center;
  margin-bottom: 20px;
}

/* CTA button */
.final-btn {
  position: relative;
  display: inline-grid;
  place-items: center;
  background: var(--paper);
  color: var(--brand);
  padding: 20px 48px;
  border: none;
  border-radius: 50px;
  font-size: 20px;
  font-weight: 800;
  cursor: pointer;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
  overflow: hidden;
}

/* Hover + click states */
.final-btn:hover {
  transform: scale(1.05);
  box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
}
.final-btn:active {
  transform: scale(0.98);
}

/* Sheen sweep */
.final-btn::before {
  content: "";
  position: absolute;
  inset: 0;
  background: linear-gradient(
    120deg,
    transparent 0%,
    rgba(255,255,255,.65) 18%,
    transparent 36%
  );
  background-size: 220% 100%;
  z-index: 1;
  mix-blend-mode: screen;
  animation: sheen 3s ease-in-out infinite;
}
@keyframes sheen {
  0%,10% { background-position: -120% 0; }
  40%,60% { background-position: 120% 0; }
  100% { background-position: 120% 0; }
}

/* Proof row */
.final-proof {
  display: flex;
  flex-wrap: wrap;
  gap: 14px;
  justify-content: center;
  margin-top: 20px;
}

.final-proof .proof-item {
  display: inline-flex;
  align-items: center;
  gap: 10px;
  padding: 10px 14px;
  border-radius: 12px;
  background: #ffffff;     /* White background */
  color: #000000;          /* Black text */
  font-weight: 700;
  font-size: 14px;
  border: 1px solid rgba(0,0,0,0.1);
  box-shadow: 0 4px 10px rgba(0,0,0,0.08);
}

.final-proof .dot {
  width: 8px; height: 8px;
  border-radius: 50%;
  background: #008eaa;
  box-shadow: 0 0 0 4px rgba(0,142,170,0.2);
}

/* Consultation link */
.final-link {
  color: #ffffff;   /* White */
  text-decoration: underline;
  text-underline-offset: 4px;
  font-weight: 700;
}
.final-link:hover { opacity: 0.85; }

/* Background FX layers */
.cta-bg { position: absolute; inset: 0; z-index: 0; }
.cta-vignette {
  position: absolute; inset: -20%;
  background:
    radial-gradient(60% 40% at 50% 20%, rgba(0,142,170,.4) 0%, transparent 60%),
    radial-gradient(70% 50% at 50% 120%, rgba(0,142,170,.3) 0%, transparent 65%);
  opacity: .9;
}
.cta-stripes {
  position: absolute; inset: -10%;
  background:
    repeating-linear-gradient(
      135deg,
      rgba(0,142,170,.35) 0%,
      rgba(0,142,170,.35) 2px,
      transparent 2px,
      transparent 38px
    );
  opacity: .22;
  animation: stripesMove 10s linear infinite;
}
@keyframes stripesMove {
  from { transform: translate3d(0,0,0); }
  to   { transform: translate3d(-120px,-120px,0); }
}
.cta-orbits { position: absolute; inset: 0; pointer-events: none; }
.cta-orbits span {
  position: absolute;
  width: 10px; height: 10px;
  border-radius: 50%;
  background: var(--brand);
  opacity: .18;
  left: var(--x); top: var(--y);
  animation: orbit 6.5s ease-in-out infinite;
  animation-delay: var(--d);
}
@keyframes orbit {
  0%,100% { transform: translate(-6px,-6px) scale(1); }
  50%     { transform: translate(6px,6px) scale(1.35); opacity:.28; }
}

/* Trust microcopy */
.final-trust {
  font-size: 14px;
  opacity: 0.85;
  margin-top: 6px;
}

        
        /* ============================================
           FOOTER
           ============================================ */
        footer {
background: black;
            color: white;
            padding: 60px 20px 30px;
        }
        
        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 40px;
            margin-bottom: 40px;
        }
        
        .footer-column h3 {
            font-size: 20px;
            margin-bottom: 20px;
            font-weight: 700;
        }
        
        .footer-logo {
            font-size: 28px;
            font-weight: 900;
            margin-bottom: 15px;
        }
        
        .footer-description {
            font-size: 14px;
            line-height: 1.6;
            opacity: 0.9;
        }
        
        .footer-item {
            margin-bottom: 12px;
            font-size: 14px;
            opacity: 0.9;
        }
        
        .footer-link {
            color: white;
            text-decoration: none;
            transition: opacity 0.3s ease;
        }
        
        .footer-link:hover {
            opacity: 0.7;
        }
        
       .social-icons {
    display: flex;
    gap: 15px; /* kept from your original */
}

/* Container: 3 columns -> with 5 items this makes 3 on row 1, 2 on row 2 */
.footer-column .social-icons {
  display: grid;
  grid-template-columns: repeat(3, 44px);
  gap: 12px;               /* space between icons */
  justify-content: start;  /* or center; your call */
}

/* Base icon button */
.social-icon {
  width: 44px;
  height: 44px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 20px;       /* icon size */
  color: #fff;           /* icon color always white */
  text-decoration: none;
  transition: transform .2s ease, opacity .2s ease, box-shadow .2s ease;
}

/* Official brand colors */
.social-icon.facebook { background: #1877F2; }             /* Facebook Blue */
.social-icon.youtube  { background: #FF0000; }             /* YouTube Red */
.social-icon.linkedin { background: #0A66C2; }             /* LinkedIn Blue */
.social-icon.instagram{
  background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%,
                              #fd5949 45%, #d6249f 60%, #285AEB 90%); /* IG */
}
/* X/Twitter official is black; switch to #1DA1F2 if you prefer legacy blue */
.social-icon.twitter  { background: #199dc5; }              /* X (Twitter) Black */

/* Hover / focus */
.social-icon:hover { transform: translateY(-3px) scale(1.1); opacity: 0.9; }
.social-icon:focus-visible {
  outline: 2px solid #fff;
  outline-offset: 2px;
  box-shadow: 0 0 0 3px rgba(0,0,0,.25);
}

/* Mobile: center Connect icons */
@media (max-width: 768px) {
  .footer-column { 
    text-align: center !important; 
  }
  .footer-column .social-icons {
    display: flex !important;
    justify-content: center !important;
    align-items: center !important;
    flex-wrap: wrap !important;
    gap: 14px !important;
    width: 100% !important;
    margin: 12px auto 0 !important;
    padding: 0 !important;
  }
  .footer-column .social-icons a {
    float: none !important;
    margin: 0 !important;
  }
}

.footer-bottom {
    text-align: center;
    padding-top: 30px;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    font-size: 14px;
    opacity: 0.8;
}

        
        /* ============================================
           MULTI-STEP FORM MODAL
           ============================================ */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(10px);
            z-index: 2000;
            display: none;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .modal-overlay.active {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .modal-overlay.show {
            opacity: 1;
        }
        
        .modal-content {
            background: white;
            border-radius: 30px;
            max-width: 600px;
            width: 90%;
            max-height: 90vh;
            overflow-y: auto;
            transform: scale(0.9);
            transition: transform 0.3s ease;
        }
        
        .modal-overlay.show .modal-content {
            transform: scale(1);
        }
        
        .modal-header {
            background: var(--primary);
            padding: 30px;
            text-align: center;
            color: white;
            border-radius: 30px 30px 0 0;
            position: relative;
        }
        
        .modal-close {
            position: absolute;
            top: 20px;
            right: 20px;
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.2);
            border: none;
            border-radius: 50%;
            color: white;
            font-size: 24px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .modal-close:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: rotate(90deg);
        }
        
        .modal-title {
            font-size: 28px;
            font-weight: 900;
            margin-bottom: 10px;
        }
        
        .modal-subtitle {
            font-size: 16px;
            opacity: 0.95;
        }
        
        
        .modal-body {
            padding: 30px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-label {
            display: block;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 8px;
            font-size: 14px;
        }
        
        .form-input {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 16px;
            transition: all 0.3s ease;
        }
        
        .form-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(0, 142, 170, 0.1);
        }
        
        .form-row {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 15px;
        }
        
        /* Radio options */
        .radio-group {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }
        
        .radio-option {
            display: flex;
            align-items: center;
            padding: 15px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .radio-option:hover {
            border-color: var(--primary);
            background: rgba(0, 142, 170, 0.05);
        }
        
        .radio-option input[type="radio"] {
            margin-right: 12px;
        }
        
        .radio-option.selected {
            border-color: var(--primary);
            background: rgba(0, 142, 170, 0.1);
        }
        
        /* Form navigation */
        .form-navigation {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
            gap: 15px;
        }
        
        .form-btn {
            flex: 1;
            padding: 14px;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .btn-prev {
            background: #f0f0f0;
            color: var(--text-dark);
        }
        
        .btn-prev:hover {
            background: #e0e0e0;
        }
        
        .btn-next, .btn-submit {
            background: var(--primary);
            color: white;
        }
        
        .btn-next:hover, .btn-submit:hover {
            background: #007090;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 142, 170, 0.3);
        }
        
        /* ============================================
           RESPONSIVE DESIGN
           ============================================ */
        @media (max-width: 1024px) {
            .hero-container {
                flex-direction: column;
                gap: 40px;
            }
            
            .footer-grid {
                grid-template-columns: 1fr 1fr;
                gap: 30px;
            }
        }
        
        @media (max-width: 768px) {
            .pain-grid,
            .steps-grid,
            .testimonials-grid {
                grid-template-columns: 1fr;
            }
            
            .form-row {
                grid-template-columns: 1fr;
            }
            
            .footer-grid {
                grid-template-columns: 1fr;
                text-align: center;
            }
            
            .social-icons {
                justify-content: center;
            }
            
            .before-after-container {
                flex-direction: column;
            }
            
            .hero-title {
                font-size: 32px;
            }
            
            .form-navigation {
                flex-direction: column;
            }
        }

        /* ============================================
           PRICING SECTION
           ============================================ */
        .pricing-section {
            padding: 100px 20px;
            background: linear-gradient(135deg, var(--background) 0%, rgba(0, 142, 170, 0.05) 100%);
        }

        .pricing-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .pricing-header {
            text-align: center;
            margin-bottom: 60px;
        }

        .pricing-badge {
            display: inline-block;
            background: rgba(0, 142, 170, 0.1);
            color: var(--primary);
            padding: 8px 20px;
            border-radius: 50px;
            font-size: 14px;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 20px;
        }

        .pricing-title {
            font-size: clamp(36px, 4vw, 56px);
            font-weight: 900;
            color: var(--text-dark);
            margin-bottom: 16px;
            line-height: 1.15;
        }

        .pricing-subtitle {
            font-size: 20px;
            color: var(--text-medium);
            max-width: 640px;
            margin: 0 auto;
        }

        .pricing-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            align-items: stretch;
        }

        .pricing-card {
            background: #fff;
            border-radius: 20px;
            padding: 40px 32px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            position: relative;
            border: 1px solid rgba(0, 142, 170, 0.08);
        }

        .pricing-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
        }

        .pricing-card.featured {
            border: 2px solid var(--primary);
            box-shadow: 0 15px 40px rgba(0, 142, 170, 0.18);
        }

        .pricing-card.featured:hover {
            box-shadow: 0 20px 50px rgba(0, 142, 170, 0.25);
        }

        .pricing-tag {
            position: absolute;
            top: -14px;
            left: 50%;
            transform: translateX(-50%);
            background: var(--primary);
            color: #fff;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            padding: 6px 16px;
            border-radius: 50px;
            box-shadow: 0 5px 15px rgba(0, 142, 170, 0.3);
        }

        .pricing-card-title {
            font-size: 20px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 16px;
        }

        .pricing-price {
            font-size: 56px;
            font-weight: 900;
            color: var(--primary);
            line-height: 1;
            margin-bottom: 8px;
            letter-spacing: -2px;
        }

        .pricing-meta {
            font-size: 14px;
            color: var(--text-light);
            margin-bottom: 28px;
        }

        .pricing-divider {
            height: 1px;
            background: rgba(0, 142, 170, 0.12);
            margin: 0 0 24px;
        }

        .pricing-features {
            list-style: none;
            padding: 0;
            margin: 0 0 32px;
            flex-grow: 1;
        }

        .pricing-features li {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 10px 0;
            color: var(--text-medium);
            font-size: 15px;
            line-height: 1.5;
        }

        .pricing-features li i {
            color: var(--primary);
            font-size: 16px;
            margin-top: 3px;
            flex-shrink: 0;
        }

        .pricing-cta {
            display: block;
            width: 100%;
            text-align: center;
            background: var(--primary);
            color: #fff;
            padding: 14px 24px;
            border-radius: 8px;
            font-weight: 700;
            font-size: 14px;
            letter-spacing: 1px;
            text-transform: uppercase;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: inherit;
        }

        .pricing-cta:hover {
            background: #007899;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 142, 170, 0.3);
        }

        .pricing-card:not(.featured) .pricing-cta {
            background: #fff;
            color: var(--primary);
            border: 2px solid var(--primary);
        }

        .pricing-card:not(.featured) .pricing-cta:hover {
            background: var(--primary);
            color: #fff;
        }

        @media (max-width: 960px) {
            .pricing-grid {
                grid-template-columns: 1fr;
                max-width: 460px;
                margin: 0 auto;
            }
        }

        @media (max-width: 600px) {
            .pricing-section {
                padding: 70px 16px;
            }
            .pricing-card {
                padding: 32px 24px;
            }
            .pricing-price {
                font-size: 48px;
            }
        }
    </style>
</head>
<body>
       <!-- Auto-Opening Credit Assessment Popup -->
<div class="credit-popup-overlay" id="creditAssessmentPopup">
    <div class="credit-popup-content">
        <!-- Header -->
        <div class="credit-popup-header">
            <button class="credit-popup-close" onclick="closeCreditPopup()">&times;</button>
            <h3 class="credit-popup-title">Free Credit Assessment</h3>
            <p class="credit-popup-subtitle">Get your personalized credit improvement plan</p>
        </div>

        <!-- Progress Bar -->
        <div class="credit-progress-container">
            <div class="credit-progress-bar" id="creditProgressBar"></div>
        </div>

        <!-- Step Indicator -->
        <div class="credit-step-indicator">
            <span class="credit-step-dot dot-active"></span>
            <span class="credit-step-dot"></span>
            <span class="credit-step-dot"></span>
            <span class="credit-step-dot"></span>
            <span class="credit-step-dot"></span>
        </div>

        <!-- Popup Body -->
        <div class="credit-popup-body">
            <!-- Step 1: Credit Score -->
            <div class="credit-popup-step step-active" data-credit-step="1">
                <div class="question-container">
                    <h4 class="credit-step-question">What's your current credit score range?</h4>
                    
                    <div class="credit-options-grid">
                        <div class="credit-option-button" data-credit-value="below-600">
                            <span>Below 600</span>
                        </div>
                        <div class="credit-option-button" data-credit-value="600-679">
                            <span>600-679</span>
                        </div>
                        <div class="credit-option-button" data-credit-value="680-749">
                            <span>680-749</span>
                        </div>
                        <div class="credit-option-button" data-credit-value="750+">
                            <span>750+</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 2: Available Credit -->
            <div class="credit-popup-step" data-credit-step="2">
                <div class="question-container">
                    <h4 class="credit-step-question">How much available credit do you have?</h4>
                    
                    <div class="credit-options-grid">
                        <div class="credit-option-button" data-credit-value="0-1000">
                            <span>$0 - $1,000</span>
                        </div>
                        <div class="credit-option-button" data-credit-value="1000-5000">
                            <span>$1,000 - $5,000</span>
                        </div>
                        <div class="credit-option-button" data-credit-value="5000-25000">
                            <span>$5,000 - $25,000</span>
                        </div>
                        <div class="credit-option-button" data-credit-value="25000+">
                            <span>$25,000+</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 3: Credit Goals -->
            <div class="credit-popup-step" data-credit-step="3">
                <div class="question-container">
                    <h4 class="credit-step-question">What's your main credit goal?</h4>
                    
                    <div class="credit-options-grid">
                        <div class="credit-option-button" data-credit-value="buy-home">
                            <span>Buy a home</span>
                        </div>
                        <div class="credit-option-button" data-credit-value="get-funding">
                            <span>Get business funding</span>
                        </div>
                        <div class="credit-option-button" data-credit-value="improve-score">
                            <span>Improve credit score</span>
                        </div>
                        <div class="credit-option-button" data-credit-value="remove-negatives">
                            <span>Remove negative items</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 4: Timeline -->
            <div class="credit-popup-step" data-credit-step="4">
                <div class="question-container">
                    <h4 class="credit-step-question">When do you need results?</h4>
                    
                    <div class="credit-options-grid">
                        <div class="credit-option-button" data-credit-value="30-days">
                            <span>Within 30 days</span>
                        </div>
                        <div class="credit-option-button" data-credit-value="3-months">
                            <span>Within 3 months</span>
                        </div>
                        <div class="credit-option-button" data-credit-value="6-months">
                            <span>Within 6 months</span>
                        </div>
                        <div class="credit-option-button" data-credit-value="no-rush">
                            <span>No specific timeline</span>
                        </div>
                    </div>
                </div>
            </div>

           <!-- Step 5: Native lead form (posts to GHL via /leads/popup) -->
<div class="credit-popup-step" data-credit-step="5">
    <div class="question-container">
        <h4 class="credit-step-question">Get Your Free Credit Analysis</h4>
        <p style="color: var(--popup-text-medium); font-size: 14px; margin-bottom: 18px;">
            Tell us where to send your personalized improvement plan.
        </p>

        <form id="creditPopupLeadForm" class="credit-popup-lead-form" novalidate>
            <div class="form-row" style="display:grid;grid-template-columns:1fr 1fr;gap:12px;">
                <input type="text" name="first_name" placeholder="First Name" required class="credit-popup-input">
                <input type="text" name="last_name"  placeholder="Last Name"  required class="credit-popup-input">
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

<style>
.credit-popup-lead-form { display:flex; flex-direction:column; gap:12px; margin-top:8px; }
.credit-popup-input {
    width:100%; padding:13px 14px; border:1.5px solid #e1e5ea;
    border-radius:10px; font-size:15px; color:var(--popup-text-dark);
    background:#fff; transition:border-color .15s ease, box-shadow .15s ease;
    font-family:inherit;
}
.credit-popup-input:focus {
    outline:none; border-color:var(--popup-primary);
    box-shadow:0 0 0 3px rgba(0,142,170,.15);
}
.credit-popup-submit-btn {
    background:var(--popup-primary); color:#fff; border:none; border-radius:10px;
    padding:14px 22px; font-size:15px; font-weight:700; cursor:pointer;
    transition:transform .15s ease, background .15s ease; margin-top:6px;
}
.credit-popup-submit-btn:hover:not(:disabled) { background:#007899; transform:translateY(-1px); }
.credit-popup-submit-btn:disabled { opacity:.6; cursor:not-allowed; transform:none; }
.credit-popup-form-msg { font-size:13px; min-height:18px; margin:0; }
.credit-popup-form-msg.is-error   { color:#c0392b; }
.credit-popup-form-msg.is-success { color:#28a745; font-weight:600; }
</style>

            <!-- Navigation -->
            <div class="credit-popup-navigation" id="creditPopupNavigation">
                <button class="credit-nav-btn credit-btn-back" onclick="prevCreditStep()" style="display: none;">
                    ← Back
                </button>
                <button class="credit-nav-btn credit-btn-next" onclick="nextCreditStep()" disabled>
                    Next →
                </button>
            </div>
        </div>
    </div>
</div>
    <!-- Navigation -->
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
                    <li><a href="#problem">The Problem</a></li>
                    <li><a href="#pricing">Pricing</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#process">Process</a></li>
                    <li><a href="#testimonials">Results</a></li>
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
    
    <!-- Hero Section - Flexbox Layout -->
    <section class="hero" id="home">
<div class="floating-bg">
  <!-- Add as many spans as you like -->
  <span>💳</span>
  <span>💵</span>
  <span>💲</span>
  <span>🏦</span>
  <span>📈</span>
  <span>📉</span>
  <span>✅</span>
  <span>💳</span>
  <span>💵</span>
  <span>💲</span>
  <span>🏦</span>
  <span>📈</span>
  <span>📉</span>
  <span>✅</span>
  <span>💳</span>
  <span>💵</span>
  <span>💲</span>
  <span>🏦</span>
  <span>📈</span>
  <span>📉</span>
</div>
        <div class="hero-container">
            <!-- Video on Left -->
            <div class="hero-video">
<div class="video-container" id="videoContainer">
    <div class="video-placeholder">
        <video
            id="heroVideo"
            class="hero-video-el"
            src="{{ asset('images/herovideo.mp4') }}"
            autoplay
            muted
            playsinline
            preload="auto"
            loop
            disablepictureinpicture
            controlslist="nodownload noremoteplayback">
            Your browser does not support the video tag.
        </video>

        <!-- Center play overlay (visible when paused) -->
        <button type="button" class="video-center-play" id="videoCenterPlay" aria-label="Play">
            <span class="vcp-icon"></span>
        </button>

        <!-- "Tap for sound" pill (visible while muted) -->
        <button type="button" class="video-unmute-pill" id="videoUnmutePill" aria-label="Enable sound">
            <i class="fas fa-volume-mute" aria-hidden="true"></i>
            <span>Tap for sound</span>
        </button>

        <!-- Custom control bar -->
        <div class="video-controls" id="videoControls">
            <button type="button" class="vc-btn" id="vcPlay" aria-label="Play / Pause">
                <i class="fas fa-play" id="vcPlayIcon" aria-hidden="true"></i>
            </button>

            <div class="vc-progress" id="vcProgress" role="slider" aria-label="Seek" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" tabindex="0">
                <div class="vc-progress-buffer" id="vcProgressBuffer"></div>
                <div class="vc-progress-fill" id="vcProgressFill"></div>
                <div class="vc-progress-handle" id="vcProgressHandle"></div>
            </div>

            <span class="vc-time" id="vcTime">0:00 / 0:00</span>

            <button type="button" class="vc-btn" id="vcMute" aria-label="Mute / Unmute">
                <i class="fas fa-volume-mute" id="vcMuteIcon" aria-hidden="true"></i>
            </button>

            <button type="button" class="vc-btn" id="vcFs" aria-label="Toggle fullscreen">
                <i class="fas fa-expand" id="vcFsIcon" aria-hidden="true"></i>
            </button>
        </div>
    </div>
</div>

            </div>
            
            <!-- Text on Right -->
            <div class="hero-content">
                <h1 class="hero-title">
                    Start Repairing Your<br>
                    <span>Credit Score Today</span>
                </h1>
                
                <p class="hero-subtitle">
                    Erase negative marks fast, rebuild your score, and unlock $150K+ in funding opportunities most people only dream about.
                </p>
                
                <div class="hero-features">
                    <div class="feature-item">
                        <span class="feature-check">✓</span>
                        <span>Improve Your Credit Score</span>
                    </div>
                    <div class="feature-item">
                        <span class="feature-check">✓</span>
                        <span>Establish Good Credit</span>
                    </div>
                    <div class="feature-item">
                        <span class="feature-check">✓</span>
                        <span>Avoid Credit Repair Scams</span>
                    </div>
                </div>
<div class="hero-buttons">
  <a href="https://api.leadconnectorhq.com/widget/booking/EzwplJXjhDjj4GFSqiXG" class="btn btn-primary">Schedule Consultation</a>
<a href="#pricing" class="btn btn-secondary">Get Started</a>
</div>
            </div>
        </div>
    </section>
    
    <!-- Pain Points Section - Styled like screenshot -->
    <section class="pain-section" id="problem">
        <div class="pain-container">
            <div class="pain-header">
                <h2 class="pain-title">Does This Sound Like You?</h2>
                <p class="pain-subtitle">These problems end today with our proven system</p>
            </div>
            
            <div class="pain-grid">
                <div class="pain-card">
                    <div class="pain-icon-box">❌</div>
                    <h3 class="pain-card-title">Denied for loans</h3>
                    <p class="pain-description">
                        Banks keep rejecting your applications. Online lenders want crazy interest rates. 
                        Your business dreams are stuck because you can't get funding.
                    </p>
                </div>
                
                <div class="pain-card highlighted">
                    <div class="pain-icon-box">📞</div>
                    <h3 class="pain-card-title">Collections calling</h3>
                    <p class="pain-description">
                        Your phone won't stop ringing with debt collectors. The stress is affecting 
                        your health, relationships, and peace of mind.
                    </p>
                </div>
                
                <div class="pain-card">
                    <div class="pain-icon-box">🚫</div>
                    <h3 class="pain-card-title">Can't qualify</h3>
                    <p class="pain-description">
                        No apartment approvals. Huge car down payments. Credit cards declined. 
                        You feel trapped with no way forward.
                    </p>
                </div>
                
                <div class="pain-card">
                    <div class="pain-icon-box">💔</div>
                    <h3 class="pain-card-title">Missing opportunities</h3>
                    <p class="pain-description">
                        Perfect business deals passing you by. Investment properties going to others. 
                        Bad credit is costing you millions.
                    </p>
                </div>
                
                <div class="pain-card">
                    <div class="pain-icon-box">👨‍👩‍👧</div>
                    <h3 class="pain-card-title">Family suffering</h3>
                    <p class="pain-description">
                        Can't provide like you want. Kids missing out. Spouse stressed about money. 
                        Financial pressure is tearing you apart.
                    </p>
                </div>
                
                <div class="pain-card">
                    <div class="pain-icon-box">😔</div>
                    <h3 class="pain-card-title">Lost confidence</h3>
                    <p class="pain-description">
                        Friends building empires while you're stuck. Too embarrassed to network. 
                        Your self-confidence is destroyed.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing -->
    <section class="pricing-section" id="pricing">
        <div class="pricing-container">
            <div class="pricing-header">
                <span class="pricing-badge">Investment Options</span>
                <h2 class="pricing-title">Choose Your Credit Transformation Plan</h2>
                <p class="pricing-subtitle">Select the investment option that works best for your journey</p>
            </div>

            <div class="pricing-grid">
                <div class="pricing-card">
                    <h3 class="pricing-card-title">Monthly Investment</h3>
                    <div class="pricing-price">$297</div>
                    <p class="pricing-meta">$197 + $100/mo</p>
                    <div class="pricing-divider"></div>
                    <ul class="pricing-features">
                        <li><i class="fas fa-check-circle"></i><span>Full 90-Day Credit Transformation</span></li>
                        <li><i class="fas fa-check-circle"></i><span>Aggressive 3-bureau disputes</span></li>
                        <li><i class="fas fa-check-circle"></i><span>Progress updates every month</span></li>
                        <li><i class="fas fa-check-circle"></i><span>Cancel anytime after 90 days</span></li>
                    </ul>
                    <a href="{{ url('/checkout/monthly') }}" class="pricing-cta">GET STARTED MONTHLY</a>
                </div>

                <div class="pricing-card featured">
                    <span class="pricing-tag">Most Popular</span>
                    <h3 class="pricing-card-title">One-Time Investment</h3>
                    <div class="pricing-price">$497</div>
                    <p class="pricing-meta">Pay once, no recurring fees</p>
                    <div class="pricing-divider"></div>
                    <ul class="pricing-features">
                        <li><i class="fas fa-check-circle"></i><span>Pay once, no recurring fees</span></li>
                        <li><i class="fas fa-check-circle"></i><span>Priority dispute filing</span></li>
                        <li><i class="fas fa-check-circle"></i><span>Fast results in 30–45 days</span></li>
                        <li><i class="fas fa-check-circle"></i><span>Support During Plan</span></li>
                    </ul>
                    <a href="{{ url('/checkout/onetime') }}" class="pricing-cta">PAY ONE TIME</a>
                </div>

                <div class="pricing-card">
                    <h3 class="pricing-card-title">Fast Sweep (Couple Special)</h3>
                    <div class="pricing-price">$900</div>
                    <p class="pricing-meta">For both partners</p>
                    <div class="pricing-divider"></div>
                    <ul class="pricing-features">
                        <li><i class="fas fa-check-circle"></i><span>Program for both partners</span></li>
                        <li><i class="fas fa-check-circle"></i><span>Dual credit restoration setup</span></li>
                        <li><i class="fas fa-check-circle"></i><span>Coordinated 3-bureau attacks</span></li>
                        <li><i class="fas fa-check-circle"></i><span>Shared funding preparation</span></li>
                    </ul>
                    <a href="{{ url('/checkout/couple') }}" class="pricing-cta">START COUPLE PLAN</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Consultation Booking Section -->
    <section class="booking-section">
        <div class="booking-container">
            <h2 class="booking-title">Schedule Your Free Consultation</h2>
            <p class="booking-subtitle">
                Book a time that works for you and let's discuss your credit goals
            </p>
            
            <div class="calendar-wrapper">
                <!-- GoHighLevel Calendar Embed -->
                <iframe src="https://api.leadconnectorhq.com/widget/booking/EzwplJXjhDjj4GFSqiXG" 
                        style="width: 100%; height: 600px; border:none; overflow: hidden;" 
                        scrolling="no" 
                        id="EzwplJXjhDjj4GFSqiXG_1757457924974">
                </iframe>
            </div>
        </div>
    </section>
    
    <!-- About the Founder Section -->
<section class="founder-section" id="about">
    <div class="founder-container">
        <div class="founder-content">
            <!-- Text Content -->
            <div class="founder-text">
                <div class="founder-header">
                    <h2 class="founder-title">Meet Your Credit Expert</h2>
                    <p class="founder-subtitle">
                        The person behind your credit transformation
                    </p>
                </div>
                
                <div class="founder-story">
                    <p class="founder-intro">
Welcome to DreamScore! I’m Taletha, and I founded DreamScore out of a genuine passion for helping people unlock their financial potential. My journey into credit repair and financial consulting began with a simple realization: so many people have dreams that feel out of reach, not because they lack ambition, but because they need a trusted guide to help rebuild their credit and regain financial freedom.
                    </p>
                    
                    <p class="founder-description" style="color: #ffffff;">
I created DreamScore to be that guide. With a background in financial services and a commitment to empowering others, I wanted to create a place where clients feel supported and educated. At DreamScore, we believe in turning credit scores into stepping stones toward your biggest goals, whether that’s owning a home, starting a business, or simply feeling confident in your financial future.
I started this journey because I know that with the right support, everyone can rewrite their financial story. Thank you for letting us be a part of yours.
</p>
                </div>
            </div>
            
            <!-- Image -->
            <div class="founder-image">
                <div class="image-wrapper">
<img src="{{ asset('images/Founder.jpg') }}" alt="Founder Name - Credit Expert" class="founder-photo">
                    <div class="image-badge">
                        <span class="badge-text">Taletha Crow</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    
    <!-- Solution Section -->
    <section class="solution-section" id="process">
        <div class="solution-container">
            <div class="solution-header">
                <h2 class="solution-title">Your Path to Perfect Credit</h2>
                <p style="font-size: 20px; color: var(--text-medium);">
                    Our proven 6-step system transforms your credit in weeks, not years
                </p>
            </div>
            
            <div class="steps-grid">
                <div class="step-card">
                    <div class="step-number">1</div>
                    <h3 class="step-title">Free Consultation</h3>
                    <p class="step-description">
                        We analyze your credit report and create your personalized action plan
                    </p>
                </div>
                
                <div class="step-card">
                    <div class="step-number">2</div>
                    <h3 class="step-title">Dispute Filing</h3>
                    <p class="step-description">
                        Our legal team attacks all three bureaus with proven dispute strategies
                    </p>
                </div>
                
                <div class="step-card">
                    <div class="step-number">3</div>
                    <h3 class="step-title">Item Removal</h3>
                    <p class="step-description">
                        Watch negative items disappear from your report in 30 days or less
                    </p>
                </div>
                
                <div class="step-card">
                    <div class="step-number">4</div>
                    <h3 class="step-title">Score Jump</h3>
                    <p class="step-description">
                        See your score increase 50-200 points as items get removed
                    </p>
                </div>
                
                <div class="step-card">
                    <div class="step-number">5</div>
                    <h3 class="step-title">Funding Access</h3>
                    <p class="step-description">
                        Get approved for $50K-$150K in business funding at low rates
                    </p>
                </div>
                
                <div class="step-card">
                    <div class="step-number">6</div>
                    <h3 class="step-title">Ongoing Support</h3>
                    <p class="step-description">
                        Lifetime guidance to maintain and grow your credit score
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials with Image Placeholders -->
    <section class="testimonials-section" id="testimonials">
        <div class="testimonials-container">
            <div class="testimonials-header">
                <h2 class="testimonials-title">Real People, Real Results</h2>
                <p style="font-size: 20px; color: var(--text-medium);">
                    Join thousands who've transformed their credit with DreamScore
                </p>
            </div>
            
            <div class="testimonials-grid">
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <div class="stars">★★★★★</div>
                        <p class="testimonial-text">
                            "DreamScore removed 17 negative items including a bankruptcy. 
                            My score went from 372 to 719 in just 45 days!"
                        </p>
                        <div class="testimonial-author">Marcus Johnson</div>
                        <div class="testimonial-meta">Real Estate Investor • Houston, TX</div>
                    </div>
                    
                    <!-- Mobile-friendly before/after -->
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
<img src="{{ asset('images/test1.jpg') }}" alt="Client Photo" style="max-width:100%; border-radius:10px;">
                    </div>
                </div>
                
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <div class="stars">★★★★★</div>
                        <p class="testimonial-text">
                            "Collections stopped calling and I got approved for $75K in funding. 
                            My salon is thriving now!"
                        </p>
                        <div class="testimonial-author">Keisha Williams</div>
                        <div class="testimonial-meta">Salon Owner • Atlanta, GA</div>
                    </div>
                    
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
<img src="{{ asset('images/test2.jpg') }}" alt="Client Photo" style="max-width:100%; border-radius:10px;">
                    </div>
                </div>
                
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <div class="stars">★★★★★</div>
                        <p class="testimonial-text">
                            "My divorce destroyed my credit. DreamScore rebuilt everything in 30 days. 
                            Just bought my dream car!"
                        </p>
                        <div class="testimonial-author">Jennifer Martinez</div>
                        <div class="testimonial-meta">Entrepreneur • Los Angeles, CA</div>
                    </div>
                    
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
<img src="{{ asset('images/test3.jpg') }}" alt="Client Photo" style="max-width:100%; border-radius:10px;">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Post-testimonials lead capture (posts to GHL via /leads/cta) -->
    <section class="lead-cta-section" id="lead-cta">
        <div class="lead-cta-container">
            <div class="lead-cta-copy">
                <h2 class="lead-cta-title">Ready to Transform Your Credit?</h2>
                <p class="lead-cta-subtitle">
                    Get a free, no-obligation credit consultation. We'll show you exactly which negative items can come off — and how fast.
                </p>
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

    <style>
    .lead-cta-section {
        background: linear-gradient(135deg, #008eaa 0%, #007899 100%);
        padding: 70px 20px;
        color: #fff;
    }
    .lead-cta-container {
        max-width: 1100px; margin: 0 auto;
        display: grid; grid-template-columns: 1.1fr 1fr; gap: 50px;
        align-items: center;
    }
    .lead-cta-title {
        font-size: 38px; font-weight: 900; line-height: 1.15; margin-bottom: 16px;
    }
    .lead-cta-subtitle {
        font-size: 17px; line-height: 1.6; opacity: .92;
    }
    .lead-cta-form {
        background: #fff; padding: 30px; border-radius: 16px;
        box-shadow: 0 20px 50px rgba(0,0,0,.18);
        display: flex; flex-direction: column; gap: 12px;
    }
    .lead-cta-row { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }
    .lead-cta-input {
        width: 100%; padding: 14px 15px; border: 1.5px solid #e1e5ea;
        border-radius: 10px; font-size: 15px; font-family: inherit; color: #2c3e50;
        transition: border-color .15s ease, box-shadow .15s ease;
    }
    .lead-cta-input:focus {
        outline: none; border-color: #008eaa;
        box-shadow: 0 0 0 3px rgba(0,142,170,.18);
    }
    .lead-cta-submit {
        background: #008eaa; color: #fff; border: none; border-radius: 10px;
        padding: 16px 22px; font-size: 16px; font-weight: 800; cursor: pointer;
        transition: transform .15s ease, background .15s ease; margin-top: 4px;
    }
    .lead-cta-submit:hover:not(:disabled) { background: #007899; transform: translateY(-1px); }
    .lead-cta-submit:disabled { opacity: .6; cursor: not-allowed; transform: none; }
    .lead-cta-msg { font-size: 13px; min-height: 18px; margin: 0; color: #2c3e50; }
    .lead-cta-msg.is-error   { color: #c0392b; }
    .lead-cta-msg.is-success { color: #28a745; font-weight: 700; }
    @media (max-width: 800px) {
        .lead-cta-container { grid-template-columns: 1fr; gap: 30px; }
        .lead-cta-title { font-size: 30px; }
    }
    </style>

<!-- Final CTA -->
<section class="final-cta pro">
  <!-- background fx layers (decorative) -->
  <div class="cta-bg">
    <div class="cta-vignette" aria-hidden="true"></div>
    <div class="cta-stripes" aria-hidden="true"></div>
    <div class="cta-orbits" aria-hidden="true">
      <span style="--d:0s; --x:12%; --y:18%;"></span>
      <span style="--d:.6s; --x:86%; --y:24%;"></span>
      <span style="--d:1.2s; --x:20%; --y:74%;"></span>
      <span style="--d:1.8s; --x:78%; --y:72%;"></span>
      <span style="--d:2.4s; --x:50%; --y:12%;"></span>
    </div>
  </div>

  <div class="final-container">
    <p class="final-eyebrow">Clean your credit in 30 days • Unlock $150K+ funding</p>
    <h2 class="final-title">Ready to Fix Your Credit?</h2>
    <p class="final-subtitle">Every day you wait costs you money. Start your transformation today.</p>

    <div class="final-actions">
      <a href="#pricing" class="final-btn" style="text-decoration:none;">
        <span class="btn-gloss" aria-hidden="true"></span>
        <span class="btn-label">Get Started Now →</span>
      </a>
      <a href="https://api.leadconnectorhq.com/widget/booking/EzwplJXjhDjj4GFSqiXG" class="final-link">Or schedule a free consultation</a>
      <p class="final-trust">No hard pull • Secure & private • Cancel anytime</p>
    </div>

    <div class="final-proof">
     
    </div>
  </div>
</section>

    
    <!-- Footer -->
    <footer>
        <div class="footer-container">
            <div class="footer-grid">
                <!-- Company Column -->
                <div class="footer-column">
<div class="logo">
<a href="https://unlockyourdreamscore.com" aria-label="DreamScore Home">
<img src="{{ asset('images/footerlogo.jpg') }}" alt="DreamScore Logo" style="width:200px;">
</a>
</div>
                    <p class="footer-description">
                        Transform your credit, transform your life. We're committed to helping 
                        you achieve financial freedom through credit repair and business funding.
                    </p>
                </div>
                
                <!-- Contact Column -->
                <div class="footer-column">
                    <h3>Contact</h3>
                    <div class="footer-item">✉️ <a href="mailto:support@unlockyourdreamscore.com" style="color:inherit; text-decoration:none;">support@unlockyourdreamscore.com</a></div>
                    <div class="footer-item">🕒 Mon-Fri 9am-6pm CST</div>
                </div>
                
               <!-- Connect Column -->
<!-- Connect Column -->
<div class="footer-column">
  <h3>Connect</h3>
  <div class="social-icons">
    <a href="https://facebook.com/YourPage" class="social-icon facebook" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
      <i class="fab fa-facebook-f" aria-hidden="true"></i>
    </a>
    <a href="https://youtube.com/@YourChannel" class="social-icon youtube" target="_blank" rel="noopener noreferrer" aria-label="YouTube">
      <i class="fab fa-youtube" aria-hidden="true"></i>
    </a>
    <a href="https://linkedin.com/company/YourCompany" class="social-icon linkedin" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn">
      <i class="fab fa-linkedin-in" aria-hidden="true"></i>
    </a>
    <a href="https://instagram.com/YourHandle" class="social-icon instagram" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
      <i class="fab fa-instagram" aria-hidden="true"></i>
    </a>
    <a href="https://twitter.com/YourHandle" class="social-icon twitter" target="_blank" rel="noopener noreferrer" aria-label="Twitter">
      <i class="fab fa-twitter" aria-hidden="true"></i>
    </a>
  </div>
</div>       
                <!-- Legal Column -->
                <div class="footer-column">
                    <h3>Legal</h3>
                    <div class="footer-item">
                    <a href="{{ route('privacy.policy') }}" class="footer-link">Privacy Policy</a>
                    </div>
                    <div class="footer-item">
                    <a href="{{ route('terms.service') }}" class="footer-link">Terms of Service</a>
                    </div>
                    <div class="footer-item">
                        <a href="{{ route('disclaimer') }}" class="footer-link">Disclaimer</a>
                    </div>
                </div>
            </div>
            
            <div class="footer-bottom">
                © 2025 DreamScore. All Rights Reserved.
            </div>
        </div>
    </footer>
    
 <!-- Simple Form Modal -->
<div class="modal-overlay" id="formModal">
    <div class="modal-content">
        <div class="modal-header">
            <button class="modal-close" onclick="closeFormModal()">×</button>
            <h3 class="modal-title">Get Your Free Consultation</h3>
            <p class="modal-subtitle">Complete this quick form to get started</p>
        </div>
        
        <div class="modal-body">
            <form id="multiStepForm" onsubmit="handleSubmit(event)">
                <h4 style="margin-bottom: 20px;">Your Information</h4>
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
                    <label class="form-label">Suffix (Optional)</label>
                    <input type="text" class="form-input" name="suffix" placeholder="Jr., Sr., III">
                </div>
                <div class="form-group">
                    <label class="form-label">Email Address *</label>
                    <input type="email" class="form-input" name="email" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Phone Number *</label>
                    <input type="tel" class="form-input" name="phone" required>
                </div>
                
                <!-- Submit Button -->
                <div class="form-navigation">
                    <button type="submit" class="form-btn btn-submit" style="display: block; width: 100%;">
                        Fix Your Credit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
    
    <script src="https://link.msgsndr.com/js/form_embed.js" type="text/javascript"></script>
    
    <script>
       
        
        // Radio option selection
        document.querySelectorAll('.radio-option').forEach(option => {
            option.addEventListener('click', function() {
                // Remove selected from all in group
                this.parentElement.querySelectorAll('.radio-option').forEach(opt => {
                    opt.classList.remove('selected');
                });
                // Add selected to clicked
                this.classList.add('selected');
                // Check the radio
                this.querySelector('input[type="radio"]').checked = true;
            });
        });
        
        // Modal functions
        function openFormModal() {
    const modal = document.getElementById('formModal');
    modal.classList.add('active');
    setTimeout(() => {
        modal.classList.add('show');
    }, 10);
    document.body.style.overflow = 'hidden';
}
        
        function closeFormModal() {
            const modal = document.getElementById('formModal');
            modal.classList.remove('show');
            setTimeout(() => {
                modal.classList.remove('active');
                document.body.style.overflow = '';
            }, 300);
        }
        
        // Close modal on overlay click
        document.getElementById('formModal').addEventListener('click', (e) => {
            if (e.target === e.currentTarget) {
                closeFormModal();
            }
        });
        
        // Form submission
        function handleSubmit(event) {
            event.preventDefault();
            
            const formData = new FormData(event.target);
            const data = Object.fromEntries(formData);
            
            console.log('Form submitted:', data);
            
            // TODO: Send to Credit Repair Cloud
            // TODO: Send to GoHighLevel
            
            closeFormModal();
        }
        
        // Navbar scroll effect
        window.addEventListener('scroll', () => {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

 // ─── Hero video player (custom HTML5) ─────────────────────────────
let heroVideoEl = null;

document.addEventListener('DOMContentLoaded', function() {
    initHeroVideo();

    // Mobile nav toggle
    const navToggle   = document.getElementById('navToggle');
    const navCollapse = document.getElementById('navCollapse');
    if (navToggle && navCollapse) {
        const setOpen = (isOpen) => {
            navCollapse.classList.toggle('open', isOpen);
            navToggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
            navToggle.setAttribute('aria-label', isOpen ? 'Close menu' : 'Open menu');
            navToggle.querySelector('i').className = isOpen ? 'fas fa-times' : 'fas fa-bars';
            document.body.style.overflow = isOpen ? 'hidden' : '';
        };

        navToggle.addEventListener('click', () => {
            setOpen(!navCollapse.classList.contains('open'));
        });

        // Close after tapping a menu link
        navCollapse.querySelectorAll('a').forEach(a => {
            a.addEventListener('click', () => setOpen(false));
        });

        // Close on Escape
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && navCollapse.classList.contains('open')) setOpen(false);
        });

        // Close when resizing back to desktop
        window.addEventListener('resize', () => {
            if (window.innerWidth > 960 && navCollapse.classList.contains('open')) setOpen(false);
        });
    }

    // Add scrolled class to navbar after first scroll
    const navbar = document.getElementById('navbar');
    if (navbar) {
        const onScroll = () => {
            if (window.scrollY > 30) navbar.classList.add('scrolled');
            else navbar.classList.remove('scrolled');
        };
        window.addEventListener('scroll', onScroll, { passive: true });
        onScroll();
    }
});

function initHeroVideo() {
    const video     = document.getElementById('heroVideo');
    const container = document.getElementById('videoContainer');
    if (!video || !container) return;
    heroVideoEl = video;

    const elPlay         = document.getElementById('vcPlay');
    const elPlayIcon     = document.getElementById('vcPlayIcon');
    const elProgress     = document.getElementById('vcProgress');
    const elProgressFill = document.getElementById('vcProgressFill');
    const elProgressBuf  = document.getElementById('vcProgressBuffer');
    const elProgressHand = document.getElementById('vcProgressHandle');
    const elTime         = document.getElementById('vcTime');
    const elMute         = document.getElementById('vcMute');
    const elMuteIcon     = document.getElementById('vcMuteIcon');
    const elFs           = document.getElementById('vcFs');
    const elFsIcon       = document.getElementById('vcFsIcon');
    const elCenterPlay   = document.getElementById('videoCenterPlay');
    const elUnmutePill   = document.getElementById('videoUnmutePill');

    const fmt = (s) => {
        if (!isFinite(s) || s < 0) s = 0;
        const m = Math.floor(s / 60);
        const sec = Math.floor(s % 60).toString().padStart(2, '0');
        return `${m}:${sec}`;
    };

    const refreshState = () => {
        container.classList.toggle('is-paused', video.paused);
        container.classList.toggle('is-muted',  video.muted || video.volume === 0);
        elPlayIcon.className = video.paused ? 'fas fa-play' : 'fas fa-pause';
        elMuteIcon.className = (video.muted || video.volume === 0) ? 'fas fa-volume-mute' : 'fas fa-volume-up';
    };

    const togglePlay = () => {
        if (video.paused) {
            video.play().catch(() => {});
        } else {
            video.pause();
        }
    };

    const enableSound = () => {
        video.muted  = false;
        video.volume = 1;
        // If autoplay was blocked, this user gesture also lets us play
        if (video.paused) video.play().catch(() => {});
        refreshState();
    };

    // ── Autoplay: muted always works; try unmuted right away ──────────
    video.muted = true;
    video.play().catch(err => console.warn('Initial autoplay rejected:', err));

    video.addEventListener('loadedmetadata', () => {
        elTime.textContent = `${fmt(video.currentTime)} / ${fmt(video.duration)}`;
        refreshState();
    });

    video.addEventListener('timeupdate', () => {
        const pct = video.duration ? (video.currentTime / video.duration) * 100 : 0;
        elProgressFill.style.width  = pct + '%';
        elProgressHand.style.left   = pct + '%';
        elProgress.setAttribute('aria-valuenow', Math.round(pct));
        elTime.textContent = `${fmt(video.currentTime)} / ${fmt(video.duration)}`;
    });

    video.addEventListener('progress', () => {
        try {
            if (video.buffered.length && video.duration) {
                const end = video.buffered.end(video.buffered.length - 1);
                elProgressBuf.style.width = ((end / video.duration) * 100) + '%';
            }
        } catch (_) {}
    });

    video.addEventListener('play',  refreshState);
    video.addEventListener('pause', refreshState);
    video.addEventListener('volumechange', refreshState);
    video.addEventListener('ended', refreshState);
    video.addEventListener('click', togglePlay); // click on the video itself

    // Buttons
    elPlay.addEventListener('click', togglePlay);
    elCenterPlay.addEventListener('click', togglePlay);
    elMute.addEventListener('click', () => {
        if (video.muted || video.volume === 0) {
            enableSound();
        } else {
            video.muted = true;
            refreshState();
        }
    });
    elUnmutePill.addEventListener('click', enableSound);

    // Fullscreen
    const fsTarget = container; // wrap container so controls show in FS
    const isFullscreen = () => document.fullscreenElement === fsTarget || document.webkitFullscreenElement === fsTarget;
    elFs.addEventListener('click', () => {
        if (isFullscreen()) {
            (document.exitFullscreen || document.webkitExitFullscreen).call(document);
        } else {
            (fsTarget.requestFullscreen || fsTarget.webkitRequestFullscreen).call(fsTarget);
        }
    });
    document.addEventListener('fullscreenchange', () => {
        elFsIcon.className = isFullscreen() ? 'fas fa-compress' : 'fas fa-expand';
    });

    // Seek bar (drag + click)
    let scrubbing = false;
    const seekFromEvent = (e) => {
        const rect = elProgress.getBoundingClientRect();
        const x = (e.touches ? e.touches[0].clientX : e.clientX) - rect.left;
        const ratio = Math.min(1, Math.max(0, x / rect.width));
        if (video.duration) video.currentTime = ratio * video.duration;
    };
    elProgress.addEventListener('mousedown', (e) => {
        scrubbing = true;
        elProgress.classList.add('is-scrubbing');
        seekFromEvent(e);
    });
    document.addEventListener('mousemove', (e) => {
        if (scrubbing) seekFromEvent(e);
    });
    document.addEventListener('mouseup', () => {
        scrubbing = false;
        elProgress.classList.remove('is-scrubbing');
    });
    elProgress.addEventListener('touchstart', (e) => { scrubbing = true; seekFromEvent(e); }, { passive: true });
    elProgress.addEventListener('touchmove',  (e) => { if (scrubbing) seekFromEvent(e); }, { passive: true });
    elProgress.addEventListener('touchend',   () => { scrubbing = false; });

    elProgress.addEventListener('keydown', (e) => {
        if (!video.duration) return;
        if (e.key === 'ArrowRight') video.currentTime = Math.min(video.duration, video.currentTime + 5);
        if (e.key === 'ArrowLeft')  video.currentTime = Math.max(0, video.currentTime - 5);
    });

    // Reveal controls briefly on touch / pointer move; hide after idle
    let hideTimer = null;
    const showControls = () => {
        container.classList.add('show-controls');
        clearTimeout(hideTimer);
        hideTimer = setTimeout(() => container.classList.remove('show-controls'), 2500);
    };
    container.addEventListener('pointermove', showControls);
    container.addEventListener('touchstart', showControls, { passive: true });

    // ── Try to unmute on first user interaction (anywhere on page) ────
    const enableSoundOnFirstInteraction = () => {
        enableSound();
        ['click','touchstart','keydown','scroll'].forEach(ev =>
            window.removeEventListener(ev, enableSoundOnFirstInteraction, { capture: true })
        );
    };
    ['click','touchstart','keydown','scroll'].forEach(ev =>
        window.addEventListener(ev, enableSoundOnFirstInteraction, { capture: true, passive: true })
    );

    refreshState();
}

// Modal helpers retained for other CTAs that still use them
function openFormModal() {
    const modal = document.getElementById('formModal');
    if (!modal) return;
    modal.classList.add('active');
    setTimeout(() => modal.classList.add('show'), 10);
    document.body.style.overflow = 'hidden';
    if (heroVideoEl && !heroVideoEl.paused) heroVideoEl.pause();
}

function closeFormModal() {
    const modal = document.getElementById('formModal');
    if (!modal) return;
    modal.classList.remove('show');
    setTimeout(() => {
        modal.classList.remove('active');
        document.body.style.overflow = '';
    }, 300);
}

const BOOKING_URL = "https://api.leadconnectorhq.com/widget/booking/EzwplJXjhDjj4GFSqiXG";

function handleSubmit(event) {
    event.preventDefault();
    closeFormModal();
    window.open(BOOKING_URL, "_blank");
}

   // IMAGE POPUP FUNCTIONALITY - GUARANTEED TO WORK
document.addEventListener('DOMContentLoaded', function() {
    console.log('Image popup script loaded');
    
    // Remove any existing modal
    const existingModal = document.getElementById('imageModal');
    if (existingModal) {
        existingModal.remove();
    }
    
    // Create modal HTML structure
    const modalHTML = `
        <div id="imageModal" class="image-modal">
            <div class="modal-content">
                <img id="modalImage" class="modal-image" src="" alt="Enlarged view">
            </div>
            <button class="close-button" onclick="closeImageModal()" type="button">&times;</button>
        </div>
    `;
    
    // Add modal to body
    document.body.insertAdjacentHTML('beforeend', modalHTML);
    console.log('Modal created');
    
    // Get modal elements
    const modal = document.getElementById('imageModal');
    const modalImage = document.getElementById('modalImage');
    const closeBtn = document.querySelector('.close-button');
    
    // Add click event to all testimonial images
    const images = document.querySelectorAll('.testimonial-image img');
    console.log('Found images:', images.length);
    
    images.forEach(img => {
        img.addEventListener('click', function() {
            console.log('Image clicked:', this.src);
            openImageModal(this.src, this.alt);
        });
    });
    
    // Add click event to modal background to close
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            closeImageModal();
        }
    });
    
    // Add escape key to close modal
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && modal.classList.contains('show')) {
            closeImageModal();
        }
    });
    
    // Ensure close button is visible
    closeBtn.addEventListener('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        closeImageModal();
    });
});

// Function to open modal
function openImageModal(src, alt) {
    console.log('Opening modal with:', src);
    const modal = document.getElementById('imageModal');
    const modalImage = document.getElementById('modalImage');
    const closeBtn = document.querySelector('.close-button');
    
    modalImage.src = src;
    modalImage.alt = alt;
    modal.classList.add('show');
    document.body.style.overflow = 'hidden';
    
    // Force close button to be visible
    closeBtn.style.display = 'flex';
    closeBtn.style.position = 'fixed';
    closeBtn.style.top = '30px';
    closeBtn.style.right = '30px';
    closeBtn.style.zIndex = '100000';
    
    console.log('Modal opened, close button positioned');
}

// Function to close modal
function closeImageModal() {
    console.log('Closing modal');
    const modal = document.getElementById('imageModal');
    modal.classList.remove('show');
    document.body.style.overflow = 'auto';
}

let creditCurrentStep = 1;
const creditTotalSteps = 5;
let creditAnswers = {};

// Auto-open popup 10 seconds after page load
document.addEventListener('DOMContentLoaded', function() {
    setTimeout(function() {
        openCreditPopup();
    }, 10000);

    initCreditPopup();
});

// Initialize popup
function initCreditPopup() {
    updateCreditProgressBar();
    updateCreditStepIndicators();
    updateCreditNavigation();
}

// Open popup
function openCreditPopup() {
    const popup = document.getElementById('creditAssessmentPopup');
    if (!popup) return;
    
    popup.classList.add('popup-active');
    setTimeout(() => {
        popup.classList.add('popup-show');
    }, 10);
    document.body.style.overflow = 'hidden';
    
    // Reset to step 1
    creditCurrentStep = 1;
    creditAnswers = {};
    showCreditStep(1);
    initCreditPopup();
}

// Close popup
function closeCreditPopup() {
    const popup = document.getElementById('creditAssessmentPopup');
    if (!popup) return;
    
    popup.classList.remove('popup-show');
    setTimeout(() => {
        popup.classList.remove('popup-active');
        document.body.style.overflow = '';
    }, 300);
}

// Show specific step
function showCreditStep(step) {
    // Hide all steps
    document.querySelectorAll('.credit-popup-step').forEach(s => {
        s.classList.remove('step-active');
    });

    // Show current step
    const currentStepEl = document.querySelector(`[data-credit-step="${step}"]`);
    if (currentStepEl) {
        currentStepEl.classList.add('step-active');
    }

    updateCreditProgressBar();
    updateCreditStepIndicators();
    updateCreditNavigation();
}

// Update progress bar
function updateCreditProgressBar() {
    const progressBar = document.getElementById('creditProgressBar');
    if (!progressBar) return;
    
    const progress = (creditCurrentStep / creditTotalSteps) * 100;
    progressBar.style.width = `${progress}%`;
}

// Update step indicators
function updateCreditStepIndicators() {
    document.querySelectorAll('.credit-step-dot').forEach((dot, index) => {
        const step = index + 1;
        dot.classList.remove('dot-active', 'dot-completed');
        
        if (step < creditCurrentStep) {
            dot.classList.add('dot-completed');
        } else if (step === creditCurrentStep) {
            dot.classList.add('dot-active');
        }
    });
}

// Update navigation buttons
function updateCreditNavigation() {
    const backBtn = document.querySelector('.credit-btn-back');
    const nextBtn = document.querySelector('.credit-btn-next');
    const navigation = document.getElementById('creditPopupNavigation');

    if (!backBtn || !nextBtn || !navigation) return;

    // Hide navigation on GHL form step
    if (creditCurrentStep === 5) {
        navigation.style.display = 'none';
        return;
    } else {
        navigation.style.display = 'flex';
    }

    // Back button
    if (creditCurrentStep === 1) {
        backBtn.style.display = 'none';
    } else {
        backBtn.style.display = 'block';
    }

    // Next button
    const hasSelection = document.querySelector(`[data-credit-step="${creditCurrentStep}"] .credit-option-button.option-selected`);
    nextBtn.disabled = !hasSelection;
}

// Next step
function nextCreditStep() {
    const selectedOption = document.querySelector(`[data-credit-step="${creditCurrentStep}"] .credit-option-button.option-selected`);
    
    if (!selectedOption) {
        alert('Please select an option before continuing.');
        return;
    }

    // Store answer
    creditAnswers[`step${creditCurrentStep}`] = selectedOption.dataset.creditValue;
    console.log('Credit answers so far:', creditAnswers);

    if (creditCurrentStep < creditTotalSteps) {
        creditCurrentStep++;
        showCreditStep(creditCurrentStep);
    }
}

// Previous step
function prevCreditStep() {
    if (creditCurrentStep > 1) {
        creditCurrentStep--;
        showCreditStep(creditCurrentStep);
    }
}

// Handle option selection
document.addEventListener('click', function(e) {
    if (e.target.classList.contains('credit-option-button') || e.target.closest('.credit-option-button')) {
        const option = e.target.closest('.credit-option-button');
        const step = option.closest('.credit-popup-step');
        
        if (!step) return;
        
        // Remove selected from all options in this step
        step.querySelectorAll('.credit-option-button').forEach(opt => {
            opt.classList.remove('option-selected');
        });
        
        // Add selected to clicked option
        option.classList.add('option-selected');
        
        // Update navigation
        updateCreditNavigation();
    }
});

// Close popup on overlay click
document.addEventListener('click', function(e) {
    const popup = document.getElementById('creditAssessmentPopup');
    if (e.target === popup) {
        closeCreditPopup();
    }
});

// Close popup on escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        const popup = document.getElementById('creditAssessmentPopup');
        if (popup && popup.classList.contains('popup-show')) {
            closeCreditPopup();
        }
    }
});

// Generic handler for any lead form that POSTs JSON to a Laravel endpoint
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

        const fd = new FormData(form);
        const payload = Object.assign({}, Object.fromEntries(fd.entries()), extraData());

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
                if (msg) {
                    msg.classList.add('is-error');
                    msg.textContent = data.message || 'Something went wrong. Please try again.';
                }
                submitBtn.disabled = false;
                if (btnLabel) btnLabel.hidden = false;
                if (btnSpin)  btnSpin.hidden  = true;
                return;
            }

            if (msg) {
                msg.classList.add('is-success');
                msg.textContent = data.message || 'Thanks — we will be in touch shortly.';
            }
            form.reset();
            if (typeof onSuccess === 'function') onSuccess();
        } catch (err) {
            if (msg) {
                msg.classList.add('is-error');
                msg.textContent = 'Network error. Please try again.';
            }
            submitBtn.disabled = false;
            if (btnLabel) btnLabel.hidden = false;
            if (btnSpin)  btnSpin.hidden  = true;
        }
    });
}

// Popup step-5 form submission → /leads/popup → GHL
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
 data-widget-id="68c33bf986462d48f88a2f88"   > 
 </script>
</body>
</html>