{{-- INTERACTIVE PROJECT COST ESTIMATOR --}}
<section id="estimator" class="relative py-24 bg-slate-50/80 dark:bg-slate-900/60 overflow-hidden border-t border-slate-100 dark:border-slate-800 transition-colors duration-200"
    x-data="{
        projectType: 'saas',
        features: ['multirole', 'pdf'],
        types: {
            website: { name: 'Website Sekolah / Profil Instansi', basePrice: 3500000, days: 10, desc: 'Profil profesional, informasi terpadu, dan manajemen berita.' },
            saas: { name: 'Aplikasi SaaS & Sistem Manajemen', basePrice: 6500000, days: 20, desc: 'Aplikasi web multi-tenant dengan workflow data terotomatisasi.' },
            sports: { name: 'Sistem Olahraga, Atletik & E-ID', basePrice: 5000000, days: 15, desc: 'Pencatatan data atlet, kartu digital, dan evaluasi fisik.' },
            ai: { name: 'Solusi Custom AI & Automasi Data', basePrice: 7500000, days: 25, desc: 'Integrasi LLM, cerdas ekstraksi dokumen & chatbot sistem.' }
        },
        availableFeatures: [
            { id: 'multirole', name: 'Multi-Role Access Control (Admin, Guru/Pelatih, Siswa/Atlet)', price: 1000000, days: 3 },
            { id: 'whatsapp', name: 'WhatsApp Gateway Otomatis (Notifikasi tagihan, OTP, blast info)', price: 1200000, days: 3 },
            { id: 'payment', name: 'Payment Gateway Terintegrasi (QRIS otomatis, VA Bank, E-Wallet)', price: 1500000, days: 4 },
            { id: 'pdf', name: 'Generate PDF Otomatis (Cetak Raport, Sertifikat, Invoice Resmi)', price: 900000, days: 2 },
            { id: 'qrcode', name: 'Kartu E-ID Digital & Token QR Verifikasi Publik', price: 800000, days: 2 },
            { id: 'ai_bot', name: 'Integrasi AI Assistant / Smart Chatbot (Google Gemini API)', price: 2000000, days: 5 },
            { id: 'vps', name: 'Setup Cloud VPS Linux + SSL, Nginx & Backup Terjadwal', price: 1000000, days: 2 }
        ],
        toggleFeature(id) {
            if (this.features.includes(id)) {
                this.features = this.features.filter(f => f !== id);
            } else {
                this.features.push(id);
            }
        },
        getTotalPrice() {
            let base = this.types[this.projectType].basePrice;
            let extra = this.features.reduce((acc, fId) => {
                let f = this.availableFeatures.find(item => item.id === fId);
                return acc + (f ? f.price : 0);
            }, 0);
            return base + extra;
        },
        getTotalDays() {
            let base = this.types[this.projectType].days;
            let extra = this.features.reduce((acc, fId) => {
                let f = this.availableFeatures.find(item => item.id === fId);
                return acc + (f ? f.days : 0);
            }, 0);
            return base + extra;
        },
        getFormattedPrice() {
            return 'Rp ' + this.getTotalPrice().toLocaleString('id-ID');
        },
        getEstimatedWeeks() {
            let days = this.getTotalDays();
            let weeks = Math.ceil(days / 6);
            return weeks + ' - ' + (weeks + 1) + ' Minggu';
        },
        getWhatsAppLink() {
            let phone = '{{ preg_replace('/[^0-9]/', '', $siteSettings?->whatsapp ?? '628123456789') }}';
            let selectedType = this.types[this.projectType].name;
            let selectedFeats = this.features.map(fId => {
                let f = this.availableFeatures.find(item => item.id === fId);
                return f ? f.name : '';
            }).filter(Boolean).join('\n  - ');
            
            let text = 'Halo Tim Ryzent, saya telah menghitung estimasi kebutuhan sistem melalui Kalkulator Estimasi di website ryzent.id dengan rincian berikut:\n\n' +
                       '📌 Tipe Sistem: ' + selectedType + '\n' +
                       '🧩 Fitur Pilihan:\n  - ' + (selectedFeats || 'Tidak ada fitur tambahan') + '\n\n' +
                       '💰 Perkiraan Investasi: ' + this.getFormattedPrice() + '\n' +
                       '⏱ Perkiraan Timeline: ' + this.getEstimatedWeeks() + '\n\n' +
                       'Saya ingin menjadwalkan konsultasi awal untuk proyek ini. Mohon arahannya. Terima kasih!';
            return 'https://wa.me/' + phone + '?text=' + encodeURIComponent(text);
        }
    }">

    <div class="max-w-7xl mx-auto px-6">

        {{-- Header --}}
        <div class="text-center max-w-3xl mx-auto">
            <div class="inline-flex items-center gap-2 rounded-full border border-blue-200 dark:border-blue-800 bg-white dark:bg-slate-800 px-4 py-2 text-xs font-semibold text-blue-700 dark:text-cyan-300 shadow-xs">
                <span>⚡ Transparan & Fleksibel</span>
            </div>

            <h2 class="mt-6 text-4xl lg:text-5xl font-bold tracking-tight text-slate-900 dark:text-white leading-tight">
                Kalkulator Estimasi Biaya & Fitur
            </h2>

            <p class="mt-4 text-lg text-slate-600 dark:text-slate-400">
                Pilih jenis aplikasi dan modul fitur yang Anda butuhkan untuk melihat perkiraan awal investasi pengembangan dan timeline pengerjaan secara transparan.
            </p>
        </div>

        {{-- CALCULATOR INTERFACE --}}
        <div class="mt-16 grid lg:grid-cols-12 gap-8 items-start">

            {{-- LEFT: CONFIGURATOR (8 COLS) --}}
            <div class="lg:col-span-7 space-y-8">

                {{-- Step 1: Project Type Selection --}}
                <div class="rounded-4xl border border-slate-200/80 dark:border-slate-800 bg-white/90 dark:bg-slate-900/90 p-6 lg:p-8 shadow-sm">
                    <div class="flex items-center gap-3 mb-6">
                        <span class="flex h-8 w-8 items-center justify-center rounded-xl bg-blue-600 text-white font-bold text-xs">
                            1
                        </span>
                        <h3 class="text-lg font-bold text-slate-900 dark:text-white">
                            Pilih Kategori Sistem Yang Ingin Dibangun
                        </h3>
                    </div>

                    <div class="grid sm:grid-cols-2 gap-4">
                        <template x-for="(typeData, typeKey) in types" :key="typeKey">
                            <button type="button"
                                    @click="projectType = typeKey"
                                    class="text-left rounded-2xl p-5 border transition-all relative cursor-pointer"
                                    :class="projectType === typeKey 
                                        ? 'border-blue-600 dark:border-cyan-400 bg-blue-50/50 dark:bg-slate-800/80 ring-2 ring-blue-500/20' 
                                        : 'border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 hover:border-slate-300 dark:hover:border-slate-700'">
                                <div class="flex items-start justify-between">
                                    <h4 class="font-bold text-sm text-slate-900 dark:text-white" x-text="typeData.name"></h4>
                                    <div class="h-4 w-4 rounded-full border flex items-center justify-center"
                                         :class="projectType === typeKey ? 'border-blue-600 bg-blue-600' : 'border-slate-300'">
                                        <div class="h-1.5 w-1.5 rounded-full bg-white" x-show="projectType === typeKey"></div>
                                    </div>
                                </div>
                                <p class="mt-2 text-xs text-slate-500 dark:text-slate-400 line-clamp-2" x-text="typeData.desc"></p>
                                <div class="mt-3 text-xs font-semibold text-blue-600 dark:text-cyan-400">
                                    Mulai Rp <span x-text="typeData.basePrice.toLocaleString('id-ID')"></span>
                                </div>
                            </button>
                        </template>
                    </div>
                </div>

                {{-- Step 2: Extra Features Checkboxes --}}
                <div class="rounded-4xl border border-slate-200/80 dark:border-slate-800 bg-white/90 dark:bg-slate-900/90 p-6 lg:p-8 shadow-sm">
                    <div class="flex items-center gap-3 mb-6">
                        <span class="flex h-8 w-8 items-center justify-center rounded-xl bg-blue-600 text-white font-bold text-xs">
                            2
                        </span>
                        <h3 class="text-lg font-bold text-slate-900 dark:text-white">
                            Pilih Modul & Fitur Tambahan
                        </h3>
                    </div>

                    <div class="space-y-3">
                        <template x-for="feature in availableFeatures" :key="feature.id">
                            <label class="flex items-start gap-4 rounded-2xl border p-4 cursor-pointer transition-all"
                                   :class="features.includes(feature.id)
                                       ? 'border-cyan-500/70 bg-cyan-50/40 dark:bg-cyan-950/30 dark:border-cyan-700'
                                       : 'border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 hover:border-slate-300 dark:hover:border-slate-700'">
                                <input type="checkbox"
                                       :value="feature.id"
                                       :checked="features.includes(feature.id)"
                                       @change="toggleFeature(feature.id)"
                                       class="mt-1 h-4 w-4 rounded-md border-slate-300 text-blue-600 focus:ring-blue-500">
                                <div class="flex-1 text-xs">
                                    <div class="font-bold text-slate-900 dark:text-slate-100" x-text="feature.name"></div>
                                    <div class="mt-1 text-slate-500 dark:text-slate-400">+<span x-text="feature.days"></span> hari pengerjaan</div>
                                </div>
                                <div class="font-bold text-xs text-blue-600 dark:text-cyan-400 whitespace-nowrap">
                                    +Rp <span x-text="feature.price.toLocaleString('id-ID')"></span>
                                </div>
                            </label>
                        </template>
                    </div>
                </div>

            </div>

            {{-- RIGHT: ESTIMATE SUMMARY CARD (5 COLS) --}}
            <div class="lg:col-span-5 sticky top-24">
                <div class="rounded-4xl border border-blue-200 dark:border-blue-900/60 bg-linear-to-b from-white to-blue-50/30 dark:from-slate-900 dark:to-slate-950 p-8 shadow-xl">
                    <span class="inline-flex items-center gap-1.5 rounded-full bg-cyan-100 dark:bg-cyan-900/60 px-3 py-1 text-xs font-bold text-cyan-800 dark:text-cyan-300">
                        ⚡ Ringkasan Estimasi Biaya
                    </span>

                    <div class="mt-6 border-b border-slate-200/80 dark:border-slate-800 pb-6">
                        <div class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                            Estimasi Total Investasi
                        </div>
                        <div class="mt-2 text-3xl lg:text-4xl font-black bg-linear-to-r from-blue-600 to-cyan-500 bg-clip-text text-transparent"
                             x-text="getFormattedPrice()">
                            Rp 0
                        </div>
                        <div class="mt-2 text-xs text-slate-500 dark:text-slate-400">
                            *Biaya dapat disesuaikan dengan kebutuhan spesifik & skala institusi.
                        </div>
                    </div>

                    {{-- Timeline Specs --}}
                    <div class="py-6 border-b border-slate-200/80 dark:border-slate-800 space-y-3 text-xs">
                        <div class="flex justify-between items-center">
                            <span class="text-slate-500 dark:text-slate-400">Estimasi Timeline:</span>
                            <span class="font-bold text-slate-900 dark:text-white" x-text="getEstimatedWeeks()"></span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-slate-500 dark:text-slate-400">Garansi Bug & Error:</span>
                            <span class="font-bold text-emerald-600 dark:text-emerald-400">Gratis (1-3 Bulan)</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-slate-500 dark:text-slate-400">Kepemilikan Source Code:</span>
                            <span class="font-bold text-slate-900 dark:text-white">100% Hak Milik Klien</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-slate-500 dark:text-slate-400">Server & Deployment:</span>
                            <span class="font-bold text-slate-900 dark:text-white">Siap Live di Cloud VPS</span>
                        </div>
                    </div>

                    {{-- Call To Action Button --}}
                    <div class="mt-8 space-y-3">
                        <a :href="getWhatsAppLink()"
                           target="_blank"
                           rel="noopener"
                           class="flex w-full items-center justify-center gap-2 rounded-2xl bg-linear-to-r from-blue-600 to-cyan-500 py-4 font-bold text-sm text-white shadow-lg shadow-blue-500/25 transition-all duration-300 hover:scale-105 hover:shadow-cyan-500/25">
                            <span>Kirim Rincian Ini ke WhatsApp</span>
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </a>

                        <p class="text-center text-[11px] text-slate-400">
                            Diskusikan penawaran harga khusus atau skema pembayaran termin bersama tim konsultan kami.
                        </p>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>
