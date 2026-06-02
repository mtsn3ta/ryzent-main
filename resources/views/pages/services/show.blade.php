@extends('layouts.app')

@section('content')

<section class="relative overflow-hidden py-24">

    {{-- Glow Background --}}
    <div
        class="
        absolute
        -left-40
        top-10
        -z-10
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
        top-10
        -z-10
        h-[500px]
        w-[500px]
        rounded-full
        bg-cyan-500/10
        blur-[120px]
        "></div>

    <div class="max-w-5xl mx-auto px-6">

        <div class="text-center">

            <div
                class="
                mb-4
                inline-flex
                items-center
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
                Layanan Ryzent
            </div>

            <h1
                class="
                text-5xl
                lg:text-6xl
                font-bold
                tracking-tight
                text-slate-900
                ">
                {{ $service->title }}
            </h1>

            @if($service->price_start)

            <div
                class="
                    mt-6
                    text-xl
                    font-semibold
                    text-blue-600
                    ">
                Mulai Rp {{ number_format($service->price_start, 0, ',', '.') }}
            </div>

            @endif

        </div>

        <div
            class="
            mt-16
            rounded-[32px]
            border
            border-white/40
            bg-white/70
            p-10
            shadow-xl
            backdrop-blur-xl
            ">

            <p
                class="
                text-lg
                leading-relaxed
                text-slate-600
                ">
                {{ $service->excerpt }}
            </p>

            @if($service->content)

            <div
                class="
                    prose
                    prose-slate
                    mt-10
                    max-w-none
                    ">
                {!! $service->content !!}
            </div>

            @endif

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
                Tertarik Dengan Layanan Ini?
            </h2>

            <p class="mt-4 text-blue-100">
                Konsultasikan kebutuhan Anda bersama tim Ryzent.
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
                    href="{{ route('services.index') }}"
                    class="
                    rounded-2xl
                    border
                    border-white/30
                    px-8
                    py-4
                    font-semibold
                    text-white
                    ">
                    Lihat Semua Layanan
                </a>

            </div>

        </div>

    </div>

</section>

@endsection