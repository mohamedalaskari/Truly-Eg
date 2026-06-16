@extends('layouts.app')

@section('title', 'Truly Egypt Tours | Contact Us')

@section('content')
{{-- Top Navigation Bar --}}
@include('layouts.partials.nav', ['active' => 'contact'])

{{-- Hero Section --}}
<header class="relative h-[450px] md:h-[614px] w-full flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img class="w-full h-full object-cover" alt="Ancient temple columns at dusk along the Nile" src="{{ asset('storage/images/contact/hero-temple-columns-dusk.png') }}">
        <div class="absolute inset-0 bg-primary/20 backdrop-brightness-75"></div>
    </div>
    <div class="relative z-10 text-center text-on-primary px-margin-mobile">
        <h1 class="font-display-lg text-display-lg-mobile md:text-display-lg mb-4">Connect with Eternity</h1>
        <p class="font-body-lg text-body-lg max-w-2xl mx-auto opacity-90">Our curators are waiting to craft your personal odyssey along the world's most storied river.</p>
    </div>
</header>

{{-- Inquiry Form & Concierge --}}
<main class="relative z-10 -mt-24 px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto mb-margin-desktop">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter">
        {{-- Left: Contact Form --}}
        <div class="lg:col-span-7 glass-panel p-6 md:p-12 rounded-xl shadow-xl shadow-primary/5">
            <div class="mb-12">
                <h2 class="font-headline-lg text-headline-lg text-primary mb-2">Inquire</h2>
                <div class="h-1 w-12 bg-secondary-fixed-dim"></div>
            </div>

            @if (session('status'))
                <div id="contact-status" class="mb-10 p-4 rounded-lg bg-primary text-on-primary font-body-md">
                    {{ session('status') }}
                </div>
            @endif

            <form class="space-y-10" method="POST" action="{{ route('contact.store') }}">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                    <div class="relative">
                        <label class="font-label-lg text-label-lg uppercase tracking-widest text-secondary block mb-2">Your Name</label>
                        <input class="w-full bg-transparent border-t-0 border-x-0 border-b border-primary/30 p-2 font-body-md form-input-focus transition-all" placeholder="ALEXANDER GREAT" type="text" name="name" value="{{ old('name') }}">
                        @error('name')
                            <p class="text-error text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="relative">
                        <label class="font-label-lg text-label-lg uppercase tracking-widest text-secondary block mb-2">Email Address</label>
                        <input class="w-full bg-transparent border-t-0 border-x-0 border-b border-primary/30 p-2 font-body-md form-input-focus transition-all" placeholder="ALEX@ODYSSEY.COM" type="email" name="email" value="{{ old('email') }}">
                        @error('email')
                            <p class="text-error text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="relative">
                    <label class="font-label-lg text-label-lg uppercase tracking-widest text-secondary block mb-2">Interest</label>
                    <select class="w-full bg-transparent border-t-0 border-x-0 border-b border-primary/30 p-2 font-body-md form-input-focus appearance-none" name="interest">
                        <option value="Private Dahabiya Sailing" @selected(old('interest') === 'Private Dahabiya Sailing')>Private Dahabiya Sailing</option>
                        <option value="Luxor &amp; Aswan Expeditions" @selected(old('interest') === 'Luxor & Aswan Expeditions')>Luxor &amp; Aswan Expeditions</option>
                        <option value="Culinary Nile Journeys" @selected(old('interest') === 'Culinary Nile Journeys')>Culinary Nile Journeys</option>
                        <option value="Archeological Deep Dives" @selected(old('interest') === 'Archeological Deep Dives')>Archeological Deep Dives</option>
                    </select>
                    <div class="absolute right-2 bottom-3 pointer-events-none">
                        <span class="material-symbols-outlined text-secondary">keyboard_arrow_down</span>
                    </div>
                    @error('interest')
                        <p class="text-error text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="relative">
                    <label class="font-label-lg text-label-lg uppercase tracking-widest text-secondary block mb-2">Message</label>
                    <textarea class="w-full bg-transparent border-t-0 border-x-0 border-b border-primary/30 p-2 font-body-md form-input-focus transition-all resize-none" placeholder="Tell us about your dream journey..." rows="4" name="message">{{ old('message') }}</textarea>
                    @error('message')
                        <p class="text-error text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="pt-4">
                    <button class="bg-primary text-on-primary px-12 py-5 rounded-lg font-label-lg uppercase tracking-widest hover:bg-primary-container transition-all flex items-center gap-4 group" type="submit">
                        Submit Inquiry
                        <span class="material-symbols-outlined group-hover:translate-x-1 transition-transform">arrow_forward</span>
                    </button>
                </div>
            </form>
        </div>

        {{-- Right: Concierge & Locations --}}
        <div class="lg:col-span-5 flex flex-col gap-gutter">
            {{-- Direct Concierge --}}
            <div class="bg-surface-container-high p-6 md:p-10 rounded-xl border border-secondary/10">
                <h3 class="font-headline-md text-headline-md text-primary mb-6">Direct Concierge</h3>
                <div class="space-y-6">
                    <a class="flex items-center gap-6 p-4 rounded-lg bg-surface/50 hover:bg-white transition-colors group" href="https://wa.me/201000000000">
                        <div class="w-14 h-14 rounded-full bg-secondary-fixed-dim/20 flex items-center justify-center text-secondary">
                            <span class="material-symbols-outlined text-3xl">chat</span>
                        </div>
                        <div>
                            <p class="font-label-lg text-label-lg uppercase tracking-widest text-secondary mb-1">WhatsApp Support</p>
                            <p class="font-body-lg text-body-lg text-primary">+20 100 000 0000</p>
                        </div>
                    </a>
                    <div class="flex items-center gap-6 p-4 rounded-lg">
                        <div class="w-14 h-14 rounded-full bg-primary/10 flex items-center justify-center text-primary">
                            <span class="material-symbols-outlined text-3xl">phone_iphone</span>
                        </div>
                        <div>
                            <p class="font-label-lg text-label-lg uppercase tracking-widest text-secondary mb-1">International Line</p>
                            <p class="font-body-lg text-body-lg text-primary">+44 20 7946 0000</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Locations --}}
            <div class="grid grid-cols-1 gap-gutter">
                <div class="relative overflow-hidden rounded-xl h-64 group">
                    <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" alt="Cairo office overlooking the Giza Pyramids" src="{{ asset('storage/images/contact/office-cairo-pyramids-view.png') }}">
                    <div class="absolute inset-0 bg-gradient-to-t from-primary/80 to-transparent flex items-end p-8">
                        <div>
                            <h4 class="font-headline-md text-white">Cairo Hub</h4>
                            <p class="text-white/80 font-body-md">Garden City District, Riverside Plaza</p>
                        </div>
                    </div>
                </div>
                <div class="relative overflow-hidden rounded-xl h-64 group">
                    <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" alt="Luxor office overlooking the Nile at sunset" src="{{ asset('storage/images/contact/office-luxor-nile-sunset.png') }}">
                    <div class="absolute inset-0 bg-gradient-to-t from-primary/80 to-transparent flex items-end p-8">
                        <div>
                            <h4 class="font-headline-md text-white">Luxor Base</h4>
                            <p class="text-white/80 font-body-md">East Bank, The Old Winter Palace Road</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
@endsection
