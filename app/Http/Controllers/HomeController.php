<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\HomeRepositoryInterface;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __construct(
        private readonly HomeRepositoryInterface $homeRepository
    ) {
    }

    public function index(): View
    {
        return view('home.index', [
            'services' => $this->homeRepository->getServices(),
            'trips' => $this->homeRepository->getTrips(),
            'destinations' => $this->homeRepository->getDestinations(),
            'blogPosts' => $this->homeRepository->getBlogPosts(),
            'advantages' => $this->homeRepository->getAdvantages(),
            'galleryImages' => $this->homeRepository->getGalleryImages(),
            'testimonials' => $this->homeRepository->getTestimonials(),
        ]);
    }
}
