<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\DestinationRepositoryInterface;
use App\Repositories\Interfaces\TripRepositoryInterface;
use Illuminate\View\View;

class DestinationController extends Controller
{
    public function __construct(
        private readonly DestinationRepositoryInterface $destinationRepository,
        private readonly TripRepositoryInterface $tripRepository
    ) {
    }

    public function index(): View
    {
        return view('destinations.index', [
            'destinations' => $this->destinationRepository->getAll(),
        ]);
    }

    public function show(string $slug): View
    {
        $destination = $this->destinationRepository->findBySlug($slug);

        abort_if(! $destination, 404);

        $trips = $destination->trip_category
            ? $this->tripRepository->findByDestinationCategory($destination->trip_category)
            : collect();

        return view('destinations.show', [
            'destination' => $destination,
            'trips' => $trips,
        ]);
    }
}
