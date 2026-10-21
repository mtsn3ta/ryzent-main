@extends('layouts.app')

@section('meta_title', $portfolio->title . ' - Portofolio Ryzent')
@section('meta_description', Str::limit(strip_tags($portfolio->excerpt ?? $portfolio->content), 160))
@if($portfolio->thumbnail)
    @section('og_image', asset('storage/' . $portfolio->thumbnail))
@endif

@section('content')

<section class="relative overflow-hidden py-16 lg:py-24">

    {{-- Glow --}}
    <div class="absolute -left-40 top-0 h-[500px] w-[500px] rounded-full bg-blue-500/10 blur-[120px]"></div>
    <div class="absolute -right-40 top-0 h-[500px] w-[500px] rounded-full bg-cyan-500/10 blur-[120px]"></div>

    <div class="relative max-w-5xl mx-auto px-6">

        {{-- Breadcrumb --}}
        <nav class="flex items-center gap-2 text-xs text-slate-500 mb-8" aria-label="Breadcrumb">
            <a href="{{ route('home') }}" class="hover:text-blue-600 transition">Beranda</a>
            <span>/</span>
            <a href="{{ route('portfolio.index') }}" class="hover:text-blue-600 transition">Portfolio</a>
            <span>/</span>
            <span class="text-slate-800 font-medium truncate max-w-xs">{{ $portfolio->title }}</span>
        </nav>

        {{-- Header --}}
        <div class="text-center">

            <div class="inline-flex rounded-full bg-cyan-50 border border-cyan-200 px-4 py-1.5 text-xs font-semibold text-cyan-700">
                {{ $portfolio->category }}
            </div>

            <h1 class="mt-6 text-4xl lg:text-6xl font-bold tracking-tight text-slate-900 leading-tight">
                {{ $portfolio->title }}
            </h1>

            <div class="mt-6 flex justify-center items-center gap-3">
                <span class="rounded-full bg-slate-100 px-4 py-1.5 text-xs font-medium text-slate-700">
                    Status: {{ $portfolio->status }}
                </span>
            </div>

        </div>

        {{-- Thumbnail --}}
        @if($portfolio->thumbnail)
            <div class="mt-10 overflow-hidden rounded-[32px] border border-white/60 shadow-xl bg-slate-100">
                <img
                    src="{{ asset('storage/' . $portfolio->thumbnail) }}"
                    alt="{{ $portfolio->title }}"
                    class="w-full h-auto object-cover">
            </div>
        @endif

        {{-- Gallery Screenshots --}}
        @if($portfolio->gallery_images)
            <div class="mt-8 grid gap-6 md:grid-cols-2">
                @foreach($portfolio->gallery_images as $image)
                    <div class="overflow-hidden rounded-2xl border border-slate-100 shadow-md">
                        <img
                            src="{{ asset('storage/' . $image) }}"
                            alt="{{ $portfolio->title }}"
                            class="w-full h-auto object-cover transition duration-300 hover:scale-105">
                    </div>
                @endforeach
            </div>
        @endif

        {{-- Content --}}
        <div class="mt-12 rounded-[32px] border border-white/40 bg-white/80 p-8 lg:p-12 shadow-xl backdrop-blur-xl">

            @if($portfolio->excerpt)
                <p class="text-lg leading-relaxed text-slate-700 font-medium mb-8 pb-8 border-b border-slate-100">
                    {{ $portfolio->excerpt }}
                </p>
            @endif

            @if($portfolio->content)
                <style>
                    .service-content h2{
                        font-size:1.75rem;
                        font-weight:700;
                        margin-top:2rem;
                        margin-bottom:1rem;
                        color:#0f172a;
                    }
                    .service-content p{
                        margin-bottom:1rem;
                        line-height:1.8;
                        color:#334155;
                    }
                    .service-content ul{
                        list-style:disc;
                        padding-left:1.5rem;
                        margin-bottom:1.25rem;
                        color:#334155;
                    }
                    .service-content li{
                        margin-bottom:.5rem;
                    }
                </style>
                <div class="service-content">
                    {!! $portfolio->content !!}
                </div>
            @endif

        </div>

        {{-- Live Links / Actions --}}
        @if($portfolio->demo_url || $portfolio->github_url)
            <div class="mt-10 flex flex-wrap justify-center gap-4">
                @if($portfolio->demo_url)
                    <a href="{{ $portfolio->demo_url }}"
                       target="_blank"
                       rel="noopener"
                       class="inline-flex items-center gap-2 rounded-2xl bg-gradient-to-r from-blue-600 to-cyan-500 px-8 py-4 font-semibold text-white shadow-lg shadow-blue-500/20 transition hover:scale-105">
                        <span>Kunjungi Live Demo</span>
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                        </svg>
                    </a>
                @endif

                @if($portfolio->github_url)
                    <a href="{{ $portfolio->github_url }}"
                       target="_blank"
                       rel="noopener"
                       class="inline-flex items-center gap-2 rounded-2xl border border-slate-300 bg-white px-8 py-4 font-semibold text-slate-800 shadow-sm transition hover:bg-slate-50">
                        <span>Repository GitHub</span>
                    </a>
                @endif
            </div>
        @endif

        {{-- CTA --}}
        <div class="mt-16 rounded-[32px] bg-gradient-to-r from-blue-600 to-cyan-500 p-8 lg:p-12 text-center text-white shadow-xl shadow-blue-500/10">

            <h2 class="text-3xl font-bold">
                Ingin Membangun Proyek Serupa?
            </h2>

            <p class="mt-4 text-blue-100 max-w-2xl mx-auto">
                Diskusikan kebutuhan website, SaaS, atau otomatisasi AI Anda bersama tim Ryzent untuk solusi yang efisien dan tepat sasaran.
            </p>

            <div class="mt-8 flex flex-wrap justify-center gap-4">
                @if($siteSettings?->whatsapp)
                    @php $cleanPhone = preg_replace('/[^0-9]/', '', $siteSettings->whatsapp); @endphp
                    <a href="https://wa.me/{{ $cleanPhone }}?text={{ rawurlencode('Halo Ryzent, saya tertarik dengan portofolio ' . $portfolio->title . ' dan ingin konsultasi sistem serupa...') }}"
                       target="_blank"
                       rel="noopener"
                       class="rounded-2xl bg-white px-8 py-4 font-semibold text-blue-600 shadow-md transition hover:scale-105">
                        Konsultasi via WhatsApp
                    </a>
                @else
                    <a href="{{ url('/#contact') }}"
                       class="rounded-2xl bg-white px-8 py-4 font-semibold text-blue-600 shadow-md transition hover:scale-105">
                        Konsultasi Gratis
                    </a>
                @endif

                <a href="{{ route('portfolio.index') }}"
                   class="rounded-2xl border border-white/30 bg-white/10 px-8 py-4 font-semibold text-white backdrop-blur-md transition hover:bg-white/20">
                    Lihat Proyek Lainnya
                </a>
            </div>

        </div>

        {{-- Related Portfolios --}}
        @if(isset($relatedPortfolios) && $relatedPortfolios->count() > 0)
            <div class="mt-20">
                <h3 class="text-2xl font-bold text-slate-900 mb-8">
                    Proyek Terkait Lainnya
                </h3>

                <div class="grid gap-6 md:grid-cols-3">
                    @foreach($relatedPortfolios as $related)
                        <div class="rounded-2xl border border-slate-100 bg-white/70 p-5 shadow-sm transition hover:-translate-y-1 hover:shadow-md">
                            @if($related->thumbnail)
                                <img src="{{ asset('storage/' . $related->thumbnail) }}"
                                     alt="{{ $related->title }}"
                                     class="h-36 w-full rounded-xl object-cover mb-4">
                            @endif
                            <div class="text-xs text-cyan-600 font-semibold mb-2">
                                {{ $related->category }}
                            </div>
                            <h4 class="font-bold text-slate-900 text-sm line-clamp-2 hover:text-blue-600 transition">
                                <a href="{{ route('portfolio.show', $related->slug) }}">
                                    {{ $related->title }}
                                </a>
                            </h4>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

    </div>

</section>

@endsection
