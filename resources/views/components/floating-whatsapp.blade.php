@if($siteSettings?->whatsapp)
    @php
        $cleanPhone = preg_replace('/[^0-9]/', '', $siteSettings->whatsapp);
        $waMessage = rawurlencode('Halo Tim Ryzent, saya ingin konsultasi mengenai pembuatan sistem digital / website / AI...');
    @endphp
    <div class="fixed bottom-6 right-6 z-40 flex items-center gap-3 group">
        <a href="https://wa.me/{{ $cleanPhone }}?text={{ $waMessage }}"
           target="_blank"
           rel="noopener noreferrer"
           aria-label="Chat WhatsApp"
           class="relative flex items-center gap-2.5 rounded-full bg-emerald-500 px-5 py-3.5 text-white shadow-2xl shadow-emerald-500/40 transition-all duration-300 hover:bg-emerald-600 hover:scale-105 hover:shadow-emerald-500/60 focus:outline-none focus:ring-4 focus:ring-emerald-300">
            
            <span class="absolute -top-1 -right-1 flex h-3.5 w-3.5">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-300 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-3.5 w-3.5 bg-emerald-400"></span>
            </span>

            {{-- WhatsApp SVG Icon --}}
            <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91C2.13 13.66 2.59 15.36 3.45 16.86L2.05 22L7.3 20.62C8.75 21.41 10.38 21.83 12.04 21.83C17.5 21.83 21.95 17.38 21.95 11.92C21.95 9.27 20.92 6.78 19.05 4.91C17.18 3.03 14.69 2 12.04 2M12.05 3.67C14.25 3.67 16.31 4.53 17.87 6.09C19.42 7.65 20.28 9.72 20.28 11.92C20.28 16.46 16.58 20.15 12.04 20.15C10.56 20.15 9.11 19.76 7.85 19.01L7.55 18.83L4.43 19.65L5.26 16.61L5.06 16.29C4.24 14.99 3.8 13.47 3.8 11.91C3.81 7.37 7.5 3.67 12.05 3.67M9.53 7.34C9.36 7.34 9.09 7.4 8.87 7.65C8.65 7.89 8.02 8.48 8.02 9.68C8.02 10.88 8.9 12.04 9.02 12.2C9.14 12.37 10.74 14.85 13.19 15.91C13.78 16.16 14.23 16.31 14.59 16.42C15.18 16.61 15.72 16.58 16.15 16.52C16.63 16.45 17.62 15.92 17.83 15.34C18.04 14.75 18.04 14.25 17.98 14.15C17.91 14.04 17.74 13.98 17.48 13.85C17.23 13.72 15.99 13.11 15.76 13.03C15.53 12.94 15.37 12.9 15.2 13.15C15.04 13.4 14.56 13.98 14.41 14.15C14.27 14.31 14.12 14.33 13.87 14.21C13.62 14.08 12.82 13.82 11.87 12.98C11.13 12.32 10.63 11.51 10.49 11.26C10.34 11.01 10.47 10.88 10.6 10.75C10.71 10.64 10.85 10.46 10.98 10.31C11.1 10.16 11.14 10.05 11.23 9.89C11.31 9.72 11.27 9.58 11.21 9.45C11.14 9.33 10.65 8.13 10.45 7.63C10.25 7.15 10.05 7.21 9.89 7.21C9.74 7.2 9.57 7.2 9.4 7.2L9.53 7.34Z"/>
            </svg>
            <span class="hidden sm:inline font-semibold text-sm">Konsultasi WhatsApp</span>
        </a>
    </div>
@endif
