@extends('layouts.app')

@section('content')

<section class="relative overflow-hidden py-24">

    {{-- Glow --}}
    <div
        class="
        absolute
        -left-40
        top-0
        h-[500px]
        w-[500px]
        rounded-full
        bg-blue-500/10
        blur-[120px]
        "></div>

    <div
        class="
        absolute
        -right-40
        top-0
        h-[500px]
        w-[500px]
        rounded-full
        bg-cyan-500/10
        blur-[120px]
        "></div>

    <div class="relative max-w-6xl mx-auto px-6">

        {{-- Header --}}
        <div class="text-center">

            <div
                class="
                inline-flex
                rounded-full
                bg-cyan-50
                px-4
                py-2
                text-sm
                text-cyan-700
                ">
                {{ $portfolio->category }}
            </div>

            <h1
                class="
                mt-6
                text-5xl
                lg:text-6xl
                font-bold
                tracking-tight
                ">
                {{ $portfolio->title }}
            </h1>

            <div class="mt-6">

                <span
                    class="
                    rounded-full
                    bg-slate-100
                    px-4
                    py-2
                    text-sm
                    ">
                    {{ $portfolio->status }}
                </span>

            </div>

        </div>

        {{-- Thumbnail --}}
        @if($portfolio->thumbnail)

        <img
            src="{{ asset('storage/' . $portfolio->thumbnail) }}"
            alt="{{ $portfolio->title }}"
            class="
                mt-12
                w-full
                rounded-[32px]
                shadow-xl
                ">

        @endif

        {{-- Content --}}
        <div
            class="
            mt-12
            rounded-[32px]
            border
            border-white/40
            bg-white/70
            p-10
            shadow-xl
            backdrop-blur-xl
            ">

            @if($portfolio->excerpt)

            <p
                class="
                    text-lg
                    leading-relaxed
                    text-slate-600
                    ">
                {{ $portfolio->excerpt }}
            </p>

            @endif

            @if($portfolio->content)

            <div
                class="
                    prose
                    prose-slate
                    mt-10
                    max-w-none
                    ">
                {!! $portfolio->content !!}
            </div>

            @endif

        </div>

        {{-- Actions --}}
        <div
            class="
            mt-12
            flex
            flex-wrap
            justify-center
            gap-4
            ">

            @if($portfolio->demo_url)

            <a
                href="{{ $portfolio->demo_url }}"
                target="_blank"
                class="
                    rounded-2xl
                    bg-gradient-to-r
                    from-blue-600
                    to-cyan-500
                    px-8
                    py-4
                    font-semibold
                    text-white
                    ">
                Live Demo
            </a>

            @endif

            @if($portfolio->github_url)

            <a
                href="{{ $portfolio->github_url }}"
                target="_blank"
                class="
                    rounded-2xl
                    border
                    border-slate-200
                    bg-white/70
                    px-8
                    py-4
                    font-semibold
                    ">
                GitHub
            </a>

            @endif

        </div>

        {{-- CTA --}}
        <div
            class="
            mt-20
            rounded-[32px]
            bg-gradient-to-r
            from-blue-600
            to-cyan-500
            p-10
            text-center
            text-white
            ">

            <h2 class="text-3xl font-bold">
                Ingin Proyek Seperti Ini?
            </h2>

            <p class="mt-4 text-blue-100">
                Diskusikan kebutuhan website, SaaS,
                atau AI Anda bersama tim Ryzent.
            </p>

            <a
                href="#contact"
                class="
                mt-8
                inline-block
                rounded-2xl
                bg-white
                px-8
                py-4
                font-semibold
                text-blue-600
                ">
                Konsultasi Gratis
            </a>

        </div>

    </div>

</section>

@endsection