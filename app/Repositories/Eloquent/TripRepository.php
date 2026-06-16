<?php

namespace App\Repositories\Eloquent;

use App\Models\Trip;
use App\Models\TripComment;
use App\Repositories\Interfaces\TripRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class TripRepository implements TripRepositoryInterface
{
    public function getFeatured(): Collection
    {
        return Trip::where('is_featured', true)->orderBy('order')->get();
    }

    public function paginate(array $filters = [], int $perPage = 6): LengthAwarePaginator
    {
        $query = Trip::query();

        if (! empty($filters['destinations'])) {
            $query->whereIn('destination_category', (array) $filters['destinations']);
        }

        if (! empty($filters['type'])) {
            $query->where('trip_type', $filters['type']);
        }

        if (! empty($filters['max_price'])) {
            $query->where('price', '<=', (float) $filters['max_price']);
        }

        if (! empty($filters['min_rating'])) {
            $query->where('rating', '>=', (float) $filters['min_rating']);
        }

        if (! empty($filters['offers_only'])) {
            $query->whereNotNull('original_price')->whereColumn('original_price', '>', 'price');
        }

        match ($filters['sort'] ?? null) {
            'price_asc' => $query->orderBy('price'),
            'price_desc' => $query->orderByDesc('price'),
            'rating' => $query->orderByDesc('rating'),
            'duration' => $query->orderBy('duration'),
            default => $query->orderBy('order'),
        };

        return $query->paginate($perPage)->withQueryString();
    }

    public function find(int $id): ?Trip
    {
        return Trip::find($id);
    }

    public function findByIds(array $ids): Collection
    {
        if (empty($ids)) {
            return collect();
        }

        return Trip::whereIn('id', $ids)->orderBy('order')->get();
    }

    public function findBySlug(string $slug): ?Trip
    {
        return Trip::where('slug', $slug)->first();
    }

    public function getRelated(Trip $trip, int $limit = 3): Collection
    {
        return Trip::where('id', '!=', $trip->id)
            ->where(function ($query) use ($trip) {
                $query->where('destination_category', $trip->destination_category)
                    ->orWhere('trip_type', $trip->trip_type);
            })
            ->orderBy('order')
            ->take($limit)
            ->get();
    }

    public function findByDestinationCategory(string $category): Collection
    {
        return Trip::where('destination_category', $category)->orderBy('order')->get();
    }

    public function addComment(Trip $trip, array $data): TripComment
    {
        return $trip->comments()->create($data);
    }
}
