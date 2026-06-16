@extends('layouts.app')

@section('title', $post->title.' | Truly Egypt Tours')

@section('content')
<div class="blog-show-page">
    {{-- Top Navigation Bar --}}
    @include('layouts.partials.nav')

    <main class="pt-20">
        {{-- Title Bar --}}
        <section class="bg-surface pt-10 pb-8 border-b border-secondary/10">
            <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
                {{-- Breadcrumb --}}
                <nav class="flex items-center gap-2 font-label-sm text-label-sm uppercase tracking-widest text-on-surface-variant mb-6">
                    <a href="{{ route('home') }}" class="hover:text-secondary transition-colors">Home</a>
                    <span class="material-symbols-outlined text-[16px]">chevron_right</span>
                    <a href="{{ route('home') }}#blog" class="hover:text-secondary transition-colors">Blog</a>
                    <span class="material-symbols-outlined text-[16px]">chevron_right</span>
                    <span class="text-secondary">{{ $post->title }}</span>
                </nav>

                @if ($post->category)
                    <div class="inline-block bg-secondary text-on-secondary rounded-full px-4 py-1.5 font-label-sm text-label-sm uppercase tracking-widest mb-4">
                        {{ $post->category }}
                    </div>
                @endif

                <h1 class="font-display-lg text-display-lg-mobile md:text-headline-lg text-primary mb-6 max-w-3xl">{{ $post->title }}</h1>

                <div class="flex flex-wrap items-center gap-6 text-on-surface-variant">
                    @if ($post->author_name)
                        <div class="flex items-center gap-3">
                            @if ($post->author_image_url)
                                <img src="{{ $post->author_image_url }}" alt="{{ $post->author_name }}" class="w-10 h-10 rounded-full object-cover">
                            @endif
                            <div>
                                <div class="font-label-lg text-label-lg text-primary leading-tight">{{ $post->author_name }}</div>
                                @if ($post->author_role)
                                    <div class="font-label-sm text-label-sm uppercase tracking-widest">{{ $post->author_role }}</div>
                                @endif
                            </div>
                        </div>
                    @endif
                    <div class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-secondary">calendar_month</span>
                        <span class="font-body-lg text-body-lg">{{ $post->published_at->format('F j, Y') }}</span>
                    </div>
                    @if ($post->reading_time)
                        <div class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-secondary">schedule</span>
                            <span class="font-body-lg text-body-lg">{{ $post->reading_time }}</span>
                        </div>
                    @endif
                </div>
            </div>
        </section>

        {{-- Hero Image --}}
        <section class="py-8 bg-surface">
            <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
                <div class="h-[320px] md:h-[480px] rounded-xl overflow-hidden">
                    <img alt="{{ $post->title }}" src="{{ $post->image_url }}" class="w-full h-full object-cover">
                </div>
            </div>
        </section>

        {{-- Main Content --}}
        <section class="py-24 bg-surface">
            <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop grid grid-cols-1 lg:grid-cols-12 gap-gutter">
                {{-- Left Column --}}
                <div class="lg:col-span-8 space-y-14">
                    @if (! empty($post->content['intro']))
                        <p class="font-body-lg text-body-lg text-on-surface-variant leading-loose">{{ $post->content['intro'] }}</p>
                    @endif

                    @foreach ($post->content['sections'] ?? [] as $section)
                        <div>
                            <h2 class="font-headline-lg text-headline-lg text-primary mb-6">{{ $section['heading'] }}</h2>
                            @if (! empty($section['image']))
                                <div class="h-64 md:h-80 rounded-xl overflow-hidden mb-6">
                                    <img alt="{{ $section['heading'] }}" src="{{ \App\Models\BlogPost::imageUrl($section['image']) }}" class="w-full h-full object-cover">
                                </div>
                            @endif
                            <p class="font-body-lg text-body-lg text-on-surface-variant leading-loose">{{ $section['body'] }}</p>
                        </div>
                    @endforeach

                    @if (! empty($post->content['conclusion']))
                        <div class="bg-primary text-on-primary rounded-xl p-10">
                            <h2 class="font-headline-lg text-headline-lg mb-4">Final Thoughts</h2>
                            <p class="font-body-lg text-white/80 leading-loose">{{ $post->content['conclusion'] }}</p>
                        </div>
                    @endif

                    {{-- Tags --}}
                    @if (! empty($post->tags))
                        <div class="flex flex-wrap items-center gap-3 pt-10 border-t border-secondary/10">
                            <span class="font-label-lg text-label-lg text-primary uppercase tracking-widest">Tags</span>
                            @foreach ($post->tags as $tag)
                                <span class="bg-surface-container-low border border-secondary/20 rounded-full px-4 py-1.5 font-label-sm text-label-sm uppercase tracking-widest text-on-surface-variant">{{ $tag }}</span>
                            @endforeach
                        </div>
                    @endif

                    {{-- Social Share --}}
                    <div class="flex items-center gap-4 pt-10 border-t border-secondary/10">
                        <span class="font-label-lg text-label-lg text-primary uppercase tracking-widest">Share</span>
                        <a href="#" aria-label="Share on Facebook" class="w-10 h-10 rounded-full bg-white/50 border border-secondary/10 text-primary hover:bg-primary hover:text-on-primary flex items-center justify-center transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5" fill="currentColor">
                                <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.879V14.89h-2.54v-2.89h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.563v1.875h2.773l-.443 2.89h-2.33v6.989C18.343 21.129 22 16.991 22 12Z"/>
                            </svg>
                        </a>
                        <a href="#" aria-label="Share on X" class="w-10 h-10 rounded-full bg-white/50 border border-secondary/10 text-primary hover:bg-primary hover:text-on-primary flex items-center justify-center transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5" fill="currentColor">
                                <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231ZM16.083 19.5h1.833L7.084 4.126H5.117L16.083 19.5Z"/>
                            </svg>
                        </a>
                        <a href="#" aria-label="Share on WhatsApp" class="w-10 h-10 rounded-full bg-white/50 border border-secondary/10 text-primary hover:bg-primary hover:text-on-primary flex items-center justify-center transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5" fill="currentColor">
                                <path d="M12 0C5.373 0 0 5.373 0 12c0 2.137.561 4.137 1.535 5.871L0 24l6.293-1.652A11.95 11.95 0 0 0 12 24c6.627 0 12-5.373 12-12S18.627 0 12 0Zm0 22a9.93 9.93 0 0 1-5.07-1.398l-.363-.215-3.755.985 1.005-3.671-.236-.379A9.94 9.94 0 0 1 2.001 12C2.001 6.486 6.486 2 12 2s9.999 4.486 9.999 10S17.514 22 12 22Z"/>
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.149-.149.347-.347.521-.521.174-.174.232-.298.349-.497.116-.198.058-.347-.039-.495-.099-.149-.45-1.082-.602-1.482-.151-.395-.305-.341-.421-.341l-.36-.001c-.119 0-.31.044-.475.219-.165.176-.633.601-.633 1.479s.65 1.726.738 1.844c.087.117 1.198 1.844 2.93 2.587 1.482.628 1.78.504 2.099.471.32-.033.992-.405 1.131-.793.139-.388.139-.722.097-.793-.041-.07-.149-.117-.317-.193Z"/>
                            </svg>
                        </a>
                        <a href="#" aria-label="Copy link" class="w-10 h-10 rounded-full bg-white/50 border border-secondary/10 text-primary hover:bg-primary hover:text-on-primary flex items-center justify-center transition-colors">
                            <span class="material-symbols-outlined text-[20px]">link</span>
                        </a>
                    </div>

                    {{-- Comments --}}
                    <div id="comments" class="pt-10 border-t border-secondary/10 scroll-mt-28">
                        <h2 class="font-headline-lg text-headline-lg text-primary mb-8">
                            {{ $comments->count() }} {{ \Illuminate\Support\Str::plural('Comment', $comments->count()) }}
                        </h2>

                        @if (session('status'))
                            <div class="mb-10 p-4 rounded-lg bg-primary text-on-primary font-body-md">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if ($comments->isNotEmpty())
                            <div class="space-y-8 mb-12">
                                @foreach ($comments as $comment)
                                    <div class="flex items-start gap-4">
                                        <div class="w-12 h-12 rounded-full bg-secondary-fixed flex items-center justify-center font-bold text-on-secondary-fixed flex-shrink-0">
                                            {{ $comment->initials }}
                                        </div>
                                        <div class="flex-1 bg-surface-container-low rounded-xl p-6">
                                            <div class="flex items-center justify-between gap-4 mb-2">
                                                <h4 class="font-label-lg text-label-lg text-primary uppercase">{{ $comment->name }}</h4>
                                                <span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-widest">{{ $comment->created_at->format('F j, Y') }}</span>
                                            </div>
                                            <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">{{ $comment->body }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="font-body-md text-body-md text-on-surface-variant mb-12">Be the first to share your thoughts on this article.</p>
                        @endif

                        {{-- Leave a Comment Form --}}
                        <div class="bg-surface-container-low rounded-xl p-6 md:p-10">
                            <h3 class="font-headline-md text-headline-md text-primary mb-6">Leave a Comment</h3>
                            <form class="space-y-8" method="POST" action="{{ route('blog.comments.store', $post->slug) }}#comments">
                                @csrf
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                    <div class="relative">
                                        <label class="font-label-lg text-label-lg uppercase tracking-widest text-secondary block mb-2">Your Name</label>
                                        <input class="w-full bg-transparent border-t-0 border-x-0 border-b border-primary/30 p-2 font-body-md form-input-focus transition-all" placeholder="Your name" type="text" name="name" value="{{ old('name') }}">
                                        @error('name')
                                            <p class="text-error text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="relative">
                                        <label class="font-label-lg text-label-lg uppercase tracking-widest text-secondary block mb-2">Email Address</label>
                                        <input class="w-full bg-transparent border-t-0 border-x-0 border-b border-primary/30 p-2 font-body-md form-input-focus transition-all" placeholder="you@example.com" type="email" name="email" value="{{ old('email') }}">
                                        @error('email')
                                            <p class="text-error text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="relative">
                                    <label class="font-label-lg text-label-lg uppercase tracking-widest text-secondary block mb-2">Comment</label>
                                    <textarea class="w-full bg-transparent border-t-0 border-x-0 border-b border-primary/30 p-2 font-body-md form-input-focus transition-all resize-none" placeholder="Share your thoughts..." rows="4" name="body">{{ old('body') }}</textarea>
                                    @error('body')
                                        <p class="text-error text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="pt-2">
                                    <button class="bg-primary text-on-primary px-10 py-4 rounded-lg font-label-lg uppercase tracking-widest hover:bg-primary-container transition-all flex items-center gap-3 group" type="submit">
                                        Post Comment
                                        <span class="material-symbols-outlined group-hover:translate-x-1 transition-transform">arrow_forward</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- Right Column: Sidebar --}}
                <div class="lg:col-span-4">
                    <div class="sticky top-28 space-y-6">
                        {{-- Recent Posts --}}
                        @if ($recentPosts->isNotEmpty())
                            <div class="glass-panel p-8 rounded-xl border border-secondary/20 shadow-xl shadow-primary/5">
                                <h3 class="font-headline-md text-headline-md text-primary mb-6">Recent Posts</h3>
                                <div class="space-y-5">
                                    @foreach ($recentPosts as $recentPost)
                                        <a href="{{ route('blog.show', $recentPost->slug) }}" class="flex items-center gap-4 group">
                                            <div class="w-20 h-20 rounded-lg overflow-hidden flex-shrink-0">
                                                <img src="{{ $recentPost->image_url }}" alt="{{ $recentPost->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                            </div>
                                            <div>
                                                <h4 class="font-label-lg text-label-lg text-primary group-hover:text-secondary transition-colors leading-snug mb-1">{{ $recentPost->title }}</h4>
                                                <span class="font-label-sm text-label-sm uppercase tracking-widest text-on-surface-variant">{{ $recentPost->published_at->format('F j, Y') }}</span>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        {{-- Blog Categories --}}
                        @if ($categories->isNotEmpty())
                            <div class="glass-panel p-8 rounded-xl border border-secondary/20 shadow-xl shadow-primary/5">
                                <h3 class="font-headline-md text-headline-md text-primary mb-6">Blog Categories</h3>
                                <div class="space-y-4">
                                    @foreach ($categories as $category)
                                        <div class="flex items-center justify-between gap-3 border-b border-secondary/10 pb-3 last:border-0 last:pb-0">
                                            <span class="flex items-center gap-2 font-body-md text-body-md text-primary">
                                                <span class="material-symbols-outlined text-secondary text-[18px]">folder</span>
                                                {{ $category->category }}
                                            </span>
                                            <span class="bg-surface-container-low text-on-surface-variant font-label-sm text-label-sm rounded-full w-7 h-7 flex items-center justify-center">{{ $category->posts_count }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        {{-- Popular Tags --}}
                        @if (! empty($tags))
                            <div class="glass-panel p-8 rounded-xl border border-secondary/20 shadow-xl shadow-primary/5">
                                <h3 class="font-headline-md text-headline-md text-primary mb-6">Popular Tags</h3>
                                <div class="flex flex-wrap gap-2">
                                    @foreach ($tags as $tag)
                                        <span class="bg-surface-container-low border border-secondary/20 rounded-full px-4 py-1.5 font-label-sm text-label-sm uppercase tracking-widest text-on-surface-variant">{{ $tag }}</span>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
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
