<footer class="relative overflow-hidden bg-slate-950 text-slate-300">
    <div class="absolute left-0 top-0 h-72 w-72 rounded-full bg-blue-500/10 blur-[120px]"></div>
    <div class="absolute right-0 bottom-0 h-72 w-72 rounded-full bg-cyan-500/10 blur-[120px]"></div>

    <div class="relative max-w-7xl mx-auto px-6 pt-20 pb-12">
        <div class="grid gap-12 md:grid-cols-2 lg:grid-cols-4">

            {{-- Kolom 1: Profil Perusahaan --}}
            <div class="space-y-4">
                <a href="{{ route('home') }}" class="flex items-center gap-3">
                    @if ($siteSettings?->logo)
                        <img src="{{ asset('storage/' . $siteSettings->logo) }}" alt="{{ $siteSettings->site_name }}"
                            width="40" height="40" loading="lazy" decoding="async"
                            class="h-10 w-auto rounded-lg">
                    @else
                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-linear-to-tr from-blue-600 to-cyan-500 font-bold text-white shadow-md shadow-blue-500/20">
                            R
                        </div>
                    @endif

                    <div>
                        <h3 class="text-xl font-bold bg-linear-to-r from-white to-cyan-300 bg-clip-text text-transparent">
                            {{ $siteSettings?->site_name ?? 'Ryzent' }}
                        </h3>
                        @if ($siteSettings?->tagline)
                            <p class="text-xs text-slate-400">
                                {{ $siteSettings?->tagline }}
                            </p>
                        @endif
                    </div>
                </a>

                <p class="text-sm text-slate-400 leading-relaxed">
                    Membantu sekolah, organisasi olahraga, dan bisnis membangun sistem digital modern, platform SaaS, serta integrasi AI berbasis cloud.
                </p>
            </div>

            {{-- Kolom 2: Navigasi Cepat --}}
            <div>
                <h4 class="font-semibold text-white tracking-wide text-sm uppercase">
                    Navigasi
                </h4>
                <ul class="mt-4 space-y-2.5 text-sm">
                    <li>
                        <a href="{{ route('home') }}" class="hover:text-cyan-400 transition">Beranda</a>
                    </li>
                    <li>
                        <a href="{{ route('services.index') }}" class="hover:text-cyan-400 transition">Layanan Digital</a>
                    </li>
                    <li>
                        <a href="{{ route('portfolio.index') }}" class="hover:text-cyan-400 transition">Portofolio Proyek</a>
                    </li>
                    <li>
                        <a href="{{ route('blog.index') }}" class="hover:text-cyan-400 transition">Artikel & Insight</a>
                    </li>
                    <li>
                        <a href="{{ url('/#contact') }}" class="hover:text-cyan-400 transition">Konsultasi Proyek</a>
                    </li>
                </ul>
            </div>

            {{-- Kolom 3: Kontak Resmi --}}
            <div>
                <h4 class="font-semibold text-white tracking-wide text-sm uppercase">
                    Kontak
                </h4>
                <ul class="mt-4 space-y-3 text-sm text-slate-400">
                    @if ($siteSettings?->email)
                        <li class="flex items-start gap-2.5">
                            <span class="text-cyan-400">✉</span>
                            <a href="mailto:{{ $siteSettings->email }}" class="hover:text-white transition break-all">
                                {{ $siteSettings->email }}
                            </a>
                        </li>
                    @endif

                    @if ($siteSettings?->whatsapp)
                        @php $cleanPhone = preg_replace('/[^0-9]/', '', $siteSettings->whatsapp); @endphp
                        <li class="flex items-start gap-2.5">
                            <span class="text-emerald-400">💬</span>
                            <a href="https://wa.me/{{ $cleanPhone }}" target="_blank" rel="noopener" class="hover:text-white transition">
                                +{{ $cleanPhone }} (WhatsApp)
                            </a>
                        </li>
                    @elseif ($siteSettings?->phone)
                        <li class="flex items-start gap-2.5">
                            <span class="text-cyan-400">📞</span>
                            <a href="tel:{{ $siteSettings->phone }}" class="hover:text-white transition">
                                {{ $siteSettings->phone }}
                            </a>
                        </li>
                    @endif

                    @if ($siteSettings?->address)
                        <li class="flex items-start gap-2.5">
                            <span class="text-cyan-400">📍</span>
                            <span>{{ $siteSettings->address }}</span>
                        </li>
                    @endif
                </ul>
            </div>

            {{-- Kolom 4: Media Sosial & Komunitas --}}
            <div>
                <h4 class="font-semibold text-white tracking-wide text-sm uppercase">
                    Media Sosial
                </h4>
                <p class="mt-4 text-xs text-slate-400">
                    Ikuti perkembangan, pembaruan teknologi, dan wawasan terkini dari Ryzent:
                </p>

                <div class="mt-4 flex flex-wrap gap-2.5">
                    @if ($siteSettings?->instagram)
                        <a href="{{ $siteSettings->instagram }}" target="_blank" rel="noopener" aria-label="Instagram"
                           class="flex h-10 w-10 items-center justify-center rounded-xl bg-slate-900 border border-slate-800 text-slate-400 hover:text-white hover:border-pink-500 hover:bg-pink-500/10 transition">
                            <svg class="h-5 w-5 fill-current" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </a>
                    @endif

                    @if ($siteSettings?->linkedin)
                        <a href="{{ $siteSettings->linkedin }}" target="_blank" rel="noopener" aria-label="LinkedIn"
                           class="flex h-10 w-10 items-center justify-center rounded-xl bg-slate-900 border border-slate-800 text-slate-400 hover:text-white hover:border-blue-500 hover:bg-blue-500/10 transition">
                            <svg class="h-5 w-5 fill-current" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                        </a>
                    @endif

                    @if ($siteSettings?->github)
                        <a href="{{ $siteSettings->github }}" target="_blank" rel="noopener" aria-label="GitHub"
                           class="flex h-10 w-10 items-center justify-center rounded-xl bg-slate-900 border border-slate-800 text-slate-400 hover:text-white hover:border-slate-400 hover:bg-white/5 transition">
                            <svg class="h-5 w-5 fill-current" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                        </a>
                    @endif

                    @if ($siteSettings?->facebook)
                        <a href="{{ $siteSettings->facebook }}" target="_blank" rel="noopener" aria-label="Facebook"
                           class="flex h-10 w-10 items-center justify-center rounded-xl bg-slate-900 border border-slate-800 text-slate-400 hover:text-white hover:border-blue-600 hover:bg-blue-600/10 transition">
                            <svg class="h-5 w-5 fill-current" viewBox="0 0 24 24"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/></svg>
                        </a>
                    @endif

                    @if ($siteSettings?->youtube)
                        <a href="{{ $siteSettings->youtube }}" target="_blank" rel="noopener" aria-label="YouTube"
                           class="flex h-10 w-10 items-center justify-center rounded-xl bg-slate-900 border border-slate-800 text-slate-400 hover:text-white hover:border-red-600 hover:bg-red-600/10 transition">
                            <svg class="h-5 w-5 fill-current" viewBox="0 0 24 24"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/></svg>
                        </a>
                    @endif

                    @if ($siteSettings?->tiktok)
                        <a href="{{ $siteSettings->tiktok }}" target="_blank" rel="noopener" aria-label="TikTok"
                           class="flex h-10 w-10 items-center justify-center rounded-xl bg-slate-900 border border-slate-800 text-slate-400 hover:text-white hover:border-cyan-400 hover:bg-cyan-400/10 transition">
                            <svg class="h-5 w-5 fill-current" viewBox="0 0 24 24"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-1.01-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.24 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/></svg>
                        </a>
                    @endif
                </div>
            </div>

        </div>

        {{-- Bottom Copyright --}}
        <div class="mt-16 border-t border-slate-900 pt-8 flex flex-col items-center justify-between gap-4 text-xs text-slate-400 md:flex-row">
            <p>
                © {{ date('Y') }} {{ $siteSettings?->site_name ?? 'Ryzent Cipta Digital' }}. All rights reserved.
            </p>
            <p class="flex items-center gap-2">
                <span>Built with</span>
                <span class="text-red-500" aria-label="cinta">♥</span>
                <span>using Laravel 13, Filament & Tailwind CSS</span>
            </p>
        </div>
    </div>
</footer>
