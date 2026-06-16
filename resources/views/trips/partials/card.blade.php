@php($cardClass = $class ?? 'h-[600px]')

<div class="group relative {{ $cardClass }} rounded-2xl overflow-hidden shadow-2xl">
    <a href="{{ route('trips.show', $trip->slug) }}" class="absolute inset-0 block">
        <img alt="{{ $trip->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" src="{{ $trip->image_url }}">
        <div class="absolute inset-0 bg-gradient-to-t from-primary/90 via-transparent to-transparent"></div>

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
                    <span class="bg-primary text-on-primary px-6 py-2 rounded font-label-sm uppercase group-hover:bg-primary-container transition-all">Book Now</span>
                </div>
            </div>
        </div>
    </a>

    {{-- Wishlist Toggle --}}
    <button type="button" class="wishlist-btn {{ in_array($trip->id, session('wishlist', [])) ? 'active' : '' }} absolute top-4 right-4 z-10 w-10 h-10 rounded-full bg-white/30 backdrop-blur-md flex items-center justify-center text-white hover:scale-110 transition-all" data-trip-id="{{ $trip->id }}" aria-label="Add to wishlist" aria-pressed="{{ in_array($trip->id, session('wishlist', [])) ? 'true' : 'false' }}">
        <span class="material-symbols-outlined">favorite</span>
    </button>
</div>
