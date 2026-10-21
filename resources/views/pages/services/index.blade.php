@extends('layouts.app')

@section('meta_title', 'Layanan Pengembangan Software & Digital - ' . ($siteSettings?->site_name ?? 'Ryzent'))
@section('meta_description', 'Layanan pembuatan website profesional, aplikasi SaaS, integrasi AI kustom, dan pengelolaan infrastruktur cloud oleh Ryzent Cipta Digital.')

@section('content')

<section class="relative py-24 overflow-hidden">

    {{-- Glow Background --}}
    <div class="absolute -left-40 top-0 h-[500px] w-[500px] rounded-full bg-blue-500/10 blur-[120px]"></div>
    <div class="absolute -right-40 top-0 h-[500px] w-[500px] rounded-full bg-cyan-500/10 blur-[120px]"></div>

    <div class="max-w-7xl mx-auto px-6 relative">

        <div class="text-center max-w-3xl mx-auto">

            <div class="mb-4 inline-flex items-center rounded-full border border-blue-200 bg-white/80 px-4 py-2 text-sm text-blue-700 backdrop-blur-md">
                Layanan & Solusi Ryzent
            </div>

            <h1 class="text-5xl lg:text-6xl font-bold tracking-tight text-slate-900">
                Services
            </h1>

            <p class="mt-6 text-lg text-slate-600">
                Solusi rekayasa perangkat lunak modern untuk sekolah, organisasi olahraga, UMKM bertumbuh, dan perusahaan modern.
            </p>

        </div>

        <div class="mt-16 grid gap-8 md:grid-cols-2 lg:grid-cols-3">

            @foreach($services as $service)

            <div
                class="
                    group
                    flex
                    flex-col
                    rounded-[28px]
                    border
                    border-white/40
                    bg-white/80
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
                        group-hover:text-blue-600
                        transition
                        ">
                    <a href="{{ route('services.show', $service->slug) }}">
                        {{ $service->title }}
                    </a>
                </h3>

                <p class="mt-4 text-sm text-slate-600 leading-relaxed flex-1">
                    {{ $service->excerpt }}
                </p>

                @if($service->price_start)
                    <div class="mt-4 text-sm font-bold text-blue-600">
                        Mulai Rp {{ number_format($service->price_start, 0, ',', '.') }}
                    </div>
                @endif

                <div class="mt-6 pt-4 border-t border-slate-100">
                    <a
                        href="{{ route('services.show', $service->slug) }}"
                        class="
                            inline-flex
                            items-center
                            gap-2
                            text-sm
                            font-semibold
                            text-blue-600
                            transition
                            group-hover:gap-3
                            ">
                        <span>Pelajari Lebih Lanjut</span>
                        <span>→</span>
                    </a>
                </div>

            </div>

            @endforeach

        </div>

        <div class="mt-16">
            {{ $services->links() }}
        </div>

    </div>

</section>

@endsection
