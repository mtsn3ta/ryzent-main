@extends('layouts.app')

@section('meta_title', $service->title . ' - Layanan Ryzent')
@section('meta_description', Str::limit(strip_tags($service->excerpt ?? $service->content), 160))

@section('content')

<section class="relative overflow-hidden py-16 lg:py-24">

    {{-- Glow Background --}}
    <div class="absolute -left-40 top-10 -z-10 h-[500px] w-[500px] rounded-full bg-blue-500/10 blur-[120px]"></div>
    <div class="absolute -right-40 top-10 -z-10 h-[500px] w-[500px] rounded-full bg-cyan-500/10 blur-[120px]"></div>

    <div class="max-w-5xl mx-auto px-6">

        {{-- Breadcrumb --}}
        <nav class="flex items-center gap-2 text-xs text-slate-500 mb-8" aria-label="Breadcrumb">
            <a href="{{ route('home') }}" class="hover:text-blue-600 transition">Beranda</a>
            <span>/</span>
            <a href="{{ route('services.index') }}" class="hover:text-blue-600 transition">Services</a>
            <span>/</span>
            <span class="text-slate-800 font-medium truncate max-w-xs">{{ $service->title }}</span>
        </nav>

        {{-- Header --}}
        <div class="text-center">

            <div class="mb-4 inline-flex items-center rounded-full border border-blue-200 bg-white/80 px-4 py-2 text-xs font-semibold text-blue-700 backdrop-blur-md">
                Layanan Profesional Ryzent
            </div>

            <h1 class="text-4xl lg:text-6xl font-bold tracking-tight text-slate-900 leading-tight">
                {{ $service->title }}
            </h1>

            @if($service->price_start)
                <div class="mt-6 text-xl font-bold text-blue-600">
                    Mulai Rp {{ number_format($service->price_start, 0, ',', '.') }}
                </div>
            @endif

        </div>

        {{-- Main Content --}}
        <div class="mt-12 rounded-[32px] border border-white/40 bg-white/80 p-8 lg:p-12 shadow-xl backdrop-blur-xl">

            @if($service->excerpt)
                <p class="text-lg leading-relaxed text-slate-700 font-medium mb-8 pb-8 border-b border-slate-100">
                    {{ $service->excerpt }}
                </p>
            @endif

            @if($service->content)
                <div class="prose prose-slate max-w-none prose-headings:font-bold prose-headings:text-slate-900 prose-a:text-blue-600 prose-li:my-1">
                    {!! $service->content !!}
                </div>
            @endif

        </div>

        {{-- CTA Banner --}}
        <div class="mt-16 rounded-[32px] bg-gradient-to-r from-blue-600 to-cyan-500 p-8 lg:p-12 text-center text-white shadow-xl shadow-blue-500/10">

            <h2 class="text-3xl font-bold">
                Tertarik Dengan Layanan {{ $service->title }}?
            </h2>

            <p class="mt-4 text-blue-100 max-w-2xl mx-auto">
                Diskusikan cakupan kebutuhan Anda secara gratis bersama tim developer kami untuk mendapatkan penawaran & solusi optimal.
            </p>

            <div class="mt-8 flex flex-wrap justify-center gap-4">
                @if($siteSettings?->whatsapp)
                    @php $cleanPhone = preg_replace('/[^0-9]/', '', $siteSettings->whatsapp); @endphp
                    <a href="https://wa.me/{{ $cleanPhone }}?text={{ rawurlencode('Halo Ryzent, saya ingin berkonsultasi mengenai layanan ' . $service->title . '...') }}"
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

                <a href="{{ route('services.index') }}"
                   class="rounded-2xl border border-white/30 bg-white/10 px-8 py-4 font-semibold text-white backdrop-blur-md transition hover:bg-white/20">
                    Lihat Semua Layanan
                </a>
            </div>

        </div>

        {{-- Other Services --}}
        @if(isset($otherServices) && $otherServices->count() > 0)
            <div class="mt-20">
                <h3 class="text-2xl font-bold text-slate-900 mb-8">
                    Layanan Lainnya Dari Ryzent
                </h3>

                <div class="grid gap-6 md:grid-cols-3">
                    @foreach($otherServices as $other)
                        <div class="rounded-2xl border border-slate-100 bg-white/70 p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-md flex flex-col">
                            <h4 class="font-bold text-slate-900 text-lg hover:text-blue-600 transition">
                                <a href="{{ route('services.show', $other->slug) }}">
                                    {{ $other->title }}
                                </a>
                            </h4>
                            <p class="mt-2 text-xs text-slate-500 line-clamp-3 flex-1">
                                {{ $other->excerpt }}
                            </p>
                            @if($other->price_start)
                                <div class="mt-4 text-xs font-bold text-blue-600">
                                    Mulai Rp {{ number_format($other->price_start, 0, ',', '.') }}
                                </div>
                            @endif
                            <a href="{{ route('services.show', $other->slug) }}"
                               class="mt-4 text-xs font-semibold text-blue-600 hover:underline">
                                Pelajari →
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

    </div>

</section>

@endsection
