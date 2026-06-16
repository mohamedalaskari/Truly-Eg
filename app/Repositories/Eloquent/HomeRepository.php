<?php

namespace App\Repositories\Eloquent;

use App\Models\Advantage;
use App\Models\BlogPost;
use App\Models\GalleryImage;
use App\Models\Service;
use App\Models\Testimonial;
use App\Repositories\Interfaces\DestinationRepositoryInterface;
use App\Repositories\Interfaces\HomeRepositoryInterface;
use App\Repositories\Interfaces\TripRepositoryInterface;
use Illuminate\Support\Collection;

class HomeRepository implements HomeRepositoryInterface
{
    public function __construct(
        private readonly TripRepositoryInterface $tripRepository,
        private readonly DestinationRepositoryInterface $destinationRepository
    ) {}

    public function getServices(): Collection
    {
        return Service::orderBy('order')->get();
    }

    public function getTrips(): Collection
    {
        return $this->tripRepository->getFeatured();
    }

    public function getDestinations(): Collection
    {
        return $this->destinationRepository->getAll();
    }

    public function getBlogPosts(): Collection
    {
        return BlogPost::orderBy('order')->take(3)->get();
    }

    public function getAdvantages(): Collection
    {
        return Advantage::orderBy('order')->get();
    }

    public function getGalleryImages(): Collection
    {
        return GalleryImage::orderBy('order')->get();
    }

    public function getTestimonials(): Collection
    {
        return Testimonial::orderBy('order')->get();
    }
}
