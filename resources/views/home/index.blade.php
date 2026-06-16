@extends('layouts.app')

@section('content')
    {{-- Top Navigation Bar --}}
    @include('layouts.partials.nav', ['active' => 'home'])

    {{-- Hero Section --}}
    <header id="home" class="relative min-h-screen flex items-center pt-20 overflow-hidden scroll-mt-20">
        <div class="absolute inset-0 z-0">
            <img alt="Great Pyramids of Giza at Sunset" class="w-full h-full object-cover" src="{{ asset('storage/images/home/hero-pyramids.png') }}">
            <div class="absolute inset-0 bg-gradient-to-t from-background via-primary/20 to-transparent"></div>
        </div>
        <div class="relative z-10 max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop w-full grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="space-y-8">
                <h1 class="font-display-lg text-display-lg-mobile lg:text-display-lg text-primary leading-tight">Where Timeless History Meets Modern Luxury</h1>
                <p class="font-body-lg text-body-lg text-on-surface-variant max-w-xl">Embark on a curated journey through the heart of Egypt. Experience the majesty of ancient civilizations with the comfort of contemporary sophistication.</p>
                <div class="flex flex-wrap gap-4 pt-4">
                    <a href="{{ route('trips.index') }}" class="bg-primary text-on-primary px-10 py-4 rounded-lg font-label-lg uppercase tracking-widest hover:bg-primary-container transition-all">Explore Trips</a>
                    <a href="{{ route('contact.index') }}" class="border-2 border-secondary text-secondary px-10 py-4 rounded-lg font-label-lg uppercase tracking-widest hover:bg-secondary hover:text-on-secondary transition-all">Book Your Adventure</a>
                </div>
            </div>
            <div class="hidden lg:flex justify-end">
                <div class="glass-card p-10 rounded-2xl space-y-8 max-w-xs">
                    <div class="text-center">
                        <div class="font-headline-lg text-headline-lg text-primary">10k+</div>
                        <div class="font-label-lg text-label-lg text-secondary uppercase tracking-widest">Travelers</div>
                    </div>
                    <hr class="border-secondary/20">
                    <div class="text-center">
                        <div class="font-headline-lg text-headline-lg text-primary">4.9/5</div>
                        <div class="font-label-lg text-label-lg text-secondary uppercase tracking-widest">Global Rating</div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    {{-- Services Section --}}
    <section id="services" class="py-32 bg-surface scroll-mt-20">
        <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
            <div class="text-center mb-20">
                <h2 class="font-headline-lg text-headline-lg text-primary mb-4">Unrivaled Excellence</h2>
                <div class="w-24 h-1 bg-secondary mx-auto"></div>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-gutter">
                @foreach ($services as $service)
                    <div class="group p-4 md:p-8 bg-white/50 border border-secondary/10 rounded-xl hover:shadow-xl hover:shadow-primary/5 transition-all text-center">
                        <span class="material-symbols-outlined text-4xl text-secondary mb-4">{{ $service->icon }}</span>
                        <h3 class="font-label-lg text-label-lg text-primary uppercase mb-2">{{ $service->title }}</h3>
                        <p class="font-body-md text-on-surface-variant text-sm">{{ $service->description }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Trips Preview --}}
    <section id="trips" class="py-32 bg-surface-container-low overflow-hidden scroll-mt-20">
        <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
            <div class="flex justify-between items-end mb-16">
                <div>
                    <h2 class="font-headline-lg text-headline-lg text-primary">Discover the Wonders of Egypt</h2>
                    <p class="font-body-lg text-on-surface-variant">Transform Every Journey into an Unforgettable Adventure </p>
                </div>
                <a href="{{ route('trips.index') }}" class="text-primary font-label-lg uppercase tracking-widest border-b-2 border-primary hover:border-secondary transition-all pb-1">View All Trips</a>
            </div>
            <div class="relative">
                {{-- Carousel Track --}}
                <div id="trips-carousel" class="flex gap-gutter overflow-x-auto no-scrollbar pb-2">
                    @foreach ($trips as $trip)
                        @include('trips.partials.card', ['trip' => $trip, 'class' => 'h-[600px] snap-start flex-shrink-0 w-[85%] md:w-[calc(50%-12px)] lg:w-[calc((100%-48px)/3)]'])
                    @endforeach
                </div>

                {{-- Carousel Arrows --}}
                <button type="button" data-carousel-prev="trips-carousel" class="flex absolute left-2 top-1/2 -translate-y-1/2 w-10 h-10 md:w-12 md:h-12 rounded-full bg-surface shadow-xl shadow-primary/10 items-center justify-center text-primary hover:bg-primary hover:text-on-primary transition-all" aria-label="Previous trips">
                    <span class="material-symbols-outlined">chevron_left</span>
                </button>
                <button type="button" data-carousel-next="trips-carousel" class="flex absolute right-2 top-1/2 -translate-y-1/2 w-10 h-10 md:w-12 md:h-12 rounded-full bg-surface shadow-xl shadow-primary/10 items-center justify-center text-primary hover:bg-primary hover:text-on-primary transition-all" aria-label="Next trips">
                    <span class="material-symbols-outlined">chevron_right</span>
                </button>
            </div>
        </div>
    </section>

    {{-- Destinations Preview --}}
    <section id="destinations" class="py-32 bg-surface-container overflow-hidden scroll-mt-20">
        <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
            <div class="flex justify-between items-end mb-16">
                <div>
                    <h2 class="font-headline-lg text-headline-lg text-primary">Must-See Destinations in Egypt</h2>
                    <p class="font-body-lg text-on-surface-variant">Explore Egypt's Iconic Attractions</p>
                </div>
                <a href="{{ route('destinations.index') }}" class="text-primary font-label-lg uppercase tracking-widest border-b-2 border-primary hover:border-secondary transition-all pb-1">View All Destinations</a>
            </div>

            <div class="relative">
                {{-- Carousel Track --}}
                <div id="destinations-carousel" data-autoscroll-interval="4500" class="flex gap-gutter overflow-x-auto no-scrollbar pb-2">
                    @foreach ($destinations as $destination)
                        <a href="{{ route('destinations.show', $destination->slug) }}" class="group relative h-[400px] rounded-2xl overflow-hidden shadow-2xl snap-start flex-shrink-0 w-[70%] md:w-[calc(33.333%-16px)] lg:w-[calc(25%-18px)] block">
                            <img alt="{{ $destination->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" src="{{ $destination->image_url }}">
                            <div class="absolute inset-0 bg-gradient-to-t from-primary/90 via-transparent to-transparent"></div>
                            <div class="absolute bottom-0 left-0 right-0 p-6">
                                <h3 class="font-headline-md text-headline-md text-white mb-3">{{ $destination->name }}</h3>
                                @if ($destination->tours_count > 0)
                                    <span class="inline-block bg-secondary text-on-secondary font-label-sm text-label-sm uppercase tracking-widest px-4 py-1.5 rounded">
                                        {{ $destination->tours_count }} {{ \Illuminate\Support\Str::plural('Tour', $destination->tours_count) }}
                                    </span>
                                @endif
                            </div>
                        </a>
                    @endforeach
                </div>

                {{-- Carousel Arrows --}}
                <button type="button" data-carousel-prev="destinations-carousel" class="flex absolute left-2 top-1/2 -translate-y-1/2 w-10 h-10 md:w-12 md:h-12 rounded-full bg-surface shadow-xl shadow-primary/10 items-center justify-center text-primary hover:bg-primary hover:text-on-primary transition-all" aria-label="Previous destinations">
                    <span class="material-symbols-outlined">chevron_left</span>
                </button>
                <button type="button" data-carousel-next="destinations-carousel" class="flex absolute right-2 top-1/2 -translate-y-1/2 w-10 h-10 md:w-12 md:h-12 rounded-full bg-surface shadow-xl shadow-primary/10 items-center justify-center text-primary hover:bg-primary hover:text-on-primary transition-all" aria-label="Next destinations">
                    <span class="material-symbols-outlined">chevron_right</span>
                </button>
            </div>
        </div>
    </section>

    {{-- Advantages Section --}}
    <section id="about" class="py-32 bg-surface scroll-mt-20">
        <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                <div class="lg:col-span-1">
                    <h2 class="font-headline-lg text-headline-lg text-primary mb-6">Why Choose Truly Egypt Tours?</h2>
                    <p class="font-body-lg text-on-surface-variant mb-8">We redefine the travel experience by blending heritage with high-tech personalization.</p>
                    <div class="p-8 bg-primary text-on-primary rounded-xl">
                        <span class="material-symbols-outlined text-4xl text-secondary-fixed-dim mb-4">verified_user</span>
                        <h4 class="font-headline-md text-headline-md mb-4">Our Promise</h4>
                        <p class="font-body-md">Every detail is meticulously crafted to ensure your safety, comfort, and absolute wonder.</p>
                    </div>
                </div>
                <div class="lg:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-8">
                    @foreach ($advantages as $advantage)
                        <div class="p-8 border border-secondary/20 rounded-xl hover:bg-surface-container-low transition-all">
                            <span class="material-symbols-outlined text-secondary text-3xl mb-4">{{ $advantage->icon }}</span>
                            <h3 class="font-label-lg text-label-lg text-primary uppercase mb-2">{{ $advantage->title }}</h3>
                            <p class="font-body-md text-on-surface-variant">{{ $advantage->description }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

        {{-- Blog Preview --}}
    <section id="blog" class="py-32 bg-surface scroll-mt-20">
        <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
            <div class="text-center max-w-2xl mx-auto mb-20">
                <p class="font-label-lg text-label-lg text-secondary uppercase tracking-widest mb-3">Our Blog</p>
                <h2 class="font-headline-lg text-headline-lg text-primary mb-4">Travel Tips &amp; Advice</h2>
                <p class="font-body-lg text-on-surface-variant">Explore essential insights and recommendations to enhance your journey. Discover local culture, must-see attractions, and practical tips for a seamless travel experience.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter">
                @foreach ($blogPosts as $post)
                    <article class="group rounded-2xl overflow-hidden bg-surface-container-low shadow-xl shadow-primary/5 hover:shadow-2xl hover:shadow-primary/10 transition-all">
                        <div class="h-64 overflow-hidden">
                            <img alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" src="{{ $post->image_url }}">
                        </div>
                        <div class="p-8">
                            <div class="flex items-center gap-2 text-on-surface-variant mb-4">
                                <span class="material-symbols-outlined text-[18px]">calendar_month</span>
                                <span class="font-label-sm text-label-sm uppercase tracking-widest">{{ $post->published_at->format('F j, Y') }}</span>
                            </div>
                            <h3 class="font-headline-md text-2xl leading-snug text-primary mb-6">{{ $post->title }}</h3>
                            <a href="{{ route('blog.show', $post->slug) }}" class="inline-flex items-center gap-1.5 text-secondary font-label-lg uppercase tracking-widest hover:gap-3 transition-all">
                                Read More
                                <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Gallery Section --}}
    <section id="gallery" class="py-32 bg-surface-container scroll-mt-20">
        <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
            <h2 class="font-headline-lg text-headline-lg text-primary text-center mb-16">Moments of Majesty</h2>
            <div class="columns-1 md:columns-2 lg:columns-3 gap-gutter space-y-gutter">
                @foreach ($galleryImages as $galleryImage)
                    <button type="button" data-lightbox-trigger data-lightbox-src="{{ $galleryImage->image_url }}" data-lightbox-alt="{{ $galleryImage->alt }}" class="relative group overflow-hidden rounded-xl block w-full p-0 m-0 border-0 bg-transparent text-left cursor-zoom-in">
                        <img alt="{{ $galleryImage->alt }}" class="w-full group-hover:scale-105 transition-transform duration-500" src="{{ $galleryImage->image_url }}">
                        <div class="absolute inset-0 bg-primary/0 group-hover:bg-primary/30 transition-colors duration-300 flex items-center justify-center">
                            <span class="material-symbols-outlined text-white text-4xl opacity-0 group-hover:opacity-100 transition-opacity duration-300">zoom_in</span>
                        </div>
                    </button>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Gallery Lightbox --}}
    <div id="gallery-lightbox" class="hidden fixed inset-0 z-[100] bg-primary/90 backdrop-blur-sm items-center justify-center p-4 md:p-12">
        <button type="button" id="gallery-lightbox-close" aria-label="Close" class="absolute top-6 right-6 w-12 h-12 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition-colors">
            <span class="material-symbols-outlined text-3xl">close</span>
        </button>
        <img id="gallery-lightbox-image" src="" alt="" class="max-w-full max-h-full object-contain rounded-lg">
    </div>

    {{-- Testimonials Section --}}
    <section class="py-32 bg-surface">
        <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
            <h2 class="font-headline-lg text-headline-lg text-primary text-center mb-16">Traveler Stories</h2>
            <div class="relative">
                {{-- Carousel Track --}}
                <div id="testimonials-carousel" class="flex gap-gutter overflow-x-auto no-scrollbar pb-2">
                    @foreach ($testimonials as $testimonial)
                        <div class="glass-card p-10 rounded-2xl border-t-4 border-secondary snap-start flex-shrink-0 w-[85%] md:w-[calc(50%-12px)] lg:w-[calc((100%-48px)/3)]">
                            <div class="flex text-secondary mb-4">
                                @for ($i = 0; $i < $testimonial->rating; $i++)
                                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                                @endfor
                            </div>
                            <p class="font-body-md text-on-surface-variant mb-6 italic">"{{ $testimonial->content }}"</p>
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-full bg-secondary-fixed flex items-center justify-center font-bold text-on-secondary-fixed">{{ $testimonial->initials }}</div>
                                <div>
                                    <div class="font-label-lg text-primary uppercase">{{ $testimonial->name }}</div>
                                    <div class="text-xs text-on-surface-variant font-label-sm">{{ $testimonial->location }}</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Carousel Arrows --}}
                <button type="button" data-carousel-prev="testimonials-carousel" class="flex absolute left-2 top-1/2 -translate-y-1/2 w-10 h-10 md:w-12 md:h-12 rounded-full bg-surface shadow-xl shadow-primary/10 items-center justify-center text-primary hover:bg-primary hover:text-on-primary transition-all" aria-label="Previous testimonials">
                    <span class="material-symbols-outlined">chevron_left</span>
                </button>
                <button type="button" data-carousel-next="testimonials-carousel" class="flex absolute right-2 top-1/2 -translate-y-1/2 w-10 h-10 md:w-12 md:h-12 rounded-full bg-surface shadow-xl shadow-primary/10 items-center justify-center text-primary hover:bg-primary hover:text-on-primary transition-all" aria-label="Next testimonials">
                    <span class="material-symbols-outlined">chevron_right</span>
                </button>
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
@endsection
