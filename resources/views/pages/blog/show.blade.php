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

    <div class="relative max-w-5xl mx-auto px-6">

        {{-- Header --}}
        <div class="text-center">

            <div
                class="
                inline-flex
                rounded-full
                border
                border-blue-200
                bg-white/80
                px-4
                py-2
                text-sm
                text-blue-700
                backdrop-blur-md
                ">
                Artikel Ryzent
            </div>

            <h1
                class="
                mt-6
                text-5xl
                lg:text-6xl
                font-bold
                tracking-tight
                text-slate-900
                ">
                {{ $post->title }}
            </h1>

            <div
                class="
                mt-6
                flex
                justify-center
                gap-6
                text-sm
                text-slate-500
                ">
                <span>
                    {{ $post->created_at->format('d M Y') }}
                </span>
            </div>

        </div>

        {{-- Thumbnail --}}
        @if($post->thumbnail)

        <img
            src="{{ asset('storage/' . $post->thumbnail) }}"
            alt="{{ $post->title }}"
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

            <div
                class="
                prose
                prose-slate
                max-w-none
                prose-headings:font-bold
                prose-a:text-blue-600
                ">
                {!! $post->content !!}
            </div>

        </div>

        {{-- CTA --}}
        <div
            class="
            mt-16
            rounded-[32px]
            bg-gradient-to-r
            from-blue-600
            to-cyan-500
            p-10
            text-center
            text-white
            ">

            <h2
                class="
                text-3xl
                font-bold
                ">
                Butuh Solusi Digital Untuk Bisnis Anda?
            </h2>

            <p class="mt-4 text-blue-100">
                Konsultasikan kebutuhan website,
                SaaS, AI, atau sistem digital Anda bersama Ryzent.
            </p>

            <div
                class="
                mt-8
                flex
                flex-wrap
                justify-center
                gap-4
                ">

                <a
                    href="#contact"
                    class="
                    rounded-2xl
                    bg-white
                    px-8
                    py-4
                    font-semibold
                    text-blue-600
                    ">
                    Konsultasi Gratis
                </a>

                <a
                    href="{{ route('blog.index') }}"
                    class="
                    rounded-2xl
                    border
                    border-white/30
                    px-8
                    py-4
                    font-semibold
                    text-white
                    ">
                    Artikel Lainnya
                </a>

            </div>

        </div>

    </div>

</section>

@endsection