@extends('layouts.app')

@section('title', $trip->title.' | Truly Egypt Tours')

@section('content')
@php
    $generalFaqs = [
        [
            'question' => 'Do I need a visa to visit Egypt?',
            'answer' => 'Most nationalities can obtain an e-Visa online before travel or a visa on arrival at major airports. Our concierge team will confirm the exact requirements for your passport when you book.',
        ],
        [
            'question' => 'What is the best time of year to visit Egypt?',
            'answer' => 'The cooler months from October to April are the most comfortable for sightseeing, especially in Cairo, Luxor, and Aswan. Summer (June-August) is hotter but ideal for Red Sea beach trips.',
        ],
        [
            'question' => 'What should I pack for my trip?',
            'answer' => 'Lightweight, breathable clothing, a hat and sunscreen, comfortable walking shoes, and a light layer for cooler evenings. If your itinerary includes mosques or religious sites, pack something that covers your shoulders and knees.',
        ],
    ];

    $travelerMoments = collect($trip->gallery_urls)->values();

    $ratingLabels = [
        'itinerary' => 'Itinerary',
        'transportation' => 'Transportation',
        'value' => 'Value for Money',
        'accommodation' => 'Accommodation',
        'tour_guide' => 'Tour Guide',
    ];
@endphp

<div class="trip-show-page">
    {{-- Top Navigation Bar --}}
    @include('layouts.partials.nav', ['active' => 'trips'])

    <main class="pt-20">
        {{-- Title Bar --}}
        <section class="bg-surface pt-10 pb-8 border-b border-secondary/10">
            <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
                {{-- Breadcrumb --}}
                <nav class="flex items-center gap-2 font-label-sm text-label-sm uppercase tracking-widest text-on-surface-variant mb-6">
                    <a href="{{ route('home') }}" class="hover:text-secondary transition-colors">Home</a>
                    <span class="material-symbols-outlined text-[16px]">chevron_right</span>
                    <a href="{{ route('trips.index') }}" class="hover:text-secondary transition-colors">Trips</a>
                    <span class="material-symbols-outlined text-[16px]">chevron_right</span>
                    <span class="text-secondary">{{ $trip->title }}</span>
                </nav>

                <div class="flex flex-wrap items-start justify-between gap-6">
                    <div>
                        @if ($trip->hasDiscount())
                            <div class="inline-block bg-secondary text-on-secondary rounded-full px-4 py-1.5 font-label-sm text-label-sm uppercase tracking-widest mb-4">
                                -{{ $trip->discount_percent }}% Off
                            </div>
                        @endif

                        <h1 class="font-display-lg text-display-lg-mobile md:text-headline-lg text-primary mb-4 max-w-3xl">{{ $trip->title }}</h1>

                        <div class="flex flex-wrap items-center gap-4 md:gap-6 text-on-surface-variant">
                            <div class="flex items-center gap-2">
                                <span class="material-symbols-outlined text-secondary text-[20px]">location_on</span>
                                <span class="font-body-md text-body-md">{{ $trip->location }}</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="material-symbols-outlined text-secondary text-[20px]">calendar_month</span>
                                <span class="font-body-md text-body-md">{{ $trip->duration }}</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="material-symbols-outlined text-secondary text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
                                <span class="font-body-md text-body-md">{{ number_format($trip->rating, 1) }} ({{ $trip->reviews_count }} reviews)</span>
                            </div>
                        </div>
                    </div>

                    {{-- Wishlist Toggle --}}
                    <button type="button" class="wishlist-btn {{ in_array($trip->id, session('wishlist', [])) ? 'active' : '' }} w-12 h-12 rounded-full border border-secondary/30 flex items-center justify-center text-primary hover:bg-secondary hover:text-white transition-all flex-shrink-0" data-trip-id="{{ $trip->id }}" aria-label="Add to wishlist" aria-pressed="{{ in_array($trip->id, session('wishlist', [])) ? 'true' : 'false' }}">
                        <span class="material-symbols-outlined">favorite</span>
                    </button>
                </div>
            </div>
        </section>

        {{-- Gallery --}}
        <section class="py-6 md:py-8 bg-surface">
            <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
                {{-- Hero Image --}}
                <button type="button"
                    data-lightbox-trigger
                    data-lightbox-src="{{ $trip->image_url }}"
                    data-lightbox-alt="{{ $trip->title }}"
                    class="relative group block w-full h-[240px] sm:h-[360px] md:h-[480px] rounded-xl overflow-hidden mb-3 cursor-zoom-in p-0 border-0 bg-transparent text-left">
                    <img alt="{{ $trip->title }}" src="{{ $trip->image_url }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                    <div class="absolute inset-0 bg-primary/0 group-hover:bg-primary/25 transition-all flex items-center justify-center">
                        <span class="material-symbols-outlined text-white text-5xl opacity-0 group-hover:opacity-100 transition-opacity drop-shadow-lg">zoom_in</span>
                    </div>
                </button>

                {{-- Thumbnail Strip --}}
                @if (! empty($trip->gallery_urls))
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-2 md:gap-3">
                        @foreach ($trip->gallery_urls as $thumb)
                            <button type="button"
                                data-lightbox-trigger
                                data-lightbox-src="{{ $thumb }}"
                                data-lightbox-alt="{{ $trip->title }}"
                                class="relative group h-16 sm:h-24 md:h-32 rounded-lg overflow-hidden cursor-zoom-in p-0 border-0 bg-transparent w-full">
                                <img alt="{{ $trip->title }}" src="{{ $thumb }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                                <div class="absolute inset-0 bg-primary/0 group-hover:bg-primary/30 transition-colors flex items-center justify-center">
                                    <span class="material-symbols-outlined text-white text-xl opacity-0 group-hover:opacity-100 transition-opacity">zoom_in</span>
                                </div>
                            </button>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>

        {{-- Quick Info Bar --}}
        <section class="bg-surface-container-low border-y border-secondary/10 py-5 md:py-6">
            <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
                <div class="flex flex-wrap items-center gap-x-8 md:gap-x-12 gap-y-4">
                    <div class="flex items-center gap-3 md:gap-4">
                        <span class="material-symbols-outlined text-secondary text-3xl md:text-4xl">calendar_month</span>
                        <div>
                            <div class="font-label-lg text-label-lg text-primary uppercase text-sm md:text-base">{{ $trip->duration }} in Egypt</div>
                            <div class="font-body-md text-on-surface-variant text-xs md:text-sm">{{ $trip->trip_type }}</div>
                        </div>
                    </div>
                    <div class="flex items-center gap-3 md:gap-4">
                        <span class="material-symbols-outlined text-secondary text-3xl md:text-4xl">group</span>
                        <div>
                            <div class="font-label-lg text-label-lg text-primary uppercase text-sm md:text-base">Group Size</div>
                            <div class="font-body-md text-on-surface-variant text-xs md:text-sm">{{ $trip->group_size }}</div>
                        </div>
                    </div>
                    <div class="flex items-center gap-3 md:gap-4">
                        <span class="material-symbols-outlined text-secondary text-3xl md:text-4xl">location_on</span>
                        <div>
                            <div class="font-label-lg text-label-lg text-primary uppercase text-sm md:text-base">Destination</div>
                            <div class="font-body-md text-on-surface-variant text-xs md:text-sm">{{ $trip->destination_category }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Main Content --}}
        <section class="py-16 md:py-24 bg-surface">
            <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop grid grid-cols-1 lg:grid-cols-12 gap-gutter">

                {{-- Left Column --}}
                <div class="lg:col-span-8 space-y-16 md:space-y-20">

                    {{-- Overview --}}
                    <div>
                        <h2 class="font-headline-lg text-headline-lg text-primary mb-3">Overview</h2>
                        <div class="w-12 h-0.5 bg-secondary rounded-full mb-6"></div>
                        <p class="font-body-lg text-body-lg text-on-surface-variant leading-loose">{{ $trip->description }}</p>
                    </div>

                    {{-- Highlights --}}
                    @if (! empty($trip->highlights))
                        <div>
                            <h2 class="font-headline-lg text-headline-lg text-primary mb-3">Trip Highlights</h2>
                            <div class="w-12 h-0.5 bg-secondary rounded-full mb-8"></div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 md:gap-6">
                                @foreach ($trip->highlights as $highlight)
                                    <div class="flex items-start gap-4 p-4 md:p-5 bg-surface-container-low rounded-lg border border-secondary/10">
                                        <span class="material-symbols-outlined text-secondary flex-shrink-0 text-[22px]" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                                        <span class="font-body-md text-body-md text-on-surface-variant">{{ $highlight }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    {{-- Journey at a Glance --}}
                    <div>
                        <h2 class="font-headline-lg text-headline-lg text-primary mb-3">Journey at a Glance</h2>
                        <div class="w-12 h-0.5 bg-secondary rounded-full mb-8"></div>
                        <div class="relative rounded-xl overflow-hidden border border-secondary/10">
                            <img alt="Map of Egypt" src="{{ asset('storage/images/destinations/egypt-map.png') }}" class="w-full h-auto object-cover">
                            <div class="absolute top-4 left-4 md:top-6 md:left-6 glass-panel rounded-lg px-4 py-2 md:px-5 md:py-3 flex items-center gap-3">
                                <span class="material-symbols-outlined text-secondary text-[18px] md:text-[20px]">location_on</span>
                                <span class="font-label-lg text-label-lg text-primary uppercase tracking-widest text-sm md:text-base">{{ $trip->location }}</span>
                            </div>
                        </div>
                    </div>

                    {{-- Itinerary --}}
                    @if (! empty($trip->itinerary))
                        <div>
                            <div class="mb-8">
                                <div class="flex flex-wrap items-start justify-between gap-4 mb-3">
                                    <h2 class="font-headline-lg text-headline-lg text-primary">Day-by-Day Itinerary</h2>
                                    <div class="flex items-center gap-4 md:gap-6 flex-shrink-0">
                                        <button type="button" id="itinerary-toggle-all" class="font-label-sm text-label-sm uppercase tracking-widest text-secondary hover:text-primary transition-colors">Expand All</button>
                                        <button type="button" onclick="window.print()" class="hidden sm:flex items-center gap-2 border-[1.5px] border-secondary text-secondary px-4 py-2 rounded font-label-sm text-label-sm uppercase tracking-widest hover:bg-secondary hover:text-white transition-all">
                                            <span class="material-symbols-outlined text-[18px]">download</span>
                                            <span>Download</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="w-12 h-0.5 bg-secondary rounded-full"></div>
                            </div>
                            <div class="space-y-3 md:space-y-4" id="itinerary-accordion">
                                @foreach ($trip->itinerary as $day)
                                    <details class="group bg-surface-container-low rounded-xl border border-secondary/10 overflow-hidden">
                                        <summary class="flex items-center gap-3 md:gap-4 p-4 md:p-5 cursor-pointer list-none">
                                            <div class="w-10 h-10 md:w-12 md:h-12 rounded-full bg-primary text-on-primary flex items-center justify-center font-label-lg text-label-lg flex-shrink-0 text-sm md:text-base">
                                                {{ $day['day'] }}
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary mb-0.5 block text-xs">Day {{ $day['day'] }}</span>
                                                <h3 class="font-headline-md text-primary text-base md:text-xl truncate">{{ $day['title'] }}</h3>
                                            </div>
                                            <span class="material-symbols-outlined text-primary transition-transform duration-300 group-open:rotate-180 flex-shrink-0">expand_more</span>
                                        </summary>
                                        <div class="px-4 pb-5 pl-16 md:px-5 md:pb-6 md:pl-[88px]">
                                            <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">{{ $day['description'] }}</p>
                                        </div>
                                    </details>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    {{-- Includes / Excludes --}}
                    @if (! empty($trip->includes) || ! empty($trip->excludes))
                        <div>
                            <h2 class="font-headline-lg text-headline-lg text-primary mb-3">What's Included &amp; What's Not</h2>
                            <div class="w-12 h-0.5 bg-secondary rounded-full mb-8"></div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-gutter">
                                {{-- Included --}}
                                @if (! empty($trip->includes))
                                    <div class="rounded-2xl overflow-hidden border border-secondary/20 shadow-sm">
                                        <div class="bg-primary px-5 py-4 flex items-center gap-3">
                                            <span class="material-symbols-outlined text-secondary-fixed text-[22px]" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                                            <h3 class="font-label-lg text-label-lg text-on-primary uppercase tracking-widest">What's Included</h3>
                                        </div>
                                        <div class="divide-y divide-secondary/10">
                                            @foreach ($trip->includes as $item)
                                                <details class="group bg-surface">
                                                    <summary class="flex items-center gap-4 px-5 py-4 cursor-pointer list-none hover:bg-surface-container-low transition-colors">
                                                        <span class="material-symbols-outlined text-secondary text-[20px] flex-shrink-0" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                                                        <span class="font-body-md text-body-md text-on-surface-variant flex-1 leading-snug">{{ $item['title'] }}</span>
                                                        <span class="material-symbols-outlined text-on-surface-variant/50 text-[18px] flex-shrink-0 transition-transform duration-300 group-open:rotate-180">expand_more</span>
                                                    </summary>
                                                    <div class="px-5 pb-4 pl-[56px] bg-surface-container-low/50">
                                                        <p class="font-body-md text-on-surface-variant text-sm leading-relaxed">{{ $item['description'] }}</p>
                                                    </div>
                                                </details>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                {{-- Excluded --}}
                                @if (! empty($trip->excludes))
                                    <div class="rounded-2xl overflow-hidden border border-secondary/20 shadow-sm">
                                        <div class="bg-surface-container px-5 py-4 flex items-center gap-3">
                                            <span class="material-symbols-outlined text-on-surface-variant/60 text-[22px]">cancel</span>
                                            <h3 class="font-label-lg text-label-lg text-primary uppercase tracking-widest">What's Not Included</h3>
                                        </div>
                                        <div class="divide-y divide-secondary/10">
                                            @foreach ($trip->excludes as $item)
                                                <details class="group bg-surface">
                                                    <summary class="flex items-center gap-4 px-5 py-4 cursor-pointer list-none hover:bg-surface-container-low transition-colors">
                                                        <span class="material-symbols-outlined text-on-surface-variant/50 text-[20px] flex-shrink-0">cancel</span>
                                                        <span class="font-body-md text-body-md text-on-surface-variant flex-1 leading-snug">{{ $item['title'] }}</span>
                                                        <span class="material-symbols-outlined text-on-surface-variant/50 text-[18px] flex-shrink-0 transition-transform duration-300 group-open:rotate-180">expand_more</span>
                                                    </summary>
                                                    <div class="px-5 pb-4 pl-[56px] bg-surface-container-low/50">
                                                        <p class="font-body-md text-on-surface-variant text-sm leading-relaxed">{{ $item['description'] }}</p>
                                                    </div>
                                                </details>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif

                    {{-- Where You'll Stay --}}
                    @if (! empty($trip->accommodations))
                        <div>
                            <h2 class="font-headline-lg text-headline-lg text-primary mb-3">Where You'll Stay</h2>
                            <div class="w-12 h-0.5 bg-secondary rounded-full mb-8"></div>
                            <div class="relative">
                                <button type="button" data-carousel-prev="stays-carousel" aria-label="Previous"
                                    class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-4 md:-translate-x-5 z-10 w-9 h-9 md:w-10 md:h-10 rounded-full bg-primary text-on-primary shadow-lg flex items-center justify-center hover:bg-secondary transition-colors">
                                    <span class="material-symbols-outlined text-[20px]">chevron_left</span>
                                </button>

                                <div id="stays-carousel" class="flex gap-gutter overflow-x-auto no-scrollbar pb-2 scroll-smooth">
                                    @foreach ($trip->accommodations as $stay)
                                        <button type="button"
                                            data-stay-trigger
                                            data-stay-name="{{ $stay['name'] }}"
                                            data-stay-location="{{ $stay['location'] }}"
                                            data-stay-nights="{{ $stay['nights'] }}"
                                            data-stay-rating="{{ $stay['rating'] }}"
                                            data-stay-image="{{ asset('storage/'.$stay['image']) }}"
                                            data-stay-description="{{ $stay['description'] }}"
                                            class="group relative flex-shrink-0 w-[85%] md:w-[calc(50%-12px)] rounded-2xl overflow-hidden shadow-2xl cursor-pointer p-0 border-0 bg-transparent text-left" style="height: 340px;">
                                            <img alt="{{ $stay['name'] }}" src="{{ asset('storage/'.$stay['image']) }}"
                                                class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                            <div class="absolute inset-0 bg-gradient-to-t from-primary/90 via-primary/20 to-transparent group-hover:from-primary/95 transition-all duration-300"></div>

                                            {{-- Top: stars badge --}}
                                            <div class="absolute top-4 left-4 flex items-center gap-0.5 bg-white/20 backdrop-blur-md rounded-full px-3 py-1">
                                                @for ($i = 0; $i < $stay['rating']; $i++)
                                                    <span class="material-symbols-outlined text-secondary-fixed text-[13px]" style="font-variation-settings: 'FILL' 1;">star</span>
                                                @endfor
                                            </div>

                                            {{-- Top right: tap hint --}}
                                            <div class="absolute top-4 right-4 bg-white/20 backdrop-blur-md rounded-full p-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                                <span class="material-symbols-outlined text-white text-[18px]">open_in_full</span>
                                            </div>

                                            {{-- Bottom: glass-card footer --}}
                                            <div class="absolute bottom-0 left-0 right-0 p-4 md:p-5">
                                                <div class="glass-card p-4 md:p-5 rounded-xl border-t border-secondary/30">
                                                    <h3 class="font-headline-md text-on-primary text-base md:text-lg mb-1 leading-snug">{{ $stay['name'] }}</h3>
                                                    <div class="flex items-center gap-1.5 text-secondary-fixed/80 mb-2">
                                                        <span class="material-symbols-outlined text-[14px]">location_on</span>
                                                        <span class="font-label-sm text-label-sm uppercase tracking-widest text-xs">{{ $stay['location'] }} &middot; {{ $stay['nights'] }} {{ \Illuminate\Support\Str::plural('Night', $stay['nights']) }}</span>
                                                    </div>
                                                    <p class="font-body-md text-on-primary/70 text-xs leading-relaxed line-clamp-2">{{ $stay['description'] }}</p>
                                                </div>
                                            </div>
                                        </button>
                                    @endforeach
                                </div>

                                <button type="button" data-carousel-next="stays-carousel" aria-label="Next"
                                    class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-4 md:translate-x-5 z-10 w-9 h-9 md:w-10 md:h-10 rounded-full bg-primary text-on-primary shadow-lg flex items-center justify-center hover:bg-secondary transition-colors">
                                    <span class="material-symbols-outlined text-[20px]">chevron_right</span>
                                </button>
                            </div>
                        </div>
                    @endif

                    {{-- Traveler Moments --}}
                    @if ($travelerMoments->isNotEmpty())
                        <div>
                            <h2 class="font-headline-lg text-headline-lg text-primary mb-3">Traveler Moments</h2>
                            <div class="w-12 h-0.5 bg-secondary rounded-full mb-8"></div>

                            <div class="grid grid-cols-2 md:grid-cols-3 gap-3 md:gap-4">
                                @foreach ($travelerMoments as $photo)
                                    <button type="button"
                                        data-lightbox-trigger
                                        data-lightbox-src="{{ $photo }}"
                                        data-lightbox-alt="Traveler moment from {{ $trip->title }}"
                                        class="relative overflow-hidden rounded-xl group cursor-zoom-in p-0 border-0 bg-transparent aspect-square">
                                        <img alt="Traveler photo from {{ $trip->title }}" src="{{ $photo }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                        <div class="absolute inset-0 bg-primary/0 group-hover:bg-primary/20 transition-colors flex items-center justify-center">
                                            <span class="material-symbols-outlined text-white text-4xl opacity-0 group-hover:opacity-100 transition-opacity drop-shadow">zoom_in</span>
                                        </div>
                                    </button>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    {{-- Traveler Reviews --}}
                    @if (! empty($trip->reviews))
                        <div>
                            <h2 class="font-headline-lg text-headline-lg text-primary mb-3">Traveler Reviews</h2>
                            <div class="w-12 h-0.5 bg-secondary rounded-full mb-8"></div>

                            <div class="grid grid-cols-1 lg:grid-cols-3 gap-gutter mb-10 md:mb-12">
                                {{-- Overall Score --}}
                                <div class="lg:col-span-1 bg-primary text-on-primary rounded-xl p-6 md:p-8 flex flex-col items-center justify-center text-center">
                                    <div class="font-display-lg text-headline-lg mb-2">{{ number_format($trip->rating, 1) }}</div>
                                    <div class="flex text-secondary-fixed mb-3">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' {{ $i <= round($trip->rating) ? 1 : 0 }};">star</span>
                                        @endfor
                                    </div>
                                    <div class="font-label-lg text-label-lg uppercase tracking-widest text-secondary-fixed text-xs md:text-sm">{{ $trip->reviews_count }} Reviews</div>
                                </div>

                                {{-- Rating Breakdown --}}
                                @if (! empty($trip->rating_breakdown))
                                    <div class="lg:col-span-2 bg-surface-container-low rounded-xl p-6 md:p-8 space-y-4 md:space-y-5">
                                        @foreach ($ratingLabels as $key => $label)
                                            @php($score = $trip->rating_breakdown[$key] ?? 0)
                                            <div>
                                                <div class="flex justify-between mb-1.5">
                                                    <span class="font-label-sm text-label-sm uppercase tracking-widest text-on-surface-variant text-xs">{{ $label }}</span>
                                                    <span class="font-label-lg text-label-lg text-primary text-sm">{{ number_format($score, 1) }}</span>
                                                </div>
                                                <div class="h-2 bg-surface-container-highest rounded-full overflow-hidden">
                                                    <div class="h-full bg-secondary rounded-full" style="width: {{ $score / 5 * 100 }}%"></div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>

                            {{-- Individual Reviews carousel --}}
                            <div class="relative">
                                <button type="button" data-carousel-prev="reviews-carousel" aria-label="Previous"
                                    class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-4 md:-translate-x-5 z-10 w-9 h-9 md:w-10 md:h-10 rounded-full bg-primary text-on-primary shadow-lg flex items-center justify-center hover:bg-secondary transition-colors">
                                    <span class="material-symbols-outlined text-[20px]">chevron_left</span>
                                </button>

                                <div id="reviews-carousel" class="flex gap-gutter overflow-x-auto no-scrollbar pb-2 scroll-smooth">
                                    @foreach ($trip->reviews as $review)
                                        <div class="bg-surface-container-low rounded-xl p-5 md:p-6 border border-secondary/10 flex-shrink-0 w-[85%] md:w-[calc(50%-12px)] lg:w-[calc((100%-48px)/3)]">
                                            <div class="flex items-center gap-3 md:gap-4 mb-4">
                                                <div class="w-10 h-10 md:w-12 md:h-12 rounded-full bg-secondary-fixed flex items-center justify-center font-bold text-on-secondary-fixed flex-shrink-0 text-sm">
                                                    {{ collect(explode(' ', $review['name']))->map(fn ($part) => mb_substr($part, 0, 1))->join('') }}
                                                </div>
                                                <div>
                                                    <div class="font-label-lg text-label-lg text-primary text-sm md:text-base">{{ $review['name'] }}</div>
                                                    <div class="font-label-sm text-label-sm text-on-surface-variant text-xs">{{ $review['country'] }} &middot; {{ $review['date'] }}</div>
                                                </div>
                                            </div>
                                            <div class="flex text-secondary mb-3">
                                                @for ($i = 0; $i < $review['rating']; $i++)
                                                    <span class="material-symbols-outlined text-[16px] md:text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
                                                @endfor
                                            </div>
                                            <p class="font-body-md text-body-md text-on-surface-variant mb-4 italic text-sm">"{{ $review['text'] }}"</p>
                                            @if (! empty($review['photos']))
                                                <div class="flex gap-2 flex-wrap">
                                                    @foreach ($review['photos'] as $photo)
                                                        <div class="w-14 h-14 md:w-16 md:h-16 rounded-lg overflow-hidden">
                                                            <img alt="Photo from {{ $review['name'] }}" src="{{ asset('storage/'.$photo) }}" class="w-full h-full object-cover">
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>

                                <button type="button" data-carousel-next="reviews-carousel" aria-label="Next"
                                    class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-4 md:translate-x-5 z-10 w-9 h-9 md:w-10 md:h-10 rounded-full bg-primary text-on-primary shadow-lg flex items-center justify-center hover:bg-secondary transition-colors">
                                    <span class="material-symbols-outlined text-[20px]">chevron_right</span>
                                </button>
                            </div>
                        </div>
                    @endif

                    {{-- Dates & Availability --}}
                    <div id="availability">
                        <h2 class="font-headline-lg text-headline-lg text-primary mb-3">Dates &amp; Availability</h2>
                        <div class="w-12 h-0.5 bg-secondary rounded-full mb-8"></div>
                        <div class="overflow-x-auto rounded-xl border border-secondary/10">
                            <table class="w-full text-left min-w-[560px] md:min-w-[640px]">
                                <thead class="bg-primary text-on-primary">
                                    <tr>
                                        <th class="p-3 md:p-4 font-label-sm text-label-sm uppercase tracking-widest text-xs md:text-sm">Departure</th>
                                        <th class="p-3 md:p-4 font-label-sm text-label-sm uppercase tracking-widest text-xs md:text-sm">Return</th>
                                        <th class="p-3 md:p-4 font-label-sm text-label-sm uppercase tracking-widest text-xs md:text-sm">Price</th>
                                        <th class="p-3 md:p-4 font-label-sm text-label-sm uppercase tracking-widest text-xs md:text-sm">Status</th>
                                        <th class="p-3 md:p-4 font-label-sm text-label-sm uppercase tracking-widest text-xs md:text-sm text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-secondary/10 bg-surface">
                                    @foreach ($trip->upcoming_departures as $departure)
                                        @php($status = $departure['status'])
                                        <tr class="hover:bg-surface-container-low transition-colors">
                                            <td class="p-3 md:p-4 font-body-md text-body-md text-primary text-sm">{{ $departure['start']->format('D, M j Y') }}</td>
                                            <td class="p-3 md:p-4 font-body-md text-body-md text-on-surface-variant text-sm">{{ $departure['end']->format('D, M j Y') }}</td>
                                            <td class="p-3 md:p-4 font-label-lg text-label-lg text-primary text-sm">${{ number_format($departure['price']) }}</td>
                                            <td class="p-3 md:p-4">
                                                <span class="inline-block px-2 py-1 md:px-3 rounded-full font-label-sm text-label-sm uppercase tracking-widest text-xs {{ $status === 'Sold Out' ? 'bg-on-surface-variant/10 text-on-surface-variant' : ($status === 'Few Spots Left' ? 'bg-secondary/15 text-secondary' : 'bg-primary/10 text-primary') }}">
                                                    {{ $status }}
                                                </span>
                                            </td>
                                            <td class="p-3 md:p-4 text-right">
                                                @if ($status === 'Sold Out')
                                                    <span class="inline-block px-3 py-1.5 md:px-5 md:py-2 rounded font-label-sm text-label-sm uppercase tracking-widest text-xs text-on-surface-variant/40 border border-on-surface-variant/20">Sold Out</span>
                                                @else
                                                    <a href="{{ route('contact.index') }}" class="inline-block bg-primary text-on-primary px-3 py-1.5 md:px-5 md:py-2 rounded font-label-sm text-label-sm uppercase tracking-widest text-xs hover:bg-primary-container transition-all">Book Now</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{-- Comments --}}
                    <div id="comments" class="pt-10 border-t border-secondary/10 scroll-mt-28">
                        <h2 class="font-headline-lg text-headline-lg text-primary mb-3">
                            {{ $comments->count() }} {{ \Illuminate\Support\Str::plural('Comment', $comments->count()) }}
                        </h2>
                        <div class="w-12 h-0.5 bg-secondary rounded-full mb-8"></div>

                        @if (session('status'))
                            <div class="mb-10 p-4 rounded-lg bg-primary text-on-primary font-body-md">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if ($comments->isNotEmpty())
                            <div class="space-y-6 md:space-y-8 mb-12">
                                @foreach ($comments as $comment)
                                    <div class="flex items-start gap-3 md:gap-4">
                                        <div class="w-10 h-10 md:w-12 md:h-12 rounded-full bg-secondary-fixed flex items-center justify-center font-bold text-on-secondary-fixed flex-shrink-0 text-sm">
                                            {{ $comment->initials }}
                                        </div>
                                        <div class="flex-1 bg-surface-container-low rounded-xl p-4 md:p-6">
                                            <div class="flex flex-wrap items-center justify-between gap-2 mb-2">
                                                <h4 class="font-label-lg text-label-lg text-primary uppercase text-sm">{{ $comment->name }}</h4>
                                                <span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-widest text-xs">{{ $comment->created_at->format('F j, Y') }}</span>
                                            </div>
                                            <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed text-sm md:text-base">{{ $comment->body }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="font-body-md text-body-md text-on-surface-variant mb-12">Be the first to share your thoughts on this trip.</p>
                        @endif

                        {{-- Leave a Comment Form --}}
                        <div class="bg-surface-container-low rounded-xl p-5 md:p-10">
                            <h3 class="font-headline-md text-headline-md text-primary mb-6">Leave a Comment</h3>
                            <form class="space-y-6 md:space-y-8" method="POST" action="{{ route('trips.comments.store', $trip->slug) }}#comments">
                                @csrf
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8">
                                    <div class="relative">
                                        <label class="font-label-lg text-label-lg uppercase tracking-widest text-secondary block mb-2 text-xs md:text-sm">Your Name</label>
                                        <input class="w-full bg-transparent border-t-0 border-x-0 border-b border-primary/30 p-2 font-body-md form-input-focus transition-all" placeholder="Your name" type="text" name="name" value="{{ old('name') }}">
                                        @error('name')
                                            <p class="text-error text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="relative">
                                        <label class="font-label-lg text-label-lg uppercase tracking-widest text-secondary block mb-2 text-xs md:text-sm">Email Address</label>
                                        <input class="w-full bg-transparent border-t-0 border-x-0 border-b border-primary/30 p-2 font-body-md form-input-focus transition-all" placeholder="you@example.com" type="email" name="email" value="{{ old('email') }}">
                                        @error('email')
                                            <p class="text-error text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="relative">
                                    <label class="font-label-lg text-label-lg uppercase tracking-widest text-secondary block mb-2 text-xs md:text-sm">Comment</label>
                                    <textarea class="w-full bg-transparent border-t-0 border-x-0 border-b border-primary/30 p-2 font-body-md form-input-focus transition-all resize-none" placeholder="Share your thoughts..." rows="4" name="body">{{ old('body') }}</textarea>
                                    @error('body')
                                        <p class="text-error text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="pt-2">
                                    <button class="bg-primary text-on-primary px-8 md:px-10 py-3 md:py-4 rounded-lg font-label-lg uppercase tracking-widest hover:bg-primary-container transition-all flex items-center gap-3 group text-sm" type="submit">
                                        Post Comment
                                        <span class="material-symbols-outlined group-hover:translate-x-1 transition-transform">arrow_forward</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    {{-- Good to Know --}}
                    <div class="pt-10 border-t border-secondary/10">
                        <h2 class="font-headline-lg text-headline-lg text-primary mb-3">Good to Know</h2>
                        <div class="w-12 h-0.5 bg-secondary rounded-full mb-8"></div>

                        <?php
                            $goodToKnow = [
                                [
                                    'icon'  => 'payments',
                                    'title' => 'Currency',
                                    'body'  => 'The official currency of Egypt is the Egyptian Pound (EGP). US dollars and euros are widely accepted at major tourist sites, hotels, and tour operators. We recommend carrying some local cash for markets, tips, and smaller purchases.',
                                ],
                                [
                                    'icon'  => 'electrical_services',
                                    'title' => 'Plugs & Adapters',
                                    'body'  => 'Egypt uses Type C and Type F sockets (European round-pin) at 220 V / 50 Hz. Travellers from the US, UK, or Australia will need a plug adapter. A universal travel adapter is recommended.',
                                ],
                                [
                                    'icon'  => 'vaccines',
                                    'title' => 'Vaccines',
                                    'body'  => 'No mandatory vaccinations are required to enter Egypt. The CDC recommends routine vaccines plus Hepatitis A and Typhoid for most travellers. Consult your doctor or a travel health clinic at least 4–6 weeks before departure.',
                                ],
                                [
                                    'icon'  => 'article',
                                    'title' => 'Visa',
                                    'body'  => 'Most nationalities can obtain an e-Visa online at visa2egypt.gov.eg before travel, or a visa on arrival at major Egyptian airports. We advise checking the current requirements for your specific passport nationality before booking.',
                                ],
                                [
                                    'icon'  => 'credit_card',
                                    'title' => 'Payment Information',
                                    'body'  => 'Major credit and debit cards (Visa, Mastercard) are accepted at hotels and larger restaurants. Cash is preferred at local markets, for tipping guides and drivers, and at smaller establishments. ATMs are widely available in cities.',
                                ],
                                [
                                    'icon'  => 'event_busy',
                                    'title' => 'Cancellation Policy',
                                    'body'  => 'Free cancellation up to 30 days before your departure date. Cancellations 15–29 days prior receive a 50% refund. Cancellations within 14 days of departure are non-refundable. Please refer to your booking confirmation for the exact terms applicable to your trip.',
                                ],
                                [
                                    'icon'  => 'accessible',
                                    'title' => 'Accessibility',
                                    'body'  => "Many of Egypt's ancient sites involve uneven terrain, stairs, and narrow passages that may be challenging for travellers with mobility restrictions. Please contact our team before booking to discuss your specific requirements — we will do our best to accommodate you.",
                                ],
                            ];
                        ?>

                        <div class="rounded-2xl overflow-hidden border border-secondary/20 shadow-sm divide-y divide-secondary/10">
                            @foreach ($goodToKnow as $item)
                                <details class="group bg-surface">
                                    <summary class="flex items-center gap-4 px-5 py-4 md:py-5 cursor-pointer list-none hover:bg-surface-container-low transition-colors">
                                        <span class="material-symbols-outlined text-secondary text-[22px] flex-shrink-0">{{ $item['icon'] }}</span>
                                        <span class="font-label-lg text-label-lg text-primary flex-1 text-sm md:text-base">{{ $item['title'] }}</span>
                                        <span class="material-symbols-outlined text-on-surface-variant/50 text-[18px] flex-shrink-0 transition-transform duration-300 group-open:rotate-180">expand_more</span>
                                    </summary>
                                    <div class="px-5 pb-5 pl-[60px] bg-surface-container-low/50">
                                        <p class="font-body-md text-on-surface-variant text-sm leading-relaxed">{{ $item['body'] }}</p>
                                    </div>
                                </details>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- Right Column: Booking Card --}}
                <div class="lg:col-span-4">
                    <div class="sticky top-28 glass-panel p-6 md:p-8 rounded-xl border border-secondary/20 shadow-xl shadow-primary/5">
                        <span class="block font-label-sm text-label-sm uppercase tracking-widest text-secondary mb-2 text-xs">Starting From</span>
                        <div class="flex items-baseline gap-2 md:gap-3 mb-6">
                            @if ($trip->hasDiscount())
                                <span class="font-body-lg text-on-surface-variant/60 line-through text-sm">${{ number_format($trip->original_price) }}</span>
                            @endif
                            <span class="font-display-lg text-headline-lg text-primary">${{ number_format($trip->price) }}</span>
                            <span class="font-body-md text-body-md text-on-surface-variant text-sm">/ person</span>
                        </div>

                        <div class="space-y-3 md:space-y-4 mb-8 border-t border-secondary/10 pt-5 md:pt-6">
                            <div class="flex justify-between items-center">
                                <span class="font-label-sm text-label-sm uppercase tracking-widest text-on-surface-variant text-xs">Duration</span>
                                <span class="font-body-md text-body-md text-primary text-sm">{{ $trip->duration }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="font-label-sm text-label-sm uppercase tracking-widest text-on-surface-variant text-xs">Location</span>
                                <span class="font-body-md text-body-md text-primary text-sm">{{ $trip->location }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="font-label-sm text-label-sm uppercase tracking-widest text-on-surface-variant text-xs">Group Size</span>
                                <span class="font-body-md text-body-md text-primary text-sm">{{ $trip->group_size }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="font-label-sm text-label-sm uppercase tracking-widest text-on-surface-variant text-xs">Trip Type</span>
                                <span class="font-body-md text-body-md text-primary text-sm">{{ $trip->trip_type }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="font-label-sm text-label-sm uppercase tracking-widest text-on-surface-variant text-xs">Rating</span>
                                <span class="flex items-center gap-1 font-body-md text-body-md text-primary text-sm">
                                    <span class="material-symbols-outlined text-secondary text-[16px] md:text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
                                    {{ number_format($trip->rating, 1) }} ({{ $trip->reviews_count }})
                                </span>
                            </div>
                        </div>

                        <a href="#availability" class="w-full bg-primary text-on-primary px-5 py-3 md:py-4 rounded-lg font-label-lg text-label-lg uppercase tracking-widest hover:bg-primary-container transition-all flex items-center justify-center gap-3 mb-3 text-xs md:text-sm">
                            Check Availability
                            <span class="material-symbols-outlined text-[18px]">calendar_month</span>
                        </a>
                        <a href="{{ route('contact.index') }}" class="w-full border-2 border-secondary text-secondary px-5 py-3 md:py-4 rounded-lg font-label-lg text-label-lg uppercase tracking-widest hover:bg-secondary hover:text-on-secondary transition-all flex items-center justify-center gap-3 text-xs md:text-sm">
                            Book Now
                            <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        {{-- Why Book With Us --}}
        <section class="py-16 md:py-24 bg-primary text-on-primary">
            <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
                <div class="text-center mb-12 md:mb-16">
                    <h2 class="font-headline-lg text-headline-lg mb-4">Why Book With Truly Egypt Tours</h2>
                    <div class="w-24 h-1 bg-secondary mx-auto"></div>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 md:gap-gutter">
                    <div class="text-center">
                        <span class="material-symbols-outlined text-3xl md:text-4xl text-secondary-fixed-dim mb-3 md:mb-4 block">payments</span>
                        <h3 class="font-label-lg text-label-lg uppercase mb-2 text-xs md:text-sm">Best Price Guarantee</h3>
                        <p class="font-body-md text-white/70 text-xs md:text-sm">Find this trip cheaper elsewhere and we'll match the price.</p>
                    </div>
                    <div class="text-center">
                        <span class="material-symbols-outlined text-3xl md:text-4xl text-secondary-fixed-dim mb-3 md:mb-4 block">verified_user</span>
                        <h3 class="font-label-lg text-label-lg uppercase mb-2 text-xs md:text-sm">Secure Booking</h3>
                        <p class="font-body-md text-white/70 text-xs md:text-sm">Your payment and personal details are always protected.</p>
                    </div>
                    <div class="text-center">
                        <span class="material-symbols-outlined text-3xl md:text-4xl text-secondary-fixed-dim mb-3 md:mb-4 block">support_agent</span>
                        <h3 class="font-label-lg text-label-lg uppercase mb-2 text-xs md:text-sm">24/7 Concierge Support</h3>
                        <p class="font-body-md text-white/70 text-xs md:text-sm">Our team is on call before, during, and after your trip.</p>
                    </div>
                    <div class="text-center">
                        <span class="material-symbols-outlined text-3xl md:text-4xl text-secondary-fixed-dim mb-3 md:mb-4 block">event_repeat</span>
                        <h3 class="font-label-lg text-label-lg uppercase mb-2 text-xs md:text-sm">Flexible Booking</h3>
                        <p class="font-body-md text-white/70 text-xs md:text-sm">Plans change - reschedule your dates with ease.</p>
                    </div>
                </div>
            </div>
        </section>

        {{-- FAQ --}}
        <section class="py-16 md:py-24 bg-surface-container-low">
            <div class="max-w-3xl mx-auto px-margin-mobile md:px-margin-desktop">
                <div class="text-center mb-10 md:mb-12">
                    <h2 class="font-headline-lg text-headline-lg text-primary mb-4">Frequently Asked Questions</h2>
                    <div class="w-24 h-1 bg-secondary mx-auto"></div>
                </div>
                <div class="space-y-3 md:space-y-4">
                    @foreach ($trip->faqs ?? [] as $faq)
                        <details class="group bg-surface rounded-xl border border-secondary/10 overflow-hidden">
                            <summary class="flex items-center justify-between gap-4 p-5 md:p-6 cursor-pointer list-none">
                                <span class="font-label-lg text-label-lg text-primary text-sm md:text-base">{{ $faq['question'] }}</span>
                                <span class="material-symbols-outlined text-secondary transition-transform duration-300 group-open:rotate-45 flex-shrink-0">add</span>
                            </summary>
                            <div class="px-5 pb-5 md:px-6 md:pb-6">
                                <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed text-sm">{{ $faq['answer'] }}</p>
                            </div>
                        </details>
                    @endforeach

                    @foreach ($generalFaqs as $faq)
                        <details class="group bg-surface rounded-xl border border-secondary/10 overflow-hidden">
                            <summary class="flex items-center justify-between gap-4 p-5 md:p-6 cursor-pointer list-none">
                                <span class="font-label-lg text-label-lg text-primary text-sm md:text-base">{{ $faq['question'] }}</span>
                                <span class="material-symbols-outlined text-secondary transition-transform duration-300 group-open:rotate-45 flex-shrink-0">add</span>
                            </summary>
                            <div class="px-5 pb-5 md:px-6 md:pb-6">
                                <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed text-sm">{{ $faq['answer'] }}</p>
                            </div>
                        </details>
                    @endforeach
                </div>
            </div>
        </section>
    </main>

    {{-- Related Trips --}}
    @if ($relatedTrips->isNotEmpty())
        <section class="py-16 md:py-24 bg-surface overflow-hidden">
            <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
                <div class="text-center mb-12 md:mb-16">
                    <h2 class="font-headline-lg text-headline-lg text-primary mb-4">You May Also Like</h2>
                    <div class="w-24 h-1 bg-secondary mx-auto"></div>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-gutter">
                    @foreach ($relatedTrips as $relatedTrip)
                        @include('trips.partials.card', ['trip' => $relatedTrip, 'class' => 'h-[420px] md:h-[480px]'])
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Side Concierge Buttons --}}
    <div class="fixed bottom-6 right-4 md:bottom-8 md:right-8 flex flex-col items-end space-y-3 md:space-y-4 z-50">
        <button class="bg-surface/80 text-primary p-3 md:p-4 border border-secondary/30 rounded-full shadow-xl shadow-primary/10 hover:scale-110 transition-transform duration-300 group flex items-center gap-3">
            <span class="hidden group-hover:block font-label-sm text-label-sm uppercase tracking-widest text-xs">WhatsApp Support</span>
            <span class="material-symbols-outlined">chat</span>
        </button>
        <button class="bg-primary text-on-primary p-3 md:p-4 rounded-full shadow-xl shadow-primary/10 hover:scale-110 transition-transform duration-300 group flex items-center gap-3">
            <span class="hidden group-hover:block font-label-sm text-label-sm uppercase tracking-widest text-xs">AI Assistant</span>
            <span class="material-symbols-outlined">smart_toy</span>
        </button>
    </div>

    {{-- Gallery Lightbox --}}
    <div id="gallery-lightbox" class="hidden fixed inset-0 z-[100] bg-primary/90 backdrop-blur-sm items-center justify-center p-4 md:p-12">
        <button type="button" id="gallery-lightbox-close" aria-label="Close" class="absolute top-4 right-4 md:top-6 md:right-6 w-11 h-11 md:w-12 md:h-12 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition-colors">
            <span class="material-symbols-outlined text-2xl md:text-3xl">close</span>
        </button>
        <img id="gallery-lightbox-image" src="" alt="" class="max-w-full max-h-full object-contain rounded-lg">
    </div>

    {{-- Stay Detail Dialog --}}
    <div id="stay-dialog" class="hidden fixed inset-0 z-[100] bg-primary/80 backdrop-blur-sm items-center justify-center p-4 md:p-8">
        <div class="relative bg-surface rounded-2xl overflow-hidden shadow-2xl w-full max-w-lg md:max-w-2xl max-h-[90vh] flex flex-col">
            {{-- Close button --}}
            <button type="button" id="stay-dialog-close" aria-label="Close"
                class="absolute top-3 right-3 z-10 w-10 h-10 rounded-full bg-primary/60 backdrop-blur-sm text-white flex items-center justify-center hover:bg-primary transition-colors">
                <span class="material-symbols-outlined text-xl">close</span>
            </button>

            {{-- Image --}}
            <div class="relative h-52 sm:h-64 md:h-72 flex-shrink-0 overflow-hidden">
                <img id="stay-dialog-image" src="" alt="" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-primary/60 to-transparent"></div>
                {{-- Stars overlay --}}
                <div id="stay-dialog-stars" class="absolute bottom-4 left-4 flex items-center gap-0.5 bg-white/20 backdrop-blur-md rounded-full px-3 py-1.5"></div>
            </div>

            {{-- Content --}}
            <div class="p-6 md:p-8 overflow-y-auto">
                <h3 id="stay-dialog-name" class="font-headline-lg text-headline-lg text-primary mb-3 text-xl md:text-2xl leading-snug"></h3>

                <div class="flex flex-wrap items-center gap-4 mb-5 pb-5 border-b border-secondary/10">
                    <div class="flex items-center gap-2 text-on-surface-variant">
                        <span class="material-symbols-outlined text-secondary text-[18px]">location_on</span>
                        <span id="stay-dialog-location" class="font-label-sm text-label-sm uppercase tracking-widest text-xs"></span>
                    </div>
                    <div class="flex items-center gap-2 text-on-surface-variant">
                        <span class="material-symbols-outlined text-secondary text-[18px]">nights_stay</span>
                        <span id="stay-dialog-nights" class="font-label-sm text-label-sm uppercase tracking-widest text-xs"></span>
                    </div>
                </div>

                <p id="stay-dialog-description" class="font-body-md text-on-surface-variant leading-relaxed text-sm md:text-base"></p>
            </div>
        </div>
    </div>

    {{-- Footer --}}
    @include('layouts.partials.footer')
</div>

<script>
    (function () {
        var toggleBtn = document.getElementById('itinerary-toggle-all');
        var accordion = document.getElementById('itinerary-accordion');

        if (!toggleBtn || !accordion) {
            return;
        }

        toggleBtn.addEventListener('click', function () {
            var items = accordion.querySelectorAll('details');
            var anyClosed = Array.prototype.some.call(items, function (item) {
                return !item.open;
            });

            Array.prototype.forEach.call(items, function (item) {
                item.open = anyClosed;
            });

            toggleBtn.textContent = anyClosed ? 'Collapse All' : 'Expand All';
        });
    })();

    // Stay detail dialog
    (function () {
        var dialog     = document.getElementById('stay-dialog');
        var closeBtn   = document.getElementById('stay-dialog-close');
        var imgEl      = document.getElementById('stay-dialog-image');
        var nameEl     = document.getElementById('stay-dialog-name');
        var locationEl = document.getElementById('stay-dialog-location');
        var nightsEl   = document.getElementById('stay-dialog-nights');
        var starsEl    = document.getElementById('stay-dialog-stars');
        var descEl     = document.getElementById('stay-dialog-description');

        if (!dialog) return;

        function openDialog(btn) {
            var name        = btn.dataset.stayName;
            var location    = btn.dataset.stayLocation;
            var nights      = parseInt(btn.dataset.stayNights, 10);
            var rating      = parseInt(btn.dataset.stayRating, 10);
            var image       = btn.dataset.stayImage;
            var description = btn.dataset.stayDescription;

            imgEl.src        = image;
            imgEl.alt        = name;
            nameEl.textContent = name;
            locationEl.textContent = location;
            nightsEl.textContent   = nights + ' ' + (nights === 1 ? 'Night' : 'Nights');

            starsEl.innerHTML = '';
            for (var i = 0; i < rating; i++) {
                var s = document.createElement('span');
                s.className = 'material-symbols-outlined text-secondary-fixed text-[14px]';
                s.style.fontVariationSettings = "'FILL' 1";
                s.textContent = 'star';
                starsEl.appendChild(s);
            }

            descEl.textContent = description;

            dialog.classList.remove('hidden');
            dialog.classList.add('flex');
            document.body.style.overflow = 'hidden';
        }

        function closeDialog() {
            dialog.classList.add('hidden');
            dialog.classList.remove('flex');
            document.body.style.overflow = '';
        }

        document.querySelectorAll('[data-stay-trigger]').forEach(function (btn) {
            btn.addEventListener('click', function () { openDialog(btn); });
        });

        closeBtn.addEventListener('click', closeDialog);

        dialog.addEventListener('click', function (e) {
            if (e.target === dialog) closeDialog();
        });

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') closeDialog();
        });
    })();
</script>
@endsection
