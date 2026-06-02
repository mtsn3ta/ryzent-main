@extends('layouts.app')

@section('content')

<section class="relative py-24">

    <div class="max-w-7xl mx-auto px-6">

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
                Services
            </h1>

            <p class="mt-6 text-slate-600">
                Solusi digital modern untuk sekolah,
                organisasi, bisnis, dan startup.
            </p>

        </div>

        <div class="mt-16 grid gap-8 md:grid-cols-2 lg:grid-cols-3">

            @foreach($services as $service)

            <div
                class="
                    group
                    rounded-[28px]
                    border
                    border-white/40
                    bg-white/70
                    p-8
                    shadow-sm
                    backdrop-blur-xl
                    transition
                    hover:-translate-y-2
                    hover:shadow-2xl
                    ">

                <div
                    class="
                        mb-6
                        h-1.5
                        w-20
                        rounded-full
                        bg-gradient-to-r
                        from-blue-600
                        to-cyan-500
                        "></div>

                <h3
                    class="
                        text-xl
                        font-bold
                        text-slate-900
                        ">
                    {{ $service->title }}
                </h3>

                <p class="mt-4 text-slate-600">
                    {{ $service->excerpt }}
                </p>

                <a
                    href="{{ route('services.show', $service->slug) }}"
                    class="
                        mt-6
                        inline-flex
                        text-blue-600
                        font-medium
                        ">
                    Pelajari Lebih Lanjut →
                </a>

            </div>

            @endforeach

        </div>

        <div class="mt-12">
            {{ $services->links() }}
        </div>

    </div>

</section>

@endsection