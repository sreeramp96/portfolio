@extends('layouts.app')

@php
    $hero = config('portfolio.hero');
    $about = config('portfolio.about');
    $skills = config('portfolio.skills');
    $experience = config('portfolio.experience');
    $projects = config('portfolio.projects');
    $social = config('portfolio.social');
@endphp

@section('content')

    {{-- ══════ HERO ══════ --}}
    <section id="hero" aria-label="Introduction" class="relative max-w-6xl mx-auto px-6 pb-16 sm:pb-28 overflow-hidden">

        <div class="pointer-events-none absolute -top-40 -right-40 w-[600px] h-[600px]
                    rounded-full bg-emerald-500/10 blur-[90px] animate-pulse-slow" aria-hidden="true"></div>

        <div class="relative max-w-4xl">

            {{-- Available badge --}}
            @if($social['available'])
                <div class="gs-hero-badge inline-flex items-center gap-2 mb-6 px-3 py-1.5 rounded-full
                            border border-emerald-500/30 bg-emerald-500/8 text-emerald-500
                            text-xs font-bold uppercase tracking-widest">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-ping-slow" aria-hidden="true"></span>
                    Open to opportunities
                </div>
            @endif

            <p class="gs-hero-role font-display text-emerald-600 dark:text-emerald-500 mb-4
                      text-xs sm:text-sm tracking-[0.2em] uppercase font-bold">
                {{ $hero['role'] }}
            </p>

            <h1 class="gs-hero-h1 font-display text-4xl sm:text-6xl md:text-7xl font-extrabold
                       tracking-tight mb-8 leading-[1.08] text-zinc-900 dark:text-zinc-50">
                {!! $hero['tagline'] !!}
            </h1>

            <p class="gs-hero-bio text-base sm:text-xl text-zinc-600 dark:text-zinc-400
                      mb-10 leading-relaxed max-w-2xl">
                {{ $hero['bio'] }}
            </p>

            <div class="gs-hero-cta flex flex-col sm:flex-row gap-4">
                <a href="{{ $hero['cta_primary']['href'] }}" class="w-full sm:w-auto text-center px-8 py-4 bg-zinc-900 dark:bg-zinc-50
                          text-white dark:text-zinc-950 font-bold rounded-xl
                          hover:bg-emerald-700 dark:hover:bg-emerald-600
                          transition-all duration-300 hover:scale-[1.02]
                          hover:shadow-lg hover:shadow-emerald-500/20">
                    {{ $hero['cta_primary']['label'] }}
                </a>
                <a href="{{ $hero['resume_url'] }}" download class="w-full sm:w-auto text-center px-8 py-4
                          border border-zinc-300 dark:border-zinc-700 font-bold rounded-xl
                          hover:border-emerald-500 hover:text-emerald-600 dark:hover:text-emerald-400
                          transition-all duration-300 group">
                    <span class="inline-flex items-center justify-center gap-2">
                        Download Resume
                        <svg class="w-4 h-4 group-hover:translate-y-0.5 transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                        </svg>
                    </span>
                </a>
                <a href="mailto:{{ $social['email'] }}" class="w-full sm:w-auto text-center px-8 py-4
                          border border-zinc-300 dark:border-zinc-700 font-bold rounded-xl
                          hover:bg-zinc-100 dark:hover:bg-zinc-900 transition-all duration-300">
                    {{ $hero['cta_secondary']['label'] }}
                </a>
            </div>

            {{-- Stats row --}}
            {{-- FIX: text-muted (zinc-400) replaces text-zinc-500 — fixes contrast failure --}}
            <div class="gs-hero-stats flex flex-wrap gap-8 mt-14 pt-10
                        border-t border-zinc-200 dark:border-zinc-800">
                @foreach($hero['stats'] as $stat)
                    <div>
                        <div class="font-display text-2xl font-extrabold text-zinc-900 dark:text-zinc-50">
                            {{ $stat['value'] }}
                        </div>
                        <div class="text-xs text-muted mt-0.5 tracking-wide">{{ $stat['label'] }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    {{-- ══════ ABOUT ══════ --}}
    <section id="about" aria-labelledby="about-heading" class="gs-section max-w-6xl mx-auto px-6 py-16 sm:py-24
                    border-t border-zinc-200 dark:border-zinc-900">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-start">

            <div>
                <p class="font-display text-xs tracking-[0.2em] uppercase text-emerald-500 font-bold mb-3"
                    aria-hidden="true">About</p>
                <h2 id="about-heading" class="font-display text-3xl sm:text-4xl font-extrabold mb-8 leading-tight">
                    {!! nl2br(e($about['heading'])) !!}
                </h2>
                <div class="space-y-4 text-zinc-600 dark:text-zinc-400 leading-relaxed">
                    @foreach($about['bio'] as $para)
                        <p>{{ $para }}</p>
                    @endforeach
                </div>
                <div class="mt-8 flex flex-wrap gap-5">
                    @foreach($about['links'] as $link)
                        <a href="{{ $link['href'] }}" @if($link['external']) target="_blank" rel="noopener noreferrer" @endif
                            class="inline-flex items-center gap-1.5 text-sm font-bold
                                  text-emerald-600 dark:text-emerald-500
                                  hover:text-emerald-700 dark:hover:text-emerald-400
                                  transition-colors group">
                            {{ $link['label'] }}
                            <span class="group-hover:translate-x-1 transition-transform" aria-hidden="true">→</span>
                        </a>
                    @endforeach
                </div>
            </div>

            {{-- Highlight cards --}}
            <div class="grid grid-cols-2 gap-4">
                @foreach($about['highlights'] as $card)
                    <div class="gs-card bg-white dark:bg-zinc-900
                                border border-zinc-200 dark:border-zinc-800 rounded-2xl p-5
                                hover:border-emerald-500/40 transition-all duration-300
                                hover:-translate-y-1 hover:shadow-lg hover:shadow-emerald-500/5">
                        <div class="text-2xl mb-3" aria-hidden="true">{{ $card['icon'] }}</div>
                        <div class="font-display font-bold text-sm mb-2 text-zinc-900 dark:text-zinc-100">
                            {{ $card['title'] }}
                        </div>
                        <div class="text-xs text-zinc-500 dark:text-zinc-400 leading-relaxed">
                            {{ $card['desc'] }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    {{-- ══════ SKILLS ══════ --}}
    <section id="skills" aria-labelledby="skills-heading" class="gs-section max-w-6xl mx-auto px-6 py-16 sm:py-24
                    border-t border-zinc-200 dark:border-zinc-900">

        <p class="font-display text-xs tracking-[0.2em] uppercase text-emerald-500 font-bold mb-3" aria-hidden="true">Skills
        </p>
        <h2 id="skills-heading" class="font-display text-3xl sm:text-4xl font-extrabold mb-12">
            Technical toolkit.
        </h2>

        {{-- Skill bars --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-x-16 gap-y-5 mb-14" role="list"
            aria-label="Skill proficiency levels">
            @foreach($skills['bars'] as $skill)
                <div class="skill-item" role="listitem">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-sm font-semibold text-zinc-700 dark:text-zinc-300">
                            {{ $skill['name'] }}
                        </span>
                        <span class="text-xs font-bold text-emerald-600 dark:text-emerald-400 tabular-nums skill-pct"
                            aria-label="{{ $skill['level'] }} percent">0%</span>
                    </div>
                    <div class="h-1.5 bg-zinc-200 dark:bg-zinc-800 rounded-full overflow-hidden" role="progressbar"
                        aria-valuenow="{{ $skill['level'] }}" aria-valuemin="0" aria-valuemax="100"
                        aria-label="{{ $skill['name'] }} proficiency">
                        <div class="skill-bar h-full rounded-full w-0
                                    bg-gradient-to-r from-emerald-600 to-emerald-400" data-width="{{ $skill['level'] }}"></div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Tool badges --}}
        <div class="mb-10">
            {{-- FIX: text-zinc-400 (text-muted) instead of text-zinc-500 --}}
            <p class="text-xs uppercase tracking-widest text-muted font-bold mb-4">Also worked with</p>
            <div class="flex flex-wrap gap-2" role="list" aria-label="Other tools and technologies">
                @foreach($skills['tools'] as $tool)
                    <span role="listitem" class="text-xs font-mono px-3 py-1.5
                                 bg-zinc-100 dark:bg-zinc-900
                                 border border-zinc-200 dark:border-zinc-800
                                 text-zinc-600 dark:text-zinc-400 rounded-lg
                                 hover:border-emerald-500/50 hover:text-emerald-600 dark:hover:text-emerald-400
                                 transition-all duration-200 cursor-default">
                        {{ $tool }}
                    </span>
                @endforeach
            </div>
        </div>

        {{-- Currently learning --}}
        <div class="bg-zinc-100 dark:bg-zinc-900/60
                    border border-zinc-200 dark:border-zinc-800 rounded-2xl px-6 py-5">
            {{-- FIX: text-muted replaces text-zinc-500 --}}
            <p class="text-xs uppercase tracking-widest text-muted font-bold mb-4">Currently levelling up</p>
            <div class="flex flex-wrap gap-3">
                @foreach($skills['learning'] as $item)
                    <span class="inline-flex items-center gap-2 text-sm font-semibold px-4 py-2
                                 bg-white dark:bg-zinc-800
                                 border border-zinc-200 dark:border-zinc-700 rounded-xl
                                 text-zinc-700 dark:text-zinc-300
                                 hover:border-emerald-500/50 transition-colors">
                        <span aria-hidden="true">{{ $item['icon'] }}</span> {{ $item['name'] }}
                    </span>
                @endforeach
            </div>
        </div>
    </section>


    {{-- ══════ EXPERIENCE ══════ --}}
    <section id="experience" aria-labelledby="experience-heading" class="gs-section max-w-6xl mx-auto px-6 py-16 sm:py-24
                    border-t border-zinc-200 dark:border-zinc-900">

        <p class="font-display text-xs tracking-[0.2em] uppercase text-emerald-500 font-bold mb-3" aria-hidden="true">
            Experience</p>
        <h2 id="experience-heading" class="font-display text-3xl sm:text-4xl font-extrabold mb-12">
            Where I've worked.
        </h2>

        <div class="space-y-6">
            @foreach($experience as $job)
                <article class="gs-card group bg-white dark:bg-[#111113]
                                border border-zinc-200 dark:border-zinc-800 rounded-2xl p-7 sm:p-9
                                hover:border-emerald-500/30 transition-all duration-300
                                hover:shadow-xl hover:shadow-emerald-500/5">

                    <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-2 mb-1">
                        <h3 class="font-display text-xl font-bold
                                   group-hover:text-emerald-600 dark:group-hover:text-emerald-400
                                   transition-colors">
                            {{ $job['title'] }}
                        </h3>
                        <time class="text-xs font-mono text-muted whitespace-nowrap pt-1" datetime="{{ $job['period'] }}">
                            {{ $job['period'] }}
                        </time>
                    </div>

                    <p class="text-sm text-muted font-bold uppercase tracking-widest mb-4">
                        {{ $job['company'] }} · {{ $job['location'] }}
                    </p>

                    <div class="flex flex-wrap gap-2 mb-5" role="list" aria-label="Technologies used">
                        @foreach($job['tags'] as $tag)
                            <span role="listitem" class="text-[10px] font-display font-bold uppercase tracking-widest
                                         text-emerald-600 dark:text-emerald-500 bg-emerald-500/8
                                         px-2.5 py-1 rounded-md border border-emerald-500/15">
                                {{ $tag }}
                            </span>
                        @endforeach
                    </div>

                    <p class="text-zinc-600 dark:text-zinc-400 leading-relaxed text-sm mb-5">
                        {{ $job['description'] }}
                    </p>

                    <ul class="space-y-2.5">
                        @foreach($job['bullets'] as $b)
                            <li class="flex gap-3 text-sm text-zinc-700 dark:text-zinc-300 leading-relaxed">
                                <span class="text-emerald-500 mt-0.5 shrink-0" aria-hidden="true">▸</span>
                                <span>{{ $b }}</span>
                            </li>
                        @endforeach
                    </ul>
                </article>
            @endforeach
        </div>
    </section>


    {{-- ══════ PROJECTS ══════ --}}
    <section id="projects" aria-labelledby="projects-heading" class="gs-section max-w-6xl mx-auto px-6 py-16 sm:py-24
                    border-t border-zinc-200 dark:border-zinc-900">

        <p class="font-display text-xs tracking-[0.2em] uppercase text-emerald-500 font-bold mb-3" aria-hidden="true">
            Projects</p>
        <h2 id="projects-heading" class="font-display text-3xl sm:text-4xl font-extrabold mb-12">
            Things I've built.
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($projects as $project)
                <article class="gs-card group relative bg-white dark:bg-[#111113]
                                border border-zinc-200 dark:border-zinc-800 p-7 rounded-2xl
                                hover:-translate-y-2 transform-gpu transition-all duration-300 ease-out
                                hover:shadow-xl hover:shadow-emerald-500/8 hover:border-emerald-500/30">

                    <div class="absolute top-0 left-8 right-8 h-px
                                bg-gradient-to-r from-transparent via-emerald-500 to-transparent
                                opacity-0 group-hover:opacity-100 transition-opacity duration-300" aria-hidden="true"></div>

                    @if(isset($project['private']) && $project['private'])
                        <span class="absolute top-4 right-4 text-[9px] font-bold uppercase tracking-widest
                                     text-muted border border-zinc-700 px-2 py-0.5 rounded-full">
                            Private
                        </span>
                    @endif

                    <div class="flex flex-wrap gap-2 mb-5" role="list" aria-label="Project technologies">
                        @foreach($project['tags'] as $tag)
                            <span role="listitem" class="text-[10px] font-display font-bold uppercase tracking-widest
                                         text-emerald-600 dark:text-emerald-500 bg-emerald-500/8
                                         px-2.5 py-1 rounded-md border border-emerald-500/15">
                                {{ $tag }}
                            </span>
                        @endforeach
                    </div>

                    <h3 class="font-display text-xl font-bold mb-1.5
                               group-hover:text-emerald-600 dark:group-hover:text-emerald-400
                               transition-colors leading-snug">
                        {{ $project['title'] }}
                    </h3>

                    <p class="text-muted text-xs mb-4 font-bold uppercase tracking-widest">
                        {{ $project['company'] }}
                        @if(isset($project['period'])) · {{ $project['period'] }} @endif
                    </p>

                    <p class="text-zinc-600 dark:text-zinc-400 leading-relaxed text-sm mb-6">
                        {{ $project['description'] }}
                    </p>

                    @if(isset($project['private']) && $project['private'])
                        <span class="text-xs font-bold text-muted uppercase tracking-widest">
                            <span aria-hidden="true">🔒</span> Proprietary codebase
                        </span>
                    @else
                        <a href="{{ $project['link'] }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 text-sm font-bold
                                  text-zinc-500 dark:text-zinc-400
                                  hover:text-emerald-600 dark:hover:text-emerald-400
                                  transition-all group/link">
                            View Project
                            <span class="group-hover/link:translate-x-1 transition-transform
                                         text-emerald-500" aria-hidden="true">→</span>
                        </a>
                    @endif
                </article>
            @endforeach
        </div>
    </section>


    {{-- ══════ CTA ══════ --}}
    <section aria-label="Contact call to action" class="gs-section max-w-6xl mx-auto px-6 py-20 sm:py-28">
        <div class="relative bg-zinc-900 dark:bg-zinc-950 border border-zinc-800
                    rounded-3xl px-8 sm:px-16 py-14 sm:py-20 text-center overflow-hidden">
            <div class="absolute inset-0 flex items-center justify-center pointer-events-none" aria-hidden="true">
                <div class="w-[500px] h-[500px] rounded-full bg-emerald-500/10
                            blur-[80px] animate-pulse-slow"></div>
            </div>
            <p class="relative font-display text-xs tracking-[0.2em] uppercase
                      text-emerald-400 font-bold mb-3">
                Available for hire
            </p>
            <h2 class="relative font-display text-3xl sm:text-5xl font-extrabold text-white mb-4">
                Open to new opportunities.
            </h2>
            <p class="relative text-zinc-400 mb-8 max-w-md mx-auto leading-relaxed">
                Looking for a backend engineer who cares about performance, clean architecture,
                and actually shipping? Let's talk.
            </p>
            <div class="relative flex flex-col sm:flex-row gap-4 justify-center">
                {{-- FIX: btn-primary uses emerald-600 (#059669) which passes 4.5:1 contrast --}}
                <a href="mailto:{{ $social['email'] }}" class="btn-primary inline-flex items-center justify-center gap-2
                          px-8 py-4 font-bold rounded-xl transition-all duration-300
                          hover:scale-[1.03] hover:shadow-xl hover:shadow-emerald-700/25">
                    Send me an email →
                </a>
                <a href="{{ $social['linkedin'] }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center gap-2 px-8 py-4
                          border border-zinc-700 text-zinc-300
                          hover:border-emerald-500/50 hover:text-emerald-400
                          font-bold rounded-xl transition-all duration-300">
                    LinkedIn Profile →
                </a>
            </div>
        </div>
    </section>

@endsection


@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollToPlugin.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            gsap.registerPlugin(ScrollTrigger, ScrollToPlugin);

            // ── Hero entrance ────────────────────────────────
            gsap.timeline({ defaults: { ease: 'power3.out' } })
                .from('.gs-hero-badge', { opacity: 0, y: 16, duration: 0.5 })
                .from('.gs-hero-role', { opacity: 0, y: 20, duration: 0.5 }, '-=0.3')
                .from('.gs-hero-h1', { opacity: 0, y: 32, duration: 0.7 }, '-=0.35')
                .from('.gs-hero-bio', { opacity: 0, y: 20, duration: 0.55 }, '-=0.4')
                .from('.gs-hero-cta', { opacity: 0, y: 20, duration: 0.5 }, '-=0.35')
                .from('.gs-hero-stats > div', { opacity: 0, y: 16, duration: 0.45, stagger: 0.08 }, '-=0.3');

            // ── Sections: Y only (no opacity — prevents child conflicts) ──
            gsap.utils.toArray('.gs-section').forEach(function (section) {
                gsap.from(section, {
                    scrollTrigger: { trigger: section, start: 'top 90%', toggleActions: 'play none none none' },
                    y: 36, duration: 0.7, ease: 'power2.out'
                });
            });

            // ── Cards: opacity+Y stagger, triggered on first card ──
            gsap.utils.toArray('.gs-section').forEach(function (section) {
                var cards = section.querySelectorAll('.gs-card');
                if (!cards.length) return;
                gsap.set(cards, { opacity: 0, y: 28 });
                ScrollTrigger.create({
                    trigger: cards[0],
                    start: 'top 88%',
                    once: true,
                    onEnter: function () {
                        gsap.to(cards, { opacity: 1, y: 0, duration: 0.6, stagger: 0.1, ease: 'power2.out' });
                    }
                });
            });

            // ── Section headings ────────────────────────────
            gsap.utils.toArray('.gs-section').forEach(function (section) {
                var h2 = section.querySelector('h2');
                var label = section.querySelector('p[aria-hidden]');
                if (!h2) return;
                var els = [label, h2].filter(Boolean);
                gsap.set(els, { opacity: 0, y: 20 });
                ScrollTrigger.create({
                    trigger: h2,
                    start: 'top 90%',
                    once: true,
                    onEnter: function () {
                        gsap.to(els, { opacity: 1, y: 0, duration: 0.6, stagger: 0.1, ease: 'power2.out' });
                    }
                });
            });

            // ── Skill bars count-up ─────────────────────────
            ScrollTrigger.create({
                trigger: '#skills',
                start: 'top 78%',
                once: true,
                onEnter: function () {
                    document.querySelectorAll('.skill-bar').forEach(function (bar, i) {
                        var target = parseFloat(bar.dataset.width);
                        var pct = bar.closest('.skill-item') && bar.closest('.skill-item').querySelector('.skill-pct');
                        gsap.to(bar, { width: target + '%', duration: 1.1, delay: i * 0.07, ease: 'power2.out' });
                        var counter = { val: 0 };
                        gsap.to(counter, {
                            val: target, duration: 1.1, delay: i * 0.07, ease: 'power2.out',
                            onUpdate: function () { if (pct) pct.textContent = Math.round(counter.val) + '%'; }
                        });
                    });
                }
            });

            // ── Smooth anchor scroll ─────────────────────────
            document.querySelectorAll('a[href^="#"]').forEach(function (a) {
                a.addEventListener('click', function (e) {
                    var id = a.getAttribute('href');
                    if (!id || id === '#') return;
                    var target = document.querySelector(id);
                    if (!target) return;
                    e.preventDefault();
                    gsap.to(window, { duration: 0.85, scrollTo: { y: target, offsetY: 72 }, ease: 'power3.inOut' });
                });
            });
        });
    </script>
@endpush
