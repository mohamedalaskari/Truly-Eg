<?php

namespace App\Repositories\Eloquent;

use App\Models\Destination;
use App\Repositories\Interfaces\DestinationRepositoryInterface;
use Illuminate\Support\Collection;

class DestinationRepository implements DestinationRepositoryInterface
{
    public function getAll(): Collection
    {
        return Destination::orderBy('order')->get();
    }

    public function findBySlug(string $slug): ?Destination
    {
        return Destination::where('slug', $slug)->first();
    }
}
