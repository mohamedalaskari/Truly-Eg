@extends('layouts.app')

@section('title', 'Truly Egypt Tours | Our Story')

@section('content')
<div class="about-page">
    {{-- Top Navigation Bar --}}
    @include('layouts.partials.nav', ['active' => 'about'])

    {{-- Hero Section --}}
    <header class="relative h-screen w-full flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img class="w-full h-full object-cover" alt="The Luxor Temple at sunset with golden light hitting ancient sandstone pillars" src="{{ asset('storage/images/about/hero-luxor-temple-sunset.png') }}">
            <div class="absolute inset-0 bg-primary/20 backdrop-brightness-75"></div>
        </div>
        <div class="relative z-10 text-center max-w-4xl px-margin-mobile">
            <span class="font-label-lg text-label-lg uppercase tracking-[0.4em] text-secondary-fixed-dim mb-6 block reveal-up">Established 1988</span>
            <h1 class="font-display-lg text-display-lg-mobile md:text-display-lg text-surface mb-8 reveal-up" style="transition-delay: 200ms;">Our Story</h1>
            <p class="font-body-lg text-body-lg text-surface-container-lowest max-w-2xl mx-auto leading-relaxed reveal-up" style="transition-delay: 400ms;">
                Bridging the timeless allure of the Nile with the sophisticated luxury of modern global travel.
            </p>
        </div>
        <div class="absolute bottom-10 left-1/2 -translate-x-1/2 animate-bounce">
            <span class="material-symbols-outlined text-surface text-4xl">keyboard_double_arrow_down</span>
        </div>
    </header>

    {{-- Narrative Section: Heritage Meets Modernity --}}
    <section class="py-32 bg-surface">
        <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop grid md:grid-cols-2 gap-12 md:gap-24 items-center">
            <div class="reveal-up">
                <h2 class="font-headline-lg text-headline-lg text-primary mb-8">A Legacy Reimagined</h2>
                <p class="font-body-lg text-body-lg text-on-surface-variant mb-6 leading-loose">
                    Truly Egypt Tours was born from a simple yet profound realization: that Egypt's ancient wonders deserve a narrative as grand as the monuments themselves. For decades, we have curated journeys that do more than just show you sights; we immerse you in a story thousands of years in the making.
                </p>
                <p class="font-body-lg text-body-lg text-on-surface-variant mb-12 leading-loose">
                    Today, we combine that deep archaeological respect with the height of boutique luxury. From private viewings of the Great Sphinx to candlelit dinners on a traditional Dahabiya, every detail is a bridge between the majesty of the Pharaohs and the expectations of the contemporary traveler.
                </p>
                <div class="border-l-2 border-secondary-fixed-dim pl-8 py-2">
                    <span class="font-headline-md text-headline-md text-secondary italic block mb-2">"We don't just guide; we reveal the soul of the Nile."</span>
                    <span class="font-label-lg text-label-lg uppercase tracking-widest text-primary">Founder's Philosophy</span>
                </div>
            </div>
            <div class="relative reveal-up" style="transition-delay: 300ms;">
                <div class="aspect-[4/5] rounded-lg overflow-hidden shadow-2xl shadow-primary/10">
                    <img class="w-full h-full object-cover" alt="A luxury Dahabiya sailboat on the Nile at dawn" src="{{ asset('storage/images/about/legacy-dahabiya-nile-dawn.png') }}">
                </div>
                <div class="absolute -bottom-10 -left-10 w-64 h-64 glass-panel border border-secondary/30 rounded-lg p-8 hidden lg:flex flex-col justify-center">
                    <span class="text-secondary font-headline-lg block mb-2">35+</span>
                    <span class="font-label-lg text-label-lg uppercase text-primary">Years of Curated Excellence</span>
                </div>
            </div>
        </div>
    </section>

    {{-- Our Mission Section: Bento Grid --}}
    <section class="py-32 bg-surface-container-low">
        <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
            <div class="text-center mb-20 reveal-up">
                <span class="font-label-lg text-label-lg uppercase tracking-widest text-secondary mb-4 block">Our Purpose</span>
                <h2 class="font-headline-lg text-headline-lg text-primary">Redefining Egyptian Travel</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter">
                {{-- Mission Card 1 --}}
                <div class="md:col-span-2 relative h-[320px] md:h-[400px] group overflow-hidden rounded-lg reveal-up">
                    <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" alt="A hand gently brushing sand away from an ancient Egyptian relief" src="{{ asset('storage/images/about/mission-archaeological-discovery.png') }}">
                    <div class="absolute inset-0 bg-gradient-to-t from-primary/80 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-6 md:p-12">
                        <h3 class="font-headline-md text-headline-md text-surface mb-4">Unparalleled Access</h3>
                        <p class="font-body-md text-body-md text-surface-container-highest max-w-md">Opening doors to sites and experiences usually reserved for scholars and royalty.</p>
                    </div>
                </div>
                {{-- Mission Card 2 --}}
                <div class="bg-surface p-6 md:p-12 flex flex-col justify-center border border-outline-variant/20 rounded-lg reveal-up" style="transition-delay: 200ms;">
                    <span class="material-symbols-outlined text-secondary text-5xl mb-6">workspace_premium</span>
                    <h3 class="font-headline-md text-headline-md text-primary mb-4">Curated Comfort</h3>
                    <p class="font-body-md text-body-md text-on-surface-variant">We hand-select every lodge, boutique hotel, and villa to ensure they reflect our commitment to elegance and local authenticity.</p>
                </div>
                {{-- Mission Card 3 --}}
                <div class="bg-primary p-6 md:p-12 flex flex-col justify-center rounded-lg reveal-up" style="transition-delay: 400ms;">
                    <span class="material-symbols-outlined text-secondary-fixed-dim text-5xl mb-6">history_edu</span>
                    <h3 class="font-headline-md text-headline-md text-on-primary mb-4">Deep Context</h3>
                    <p class="font-body-md text-body-md text-primary-fixed-dim">Every itinerary is crafted with leading Egyptologists to ensure a profound cultural connection beyond the surface.</p>
                </div>
                {{-- Mission Card 4 --}}
                <div class="md:col-span-2 relative h-[320px] md:h-[400px] group overflow-hidden rounded-lg reveal-up" style="transition-delay: 600ms;">
                    <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" alt="A serene view of the Nile from a private balcony at twilight" src="{{ asset('storage/images/about/mission-nile-balcony-twilight.png') }}">
                    <div class="absolute inset-0 bg-gradient-to-t from-primary/80 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-6 md:p-12">
                        <h3 class="font-headline-md text-headline-md text-surface mb-4">Modern Majesty</h3>
                        <p class="font-body-md text-body-md text-surface-container-highest max-w-md">Seamlessly integrating high-tech convenience with old-world service and aesthetic.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Meet Our Team Section --}}
    <section class="py-32 bg-surface overflow-hidden">
        <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
            <div class="flex flex-col md:flex-row justify-between items-end mb-20 reveal-up">
                <div class="max-w-xl">
                    <span class="font-label-lg text-label-lg uppercase tracking-widest text-secondary mb-4 block">The Guardians</span>
                    <h2 class="font-headline-lg text-headline-lg text-primary">Meet Our Expert Team</h2>
                </div>
                <p class="font-body-lg text-body-lg text-on-surface-variant md:max-w-sm mb-1">Our guides aren't just experts; they are the storytellers who bring the stones to life.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-gutter">
                @foreach ($teamMembers as $index => $member)
                    <div class="group reveal-up" style="transition-delay: {{ $index * 150 }}ms;">
                        <div class="aspect-[3/4] overflow-hidden rounded-lg mb-6 grayscale group-hover:grayscale-0 transition-all duration-500">
                            <img class="w-full h-full object-cover" alt="{{ $member->name }}" src="{{ $member->image_url }}">
                        </div>
                        <h4 class="font-headline-md text-[24px] text-primary mb-1">{{ $member->name }}</h4>
                        <p class="font-label-lg text-label-lg uppercase text-secondary mb-4">{{ $member->role }}</p>
                        <p class="font-body-md text-body-md text-on-surface-variant">{{ $member->bio }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Our Impact Section: Sustainable Tourism --}}
    <section class="py-32 bg-primary text-on-primary">
        <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
            <div class="grid md:grid-cols-2 gap-12 md:gap-24 items-center">
                <div class="reveal-up">
                    <span class="font-label-lg text-label-lg uppercase tracking-widest text-secondary-fixed-dim mb-4 block">Our Impact</span>
                    <h2 class="font-headline-lg text-headline-lg mb-8">Preserving the Future of our Past</h2>
                    <p class="font-body-lg text-body-lg text-primary-fixed-dim mb-10 leading-loose">
                        We believe that the best way to honor Egypt's heritage is to protect it for future generations. Truly Egypt Tours is committed to sustainable tourism that supports local communities and minimizes environmental footprints.
                    </p>
                    <ul class="space-y-6">
                        <li class="flex items-start gap-4">
                            <span class="material-symbols-outlined text-secondary-fixed-dim">eco</span>
                            <div>
                                <h4 class="font-label-lg text-label-lg uppercase tracking-widest mb-1">Zero Plastic Initiative</h4>
                                <p class="text-primary-fixed-dim opacity-80">We've eliminated single-use plastics across all our private cruises and expeditions.</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-4">
                            <span class="material-symbols-outlined text-secondary-fixed-dim">local_library</span>
                            <div>
                                <h4 class="font-label-lg text-label-lg uppercase tracking-widest mb-1">Community Education</h4>
                                <p class="text-primary-fixed-dim opacity-80">A percentage of every booking goes directly to rural schools in Upper Egypt.</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-4">
                            <span class="material-symbols-outlined text-secondary-fixed-dim">foundation</span>
                            <div>
                                <h4 class="font-label-lg text-label-lg uppercase tracking-widest mb-1">Site Conservation</h4>
                                <p class="text-primary-fixed-dim opacity-80">Supporting archaeological restoration projects through the Ministry of Antiquities.</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="grid grid-cols-2 gap-gutter reveal-up" style="transition-delay: 300ms;">
                    <div class="space-y-gutter pt-12">
                        <img class="rounded-lg h-64 w-full object-cover shadow-xl" alt="A lush organic farm in an Egyptian oasis" src="{{ asset('storage/images/about/impact-organic-farm.png') }}">
                        <img class="rounded-lg h-80 w-full object-cover shadow-xl" alt="Local Egyptian children in a modern classroom" src="{{ asset('storage/images/about/impact-classroom-children.png') }}">
                    </div>
                    <div class="space-y-gutter">
                        <img class="rounded-lg h-80 w-full object-cover shadow-xl" alt="Archaeological restorers working on a stone monument" src="{{ asset('storage/images/about/impact-archaeological-restoration.png') }}">
                        <img class="rounded-lg h-64 w-full object-cover shadow-xl" alt="A clean, serene stretch of the Nile river under a clear sky" src="{{ asset('storage/images/about/impact-clean-nile.png') }}">
                    </div>
                </div>
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
