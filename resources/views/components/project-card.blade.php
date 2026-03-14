@props(['project'])

<div class="group relative bg-white dark:bg-[#111113] border border-zinc-200 dark:border-zinc-800 p-7 rounded-2xl
            hover:-translate-y-1.5 transform-gpu transition-all duration-300 ease-out
            hover:shadow-xl hover:shadow-emerald-500/8 hover:border-emerald-500/30">

    {{-- Top accent line on hover --}}
    <div class="absolute top-0 left-8 right-8 h-px bg-gradient-to-r from-transparent via-emerald-500 to-transparent
                opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-full"></div>

    {{-- Tags --}}
    <div class="flex flex-wrap gap-2 mb-5">
        @foreach($project['tags'] as $tag)
            <span
                class="text-[10px] font-display font-bold uppercase tracking-widest text-emerald-500 bg-emerald-500/8 dark:bg-emerald-500/10 px-2.5 py-1 rounded-md border border-emerald-500/15">
                {{ $tag }}
            </span>
        @endforeach
    </div>

    {{-- Title --}}
    <h3
        class="font-display text-xl font-bold mb-1.5 group-hover:text-emerald-400 dark:group-hover:text-emerald-400 transition-colors leading-snug">
        {{ $project['title'] }}
    </h3>

    {{-- Company --}}
    @if(isset($project['company']))
        <p class="text-zinc-400 dark:text-zinc-500 text-xs mb-4 font-bold uppercase tracking-widest">
            {{ $project['company'] }}
        </p>
    @endif

    {{-- Dates (optional) --}}
    @if(isset($project['period']))
        <p class="text-zinc-400 text-xs mb-3 font-mono">{{ $project['period'] }}</p>
    @endif

    {{-- Description --}}
    <p class="text-zinc-600 dark:text-zinc-400 leading-relaxed text-sm mb-6">
        {{ $project['description'] }}
    </p>

    {{-- Link --}}
    @if(isset($project['link']) && $project['link'] !== '#')
        <a href="{{ $project['link'] }}"
            class="inline-flex items-center gap-1.5 text-sm font-bold text-zinc-400 hover:text-emerald-400 transition-all group/link">
            View Case Study
            <span class="group-hover/link:translate-x-1 transition-transform text-emerald-500">→</span>
        </a>
    @else
        <span class="inline-flex items-center gap-1.5 text-xs font-bold text-zinc-600 uppercase tracking-widest">
            Enterprise / Private
        </span>
    @endif
</div>
