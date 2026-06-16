<footer class="bg-surface-container-low w-full">
    <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop py-margin-desktop">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-gutter">
            {{-- Brand --}}
            <div class="md:col-span-5">
                <div class="font-headline-lg text-headline-md md:text-headline-lg text-primary mb-1">Truly Egypt Tours</div>
                <p class="font-label-sm text-label-sm uppercase tracking-[0.3em] text-secondary mb-6">Egypt Specialist</p>
                <p class="font-body-md text-body-md text-on-surface-variant max-w-sm mb-8">
                    Truly Egypt Tours offers exceptional travel experiences across Egypt, featuring curated itineraries, expert guides, and personalized service to explore the country's rich history and breathtaking landscapes.
                </p>
                <div class="flex items-center gap-3">
                    <a href="#" aria-label="YouTube" class="w-10 h-10 rounded-full bg-white/50 border border-secondary/10 text-primary hover:bg-primary hover:text-on-primary flex items-center justify-center transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5" fill="currentColor">
                            <path d="M23.498 6.186a2.997 2.997 0 0 0-2.122-2.121C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.52A2.997 2.997 0 0 0 .502 6.186 31.05 31.05 0 0 0 0 12a31.05 31.05 0 0 0 .502 5.814 2.997 2.997 0 0 0 2.121 2.122c1.872.519 9.377.519 9.377.519s7.505 0 9.376-.52a2.997 2.997 0 0 0 2.122-2.12A31.05 31.05 0 0 0 24 12a31.05 31.05 0 0 0-.502-5.814ZM9.545 15.568V8.432L15.818 12l-6.273 3.568Z"/>
                        </svg>
                    </a>
                    <a href="#" aria-label="Facebook" class="w-10 h-10 rounded-full bg-white/50 border border-secondary/10 text-primary hover:bg-primary hover:text-on-primary flex items-center justify-center transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5" fill="currentColor">
                            <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.879V14.89h-2.54v-2.89h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.563v1.875h2.773l-.443 2.89h-2.33v6.989C18.343 21.129 22 16.991 22 12Z"/>
                        </svg>
                    </a>
                </div>
            </div>

            {{-- Important Links --}}
            <div class="md:col-span-3">
                <h4 class="font-headline-md text-xl font-semibold text-primary mb-6 pb-4 border-b border-secondary/20">Important Links</h4>
                <ul class="space-y-4 font-body-md text-body-md text-on-surface-variant">
                    <li><a class="hover:text-secondary transition-colors" href="{{ route('home') }}#about">Why Truly Egypt</a></li>
                    <li><a class="hover:text-secondary transition-colors" href="{{ route('about.index') }}">About Us</a></li>
                    <li><a class="hover:text-secondary transition-colors" href="{{ route('home') }}#blog">Blog</a></li>
                    <li><a class="hover:text-secondary transition-colors" href="{{ route('home') }}#gallery">Gallery</a></li>
                    <li><a class="hover:text-secondary transition-colors" href="{{ route('services.index') }}#faq">FAQ</a></li>
                    <li><a class="hover:text-secondary transition-colors" href="{{ route('contact.index') }}">Contact Us</a></li>
                </ul>
            </div>

            {{-- Contact Info --}}
            <div class="md:col-span-4">
                <h4 class="font-headline-md text-xl font-semibold text-primary mb-6 pb-4 border-b border-secondary/20">Contact Info</h4>
                <ul class="space-y-5 font-body-md text-body-md text-on-surface-variant">
                    <li class="flex items-start gap-4">
                        <span class="material-symbols-outlined text-secondary">location_on</span>
                        <span>East Bank, The Old Winter Palace Road, Luxor, Egypt</span>
                    </li>
                    <li class="flex items-center gap-4">
                        <span class="material-symbols-outlined text-secondary">call</span>
                        <a class="hover:text-secondary transition-colors" href="tel:+201000000000">+20 100 000 0000</a>
                    </li>
                    <li class="flex items-start gap-4">
                        <span class="material-symbols-outlined text-secondary">mail</span>
                        <span class="flex flex-col gap-1 min-w-0 break-all">
                            <a class="hover:text-secondary transition-colors" href="mailto:info@trulyegypttours.com">info@trulyegypttours.com</a>
                            <a class="hover:text-secondary transition-colors" href="mailto:reservations@trulyegypttours.com">reservations@trulyegypttours.com</a>
                        </span>
                    </li>
                </ul>
                <a href="#" class="mt-6 inline-flex items-center gap-2 font-label-lg text-label-lg uppercase tracking-widest text-primary hover:text-secondary transition-colors">
                    <span class="w-7 h-7 rounded-full bg-[#34e0a1] flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-4 h-4" fill="none" stroke="#0a0a0a" stroke-width="2">
                            <circle cx="7" cy="13" r="3.5"/>
                            <circle cx="17" cy="13" r="3.5"/>
                            <path d="M7 13a1 1 0 1 0 0-2 1 1 0 0 0 0 2ZM17 13a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z" fill="#0a0a0a" stroke="none"/>
                            <path d="M9 7h6M2 7l3 2M22 7l-3 2" stroke-linecap="round"/>
                        </svg>
                    </span>
                    Trip Advisor
                </a>
            </div>
        </div>
    </div>

    {{-- Bottom Bar --}}
    <div class="border-t border-secondary/10">
        <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop py-6 flex flex-col md:flex-row items-center justify-between gap-4">
            <p class="font-body-md text-body-md text-on-surface-variant/70">Copy Rights Truly Egypt Tours {{ now()->year }}</p>
            <div class="flex items-center gap-3">
                <div class="h-8 w-12 rounded bg-white border border-secondary/10 flex items-center justify-center">
                    <span class="text-[#1A1F71] font-bold italic text-sm tracking-tight">VISA</span>
                </div>
                <div class="h-8 w-12 rounded bg-white border border-secondary/10 flex items-center justify-center">
                    <svg viewBox="0 0 36 22" class="h-5 w-8">
                        <circle cx="14" cy="11" r="9" fill="#EB001B"/>
                        <circle cx="22" cy="11" r="9" fill="#F79E1B" fill-opacity="0.85"/>
                    </svg>
                </div>
                <div class="h-8 w-12 rounded bg-white border border-secondary/10 flex items-center justify-center">
                    <span class="text-[#2E77BC] font-bold text-xs tracking-tight">AMEX</span>
                </div>
                <div class="h-8 w-12 rounded bg-white border border-secondary/10 flex items-center justify-center">
                    <span class="font-bold text-xs tracking-tight"><span class="text-[#0E4C96]">J</span><span class="text-[#E30613]">C</span><span class="text-[#00A651]">B</span></span>
                </div>
            </div>
        </div>
    </div>
</footer>
