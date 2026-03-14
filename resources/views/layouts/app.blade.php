<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- SEO: FIX - meta description was missing (Lighthouse SEO) --}}
    <title>Sreeram P | Backend Software Engineer — PHP & MySQL</title>
    <meta name="description"
        content="Sreeram P is a Backend Software Engineer with 5+ years experience in PHP, MySQL optimisation, and Laravel. Based in Kochi, Kerala. Open to new opportunities.">
    <meta name="robots" content="index, follow">

    {{-- Open Graph --}}
    <meta property="og:title" content="Sreeram P | Backend Software Engineer">
    <meta property="og:description"
        content="5+ years building data-heavy PHP systems. SQL optimisation specialist. Based in Kochi.">
    <meta property="og:type" content="website">

    {{-- Favicons --}}
    <link rel="icon" href="{{ asset('images/favicons/favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicons/favicon-16x16.png') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- FIX: preload fonts to reduce LCP. Use display=swap for font-display --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" as="style"
        href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;600;700&family=Syne:wght@700;800&display=swap">
    <link
        href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;600;700&family=Syne:wght@700;800&display=swap"
        rel="stylesheet" media="print" onload="this.media='all'">
    <noscript>
        <link
            href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;600;700&family=Syne:wght@700;800&display=swap"
            rel="stylesheet">
    </noscript>

    {{-- FIX: preload GSAP so it doesn't block scroll animations --}}
    <link rel="preload" as="script" href="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js">
    <link rel="preload" as="script" href="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js">

    {{-- Theme: IIFE runs sync before paint — prevents dark mode flash --}}
    <script>
        (function () {
            var s = localStorage.getItem('theme');
            var d = window.matchMedia('(prefers-color-scheme: dark)').matches;
            if (s === 'dark' || (!s && d)) { document.documentElement.classList.add('dark'); }
            else { document.documentElement.classList.remove('dark'); }
        })();
    </script>

    <style>
        /* Display font */
        .font-display {
            font-family: 'Syne', sans-serif;
        }

        /* Grain overlay */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            pointer-events: none;
            z-index: 998;
            opacity: 0.3;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
        }

        /* Nav underline */
        .nav-link {
            position: relative;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 1px;
            background: #10b981;
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        /* Pulse orb */
        @keyframes pulse-slow {

            0%,
            100% {
                opacity: 0.5;
                transform: scale(1);
            }

            50% {
                opacity: 0.9;
                transform: scale(1.07);
            }
        }

        .animate-pulse-slow {
            animation: pulse-slow 7s ease-in-out infinite;
        }

        /* Badge ping */
        @keyframes ping-slow {

            0%,
            100% {
                transform: scale(1);
                opacity: 1;
            }

            50% {
                transform: scale(1.8);
                opacity: 0;
            }
        }

        .animate-ping-slow {
            animation: ping-slow 2.2s ease-in-out infinite;
        }

        /* Ticker scroll (inspiration: horizontal scrolling text) */
        @keyframes ticker {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        .ticker-track {
            animation: ticker 22s linear infinite;
        }

        .ticker-track:hover {
            animation-play-state: paused;
        }

        /* Mobile menu slide */
        #mobile-menu {
            max-height: 0;
            opacity: 0;
            overflow: hidden;
            transition: max-height 0.3s ease, opacity 0.25s ease;
        }

        #mobile-menu.open {
            max-height: 320px;
            opacity: 1;
        }

        /* Cursor dot (inspiration: custom cursor) */
        #cursor-dot {
            position: fixed;
            width: 8px;
            height: 8px;
            background: #10b981;
            border-radius: 50%;
            pointer-events: none;
            z-index: 9999;
            transition: transform 0.12s ease, opacity 0.2s ease;
            transform: translate(-50%, -50%);
        }

        #cursor-ring {
            position: fixed;
            width: 32px;
            height: 32px;
            border: 1.5px solid rgba(16, 185, 129, 0.5);
            border-radius: 50%;
            pointer-events: none;
            z-index: 9998;
            transition: transform 0.18s ease, width 0.2s ease, height 0.2s ease, opacity 0.2s ease;
            transform: translate(-50%, -50%);
        }

        body:hover #cursor-dot,
        body:hover #cursor-ring {
            opacity: 1;
        }

        /* FIX: ensure text-zinc-500 on dark bg passes 4.5:1 — use zinc-400 */
        .text-muted {
            color: #a1a1aa;
        }

        /* zinc-400 — passes 4.5:1 on #09090b */

        /* FIX: emerald CTA button — white text on #10b981 fails 4.5:1.
           Use darker emerald-700 bg or darken text. We use emerald-600 which passes. */
        .btn-primary {
            background-color: #059669;
            /* emerald-600 */
            color: #ffffff;
        }

        .btn-primary:hover {
            background-color: #047857;
        }

        /* emerald-700 */

        /* Active nav highlight */
        .nav-link.active {
            color: #10b981;
        }

        .nav-link.active::after {
            width: 100%;
        }
    </style>

    @stack('head')
</head>

<body class="bg-zinc-50 dark:bg-[#09090b] text-zinc-900 dark:text-zinc-50
             font-sans transition-colors duration-500 ease-in-out overflow-x-hidden">

    {{-- Custom cursor (hidden on touch devices via JS) --}}
    <div id="cursor-dot" style="opacity:0"></div>
    <div id="cursor-ring" style="opacity:0"></div>

    {{-- ══════ NAV ══════ --}}
    <nav role="navigation" aria-label="Main navigation" class="fixed top-0 w-full z-50 bg-white/80 dark:bg-[#09090b]/80
                backdrop-blur-md border-b border-zinc-200 dark:border-zinc-800">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 h-16 flex items-center justify-between">

            <a href="/" aria-label="Sreeram P — home" class="font-display font-extrabold text-base sm:text-lg tracking-tighter
                      hover:text-emerald-500 transition-colors">
                SREERAM P
            </a>

            <div class="flex items-center gap-4 sm:gap-8">
                {{-- Desktop links --}}
                <div class="hidden sm:flex gap-8 text-sm font-medium text-zinc-500 dark:text-zinc-400">
                    <a href="#hero"
                        class="nav-link hover:text-zinc-900 dark:hover:text-zinc-100 transition-colors">Home</a>
                    <a href="#about"
                        class="nav-link hover:text-zinc-900 dark:hover:text-zinc-100 transition-colors">About</a>
                    <a href="#skills"
                        class="nav-link hover:text-zinc-900 dark:hover:text-zinc-100 transition-colors">Skills</a>
                    <a href="#experience"
                        class="nav-link hover:text-zinc-900 dark:hover:text-zinc-100 transition-colors">Experience</a>
                    <a href="#projects"
                        class="nav-link hover:text-zinc-900 dark:hover:text-zinc-100 transition-colors">Projects</a>
                </div>

                {{-- Theme toggle --}}
                <button id="theme-toggle" aria-label="Toggle dark and light mode" class="p-2 rounded-lg bg-zinc-100 dark:bg-zinc-800
                           hover:ring-2 ring-emerald-500 transition-all duration-200">
                    <svg id="icon-sun" class="w-5 h-5 text-yellow-400 hidden" fill="currentColor" viewBox="0 0 20 20"
                        aria-hidden="true">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" />
                    </svg>
                    <svg id="icon-moon" class="w-5 h-5 text-zinc-500 hidden" fill="currentColor" viewBox="0 0 20 20"
                        aria-hidden="true">
                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z" />
                    </svg>
                </button>

                {{-- Hamburger --}}
                <button id="mobile-menu-btn" aria-label="Open navigation menu" aria-expanded="false"
                    aria-controls="mobile-menu" class="sm:hidden p-2 rounded-lg bg-zinc-100 dark:bg-zinc-800
                           hover:ring-2 ring-emerald-500 transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>

        {{-- Mobile menu --}}
        <div id="mobile-menu" role="menu" class="sm:hidden border-t border-zinc-200 dark:border-zinc-800
                    bg-white/95 dark:bg-[#09090b]/95 backdrop-blur-md">
            <nav class="max-w-6xl mx-auto px-6 py-4 flex flex-col gap-4
                        text-sm font-semibold text-zinc-600 dark:text-zinc-300">
                <a href="#hero" role="menuitem" class="hover:text-emerald-500 transition-colors py-1"
                    onclick="closeMobileMenu()">Home</a>
                <a href="#about" role="menuitem" class="hover:text-emerald-500 transition-colors py-1"
                    onclick="closeMobileMenu()">About</a>
                <a href="#skills" role="menuitem" class="hover:text-emerald-500 transition-colors py-1"
                    onclick="closeMobileMenu()">Skills</a>
                <a href="#experience" role="menuitem" class="hover:text-emerald-500 transition-colors py-1"
                    onclick="closeMobileMenu()">Experience</a>
                <a href="#projects" role="menuitem" class="hover:text-emerald-500 transition-colors py-1"
                    onclick="closeMobileMenu()">Projects</a>
            </nav>
        </div>
    </nav>

    {{-- ══════ MAIN ══════ --}}
    <main id="main-content" class="pt-24 sm:pt-32">
        @yield('content')
    </main>

    {{-- ══════ TICKER STRIP (inspiration: scrolling text band) ══════ --}}
    <div class="border-t border-b border-zinc-200 dark:border-zinc-800 overflow-hidden py-3 my-0 bg-white dark:bg-zinc-950"
        aria-hidden="true">
        <div
            class="ticker-track flex gap-12 whitespace-nowrap text-xs font-bold uppercase tracking-widest text-zinc-400 dark:text-zinc-600 w-max">
            @foreach(array_fill(0, 2, ['PHP 8.3', '⬡', 'MySQL Optimisation', '⬡', 'Laravel', '⬡', 'Backend Engineering', '⬡', 'SQL Performance', '⬡', 'MVC Architecture', '⬡', 'REST APIs', '⬡', 'Kochi · India', '⬡']) as $items)
                @foreach($items as $item)
                    <span>{{ $item }}</span>
                @endforeach
            @endforeach
        </div>
    </div>

    <footer role="contentinfo" class="border-t border-zinc-200 dark:border-zinc-800 py-10 mt-8">
        <div class="max-w-6xl mx-auto px-6 flex flex-col sm:flex-row items-center
                    justify-between gap-4 text-sm">
            <span class="font-display font-bold tracking-tighter text-zinc-400">SREERAM P</span>
            <span class="text-muted">Built with Laravel &amp; Tailwind CSS</span>
            <a href="mailto:itssreeramp@gmail.com" class="text-muted hover:text-emerald-500 transition-colors">
                itssreeramp&#64;gmail.com
            </a>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var btn = document.getElementById('theme-toggle');
            var iconSun = document.getElementById('icon-sun');
            var iconMoon = document.getElementById('icon-moon');

            function syncIcons() {
                var dark = document.documentElement.classList.contains('dark');
                iconSun.classList.toggle('hidden', !dark);
                iconMoon.classList.toggle('hidden', dark);
            }
            syncIcons();
            btn.addEventListener('click', function () {
                document.documentElement.classList.toggle('dark');
                var dark = document.documentElement.classList.contains('dark');
                localStorage.setItem('theme', dark ? 'dark' : 'light');
                syncIcons();
            });

            // ── Mobile menu ───────────────────────────────
            var mBtn = document.getElementById('mobile-menu-btn');
            var mMenu = document.getElementById('mobile-menu');
            mBtn.addEventListener('click', function () {
                var open = mMenu.classList.toggle('open');
                mBtn.setAttribute('aria-expanded', open);
            });

            // ── Custom cursor (desktop only) ──────────────
            var dot = document.getElementById('cursor-dot');
            var ring = document.getElementById('cursor-ring');
            if (window.matchMedia('(pointer: fine)').matches) {
                var mx = 0, my = 0, rx = 0, ry = 0;
                document.addEventListener('mousemove', function (e) {
                    mx = e.clientX; my = e.clientY;
                    dot.style.left = mx + 'px';
                    dot.style.top = my + 'px';
                    dot.style.opacity = '1';
                    ring.style.opacity = '1';
                });
                // Ring lags behind slightly for feel
                (function lerpRing() {
                    rx += (mx - rx) * 0.15;
                    ry += (my - ry) * 0.15;
                    ring.style.left = rx + 'px';
                    ring.style.top = ry + 'px';
                    requestAnimationFrame(lerpRing);
                })();
                // Grow ring on hover over interactive elements
                document.querySelectorAll('a, button').forEach(function (el) {
                    el.addEventListener('mouseenter', function () {
                        ring.style.width = '48px';
                        ring.style.height = '48px';
                        ring.style.borderColor = 'rgba(16,185,129,0.8)';
                        dot.style.transform = 'translate(-50%,-50%) scale(1.5)';
                    });
                    el.addEventListener('mouseleave', function () {
                        ring.style.width = '32px';
                        ring.style.height = '32px';
                        ring.style.borderColor = 'rgba(16,185,129,0.5)';
                        dot.style.transform = 'translate(-50%,-50%) scale(1)';
                    });
                });
            }

            // ── Active nav highlight on scroll ───────────
            var sections = document.querySelectorAll('section[id]');
            var navLinks = document.querySelectorAll('.nav-link');
            var obs = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        navLinks.forEach(function (l) { l.classList.remove('active'); });
                        var active = document.querySelector('.nav-link[href="#' + entry.target.id + '"]');
                        if (active) active.classList.add('active');
                    }
                });
            }, { threshold: 0.4 });
            sections.forEach(function (s) { obs.observe(s); });
        });

        function closeMobileMenu() {
            var m = document.getElementById('mobile-menu');
            var b = document.getElementById('mobile-menu-btn');
            m.classList.remove('open');
            b.setAttribute('aria-expanded', 'false');
        }
    </script>

    @stack('scripts')

</body>

</html>
