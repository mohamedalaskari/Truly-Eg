@extends('layouts.app')

@section('title', 'Truly Egypt Tours | My Wishlist')

@section('content')
<div class="wishlist-page">
    {{-- Top Navigation Bar --}}
    @include('layouts.partials.nav', ['active' => 'wishlist'])

    <main class="pt-20">
        <section class="py-32 bg-surface-container-low scroll-mt-20">
            <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
                <div class="mb-16">
                    <h1 class="font-headline-lg text-headline-lg text-primary mb-4">My Wishlist</h1>
                    <p class="font-body-lg text-on-surface-variant">Your handpicked journeys, saved for later.</p>
                </div>

                @if ($trips->isEmpty())
                    <div class="flex flex-col items-center justify-center text-center py-24 gap-6">
                        <span class="material-symbols-outlined text-6xl text-secondary/40">favorite_border</span>
                        <p class="font-body-lg text-on-surface-variant max-w-md">Your wishlist is empty. Browse our trips and tap the heart icon to save your favorites here.</p>
                        <a href="{{ route('trips.index') }}" class="bg-primary text-on-primary px-8 py-3 rounded-lg font-label-lg uppercase tracking-widest hover:bg-primary-container transition-all">Explore Trips</a>
                    </div>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-gutter">
                        @foreach ($trips as $trip)
                            <div class="group relative h-[600px] rounded-2xl overflow-hidden shadow-2xl" data-wishlist-card="{{ $trip->id }}">
                                <img alt="{{ $trip->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" src="{{ $trip->image_url }}">
                                <div class="absolute inset-0 bg-gradient-to-t from-primary/90 via-transparent to-transparent"></div>

                                {{-- Wishlist Toggle --}}
                                <button type="button" class="wishlist-btn active absolute top-4 right-4 w-10 h-10 rounded-full bg-white/30 backdrop-blur-md flex items-center justify-center text-white hover:scale-110 transition-all" data-trip-id="{{ $trip->id }}" aria-label="Remove from wishlist" aria-pressed="true">
                                    <span class="material-symbols-outlined">favorite</span>
                                </button>

                                {{-- Duration Badge --}}
                                <div class="absolute top-4 left-4 bg-white/30 backdrop-blur-md rounded-full px-4 py-1.5 flex items-center gap-1.5 text-white">
                                    <span class="material-symbols-outlined text-[18px]">calendar_month</span>
                                    <span class="font-label-sm text-label-sm uppercase tracking-widest">{{ $trip->duration }}</span>
                                </div>

                                {{-- Discount Badge --}}
                                @if ($trip->hasDiscount())
                                    <div class="absolute top-14 left-4 bg-secondary text-on-secondary rounded-full px-4 py-1.5 font-label-sm text-label-sm uppercase tracking-widest">
                                        -{{ $trip->discount_percent }}% Off
                                    </div>
                                @endif

                                <div class="absolute bottom-0 left-0 right-0 p-8">
                                    <div class="glass-card p-6 rounded-xl border-t border-secondary/30">
                                        <h3 class="font-headline-md text-headline-md text-primary mb-2">{{ $trip->title }}</h3>
                                        <div class="flex items-center gap-1.5 mb-3">
                                            <span class="material-symbols-outlined text-secondary text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
                                            <span class="font-label-lg text-label-lg text-primary">{{ number_format($trip->rating, 1) }}</span>
                                            <span class="font-body-md text-on-surface-variant text-sm">({{ $trip->reviews_count }} reviews)</span>
                                        </div>
                                        <div class="flex justify-between items-center">
                                            <div class="flex items-baseline gap-2">
                                                @if ($trip->hasDiscount())
                                                    <span class="font-body-md text-on-surface-variant/60 line-through text-sm">${{ number_format($trip->original_price) }}</span>
                                                @endif
                                                <span class="font-label-lg text-label-lg text-secondary uppercase">${{ number_format($trip->price) }}</span>
                                            </div>
                                            <a href="{{ route('contact.index') }}" class="bg-primary text-on-primary px-6 py-2 rounded font-label-sm uppercase hover:bg-primary-container transition-all">Book Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>
    </main>

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
