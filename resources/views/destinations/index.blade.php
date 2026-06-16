@extends('layouts.app')

@section('title', 'Truly Egypt Tours | Destinations')

@section('content')
<div class="destinations-page">
    {{-- Top Navigation Bar --}}
    @include('layouts.partials.nav', ['active' => 'destinations'])

    {{-- SideNavBar (Concierge) --}}
    <aside class="fixed bottom-8 right-4 md:right-8 flex flex-col items-end gap-3 md:gap-4 z-50">
        <button class="bg-surface/80 text-primary p-3 md:p-4 border border-secondary/30 rounded-full shadow-xl shadow-primary/10 hover:scale-110 transition-transform duration-300 group flex items-center gap-3">
            <span class="hidden group-hover:block font-label-sm text-label-sm uppercase tracking-widest">WhatsApp Support</span>
            <span class="material-symbols-outlined">chat</span>
        </button>
        <button class="bg-primary text-on-primary p-3 md:p-4 rounded-full shadow-xl shadow-primary/10 hover:scale-110 transition-transform duration-300 group flex items-center gap-3">
            <span class="hidden group-hover:block font-label-sm text-label-sm uppercase tracking-widest">AI Assistant</span>
            <span class="material-symbols-outlined">smart_toy</span>
        </button>
    </aside>

    {{-- Hero Section --}}
    <section class="relative h-screen w-full flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img class="w-full h-full object-cover" alt="Ancient Egyptian temple bathed in golden hour light" src="{{ asset('storage/images/destinations/hero-temple-golden-hour.png') }}">
            <div class="absolute inset-0 hero-gradient"></div>
        </div>
        <div class="relative z-10 text-center max-w-4xl px-margin-mobile px-6 sm:px-10">
            <h1 class="font-display-lg text-3xl sm:text-4xl md:text-display-lg text-white mb-4 md:mb-6 uppercase leading-tight">Discover Egypt's Wonders</h1>
            <p class="font-body-lg text-sm sm:text-base md:text-body-lg text-white/90 mb-8 md:mb-10 max-w-2xl mx-auto leading-relaxed">Embark on a curated journey through time, where ancient majesty meets contemporary luxury along the timeless banks of the Nile.</p>
            <div class="flex flex-col sm:flex-row gap-4 md:gap-6 justify-center">
                <a href="{{ route('trips.index') }}" class="bg-secondary text-white px-8 md:px-10 py-3 md:py-4 rounded-sm font-label-lg uppercase tracking-widest border border-transparent hover:border-secondary-fixed hover:bg-transparent transition-all text-sm md:text-base">Explore Collections</a>
                <button class="bg-transparent text-white px-8 md:px-10 py-3 md:py-4 rounded-sm font-label-lg uppercase tracking-widest border border-secondary text-secondary hover:bg-secondary hover:text-white transition-all text-sm md:text-base">Watch Film</button>
            </div>
        </div>

        {{-- Scroll indicator — inset-x-0 + flex justify-center guarantees true center on all screens --}}
        <div class="absolute bottom-8 md:bottom-10 left-0 right-0 flex flex-col items-center gap-2 text-white/60 animate-bounce">
            <span class="font-label-sm uppercase tracking-widest text-xs md:text-sm">Scroll to Begin</span>
            <span class="material-symbols-outlined">expand_more</span>
        </div>
    </section>

    {{-- Destination Grid --}}
    <section class="py-16 md:py-32 px-4 sm:px-6 md:px-margin-desktop max-w-container-max mx-auto">
        <div class="mb-10 md:mb-20 text-center">
            <span class="font-label-lg text-label-lg text-secondary uppercase tracking-[0.3em] block mb-3 md:mb-4 text-xs md:text-sm">The Odyssey Journal</span>
            <h2 class="font-headline-lg text-2xl md:text-headline-lg text-primary">Curated Destinations</h2>
            <div class="w-16 md:w-20 h-px bg-secondary mx-auto mt-6 md:mt-8"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-12 gap-4 md:gap-gutter">
            @foreach ($destinations as $destination)
                @if ($destination->card_size === 'large')
                    <div class="md:col-span-{{ $destination->col_span }} group relative overflow-hidden rounded-xl {{ $destination->aspect_class }}">
                        <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" alt="{{ $destination->name }}" src="{{ $destination->image_url }}">
                        <div class="absolute inset-0 bg-gradient-to-t from-primary/80 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 w-full p-5 sm:p-8 md:p-10 glass-card">
                            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-end gap-3 md:gap-4">
                                <div>
                                    <h3 class="font-headline-md text-lg md:text-headline-md text-primary mb-1 md:mb-2">{{ $destination->name }}</h3>
                                    <p class="font-body-md text-on-surface-variant max-w-lg text-sm md:text-base line-clamp-2 md:line-clamp-none">{{ $destination->description }}</p>
                                </div>
                                <a class="font-label-lg text-primary group/link flex items-center gap-2 uppercase tracking-widest border-b border-primary/20 pb-1 hover:border-secondary transition-colors text-xs md:text-sm flex-shrink-0" href="{{ route('destinations.show', $destination->slug) }}">
                                    Explore <span class="material-symbols-outlined text-sm">arrow_forward</span>
                                </a>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="md:col-span-{{ $destination->col_span }} group relative overflow-hidden rounded-xl {{ $destination->aspect_class }}">
                        <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" alt="{{ $destination->name }}" src="{{ $destination->image_url }}">
                        <div class="absolute inset-0 bg-gradient-to-t from-primary/60 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 w-full p-5 sm:p-6 md:p-8 glass-card">
                            <h3 class="font-headline-md text-lg md:text-[24px] text-primary mb-2 md:mb-4">{{ $destination->name }}</h3>
                            <p class="font-body-md text-on-surface-variant mb-4 md:mb-6 line-clamp-2 text-sm md:text-base">{{ $destination->description }}</p>
                            <a class="font-label-lg text-primary inline-flex items-center gap-1 uppercase tracking-widest border-b border-primary/20 pb-1 text-xs md:text-sm" href="{{ route('destinations.show', $destination->slug) }}">
                                Explore <span class="material-symbols-outlined text-sm">arrow_forward</span>
                            </a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </section>

    {{-- Interactive Map Section --}}
    <section class="bg-surface-container-low py-16 md:py-32 overflow-hidden">
        <div class="px-4 sm:px-6 md:px-margin-desktop max-w-container-max mx-auto grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-16 items-center">
            <div class="order-2 md:order-1 relative">
                {{-- Decorative circle — hidden on mobile to prevent overflow --}}
                <div class="hidden md:block aspect-square bg-surface-bright rounded-full absolute -top-20 -left-20 w-[140%] z-0 border border-outline-variant/10"></div>
                <div class="relative z-10 p-5 md:p-10 bg-white/40 backdrop-blur-xl border border-secondary/20 rounded-2xl shadow-2xl shadow-primary/10">
                    <img class="w-full h-full object-cover rounded-lg mix-blend-multiply opacity-60 grayscale" alt="Stylized vector map of Egypt" src="{{ asset('storage/images/destinations/egypt-map.png') }}">
                    <div class="absolute top-[15%] left-[60%] group cursor-pointer">
                        <div class="w-3 h-3 md:w-4 md:h-4 bg-secondary rounded-full shadow-[0_0_15px_rgba(119,90,25,0.8)] animate-pulse"></div>
                        <div class="absolute bottom-full left-1/2 -translate-x-1/2 mb-2 bg-primary text-white text-[10px] px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap uppercase tracking-widest">Cairo</div>
                    </div>
                    <div class="absolute top-[65%] left-[55%] group cursor-pointer">
                        <div class="w-3 h-3 md:w-4 md:h-4 bg-secondary rounded-full shadow-[0_0_15px_rgba(119,90,25,0.8)] animate-pulse"></div>
                        <div class="absolute bottom-full left-1/2 -translate-x-1/2 mb-2 bg-primary text-white text-[10px] px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap uppercase tracking-widest">Luxor</div>
                    </div>
                    <div class="absolute top-[80%] left-[58%] group cursor-pointer">
                        <div class="w-3 h-3 md:w-4 md:h-4 bg-secondary rounded-full shadow-[0_0_15px_rgba(119,90,25,0.8)] animate-pulse"></div>
                        <div class="absolute bottom-full left-1/2 -translate-x-1/2 mb-2 bg-primary text-white text-[10px] px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap uppercase tracking-widest">Aswan</div>
                    </div>
                    <div class="absolute top-[40%] left-[10%] group cursor-pointer">
                        <div class="w-3 h-3 md:w-4 md:h-4 bg-secondary rounded-full shadow-[0_0_15px_rgba(119,90,25,0.8)] animate-pulse"></div>
                        <div class="absolute bottom-full left-1/2 -translate-x-1/2 mb-2 bg-primary text-white text-[10px] px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap uppercase tracking-widest">Siwa</div>
                    </div>
                </div>
            </div>
            <div class="order-1 md:order-2" style="z-index: 1;">
                <span class="font-label-lg text-label-lg text-secondary uppercase tracking-[0.3em] block mb-3 md:mb-4 text-xs md:text-sm">Plan Your Route</span>
                <h2 class="font-headline-lg text-2xl md:text-headline-lg text-primary mb-4 md:mb-8">An Epic Geography</h2>
                <p class="font-body-lg text-sm md:text-body-lg text-on-surface-variant mb-6 md:mb-10 leading-relaxed">Egypt is a land of profound contrasts. From the Mediterranean bustle of Alexandria to the silent dunes of the Sahara, our interactive map allows you to visualize your own personalized odyssey.</p>
                <div class="space-y-4 md:space-y-6">
                    <div class="flex items-start gap-4 p-4 md:p-6 border border-secondary/20 rounded-lg hover:bg-white/50 transition-colors cursor-pointer group">
                        <span class="material-symbols-outlined text-secondary mt-0.5 md:mt-1 group-hover:scale-110 transition-transform text-[20px] md:text-[24px]">location_on</span>
                        <div>
                            <h4 class="font-label-lg text-primary uppercase mb-1 text-sm md:text-base">Tailored Itineraries</h4>
                            <p class="font-body-md text-on-surface-variant text-xs md:text-sm">Select destinations to build a custom journey that matches your pace and interests.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4 p-4 md:p-6 border border-secondary/20 rounded-lg hover:bg-white/50 transition-colors cursor-pointer group">
                        <span class="material-symbols-outlined text-secondary mt-0.5 md:mt-1 group-hover:scale-110 transition-transform text-[20px] md:text-[24px]">flight_takeoff</span>
                        <div>
                            <h4 class="font-label-lg text-primary uppercase mb-1 text-sm md:text-base">Luxury Transport</h4>
                            <p class="font-body-md text-on-surface-variant text-xs md:text-sm">View private flight paths and luxury dahabiya routes between key highlights.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Footer --}}
    @include('layouts.partials.footer')
</div>
@endsection
