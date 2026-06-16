<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\TripRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WishlistController extends Controller
{
    public function __construct(
        private readonly TripRepositoryInterface $tripRepository
    ) {
    }

    public function index(Request $request): View
    {
        return view('wishlist.index', [
            'trips' => $this->tripRepository->findByIds($request->session()->get('wishlist', [])),
        ]);
    }

    public function toggle(Request $request): JsonResponse
    {
        $tripId = (int) $request->input('trip_id');

        if (! $this->tripRepository->find($tripId)) {
            return response()->json(['message' => 'Trip not found.'], 404);
        }

        $wishlist = $request->session()->get('wishlist', []);

        if (in_array($tripId, $wishlist, true)) {
            $wishlist = array_values(array_diff($wishlist, [$tripId]));
            $status = 'removed';
        } else {
            $wishlist[] = $tripId;
            $status = 'added';
        }

        $request->session()->put('wishlist', $wishlist);

        return response()->json([
            'status' => $status,
            'trip_id' => $tripId,
            'count' => count($wishlist),
        ]);
    }
}
