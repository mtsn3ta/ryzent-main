{{-- ANIMATED METRICS COUNTER & TECH STACK GRID --}}
<section class="relative py-16 border-y border-slate-100 dark:border-slate-800/80 bg-slate-50/60 dark:bg-slate-900/40 transition-colors duration-200">
    <div class="max-w-7xl mx-auto px-6">

        {{-- METRICS COUNTER --}}
        <div x-data="{
                c1: 0,
                c2: 0,
                c3: 0,
                c4: 0,
                hasAnimated: false,
                animate() {
                    if (this.hasAnimated) return;
                    this.hasAnimated = true;
                    
                    let duration = 1800;
                    let steps = 40;
                    let stepTime = duration / steps;
                    let curStep = 0;

                    let timer = setInterval(() => {
                        curStep++;
                        let progress = curStep / steps;
                        this.c1 = Math.floor(15 * progress);
                        this.c2 = Math.floor(10000 * progress);
                        this.c3 = (99.9 * progress).toFixed(1);
                        this.c4 = Math.floor(24 * progress);

                        if (curStep >= steps) {
                            clearInterval(timer);
                            this.c1 = 15;
                            this.c2 = 10000;
                            this.c3 = 99.9;
                            this.c4 = 24;
                        }
                    }, stepTime);
                }
            }"
            x-init="
                let observer = new IntersectionObserver((entries) => {
                    if (entries[0].isIntersecting) {
                        animate();
                        observer.disconnect();
                    }
                }, { threshold: 0.2 });
                observer.observe($el);
            "
            class="grid grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8">

            {{-- Stat 1 --}}
            <div class="rounded-3xl border border-slate-200/80 dark:border-slate-800 bg-white/80 dark:bg-slate-900/80 p-6 lg:p-8 text-center shadow-sm backdrop-blur-xl transition hover:-translate-y-1">
                <div class="text-3xl lg:text-5xl font-black bg-linear-to-r from-blue-600 to-cyan-500 bg-clip-text text-transparent">
                    <span x-text="c1">15</span>+
                </div>
                <div class="mt-2 text-xs lg:text-sm font-semibold text-slate-800 dark:text-slate-200">
                    Proyek Digital & Sistem Aktif
                </div>
                <p class="mt-1 text-xs text-slate-600 dark:text-slate-400">
                    Sekolah, olahraga, SaaS & korporat
                </p>
            </div>

            {{-- Stat 2 --}}
            <div class="rounded-3xl border border-slate-200/80 dark:border-slate-800 bg-white/80 dark:bg-slate-900/80 p-6 lg:p-8 text-center shadow-sm backdrop-blur-xl transition hover:-translate-y-1">
                <div class="text-3xl lg:text-5xl font-black bg-linear-to-r from-blue-600 to-cyan-500 bg-clip-text text-transparent">
                    <span x-text="c2.toLocaleString('id-ID')">10.000</span>+
                </div>
                <div class="mt-2 text-xs lg:text-sm font-semibold text-slate-800 dark:text-slate-200">
                    Data Siswa, Atlet & Pengguna
                </div>
                <p class="mt-1 text-xs text-slate-600 dark:text-slate-400">
                    Terkelola cepat tanpa kendala server
                </p>
            </div>

            {{-- Stat 3 --}}
            <div class="rounded-3xl border border-slate-200/80 dark:border-slate-800 bg-white/80 dark:bg-slate-900/80 p-6 lg:p-8 text-center shadow-sm backdrop-blur-xl transition hover:-translate-y-1">
                <div class="text-3xl lg:text-5xl font-black bg-linear-to-r from-blue-600 to-cyan-500 bg-clip-text text-transparent">
                    <span x-text="c3">99.9</span>%
                </div>
                <div class="mt-2 text-xs lg:text-sm font-semibold text-slate-800 dark:text-slate-200">
                    Reliabilitas & Server Uptime
                </div>
                <p class="mt-1 text-xs text-slate-600 dark:text-slate-400">
                    Optimalisasi Nginx & Cloud VPS
                </p>
            </div>

            {{-- Stat 4 --}}
            <div class="rounded-3xl border border-slate-200/80 dark:border-slate-800 bg-white/80 dark:bg-slate-900/80 p-6 lg:p-8 text-center shadow-sm backdrop-blur-xl transition hover:-translate-y-1">
                <div class="text-3xl lg:text-5xl font-black bg-linear-to-r from-blue-600 to-cyan-500 bg-clip-text text-transparent">
                    <span x-text="c4">24</span>/7
                </div>
                <div class="mt-2 text-xs lg:text-sm font-semibold text-slate-800 dark:text-slate-200">
                    Dukungan & Pemeliharaan
                </div>
                <p class="mt-1 text-xs text-slate-600 dark:text-slate-400">
                    Garansi bug & pendampingan tim
                </p>
            </div>

        </div>

        {{-- TECH STACK GRID --}}
        <div class="mt-16 text-center">
            <p class="text-xs font-bold uppercase tracking-widest text-slate-600 dark:text-slate-400">
                Pondasi Teknologi Mutakhir Yang Digunakan Ryzent
            </p>

            <div class="mt-8 flex flex-wrap justify-center items-center gap-3 lg:gap-4">
                {{-- Laravel --}}
                <div class="inline-flex items-center gap-2.5 rounded-2xl border border-slate-200/80 dark:border-slate-800 bg-white/80 dark:bg-slate-900/90 px-4 py-2.5 text-xs font-semibold text-slate-800 dark:text-slate-200 shadow-xs transition hover:scale-105 hover:border-red-500/50">
                    <span class="flex h-6 w-6 items-center justify-center rounded-lg bg-red-50 dark:bg-red-950/60 text-red-600 font-bold text-[10px]">Lv</span>
                    <span>Laravel 13 & PHP 8.3</span>
                </div>

                {{-- Filament --}}
                <div class="inline-flex items-center gap-2.5 rounded-2xl border border-slate-200/80 dark:border-slate-800 bg-white/80 dark:bg-slate-900/90 px-4 py-2.5 text-xs font-semibold text-slate-800 dark:text-slate-200 shadow-xs transition hover:scale-105 hover:border-amber-500/50">
                    <span class="flex h-6 w-6 items-center justify-center rounded-lg bg-amber-50 dark:bg-amber-950/60 text-amber-600 font-bold text-[10px]">⚡</span>
                    <span>Filament Admin v4</span>
                </div>

                {{-- Tailwind --}}
                <div class="inline-flex items-center gap-2.5 rounded-2xl border border-slate-200/80 dark:border-slate-800 bg-white/80 dark:bg-slate-900/90 px-4 py-2.5 text-xs font-semibold text-slate-800 dark:text-slate-200 shadow-xs transition hover:scale-105 hover:border-cyan-500/50">
                    <span class="flex h-6 w-6 items-center justify-center rounded-lg bg-cyan-50 dark:bg-cyan-950/60 text-cyan-600 font-bold text-[10px]">Tw</span>
                    <span>Tailwind CSS v4</span>
                </div>

                {{-- Alpine.js --}}
                <div class="inline-flex items-center gap-2.5 rounded-2xl border border-slate-200/80 dark:border-slate-800 bg-white/80 dark:bg-slate-900/90 px-4 py-2.5 text-xs font-semibold text-slate-800 dark:text-slate-200 shadow-xs transition hover:scale-105 hover:border-teal-500/50">
                    <span class="flex h-6 w-6 items-center justify-center rounded-lg bg-teal-50 dark:bg-teal-950/60 text-teal-600 font-bold text-[10px]">Al</span>
                    <span>Alpine.js Reactive</span>
                </div>

                {{-- AI Integration --}}
                <div class="inline-flex items-center gap-2.5 rounded-2xl border border-blue-200 dark:border-blue-900/80 bg-blue-50/70 dark:bg-blue-950/50 px-4 py-2.5 text-xs font-semibold text-blue-700 dark:text-cyan-300 shadow-xs transition hover:scale-105">
                    <span class="flex h-6 w-6 items-center justify-center rounded-lg bg-blue-600 text-white font-bold text-[10px]">AI</span>
                    <span>Gemini AI API & LLM</span>
                </div>

                {{-- Cloud VPS & Nginx --}}
                <div class="inline-flex items-center gap-2.5 rounded-2xl border border-slate-200/80 dark:border-slate-800 bg-white/80 dark:bg-slate-900/90 px-4 py-2.5 text-xs font-semibold text-slate-800 dark:text-slate-200 shadow-xs transition hover:scale-105 hover:border-indigo-500/50">
                    <span class="flex h-6 w-6 items-center justify-center rounded-lg bg-indigo-50 dark:bg-indigo-950/60 text-indigo-600 font-bold text-[10px]">☁</span>
                    <span>Linux Ubuntu VPS & Nginx</span>
                </div>

                {{-- MariaDB / MySQL --}}
                <div class="inline-flex items-center gap-2.5 rounded-2xl border border-slate-200/80 dark:border-slate-800 bg-white/80 dark:bg-slate-900/90 px-4 py-2.5 text-xs font-semibold text-slate-800 dark:text-slate-200 shadow-xs transition hover:scale-105 hover:border-blue-500/50">
                    <span class="flex h-6 w-6 items-center justify-center rounded-lg bg-blue-50 dark:bg-blue-950/60 text-blue-600 font-bold text-[10px]">DB</span>
                    <span>MariaDB & Redis Cache</span>
                </div>
            </div>
        </div>

    </div>
</section>
