<?php

namespace App\Repositories\Interfaces;

use Illuminate\Support\Collection;

interface FaqRepositoryInterface
{
    public function getAll(): Collection;
}
