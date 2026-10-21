@extends('layouts.app')

@section('meta_title', 'Portofolio & Studi Kasus - ' . ($siteSettings?->site_name ?? 'Ryzent'))
@section('meta_description', 'Jelajahi portofolio proyek unggulan Ryzent Cipta Digital: Sistem Informasi Sekolah, Manajemen Atlet & Olahraga, Aplikasi SaaS, dan Platform AI.')

@section('content')

<section class="relative overflow-hidden py-24">

    {{-- Glow --}}
    <div class="absolute -left-40 top-0 h-[500px] w-[500px] rounded-full bg-blue-500/10 blur-[120px]"></div>
    <div class="absolute -right-40 top-0 h-[500px] w-[500px] rounded-full bg-cyan-500/10 blur-[120px]"></div>

    <div class="relative max-w-7xl mx-auto px-6">

        {{-- Header --}}
        <div class="text-center max-w-3xl mx-auto">
            <div class="mb-4 inline-flex items-center rounded-full border border-cyan-200 bg-white/80 px-4 py-2 text-sm text-cyan-700 backdrop-blur-md">
                Karya & Portofolio
            </div>

            <h1 class="text-5xl lg:text-6xl font-bold tracking-tight text-slate-900">
                Featured Projects
            </h1>

            <p class="mt-6 text-lg text-slate-600">
                Solusi digital nyata yang telah kami bangun untuk institusi pendidikan, organisasi olahraga, dan bisnis skala menengah hingga korporat.
            </p>

            {{-- Category Filter Pills --}}
            @if(isset($categories) && $categories->count() > 0)
                <div class="mt-8 flex flex-wrap justify-center items-center gap-2">
                    <a href="{{ route('portfolio.index') }}"
                       class="rounded-full px-5 py-2 text-xs font-semibold transition {{ !$selectedCategory ? 'bg-cyan-600 text-white shadow-md shadow-cyan-500/20' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }}">
                        Semua Kategori
                    </a>
                    @foreach($categories as $category)
                        <a href="{{ route('portfolio.index', ['category' => $category]) }}"
                           class="rounded-full px-5 py-2 text-xs font-semibold transition {{ $selectedCategory === $category ? 'bg-cyan-600 text-white shadow-md shadow-cyan-500/20' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }}">
                            {{ $category }}
                        </a>
                    @endforeach
                </div>
            @endif
        </div>

        {{-- Grid --}}
        <div class="mt-16 grid gap-8 md:grid-cols-2 lg:grid-cols-3">

            @forelse($portfolios as $portfolio)

            <article
                class="
                    group
                    relative
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

                @if($portfolio->thumbnail)

                <a href="{{ route('portfolio.show', $portfolio->slug) }}" class="overflow-hidden block">
                    <img
                        src="{{ asset('storage/' . $portfolio->thumbnail) }}"
                        alt="{{ $portfolio->title }}"
                        class="
                            h-64
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
                                bg-cyan-50
                                px-3
                                py-1
                                text-xs
                                font-semibold
                                text-cyan-700
                                ">
                            {{ $portfolio->category }}
                        </span>

                        <span
                            class="
                                rounded-full
                                bg-slate-100
                                px-3
                                py-1
                                text-xs
                                font-medium
                                text-slate-600
                                ">
                            {{ $portfolio->status }}
                        </span>
                    </div>

                    <h2
                        class="
                            mt-4
                            text-xl
                            font-bold
                            text-slate-900
                            group-hover:text-cyan-600
                            transition
                            ">
                        <a href="{{ route('portfolio.show', $portfolio->slug) }}">
                            {{ $portfolio->title }}
                        </a>
                    </h2>

                    <p class="mt-3 text-sm text-slate-600 leading-relaxed flex-1">
                        {{ Str::limit(strip_tags($portfolio->excerpt), 120) }}
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

                        <a
                            href="{{ route('portfolio.show', $portfolio->slug) }}"
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
                            <span>Lihat Studi Kasus</span>
                            <span>→</span>
                        </a>

                        @if($portfolio->demo_url)
                            <a href="{{ $portfolio->demo_url }}" target="_blank" rel="noopener"
                               class="text-xs font-medium text-slate-500 hover:text-slate-800 transition flex items-center gap-1">
                                <span>Live Demo</span>
                                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                </svg>
                            </a>
                        @endif

                    </div>

                </div>

            </article>

            @empty

            <div class="col-span-3 text-center py-16 bg-white/60 rounded-3xl border border-slate-100">
                <div class="text-4xl mb-3">💼</div>
                <h3 class="text-lg font-semibold text-slate-800">Belum ada portofolio di kategori ini</h3>
                <p class="text-sm text-slate-500 mt-1">
                    Silakan pilih kategori lain atau hubungi kami untuk mendiskusikan portofolio serupa.
                </p>
                @if($selectedCategory)
                    <a href="{{ route('portfolio.index') }}" class="mt-4 inline-block text-xs font-semibold text-cyan-600 hover:underline">
                        Tampilkan Semua Proyek
                    </a>
                @endif
            </div>

            @endforelse

        </div>

        <div class="mt-16">
            {{ $portfolios->links() }}
        </div>

    </div>

</section>

@endsection
