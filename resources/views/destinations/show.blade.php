@extends('layouts.app')

@section('title', $destination->name.' | Truly Egypt Tours')

@section('content')
@php
    $infoFields = [
        'country' => ['label' => 'Country', 'icon' => 'flag'],
        'language' => ['label' => 'Language', 'icon' => 'translate'],
        'currency' => ['label' => 'Currency', 'icon' => 'payments'],
        'time_zone' => ['label' => 'Time Zone', 'icon' => 'schedule'],
        'best_time_to_visit' => ['label' => 'Best Time to Visit', 'icon' => 'wb_sunny'],
        'calling_code' => ['label' => 'Calling Code', 'icon' => 'call'],
        'drives_on' => ['label' => 'Drives On', 'icon' => 'directions_car'],
    ];

    $cultureIcons = ['diversity_3', 'restaurant', 'celebration'];
    $tipIcons = ['tips_and_updates', 'schedule', 'info'];
@endphp

<div class="destination-show-page">
    {{-- Top Navigation Bar --}}
    @include('layouts.partials.nav', ['active' => 'destinations'])

    <main class="pt-20">
        {{-- Title Bar --}}
        <section class="bg-surface pt-10 pb-8 border-b border-secondary/10">
            <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
                {{-- Breadcrumb --}}
                <nav class="flex items-center gap-2 font-label-sm text-label-sm uppercase tracking-widest text-on-surface-variant mb-6">
                    <a href="{{ route('home') }}" class="hover:text-secondary transition-colors">Home</a>
                    <span class="material-symbols-outlined text-[16px]">chevron_right</span>
                    <a href="{{ route('destinations.index') }}" class="hover:text-secondary transition-colors">Destinations</a>
                    <span class="material-symbols-outlined text-[16px]">chevron_right</span>
                    <span class="text-secondary">{{ $destination->name }}</span>
                </nav>

                @if ($destination->tours_count > 0)
                    <div class="inline-block bg-secondary text-on-secondary rounded-full px-4 py-1.5 font-label-sm text-label-sm uppercase tracking-widest mb-4">
                        {{ $destination->tours_count }} {{ \Illuminate\Support\Str::plural('Tour', $destination->tours_count) }} Available
                    </div>
                @endif

                <h1 class="font-display-lg text-display-lg-mobile md:text-headline-lg text-primary mb-4 max-w-3xl">{{ $destination->name }}</h1>
                <p class="font-body-lg text-body-lg text-on-surface-variant max-w-3xl">{{ $destination->description }}</p>
            </div>
        </section>

        {{-- Gallery --}}
        <section class="py-8 bg-surface">
            <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
                {{-- Hero image --}}
                <button type="button"
                    data-lightbox-trigger
                    data-lightbox-src="{{ $destination->image_url }}"
                    data-lightbox-alt="{{ $destination->name }}"
                    class="relative group w-full h-[320px] md:h-[480px] rounded-xl overflow-hidden mb-3 block p-0 border-0 bg-transparent cursor-zoom-in">
                    <img alt="{{ $destination->name }}" src="{{ $destination->image_url }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-primary/0 group-hover:bg-primary/20 transition-colors flex items-center justify-center">
                        <span class="material-symbols-outlined text-white text-5xl opacity-0 group-hover:opacity-100 transition-opacity drop-shadow-lg">zoom_in</span>
                    </div>
                </button>

                @if (! empty($destination->gallery_urls))
                    <div class="grid grid-cols-2 {{ count($destination->gallery_urls) >= 3 ? 'md:grid-cols-3' : 'md:grid-cols-2' }} gap-3">
                        @foreach ($destination->gallery_urls as $thumb)
                            <button type="button"
                                data-lightbox-trigger
                                data-lightbox-src="{{ $thumb }}"
                                data-lightbox-alt="{{ $destination->name }}"
                                class="relative group h-32 md:h-48 rounded-lg overflow-hidden block p-0 border-0 bg-transparent cursor-zoom-in">
                                <img alt="{{ $destination->name }}" src="{{ $thumb }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                <div class="absolute inset-0 bg-primary/0 group-hover:bg-primary/20 transition-colors flex items-center justify-center">
                                    <span class="material-symbols-outlined text-white text-3xl opacity-0 group-hover:opacity-100 transition-opacity drop-shadow">zoom_in</span>
                                </div>
                            </button>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>

        {{-- Main Content --}}
        <section class="py-24 bg-surface">
            <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop grid grid-cols-1 lg:grid-cols-12 gap-gutter">
                {{-- Left Column --}}
                <div class="lg:col-span-8 space-y-20">
                    {{-- History --}}
                    @if ($destination->history)
                        <div>
                            <h2 class="font-headline-lg text-headline-lg text-primary mb-6">The Story of {{ $destination->name }}</h2>
                            <p class="font-body-lg text-body-lg text-on-surface-variant leading-loose">{{ $destination->history }}</p>
                        </div>
                    @endif

                    {{-- Must-Visit Attractions --}}
                    @if (! empty($destination->attractions))
                        <div>
                            <h2 class="font-headline-lg text-headline-lg text-primary mb-8">Must-Visit Attractions</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                @foreach ($destination->attractions as $index => $attraction)
                                    <div class="flex items-start gap-4 p-6 bg-surface-container-low rounded-xl border border-secondary/10">
                                        <div class="w-10 h-10 rounded-full bg-primary text-on-primary flex items-center justify-center font-label-lg text-label-lg flex-shrink-0">
                                            {{ $index + 1 }}
                                        </div>
                                        <div>
                                            <h3 class="font-headline-md text-primary text-xl mb-2">{{ $attraction['title'] }}</h3>
                                            <p class="font-body-md text-body-md text-on-surface-variant">{{ $attraction['description'] }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    {{-- Cultural Experiences --}}
                    @if (! empty($destination->cultural_experiences))
                        <div>
                            <h2 class="font-headline-lg text-headline-lg text-primary mb-8">Cultural Experiences</h2>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                @foreach ($destination->cultural_experiences as $index => $experience)
                                    <div class="p-6 border border-secondary/20 rounded-xl hover:bg-surface-container-low transition-all">
                                        <span class="material-symbols-outlined text-secondary text-3xl mb-4 block">{{ $cultureIcons[$index % count($cultureIcons)] }}</span>
                                        <h3 class="font-label-lg text-label-lg text-primary uppercase mb-2">{{ $experience['title'] }}</h3>
                                        <p class="font-body-md text-on-surface-variant">{{ $experience['description'] }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    {{-- Travel Tips --}}
                    @if (! empty($destination->travel_tips))
                        <div>
                            <h2 class="font-headline-lg text-headline-lg text-primary mb-8">Travel Tips</h2>
                            <div class="space-y-4">
                                @foreach ($destination->travel_tips as $index => $tip)
                                    <div class="flex items-start gap-4 p-5 bg-surface-container-low rounded-lg border border-secondary/10">
                                        <span class="material-symbols-outlined text-secondary flex-shrink-0">{{ $tipIcons[$index % count($tipIcons)] }}</span>
                                        <div>
                                            <h3 class="font-label-lg text-label-lg text-primary uppercase mb-1">{{ $tip['title'] }}</h3>
                                            <p class="font-body-md text-body-md text-on-surface-variant">{{ $tip['description'] }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    {{-- Conclusion --}}
                    @if ($destination->conclusion)
                        <div class="bg-primary text-on-primary rounded-xl p-10">
                            <h2 class="font-headline-lg text-headline-lg mb-4">Why Visit {{ $destination->name }}?</h2>
                            <p class="font-body-lg text-white/80 leading-loose mb-8">{{ $destination->conclusion }}</p>
                            @if ($trips->isNotEmpty())
                                <a href="#destination-trips" class="inline-flex items-center gap-2 bg-secondary text-on-secondary px-8 py-4 rounded font-label-lg uppercase tracking-widest hover:bg-secondary-fixed-dim transition-all">
                                    Explore Trips to {{ $destination->name }}
                                    <span class="material-symbols-outlined">arrow_downward</span>
                                </a>
                            @else
                                <a href="{{ route('trips.index') }}" class="inline-flex items-center gap-2 bg-secondary text-on-secondary px-8 py-4 rounded font-label-lg uppercase tracking-widest hover:bg-secondary-fixed-dim transition-all">
                                    Explore All Trips
                                    <span class="material-symbols-outlined">arrow_forward</span>
                                </a>
                            @endif
                        </div>
                    @endif
                </div>

                {{-- Right Column: Info Sidebar --}}
                <div class="lg:col-span-4">
                    <div class="sticky top-28 space-y-6">
                        {{-- Destination Info --}}
                        @if (! empty($destination->info))
                            <div class="glass-panel p-8 rounded-xl border border-secondary/20 shadow-xl shadow-primary/5">
                                <h3 class="font-headline-md text-headline-md text-primary mb-6">Destination Info</h3>
                                <div class="space-y-4">
                                    @foreach ($infoFields as $key => $field)
                                        @continue(empty($destination->info[$key]))
                                        <div class="flex items-center justify-between gap-3 border-b border-secondary/10 pb-3 last:border-0 last:pb-0">
                                            <span class="flex items-center gap-2 font-label-sm text-label-sm uppercase tracking-widest text-on-surface-variant">
                                                <span class="material-symbols-outlined text-secondary text-[18px]">{{ $field['icon'] }}</span>
                                                {{ $field['label'] }}
                                            </span>
                                            <span class="font-body-md text-body-md text-primary text-right">{{ $destination->info[$key] }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        {{-- Interactive Map --}}
                        @if (! empty($destination->map_position))
                            <div class="relative rounded-xl overflow-hidden border border-secondary/10 shadow-lg" style="height: 280px;">
                                <div id="destination-map" class="w-full h-full"></div>
                                <div class="absolute top-3 left-3 z-[1000] glass-panel rounded-lg px-4 py-2 flex items-center gap-2 pointer-events-none">
                                    <span class="material-symbols-outlined text-secondary text-[18px]">location_on</span>
                                    <span class="font-label-sm text-label-sm text-primary uppercase tracking-widest text-xs">{{ $destination->name }}</span>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </main>

    {{-- Trips to Destination --}}
    @if ($trips->isNotEmpty())
        <section id="destination-trips" class="py-24 bg-surface-container-low overflow-hidden scroll-mt-20">
            <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
                <div class="flex justify-between items-end mb-16">
                    <div>
                        <h2 class="font-headline-lg text-headline-lg text-primary">Trips to {{ $destination->name }}</h2>
                        <p class="font-body-lg text-on-surface-variant">Curated journeys exploring {{ $destination->name }} and beyond</p>
                    </div>
                    <a href="{{ route('trips.index') }}" class="text-primary font-label-lg uppercase tracking-widest border-b-2 border-primary hover:border-secondary transition-all pb-1">View All Trips</a>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter">
                    @foreach ($trips as $trip)
                        @include('trips.partials.card', ['trip' => $trip, 'class' => 'h-[480px]'])
                    @endforeach
                </div>
            </div>
        </section>
    @endif

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

    {{-- Leaflet Map Init --}}
    @if (! empty($destination->map_position))
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
    (function () {
        var lat  = {{ $destination->map_position['lat'] }};
        var lng  = {{ $destination->map_position['lng'] }};
        var zoom = {{ $destination->map_position['zoom'] }};
        var name = @json($destination->name);

        var map = L.map('destination-map', {
            center: [lat, lng],
            zoom: zoom,
            scrollWheelZoom: false,
            zoomControl: true,
        });

        L.tileLayer('https://{s}.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}{r}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/">CARTO</a>',
            subdomains: 'abcd',
            maxZoom: 19,
        }).addTo(map);

        var goldIcon = L.divIcon({
            html: '<div style="width:18px;height:18px;background:#775a19;border-radius:50%;border:3px solid #fff;box-shadow:0 0 0 3px rgba(119,90,25,0.4),0 0 20px rgba(119,90,25,0.6);"></div>',
            iconSize: [18, 18],
            iconAnchor: [9, 9],
            className: '',
        });

        L.marker([lat, lng], { icon: goldIcon })
            .addTo(map)
            .bindPopup('<strong style="font-family:sans-serif;color:#001e40;">' + name + '</strong><br><span style="font-size:11px;color:#775a19;text-transform:uppercase;letter-spacing:0.1em;">Egypt</span>')
            .openPopup();
    })();
    </script>
    @endif

    {{-- Gallery Lightbox --}}
    <div id="gallery-lightbox" class="hidden fixed inset-0 z-[100] bg-primary/90 backdrop-blur-sm items-center justify-center p-4 md:p-12">
        <button type="button" id="gallery-lightbox-close" aria-label="Close" class="absolute top-4 right-4 md:top-6 md:right-6 w-11 h-11 md:w-12 md:h-12 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition-colors">
            <span class="material-symbols-outlined text-2xl md:text-3xl">close</span>
        </button>
        <img id="gallery-lightbox-image" src="" alt="" class="max-w-full max-h-full object-contain rounded-lg">
    </div>

    {{-- Footer --}}
    @include('layouts.partials.footer')
</div>
@endsection
