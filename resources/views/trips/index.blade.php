@extends('layouts.app')

@section('title', 'Truly Egypt Tours | Curated Experiences')

@section('content')
<div class="trips-page">
    {{-- Top Navigation Bar --}}
    @include('layouts.partials.nav', ['active' => 'trips'])

    <main class="pt-20">
        {{-- Hero Section --}}
        <section class="relative h-[409px] min-h-[300px] flex items-center overflow-hidden">
            <img alt="The Nile River at sunset with feluccas" class="absolute inset-0 w-full h-full object-cover" src="{{ asset('storage/images/trips/hero-nile-sunset.png') }}">
            <div class="absolute inset-0 bg-primary/20 backdrop-brightness-75"></div>
            <div class="relative w-full max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
                <h1 class="font-display-lg text-display-lg-mobile md:text-display-lg text-white text-shadow-subtle mb-4">Curated Experiences</h1>
                <p class="font-body-lg text-body-lg text-white/90 max-w-xl">Discover the soul of Egypt through handpicked journeys that blend ancient wonder with modern luxury.</p>
            </div>
        </section>

        {{-- Discovery Layout --}}
        <section class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop py-16 flex flex-col md:flex-row gap-gutter">
            {{-- Filter Sidebar --}}
            <aside class="w-full md:w-72 flex-shrink-0">
                <form method="GET" action="{{ route('trips.index') }}" class="sticky top-28 space-y-8">
                    <div>
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="font-label-lg text-label-lg uppercase tracking-widest text-primary">Refine Odyssey</h3>
                            @if (array_filter($filters))
                                <a href="{{ route('trips.index') }}" class="font-label-sm text-label-sm uppercase tracking-widest text-secondary hover:text-primary transition-colors">Clear All</a>
                            @endif
                        </div>

                        {{-- Sort By --}}
                        <div class="mb-8">
                            <span class="block font-label-sm text-label-sm uppercase tracking-widest text-secondary mb-4">Sort By</span>
                            <select name="sort" onchange="this.form.submit()" class="w-full rounded border-outline-variant bg-surface text-on-surface-variant font-body-md py-2.5 px-3 focus:ring-primary focus:border-primary">
                                <option value="" @selected(($filters['sort'] ?? '') === '')>Recommended</option>
                                <option value="price_asc" @selected(($filters['sort'] ?? '') === 'price_asc')>Price: Low to High</option>
                                <option value="price_desc" @selected(($filters['sort'] ?? '') === 'price_desc')>Price: High to Low</option>
                                <option value="rating" @selected(($filters['sort'] ?? '') === 'rating')>Highest Rated</option>
                                <option value="duration" @selected(($filters['sort'] ?? '') === 'duration')>Duration</option>
                            </select>
                        </div>

                        {{-- Destination Filter --}}
                        <div class="mb-8">
                            <span class="block font-label-sm text-label-sm uppercase tracking-widest text-secondary mb-4">Destination</span>
                            <div class="space-y-3">
                                <label class="flex items-center group cursor-pointer">
                                    <input class="w-4 h-4 rounded border-outline-variant text-primary focus:ring-primary" type="checkbox" name="destinations[]" value="Upper Egypt (Luxor/Aswan)" @checked(in_array('Upper Egypt (Luxor/Aswan)', $filters['destinations'] ?? []))>
                                    <span class="ml-3 font-body-md text-body-md text-on-surface-variant group-hover:text-primary transition-colors">Upper Egypt (Luxor/Aswan)</span>
                                </label>
                                <label class="flex items-center group cursor-pointer">
                                    <input class="w-4 h-4 rounded border-outline-variant text-primary focus:ring-primary" type="checkbox" name="destinations[]" value="Red Sea Riviera" @checked(in_array('Red Sea Riviera', $filters['destinations'] ?? []))>
                                    <span class="ml-3 font-body-md text-body-md text-on-surface-variant group-hover:text-primary transition-colors">Red Sea Riviera</span>
                                </label>
                                <label class="flex items-center group cursor-pointer">
                                    <input class="w-4 h-4 rounded border-outline-variant text-primary focus:ring-primary" type="checkbox" name="destinations[]" value="Western Desert &amp; Oases" @checked(in_array('Western Desert & Oases', $filters['destinations'] ?? []))>
                                    <span class="ml-3 font-body-md text-body-md text-on-surface-variant group-hover:text-primary transition-colors">Western Desert &amp; Oases</span>
                                </label>
                                <label class="flex items-center group cursor-pointer">
                                    <input class="w-4 h-4 rounded border-outline-variant text-primary focus:ring-primary" type="checkbox" name="destinations[]" value="Cairo &amp; Giza" @checked(in_array('Cairo & Giza', $filters['destinations'] ?? []))>
                                    <span class="ml-3 font-body-md text-body-md text-on-surface-variant group-hover:text-primary transition-colors">Cairo &amp; Giza</span>
                                </label>
                            </div>
                        </div>

                        {{-- Trip Type Filter --}}
                        <div class="mb-8">
                            <span class="block font-label-sm text-label-sm uppercase tracking-widest text-secondary mb-4">Trip Type</span>
                            <div class="space-y-3">
                                <label class="flex items-center group cursor-pointer">
                                    <input class="w-4 h-4 border-outline-variant text-primary focus:ring-primary" name="type" type="radio" value="Adventure" @checked(($filters['type'] ?? null) === 'Adventure')>
                                    <span class="ml-3 font-body-md text-body-md text-on-surface-variant group-hover:text-primary transition-colors">Adventure</span>
                                </label>
                                <label class="flex items-center group cursor-pointer">
                                    <input class="w-4 h-4 border-outline-variant text-primary focus:ring-primary" name="type" type="radio" value="Historical Discovery" @checked(($filters['type'] ?? null) === 'Historical Discovery')>
                                    <span class="ml-3 font-body-md text-body-md text-on-surface-variant group-hover:text-primary transition-colors">Historical Discovery</span>
                                </label>
                                <label class="flex items-center group cursor-pointer">
                                    <input class="w-4 h-4 border-outline-variant text-primary focus:ring-primary" name="type" type="radio" value="Wellness &amp; Retreat" @checked(($filters['type'] ?? null) === 'Wellness & Retreat')>
                                    <span class="ml-3 font-body-md text-body-md text-on-surface-variant group-hover:text-primary transition-colors">Wellness &amp; Retreat</span>
                                </label>
                            </div>
                        </div>

                        {{-- Rating Filter --}}
                        <div class="mb-8">
                            <span class="block font-label-sm text-label-sm uppercase tracking-widest text-secondary mb-4">Guest Rating</span>
                            <div class="space-y-3">
                                @foreach (['4.8' => '4.8 & Up', '4.5' => '4.5 & Up', '4.0' => '4.0 & Up'] as $value => $label)
                                    <label class="flex items-center group cursor-pointer">
                                        <input class="w-4 h-4 border-outline-variant text-primary focus:ring-primary" name="min_rating" type="radio" value="{{ $value }}" @checked(($filters['min_rating'] ?? null) === $value)>
                                        <span class="ml-3 font-body-md text-body-md text-on-surface-variant group-hover:text-primary transition-colors flex items-center gap-1">
                                            <span class="material-symbols-outlined text-secondary text-[16px]" style="font-variation-settings: 'FILL' 1;">star</span>
                                            {{ $label }}
                                        </span>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        {{-- Offers Filter --}}
                        <div class="mb-8">
                            <label class="flex items-center group cursor-pointer">
                                <input class="w-4 h-4 rounded border-outline-variant text-primary focus:ring-primary" type="checkbox" name="offers_only" value="1" @checked(! empty($filters['offers_only']))>
                                <span class="ml-3 font-body-md text-body-md text-on-surface-variant group-hover:text-primary transition-colors">Special Offers Only</span>
                            </label>
                        </div>

                        {{-- Price Range --}}
                        <div class="mb-8">
                            <span class="block font-label-sm text-label-sm uppercase tracking-widest text-secondary mb-4">
                                Max Price: <span id="max-price-value" class="text-primary">${{ number_format($filters['max_price'] ?? 5000) }}</span>
                            </span>
                            <input class="w-full h-1 bg-surface-container-highest rounded-lg appearance-none cursor-pointer accent-primary" type="range" name="max_price" min="500" max="5000" step="50" value="{{ $filters['max_price'] ?? 5000 }}" oninput="document.getElementById('max-price-value').textContent = '$' + Number(this.value).toLocaleString()">
                            <div class="flex justify-between mt-2 font-label-sm text-on-surface-variant">
                                <span>$500</span>
                                <span>$5,000+</span>
                            </div>
                        </div>

                        <button type="submit" class="w-full py-3 border-[1.5px] border-secondary text-secondary font-label-lg rounded hover:bg-secondary hover:text-white transition-all">
                            Apply Filters
                        </button>
                    </div>
                </form>
            </aside>

            {{-- Results Grid --}}
            <div class="flex-1">
                @if ($trips->isEmpty())
                    <div class="flex items-center justify-center h-64 text-center">
                        <p class="font-body-lg text-on-surface-variant">No trips match your filters. Try adjusting your search.</p>
                    </div>
                @else
                    <div class="flex items-center justify-between mb-8">
                        <p class="font-body-md text-on-surface-variant">{{ $trips->total() }} {{ \Illuminate\Support\Str::plural('Trip', $trips->total()) }} Found</p>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-gutter">
                        @foreach ($trips as $trip)
                            @include('trips.partials.card', ['trip' => $trip, 'class' => 'h-[460px]'])
                        @endforeach
                    </div>

                    {{-- Pagination --}}
                    <div class="mt-16 flex justify-center items-center space-x-4">
                        <a href="{{ $trips->previousPageUrl() ?? '#' }}" class="w-12 h-12 rounded-full border border-secondary/30 flex items-center justify-center text-primary hover:bg-secondary hover:text-white transition-all {{ $trips->onFirstPage() ? 'opacity-30 pointer-events-none' : '' }}">
                            <span class="material-symbols-outlined">chevron_left</span>
                        </a>
                        <span class="font-label-lg text-primary">{{ str_pad((string) $trips->currentPage(), 2, '0', STR_PAD_LEFT) }} / {{ str_pad((string) max($trips->lastPage(), 1), 2, '0', STR_PAD_LEFT) }}</span>
                        <a href="{{ $trips->nextPageUrl() ?? '#' }}" class="w-12 h-12 rounded-full border border-secondary/30 flex items-center justify-center text-primary hover:bg-secondary hover:text-white transition-all {{ $trips->hasMorePages() ? '' : 'opacity-30 pointer-events-none' }}">
                            <span class="material-symbols-outlined">chevron_right</span>
                        </a>
                    </div>
                @endif
            </div>
        </section>
    </main>
    </div>

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
@endsection
