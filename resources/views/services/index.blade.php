@extends('layouts.app')

@section('title', 'Truly Egypt Tours | Bespoke Services')

@section('content')
<div class="services-page">
    {{-- Top Navigation Bar --}}
    @include('layouts.partials.nav', ['active' => 'services'])

    {{-- Hero Section --}}
    <header class="relative w-full h-[480px] md:h-[716px] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img class="w-full h-full object-cover" alt="The Nile River at sunset with traditional feluccas sailing past" src="{{ asset('storage/images/services/hero-nile-sunset-feluccas.png') }}">
            <div class="absolute inset-0 bg-gradient-to-b from-primary/40 via-transparent to-background"></div>
        </div>
        <div class="relative z-10 text-center px-margin-mobile">
            <h1 class="font-display-lg text-display-lg-mobile md:text-display-lg text-white mb-6 drop-shadow-xl">Bespoke Experiences</h1>
            <p class="font-body-lg text-body-lg text-white/90 max-w-2xl mx-auto tracking-wide">Where ancient wonders meet modern sophistication. Discover our curated collection of luxury travel services across Egypt.</p>
        </div>
    </header>

    {{-- Services Bento Grid --}}
    <section class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop py-32">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-8">
            {{-- Guided Tours --}}
            <div class="md:col-span-8 group relative overflow-hidden rounded-xl h-[380px] md:h-[450px]">
                <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" alt="Egyptologist guiding visitors through the Temple of Karnak" src="{{ asset('storage/images/services/service-guided-tours.png') }}">
                <div class="absolute bottom-0 left-0 right-0 glass-card p-4 sm:p-8 border-t-[1.5px] border-secondary-fixed/30 m-4 rounded-lg">
                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-end gap-4">
                        <div>
                            <span class="font-label-lg text-label-lg uppercase text-secondary tracking-widest mb-2 block">Curation</span>
                            <h3 class="font-headline-md text-headline-md text-primary">Guided Tours</h3>
                            <p class="font-body-md text-body-md text-on-surface-variant mt-2 max-w-xl">Privately led expeditions with renowned Egyptologists who unlock the secrets of the Pharaohs with unprecedented narrative depth.</p>
                        </div>
                        <span class="material-symbols-outlined text-primary text-4xl">temple_hindu</span>
                    </div>
                </div>
            </div>

            {{-- AI Concierge --}}
            <div class="md:col-span-4 glass-card p-6 md:p-10 rounded-xl flex flex-col justify-between border-secondary-fixed/20 shadow-xl shadow-primary/5">
                <div>
                    <div class="w-16 h-16 rounded-full bg-primary-container flex items-center justify-center mb-6">
                        <span class="material-symbols-outlined text-on-primary text-3xl">smart_toy</span>
                    </div>
                    <h3 class="font-headline-md text-headline-md text-primary mb-4">AI Concierge</h3>
                    <p class="font-body-md text-body-md text-on-surface-variant">Instant 24/7 travel adjustments, dining reservations, and historical facts at your fingertips via our proprietary neural interface.</p>
                </div>
                <button class="mt-8 text-primary font-label-lg uppercase tracking-widest text-underline-expand w-fit">Initiate Chat</button>
            </div>

            {{-- Nile Cruises --}}
            <div class="md:col-span-4 group relative overflow-hidden rounded-xl h-[300px] md:h-[500px]">
                <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" alt="Luxury dahabiya sailboat on the Nile at dawn" src="{{ asset('storage/images/services/service-nile-cruises.png') }}">
                <div class="absolute inset-0 bg-gradient-to-t from-primary/60 to-transparent"></div>
                <div class="absolute bottom-8 left-8 right-8">
                    <h3 class="font-headline-md text-headline-md text-white">Nile Cruises</h3>
                    <p class="font-body-md text-body-md text-white/80 mt-2">Private Dahabiyas for an intimate river odyssey.</p>
                </div>
            </div>

            {{-- Desert Safaris --}}
            <div class="md:col-span-4 group relative overflow-hidden rounded-xl h-[300px] md:h-[500px]">
                <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" alt="Luxury desert camp under the stars in the Sahara" src="{{ asset('storage/images/services/service-desert-safaris.png') }}">
                <div class="absolute inset-0 bg-gradient-to-t from-primary/60 to-transparent"></div>
                <div class="absolute bottom-8 left-8 right-8">
                    <h3 class="font-headline-md text-headline-md text-white">Desert Safaris</h3>
                    <p class="font-body-md text-body-md text-white/80 mt-2">Private luxury camp setups under the stars.</p>
                </div>
            </div>

            {{-- Beach Vacations --}}
            <div class="md:col-span-4 group relative overflow-hidden rounded-xl h-[300px] md:h-[500px]">
                <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" alt="Luxury resort overlooking the turquoise waters of the Red Sea" src="{{ asset('storage/images/services/service-beach-vacations.png') }}">
                <div class="absolute inset-0 bg-gradient-to-t from-primary/60 to-transparent"></div>
                <div class="absolute bottom-8 left-8 right-8">
                    <h3 class="font-headline-md text-headline-md text-white">Beach Vacations</h3>
                    <p class="font-body-md text-body-md text-white/80 mt-2">Red Sea luxury resorts and private villas.</p>
                </div>
            </div>

            {{-- Historical Immersion --}}
            <div class="md:col-span-6 bg-surface-container p-6 md:p-12 rounded-xl flex flex-col justify-center border border-outline-variant/20">
                <h3 class="font-headline-md text-headline-md text-primary mb-6">Historical Immersion</h3>
                <p class="font-body-lg text-body-lg text-on-surface-variant mb-8">Access restricted archeological sites and private archives during our exclusive historical deep-dives.</p>
                <div class="flex gap-4">
                    <span class="px-4 py-2 bg-white rounded-full font-label-sm text-label-sm uppercase text-secondary">Private Access</span>
                    <span class="px-4 py-2 bg-white rounded-full font-label-sm text-label-sm uppercase text-secondary">Curated Content</span>
                </div>
            </div>

            {{-- Private Transportation --}}
            <div class="md:col-span-6 group relative overflow-hidden rounded-xl h-[260px] md:h-[350px]">
                <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" alt="Luxury SUV with chauffeur outside an airport terminal at night" src="{{ asset('storage/images/services/service-private-transportation.png') }}">
                <div class="absolute inset-0 bg-primary/20 backdrop-blur-[2px] transition-opacity duration-500 group-hover:opacity-0"></div>
                <div class="absolute inset-0 flex flex-col items-center justify-center p-6 sm:p-8 text-center">
                    <h3 class="font-headline-md text-headline-md text-white drop-shadow-md">Private Transportation</h3>
                    <p class="font-label-lg text-label-lg uppercase tracking-widest text-white/90 mt-2">Executive Transfers &amp; Private Jets</p>
                </div>
            </div>
        </div>
    </section>

    {{-- FAQ Section --}}
    <section id="faq" class="bg-surface-container-low py-32 border-t border-outline-variant/20 scroll-mt-20">
        <div class="max-w-4xl mx-auto px-margin-mobile">
            <h2 class="font-display-lg text-display-lg-mobile md:text-display-lg text-primary text-center mb-16">Frequently Asked</h2>
            <div class="space-y-6">
                @foreach ($faqs as $faq)
                    <div class="border-b border-outline-variant/30 pb-6">
                        <button class="w-full flex justify-between items-center text-left group" onclick="this.nextElementSibling.classList.toggle('hidden')">
                            <span class="font-headline-md text-headline-md text-primary text-2xl">{{ $faq->question }}</span>
                            <span class="material-symbols-outlined text-secondary transition-transform group-hover:rotate-180">expand_more</span>
                        </button>
                        <div class="mt-4 font-body-md text-body-md text-on-surface-variant hidden">
                            {{ $faq->answer }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Side Concierge Buttons --}}
    <div class="fixed bottom-8 right-8 flex flex-col items-end space-y-4 z-50">
        <button class="bg-surface/80 text-primary p-4 border border-secondary/30 rounded-full shadow-xl shadow-primary/10 hover:scale-110 transition-transform duration-300 group flex items-center gap-3">
            <span class="hidden group-hover:block font-label-sm text-label-sm uppercase tracking-widest">WhatsApp Support</span>
            <span class="material-symbols-outlined">chat</span>
        </button>
        <button class="bg-primary text-on-primary p-4 rounded-full shadow-xl shadow-primary/10 hover:scale-110 transition-transform duration-300 group flex items-center gap-3">
            <span class="hidden group-hover:block font-label-sm text-label-sm uppercase tracking-widest">AI Assistant</span>
            <span class="material-symbols-outlined">smart_toy</span>
        </button>
    </div>

    {{-- Footer --}}
    @include('layouts.partials.footer')
</div>
@endsection
