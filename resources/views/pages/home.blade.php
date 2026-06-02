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

@endsection