<?php

namespace App\Repositories\Interfaces;

use Illuminate\Support\Collection;

interface TeamMemberRepositoryInterface
{
    public function getAll(): Collection;
}
