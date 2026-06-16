<?php

namespace App\Repositories\Interfaces;

use App\Models\Destination;
use Illuminate\Support\Collection;

interface DestinationRepositoryInterface
{
    public function getAll(): Collection;

    public function findBySlug(string $slug): ?Destination;
}
