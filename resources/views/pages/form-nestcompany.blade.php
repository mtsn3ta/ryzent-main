@extends('layouts.app')



@section('content')

<section class="py-16 bg-slate-50 min-h-screen">

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

        

        <div class="text-center mb-10">

            <h1 class="text-3xl font-bold text-slate-900">Formulir Kebutuhan Sistem</h1>

            <p class="text-slate-500 mt-2">NESTCompany x Ryzent Cipta Digital</p>

        </div>



        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-slate-100 p-2">

            

            {{-- PASTE KODE EMBED (IFRAME) DARI TALLY.SO TEPAT DI BAWAH INI --}}

<iframe data-tally-src="https://tally.so/embed/9q4qN4?alignLeft=1&transparentBackground=1&dynamicHeight=1" loading="lazy" width="100%" height="2591" frameborder="0" marginheight="0" marginwidth="0" title="Kuesioner Kebutuhan Data Website: NESTCompany"></iframe>
<script>var d=document,w="https://tally.so/widgets/embed.js",v=function(){"undefined"!=typeof Tally?Tally.loadEmbeds():d.querySelectorAll("iframe[data-tally-src]:not([src])").forEach((function(e){e.src=e.dataset.tallySrc}))};if("undefined"!=typeof Tally)v();else if(d.querySelector('script[src="'+w+'"]')==null){var s=d.createElement("script");s.src=w,s.onload=v,s.onerror=v,d.body.appendChild(s);}</script>            


            {{-- BATAS KODE EMBED TALLY --}}



        </div>

        

    </div>

</section>

@endsection

