{{-- TESTIMONIAL & SOCIAL PROOF SLIDER --}}
<section class="relative py-24 bg-white dark:bg-slate-950 overflow-hidden transition-colors duration-200">
    <div class="max-w-6xl mx-auto px-6">

        {{-- Header --}}
        <div class="text-center max-w-3xl mx-auto">
            <div class="inline-flex items-center gap-1.5 rounded-full border border-amber-200 dark:border-amber-900/60 bg-amber-50/80 dark:bg-amber-950/40 px-4 py-2 text-xs font-semibold text-amber-700 dark:text-amber-300 backdrop-blur-md">
                <span>⭐ Testimoni Klien & Mitra</span>
            </div>

            <h2 class="mt-6 text-4xl lg:text-5xl font-bold tracking-tight text-slate-900 dark:text-white leading-tight">
                Dipercaya Oleh Sekolah, Pelatih & Pemilik Bisnis
            </h2>

            <p class="mt-4 text-lg text-slate-600 dark:text-slate-400">
                Pengalaman nyata dari mereka yang telah mentransformasi sistem informasi dan alur kerja operasional bersama Ryzent.
            </p>
        </div>

        {{-- TESTIMONIAL SLIDER (ALPINE.JS) --}}
        <div class="mt-16 relative"
             x-data="{
                active: 0,
                testimonials: [
                    {
                        name: 'Drs. H. Syamsul Huda, M.Pd.I',
                        role: 'Kepala MTsN 3 Tulungagung',
                        category: 'Website Sekolah & Sistem Kelulusan',
                        text: 'Sistem informasi dan platform kelulusan online yang dibangun oleh tim Ryzent sangat membantu sekolah kami. Ribuan wali murid dan siswa dapat mengakses pengumuman secara serentak dengan sangat cepat tanpa kendala server down. Dukungan teknisnya sangat responsif dan dapat diandalkan!',
                        rating: 5
                    },
                    {
                        name: 'Coach Bagus Hendro',
                        role: 'Pelatih Kepala & Pengelola Atletik',
                        category: 'Platform NESTAthletic (atletik.ryzent.id)',
                        text: 'Dengan hadirnya sistem NESTAthletic di atletik.ryzent.id, manajemen data atlet, kartu digital ber-QR token unik, dan raport performa fisik kini tersusun rapi otomatis. Orang tua atlet sangat senang karena bisa memantau perkembangan anak secara transparan tanpa repot.',
                        rating: 5
                    },
                    {
                        name: 'Rizky Pratama, S.Kom',
                        role: 'Founder & CTO Digital Solution',
                        category: 'Custom SaaS & Integrasi AI',
                        text: 'Struktur kode Laravel dan Filament yang disiapkan tim Ryzent sangat bersih, modular, dan mengikuti best-practice industri. Integrasi API AI yang dibangun bekerja presisi dan menghemat banyak waktu operasional bisnis kami. Rekomendasi software house terbaik!',
                        rating: 5
                    }
                ],
                prev() {
                    this.active = (this.active - 1 + this.testimonials.length) % this.testimonials.length;
                },
                next() {
                    this.active = (this.active + 1) % this.testimonials.length;
                }
             }">

            <div class="relative overflow-hidden rounded-4xl border border-slate-200/80 dark:border-slate-800 bg-linear-to-b from-slate-50/50 to-white dark:from-slate-900/60 dark:to-slate-900 p-8 lg:p-14 shadow-xl">

                {{-- Quote Decorative Icon --}}
                <div class="absolute top-8 right-8 text-7xl font-serif text-slate-200/60 dark:text-slate-800/80 select-none pointer-events-none">
                    “
                </div>

                {{-- Slider Content --}}
                <template x-for="(item, index) in testimonials" :key="index">
                    <div x-show="active === index"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 translate-y-2"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         class="space-y-6">

                        {{-- Stars Rating --}}
                        <div class="flex items-center gap-1 text-amber-400">
                            <template x-for="i in item.rating">
                                <svg class="h-5 w-5 fill-current" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                            </template>
                            <span class="ml-2 text-xs font-semibold text-slate-500 dark:text-slate-400" x-text="item.category"></span>
                        </div>

                        {{-- Review Quote --}}
                        <p class="text-lg lg:text-2xl font-medium text-slate-800 dark:text-slate-100 leading-relaxed italic"
                           x-text="'“' + item.text + '”'">
                        </p>

                        {{-- Author Bio --}}
                        <div class="pt-6 border-t border-slate-200/60 dark:border-slate-800 flex items-center justify-between">
                            <div class="flex items-center gap-4">
                                <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-linear-to-tr from-blue-600 to-cyan-500 text-white font-black text-lg shadow-md shadow-blue-500/20">
                                    <span x-text="item.name.charAt(0)"></span>
                                </div>
                                <div>
                                    <h4 class="font-bold text-slate-900 dark:text-white text-base" x-text="item.name"></h4>
                                    <p class="text-xs text-slate-500 dark:text-slate-400" x-text="item.role"></p>
                                </div>
                            </div>

                            {{-- Navigation Buttons --}}
                            <div class="flex items-center gap-2">
                                <button type="button" @click="prev()" aria-label="Previous testimonial"
                                        class="flex h-10 w-10 items-center justify-center rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-700 dark:text-slate-200 shadow-xs transition hover:bg-slate-100 dark:hover:bg-slate-700">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                    </svg>
                                </button>
                                <button type="button" @click="next()" aria-label="Next testimonial"
                                        class="flex h-10 w-10 items-center justify-center rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-700 dark:text-slate-200 shadow-xs transition hover:bg-slate-100 dark:hover:bg-slate-700">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                    </div>
                </template>

            </div>

            {{-- Slider Dots --}}
            <div class="mt-6 flex justify-center items-center gap-2">
                <template x-for="(item, idx) in testimonials" :key="idx">
                    <button type="button" @click="active = idx"
                            class="h-2 rounded-full transition-all duration-300"
                            :class="active === idx ? 'w-8 bg-blue-600' : 'w-2 bg-slate-300 dark:bg-slate-700'"></button>
                </template>
            </div>

        </div>

    </div>
</section>
