@extends('layouts.app')

@section('content')

<section class="relative overflow-hidden">

    <div class="max-w-7xl mx-auto px-6 py-24">

        <div class="grid lg:grid-cols-2 gap-16 items-center">

            {{-- LEFT --}}
            <div>

                <span
                    class="inline-flex items-center rounded-full bg-blue-50 px-4 py-2 text-sm text-blue-600"
                >
                    ⚡ Website • SaaS • AI Solutions
                </span>

                <h1
                    class="mt-6 text-5xl font-bold leading-tight text-slate-900"
                >
                    Membangun Website,
                    SaaS, dan Solusi AI
                    untuk Sekolah dan
                    Bisnis Modern.
                </h1>

                <p
                    class="mt-6 text-lg text-slate-600"
                >
                    Ryzent membantu sekolah,
                    organisasi olahraga,
                    dan bisnis membangun
                    sistem digital modern
                    berbasis Laravel, AI,
                    dan Cloud Infrastructure.
                </p>

                <div class="mt-8 flex gap-4">

                    <a
                        href="/portfolio"
                        class="rounded-xl bg-blue-600 px-6 py-3 text-white"
                    >
                        Lihat Portofolio
                    </a>

                    <a
                        href="/contact"
                        class="rounded-xl border border-slate-300 px-6 py-3"
                    >
                        Konsultasi Gratis
                    </a>

                </div>

            </div>

            {{-- RIGHT --}}
            <div>

                <div
                    class="rounded-3xl border border-slate-200 bg-white p-6 shadow-2xl"
                >

                    <img
                        src="https://placehold.co/900x600"
                        alt="SIGMA-3"
                        class="rounded-2xl"
                    >

                </div>

            </div>

        </div>

    </div>

</section>

<section class="py-24 bg-slate-50">

    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center">

            <h2 class="text-4xl font-bold text-slate-900">
                Layanan Kami
            </h2>

            <p class="mt-4 text-slate-600">
                Solusi digital untuk sekolah,
                organisasi, dan bisnis modern.
            </p>

        </div>

        <div class="mt-16 grid md:grid-cols-2 lg:grid-cols-3 gap-8">

            @forelse($services as $service)

                <div
                    class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm hover:shadow-xl transition"
                >

                    <h3 class="text-xl font-semibold text-slate-900">
                        {{ $service->title }}
                    </h3>

                    <p class="mt-4 text-slate-600">
                        {{ $service->excerpt }}
                    </p>

                    @if($service->price_start)
                        <div class="mt-6 text-blue-600 font-bold">
                            Mulai Rp {{ number_format($service->price_start, 0, ',', '.') }}
                        </div>
                    @endif

                </div>

            @empty

                <div class="col-span-3 text-center text-slate-500">
                    Belum ada layanan tersedia.
                </div>

            @endforelse

        </div>

    </div>

</section>

<section class="py-24">

    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center">

            <h2 class="text-4xl font-bold text-slate-900">
                Featured Portfolio
            </h2>

            <p class="mt-4 text-slate-600">
                Beberapa proyek yang telah kami bangun.
            </p>

        </div>

        <div class="mt-16 grid md:grid-cols-2 lg:grid-cols-3 gap-8">

            @forelse($portfolios as $portfolio)

                <div
                    class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm hover:shadow-xl transition"
                >

                    @if($portfolio->thumbnail)

                        <img
                            src="{{ asset('storage/' . $portfolio->thumbnail) }}"
                            alt="{{ $portfolio->title }}"
                            class="h-56 w-full object-cover"
                        >

                    @else

                        <div
                            class="flex h-56 items-center justify-center bg-slate-100"
                        >
                            No Image
                        </div>

                    @endif

                    <div class="p-6">

                        <span
                            class="inline-block rounded-full bg-blue-50 px-3 py-1 text-xs text-blue-600"
                        >
                            {{ $portfolio->category }}
                        </span>

                        <h3
                            class="mt-4 text-xl font-semibold text-slate-900"
                        >
                            {{ $portfolio->title }}
                        </h3>

                        <p
                            class="mt-3 text-slate-600"
                        >
                            {{ $portfolio->excerpt }}
                        </p>

                        <div class="mt-6 flex items-center justify-between">

                            <span
                                class="text-sm text-slate-500"
                            >
                                {{ $portfolio->status }}
                            </span>

                            <a
                                href="#"
                                class="font-medium text-blue-600"
                            >
                                Detail →
                            </a>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-span-3 text-center text-slate-500">
                    Belum ada portfolio.
                </div>

            @endforelse

        </div>

    </div>

</section>

@endsection
