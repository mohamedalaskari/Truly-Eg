@php
    $navLinks = [
        'home' => ['label' => 'Home', 'route' => 'home'],
        'trips' => ['label' => 'Tour Packages', 'route' => 'trips.index'],
        'destinations' => ['label' => 'Destinations', 'route' => 'destinations.index'],
        'services' => ['label' => 'Services', 'route' => 'services.index'],
        'about' => ['label' => 'About', 'route' => 'about.index'],
        'contact' => ['label' => 'Contact', 'route' => 'contact.index'],
    ];
    $wishlistCount = count(session('wishlist', []));
@endphp
<nav class="fixed top-0 w-full z-50 bg-surface/80 dark:bg-primary/80 backdrop-blur-xl border-b border-secondary/30 shadow-sm shadow-primary/5 flex justify-between items-center px-margin-mobile md:px-margin-desktop h-20">
    <div class="font-headline-md text-[18px] lg:text-2xl lg:font-semibold text-primary dark:text-primary-fixed tracking-tighter shrink-0">TRULY EGYPT TOURS</div>
    <div class="flex items-center gap-3 lg:gap-6">
        <div class="hidden lg:flex items-center gap-5 xl:gap-8">
            @foreach ($navLinks as $key => $link)
                @if ($key === ($active ?? null))
                    <a class="font-label-lg text-label-lg uppercase tracking-widest text-primary dark:text-primary-fixed-dim relative after:content-[''] after:absolute after:-bottom-2 after:left-1/2 after:-translate-x-1/2 after:w-1 after:h-1 after:bg-secondary-fixed-dim after:rounded-full" href="{{ route($link['route']) }}">{{ $link['label'] }}</a>
                @else
                    <a class="font-label-lg text-label-lg uppercase tracking-widest text-on-surface-variant dark:text-surface-variant hover:text-primary-container dark:hover:text-primary-fixed transition-colors duration-300" href="{{ route($link['route']) }}">{{ $link['label'] }}</a>
                @endif
            @endforeach
        </div>
        <a href="{{ route('home') }}" class="hidden xl:inline-block">
            <img src="{{ asset('logo/IMG_1607.jpg.jpeg') }}" alt="Truly Egypt Tours" class="h-14 w-auto rounded-lg">
        </a>
        <a href="{{ route('wishlist.index') }}" class="relative {{ ($active ?? null) === 'wishlist' ? 'text-primary dark:text-primary-fixed-dim' : 'text-on-surface-variant dark:text-surface-variant hover:text-primary-container dark:hover:text-primary-fixed' }} transition-colors duration-300" aria-label="Wishlist">
            <span class="material-symbols-outlined text-3xl">favorite</span>
            <span data-wishlist-count class="{{ $wishlistCount > 0 ? '' : 'hidden' }} absolute -top-1 -right-1 bg-secondary text-on-secondary text-[10px] font-bold rounded-full w-4 h-4 flex items-center justify-center">{{ $wishlistCount }}</span>
        </a>
        <button id="mobile-menu-button" type="button" class="lg:hidden -mr-2 p-2 text-primary dark:text-primary-fixed" aria-label="Toggle navigation menu" aria-expanded="false" aria-controls="mobile-menu">
            <span id="mobile-menu-icon" class="material-symbols-outlined text-3xl">menu</span>
        </button>
    </div>
</nav>

{{-- Mobile Menu --}}
<div id="mobile-menu" class="hidden lg:hidden fixed top-20 inset-x-0 z-40 bg-surface dark:bg-primary border-b border-secondary/30 shadow-lg shadow-primary/10 max-h-[calc(100vh-5rem)] overflow-y-auto">
    <div class="flex flex-col px-margin-mobile py-6 gap-1">
        @foreach ($navLinks as $key => $link)
            @if ($key === ($active ?? null))
                <a class="block py-3 font-label-lg text-label-lg uppercase tracking-widest text-primary dark:text-primary-fixed-dim border-b border-secondary/10" href="{{ route($link['route']) }}">{{ $link['label'] }}</a>
            @else
                <a class="block py-3 font-label-lg text-label-lg uppercase tracking-widest text-on-surface-variant dark:text-surface-variant hover:text-primary-container dark:hover:text-primary-fixed transition-colors duration-300 border-b border-secondary/10" href="{{ route($link['route']) }}">{{ $link['label'] }}</a>
            @endif
        @endforeach
        <a class="flex items-center justify-between py-3 font-label-lg text-label-lg uppercase tracking-widest {{ ($active ?? null) === 'wishlist' ? 'text-primary dark:text-primary-fixed-dim' : 'text-on-surface-variant dark:text-surface-variant hover:text-primary-container dark:hover:text-primary-fixed' }} transition-colors duration-300 border-b border-secondary/10" href="{{ route('wishlist.index') }}">
            <span class="flex items-center gap-2">
                <span class="material-symbols-outlined">favorite</span>
                Wishlist
            </span>
            <span data-wishlist-count class="{{ $wishlistCount > 0 ? '' : 'hidden' }} bg-secondary text-on-secondary text-xs font-bold rounded-full w-5 h-5 flex items-center justify-center">{{ $wishlistCount }}</span>
        </a>
        <a href="{{ route('home') }}" class="mt-4 flex justify-center">
            <img src="{{ asset('logo/IMG_1607.jpg.jpeg') }}" alt="Truly Egypt Tours" class="h-12 w-auto rounded-lg">
        </a>
    </div>
</div>
