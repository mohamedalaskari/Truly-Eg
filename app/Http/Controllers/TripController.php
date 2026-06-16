<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTripCommentRequest;
use App\Repositories\Interfaces\TripRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TripController extends Controller
{
    public function __construct(
        private readonly TripRepositoryInterface $tripRepository
    ) {
    }

    public function index(Request $request): View
    {
        $filters = $request->only(['destinations', 'type', 'max_price', 'min_rating', 'offers_only', 'sort']);

        return view('trips.index', [
            'trips' => $this->tripRepository->paginate($filters),
            'filters' => $filters,
        ]);
    }

    public function show(string $slug): View
    {
        $trip = $this->tripRepository->findBySlug($slug);

        abort_if(! $trip, 404);

        return view('trips.show', [
            'trip' => $trip,
            'relatedTrips' => $this->tripRepository->getRelated($trip),
            'comments' => $trip->comments,
        ]);
    }

    public function storeComment(StoreTripCommentRequest $request, string $slug): RedirectResponse
    {
        $trip = $this->tripRepository->findBySlug($slug);

        abort_if(! $trip, 404);

        $this->tripRepository->addComment($trip, $request->validated());

        return back()
            ->withFragment('comments')
            ->with('status', 'Thank you for your comment! It has been posted below.');
    }
}
