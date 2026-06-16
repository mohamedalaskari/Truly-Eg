<?php

namespace App\Repositories\Interfaces;

use Illuminate\Support\Collection;

interface HomeRepositoryInterface
{
    public function getServices(): Collection;

    public function getTrips(): Collection;

    public function getDestinations(): Collection;

    public function getBlogPosts(): Collection;

    public function getAdvantages(): Collection;

    public function getGalleryImages(): Collection;

    public function getTestimonials(): Collection;
}
