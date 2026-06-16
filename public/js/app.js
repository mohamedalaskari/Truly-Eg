document.addEventListener('DOMContentLoaded', function () {
    var csrfMeta = document.querySelector('meta[name="csrf-token"]');
    var csrfToken = csrfMeta ? csrfMeta.getAttribute('content') : '';
    var wishlistToggleUrl = document.body.dataset.wishlistToggleUrl;

    var mobileMenuButton = document.getElementById('mobile-menu-button');
    var mobileMenu = document.getElementById('mobile-menu');
    var mobileMenuIcon = document.getElementById('mobile-menu-icon');

    if (mobileMenuButton && mobileMenu && mobileMenuIcon) {
        mobileMenuButton.addEventListener('click', function () {
            var isOpen = !mobileMenu.classList.toggle('hidden');
            mobileMenuIcon.textContent = isOpen ? 'close' : 'menu';
            mobileMenuButton.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        });

        mobileMenu.querySelectorAll('a').forEach(function (link) {
            link.addEventListener('click', function () {
                mobileMenu.classList.add('hidden');
                mobileMenuIcon.textContent = 'menu';
                mobileMenuButton.setAttribute('aria-expanded', 'false');
            });
        });
    }

    var statusMessage = document.getElementById('contact-status');

    if (statusMessage) {
        setTimeout(function () {
            statusMessage.style.transition = 'opacity 0.5s ease';
            statusMessage.style.opacity = '0';
            setTimeout(function () {
                statusMessage.remove();
            }, 500);
        }, 5000);
    }

    var revealEls = document.querySelectorAll('.reveal-up');

    if (revealEls.length) {
        var revealObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                }
            });
        }, { threshold: 0.1 });

        revealEls.forEach(function (el) {
            revealObserver.observe(el);
        });
    }

    document.querySelectorAll('.wishlist-btn').forEach(function (button) {
        button.addEventListener('click', function () {
            var tripId = button.dataset.tripId;
            var wasActive = button.classList.contains('active');

            button.classList.toggle('active');
            button.setAttribute('aria-pressed', wasActive ? 'false' : 'true');

            if (!tripId || !wishlistToggleUrl) {
                return;
            }

            fetch(wishlistToggleUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({ trip_id: tripId })
            })
                .then(function (response) {
                    if (!response.ok) {
                        throw new Error('Wishlist request failed');
                    }

                    return response.json();
                })
                .then(function (data) {
                    document.querySelectorAll('[data-wishlist-count]').forEach(function (badge) {
                        badge.textContent = data.count;
                        badge.classList.toggle('hidden', data.count === 0);
                    });

                    if (data.status === 'removed') {
                        var card = button.closest('[data-wishlist-card]');

                        if (card) {
                            card.style.transition = 'opacity 0.3s ease';
                            card.style.opacity = '0';
                            setTimeout(function () {
                                card.remove();

                                if (!document.querySelector('[data-wishlist-card]')) {
                                    location.reload();
                                }
                            }, 300);
                        }
                    }
                })
                .catch(function () {
                    button.classList.toggle('active');
                    button.setAttribute('aria-pressed', wasActive ? 'true' : 'false');
                });
        });
    });

    var carouselTrackIds = new Set();

    document.querySelectorAll('[data-carousel-prev], [data-carousel-next]').forEach(function (button) {
        var trackId = button.dataset.carouselPrev || button.dataset.carouselNext;
        var track = document.getElementById(trackId);

        if (!track) {
            return;
        }

        carouselTrackIds.add(trackId);

        button.addEventListener('click', function () {
            var card = track.children[0];
            var gap = parseFloat(getComputedStyle(track).columnGap) || 24;
            var scrollAmount = card ? card.getBoundingClientRect().width + gap : track.clientWidth;
            var direction = button.hasAttribute('data-carousel-prev') ? -1 : 1;

            track.scrollBy({ left: scrollAmount * direction, behavior: 'smooth' });
        });
    });

    function updateCarouselArrows() {
        carouselTrackIds.forEach(function (trackId) {
            var track = document.getElementById(trackId);

            if (!track) {
                return;
            }

            var hasOverflow = track.scrollWidth > track.clientWidth + 1;

            document.querySelectorAll('[data-carousel-prev="' + trackId + '"], [data-carousel-next="' + trackId + '"]').forEach(function (button) {
                button.style.display = hasOverflow ? '' : 'none';
            });
        });
    }

    updateCarouselArrows();
    window.addEventListener('resize', updateCarouselArrows);

    function setupAutoScroll(track, prevBtn, nextBtn, intervalMs) {
        var direction = 1;
        var paused = false;
        var resumeTimer = null;

        function resume() {
            paused = false;
        }

        function pauseTemporarily() {
            paused = true;
            clearTimeout(resumeTimer);
            resumeTimer = setTimeout(resume, intervalMs);
        }

        track.addEventListener('mouseenter', function () {
            paused = true;
        });
        track.addEventListener('mouseleave', resume);
        track.addEventListener('touchstart', function () {
            paused = true;
        }, { passive: true });
        track.addEventListener('touchend', pauseTemporarily);

        if (prevBtn) {
            prevBtn.addEventListener('click', pauseTemporarily);
        }

        if (nextBtn) {
            nextBtn.addEventListener('click', pauseTemporarily);
        }

        function advance() {
            if (!paused) {
                var maxScroll = track.scrollWidth - track.clientWidth;

                if (maxScroll > 1) {
                    var card = track.children[0];
                    var gap = parseFloat(getComputedStyle(track).columnGap) || 24;
                    var step = card ? card.getBoundingClientRect().width + gap : track.clientWidth;
                    var next = track.scrollLeft + step * direction;

                    if (next >= maxScroll - 1) {
                        next = maxScroll;
                        direction = -1;
                    } else if (next <= 1) {
                        next = 0;
                        direction = 1;
                    }

                    track.scrollTo({ left: next, behavior: 'smooth' });
                }
            }

            setTimeout(advance, intervalMs);
        }

        setTimeout(advance, intervalMs);
    }

    carouselTrackIds.forEach(function (trackId) {
        var track = document.getElementById(trackId);

        if (!track) {
            return;
        }

        var prevBtn = document.querySelector('[data-carousel-prev="' + trackId + '"]');
        var nextBtn = document.querySelector('[data-carousel-next="' + trackId + '"]');
        var intervalMs = parseInt(track.dataset.autoscrollInterval, 10) || 3000;

        setupAutoScroll(track, prevBtn, nextBtn, intervalMs);
    });

    var galleryLightbox = document.getElementById('gallery-lightbox');
    var galleryLightboxImage = document.getElementById('gallery-lightbox-image');
    var galleryLightboxClose = document.getElementById('gallery-lightbox-close');

    if (galleryLightbox && galleryLightboxImage) {
        var openGalleryLightbox = function (trigger) {
            galleryLightboxImage.src = trigger.dataset.lightboxSrc;
            galleryLightboxImage.alt = trigger.dataset.lightboxAlt || '';
            galleryLightbox.classList.remove('hidden');
            galleryLightbox.classList.add('flex');
            document.body.classList.add('overflow-hidden');
        };

        var closeGalleryLightbox = function () {
            galleryLightbox.classList.add('hidden');
            galleryLightbox.classList.remove('flex');
            galleryLightboxImage.src = '';
            document.body.classList.remove('overflow-hidden');
        };

        document.querySelectorAll('[data-lightbox-trigger]').forEach(function (trigger) {
            trigger.addEventListener('click', function () {
                openGalleryLightbox(trigger);
            });
        });

        if (galleryLightboxClose) {
            galleryLightboxClose.addEventListener('click', closeGalleryLightbox);
        }

        galleryLightbox.addEventListener('click', function (event) {
            if (event.target === galleryLightbox) {
                closeGalleryLightbox();
            }
        });

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape' && !galleryLightbox.classList.contains('hidden')) {
                closeGalleryLightbox();
            }
        });
    }
});
