<?php

namespace App\Repositories\Interfaces;

use App\Models\Trip;
use App\Models\TripComment;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface TripRepositoryInterface
{
    public function getFeatured(): Collection;

    public function paginate(array $filters = [], int $perPage = 6): LengthAwarePaginator;

    public function find(int $id): ?Trip;

    public function findByIds(array $ids): Collection;

    public function findBySlug(string $slug): ?Trip;

    public function getRelated(Trip $trip, int $limit = 3): Collection;

    public function findByDestinationCategory(string $category): Collection;

    public function addComment(Trip $trip, array $data): TripComment;
}
