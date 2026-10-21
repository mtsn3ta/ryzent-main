@extends('layouts.app')

@section('meta_title', 'Artikel & Insight Teknologi - ' . ($siteSettings?->site_name ?? 'Ryzent'))
@section('meta_description', 'Kumpulan insight, tren kecerdasan buatan (AI), arsitektur SaaS, tips website modern, dan transformasi digital dari Ryzent.')

@section('content')

<section class="relative overflow-hidden py-24">

    {{-- Glow Background --}}
    <div class="absolute -left-40 top-0 h-[500px] w-[500px] rounded-full bg-blue-500/10 blur-[120px]"></div>
    <div class="absolute -right-40 top-0 h-[500px] w-[500px] rounded-full bg-cyan-500/10 blur-[120px]"></div>

    <div class="relative max-w-7xl mx-auto px-6">

        {{-- Header --}}
        <div class="text-center max-w-3xl mx-auto">
            <div class="mb-4 inline-flex items-center rounded-full border border-blue-200 bg-white/80 px-4 py-2 text-sm text-blue-700 backdrop-blur-md">
                Blog & Wawasan Digital
            </div>

            <h1 class="text-5xl lg:text-6xl font-bold tracking-tight text-slate-900">
                Insight & Artikel
            </h1>

            <p class="mt-6 text-lg text-slate-600">
                Wawasan praktis seputar teknologi modern, integrasi AI, rekayasa perangkat lunak, dan digitalisasi organisasi.
            </p>

            {{-- Search Bar --}}
            <form action="{{ route('blog.index') }}" method="GET" class="mt-8 max-w-xl mx-auto flex items-center gap-2">
                @if(request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                <div class="relative w-full">
                    <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari artikel atau topik..."
                           class="w-full rounded-2xl border border-slate-200 bg-white/90 pl-11 pr-4 py-3.5 text-sm text-slate-900 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20">
                    <svg class="absolute left-4 top-4 h-4 w-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <button type="submit"
                        class="rounded-2xl bg-gradient-to-r from-blue-600 to-cyan-500 px-6 py-3.5 text-sm font-semibold text-white shadow-md shadow-blue-500/20 transition hover:scale-105">
                    Cari
                </button>
            </form>

            {{-- Category Filter Pills --}}
            @if(isset($categories) && $categories->count() > 0)
                <div class="mt-6 flex flex-wrap justify-center items-center gap-2">
                    <a href="{{ route('blog.index', request()->only('q')) }}"
                       class="rounded-full px-4 py-1.5 text-xs font-medium transition {{ !request('category') ? 'bg-blue-600 text-white shadow-sm' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }}">
                        Semua Kategori
                    </a>
                    @foreach($categories as $category)
                        <a href="{{ route('blog.index', array_merge(request()->only('q'), ['category' => $category->slug])) }}"
                           class="rounded-full px-4 py-1.5 text-xs font-medium transition {{ request('category') === $category->slug ? 'bg-blue-600 text-white shadow-sm' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }}">
                            {{ $category->name }}
                        </a>
                    @endforeach
                </div>
            @endif
        </div>

        {{-- Articles Grid --}}
        <div class="mt-16 grid gap-8 md:grid-cols-2 lg:grid-cols-3">

            @forelse($posts as $post)

            <article
                class="
                    group
                    flex
                    flex-col
                    overflow-hidden
                    rounded-[32px]
                    border
                    border-white/40
                    bg-white/70
                    shadow-sm
                    backdrop-blur-xl
                    transition-all
                    duration-300
                    hover:-translate-y-2
                    hover:shadow-2xl
                    ">

                @if($post->featured_image ?? $post->thumbnail)
                <a href="{{ route('blog.show', $post->slug) }}" class="overflow-hidden block">
                    <img
                        src="{{ asset('storage/' . ($post->featured_image ?? $post->thumbnail)) }}"
                        alt="{{ $post->title }}"
                        class="
                            h-56
                            w-full
                            object-cover
                            transition
                            duration-700
                            group-hover:scale-105
                            ">
                </a>
                @endif

                <div class="p-6 flex flex-col flex-1">

                    <div class="flex items-center justify-between gap-2">
                        <span
                            class="
                                inline-flex
                                rounded-full
                                bg-blue-50
                                px-3
                                py-1
                                text-xs
                                font-medium
                                text-blue-600
                                ">
                            {{ optional($post->category)->name ?? 'Artikel' }}
                        </span>

                        <span class="text-xs text-slate-400">
                            {{ ($post->published_at ?? $post->created_at)->format('d M Y') }}
                        </span>
                    </div>

                    <h2
                        class="
                            mt-4
                            text-xl
                            font-bold
                            text-slate-900
                            group-hover:text-blue-600
                            transition
                            ">
                        <a href="{{ route('blog.show', $post->slug) }}">
                            {{ $post->title }}
                        </a>
                    </h2>

                    <p class="mt-3 text-sm text-slate-600 leading-relaxed flex-1">
                        {{ Str::limit(strip_tags($post->excerpt ?? ''), 120) }}
                    </p>

                    <div
                        class="
                            mt-6
                            pt-4
                            border-t
                            border-slate-100
                            flex
                            items-center
                            justify-between
                            ">

                        <span class="text-xs text-slate-400">
                            Ryzent Editorial
                        </span>

                        <a
                            href="{{ route('blog.show', $post->slug) }}"
                            class="
                                text-sm
                                font-semibold
                                text-blue-600
                                inline-flex
                                items-center
                                gap-1
                                transition
                                group-hover:gap-2
                                ">
                            <span>Baca Selengkapnya</span>
                            <span>→</span>
                        </a>

                    </div>

                </div>

            </article>

            @empty

            <div class="col-span-3 text-center py-16 bg-white/60 rounded-3xl border border-slate-100">
                <div class="text-4xl mb-3">📰</div>
                <h3 class="text-lg font-semibold text-slate-800">Tidak ada artikel ditemukan</h3>
                <p class="text-sm text-slate-500 mt-1">
                    @if(request('q') || request('category'))
                        Coba gunakan kata kunci pencarian lain atau pilih kategori berbeda.
                    @else
                        Belum ada artikel yang dipublikasikan saat ini.
                    @endif
                </p>
                @if(request('q') || request('category'))
                    <a href="{{ route('blog.index') }}" class="mt-4 inline-block text-xs font-semibold text-blue-600 hover:underline">
                        Reset Filter & Pencarian
                    </a>
                @endif
            </div>

            @endforelse

        </div>

        {{-- Pagination --}}
        <div class="mt-16">
            {{ $posts->links() }}
        </div>

    </div>

</section>

@endsection
