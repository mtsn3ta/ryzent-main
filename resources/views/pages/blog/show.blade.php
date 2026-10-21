@extends('layouts.app')

@section('meta_title', $post->title . ' - ' . ($siteSettings?->site_name ?? 'Ryzent'))
@section('meta_description', Str::limit(strip_tags($post->excerpt ?? $post->content), 160))
@if($post->featured_image ?? $post->thumbnail)
    @section('og_image', asset('storage/' . ($post->featured_image ?? $post->thumbnail)))
@endif

@section('content')

<section class="relative overflow-hidden py-16 lg:py-24">

    {{-- Glow --}}
    <div class="absolute -left-40 top-0 h-[500px] w-[500px] rounded-full bg-blue-500/10 blur-[120px]"></div>
    <div class="absolute -right-40 top-0 h-[500px] w-[500px] rounded-full bg-cyan-500/10 blur-[120px]"></div>

    <div class="relative max-w-4xl mx-auto px-6">

        {{-- Breadcrumb --}}
        <nav class="flex items-center gap-2 text-xs text-slate-500 mb-8" aria-label="Breadcrumb">
            <a href="{{ route('home') }}" class="hover:text-blue-600 transition">Beranda</a>
            <span>/</span>
            <a href="{{ route('blog.index') }}" class="hover:text-blue-600 transition">Blog</a>
            <span>/</span>
            <span class="text-slate-800 font-medium truncate max-w-xs">{{ $post->title }}</span>
        </nav>

        {{-- Header --}}
        <div class="text-center">

            @if($post->category)
                <a href="{{ route('blog.index', ['category' => $post->category->slug]) }}"
                   class="inline-flex rounded-full border border-blue-200 bg-white/80 px-4 py-2 text-xs font-semibold text-blue-700 backdrop-blur-md hover:bg-blue-50 transition">
                    {{ $post->category->name }}
                </a>
            @else
                <div class="inline-flex rounded-full border border-blue-200 bg-white/80 px-4 py-2 text-xs font-semibold text-blue-700 backdrop-blur-md">
                    Artikel Ryzent
                </div>
            @endif

            <h1 class="mt-6 text-4xl lg:text-5xl font-bold tracking-tight text-slate-900 leading-tight">
                {{ $post->title }}
            </h1>

            <div class="mt-6 flex flex-wrap justify-center items-center gap-4 text-xs text-slate-500">
                <span class="flex items-center gap-1.5">
                    <svg class="h-4 w-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    {{ ($post->published_at ?? $post->created_at)->format('d F Y') }}
                </span>
                <span>•</span>
                <span>Ditulis oleh Tim Ryzent</span>
            </div>

        </div>

        {{-- Thumbnail --}}
        @if($post->featured_image ?? $post->thumbnail)
        <div class="mt-10 overflow-hidden rounded-[32px] border border-white/60 shadow-xl bg-slate-100">
            <img
                src="{{ asset('storage/' . ($post->featured_image ?? $post->thumbnail)) }}"
                alt="{{ $post->title }}"
                class="w-full h-auto max-h-[500px] object-cover">
        </div>
        @endif

        {{-- Content --}}
        <div class="mt-12 rounded-[32px] border border-white/40 bg-white/80 p-8 lg:p-12 shadow-xl backdrop-blur-xl">

            @if($post->excerpt)
                <p class="text-lg text-slate-700 font-medium leading-relaxed mb-8 pb-8 border-b border-slate-100 italic">
                    {{ $post->excerpt }}
                </p>
            @endif

            <div class="prose prose-slate max-w-none prose-headings:font-bold prose-headings:text-slate-900 prose-a:text-blue-600 prose-img:rounded-2xl">
                {!! $post->content !!}
            </div>

            {{-- Tags --}}
            @if(isset($post->tags) && $post->tags->count() > 0)
                <div class="mt-12 pt-6 border-t border-slate-100 flex flex-wrap items-center gap-2">
                    <span class="text-xs font-semibold uppercase tracking-wider text-slate-400 mr-2">Topik:</span>
                    @foreach($post->tags as $tag)
                        <span class="rounded-lg bg-slate-100 px-3 py-1 text-xs text-slate-600">
                            #{{ $tag->name }}
                        </span>
                    @endforeach
                </div>
            @endif

        </div>

        {{-- CTA Banner --}}
        <div class="mt-16 rounded-[32px] bg-gradient-to-r from-blue-600 to-cyan-500 p-8 lg:p-12 text-center text-white shadow-xl shadow-blue-500/10">

            <h2 class="text-3xl font-bold">
                Butuh Solusi Digital Untuk Bisnis Anda?
            </h2>

            <p class="mt-4 text-blue-100 max-w-2xl mx-auto">
                Konsultasikan kebutuhan website instansi, platform SaaS, integrasi AI, atau sistem custom Anda langsung bersama tim Ryzent.
            </p>

            <div class="mt-8 flex flex-wrap justify-center gap-4">

                @if($siteSettings?->whatsapp)
                    @php $cleanPhone = preg_replace('/[^0-9]/', '', $siteSettings->whatsapp); @endphp
                    <a href="https://wa.me/{{ $cleanPhone }}?text={{ rawurlencode('Halo Ryzent, saya baru membaca artikel ' . $post->title . ' dan ingin konsultasi...') }}"
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

                <a href="{{ route('blog.index') }}"
                   class="rounded-2xl border border-white/30 bg-white/10 px-8 py-4 font-semibold text-white backdrop-blur-md transition hover:bg-white/20">
                    Semua Artikel
                </a>

            </div>

        </div>

        {{-- Related Posts --}}
        @if(isset($relatedPosts) && $relatedPosts->count() > 0)
            <div class="mt-20">
                <h3 class="text-2xl font-bold text-slate-900 mb-8">
                    Artikel Terkait Lainnya
                </h3>

                <div class="grid gap-6 md:grid-cols-3">
                    @foreach($relatedPosts as $related)
                        <div class="rounded-2xl border border-slate-100 bg-white/70 p-5 shadow-sm transition hover:-translate-y-1 hover:shadow-md">
                            @if($related->featured_image ?? $related->thumbnail)
                                <img src="{{ asset('storage/' . ($related->featured_image ?? $related->thumbnail)) }}"
                                     alt="{{ $related->title }}"
                                     class="h-36 w-full rounded-xl object-cover mb-4">
                            @endif
                            <div class="text-xs text-blue-600 font-semibold mb-2">
                                {{ optional($related->category)->name ?? 'Artikel' }}
                            </div>
                            <h4 class="font-bold text-slate-900 text-sm line-clamp-2 hover:text-blue-600 transition">
                                <a href="{{ route('blog.show', $related->slug) }}">
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
