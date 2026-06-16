<?php

namespace App\Repositories\Eloquent;

use App\Models\TeamMember;
use App\Repositories\Interfaces\TeamMemberRepositoryInterface;
use Illuminate\Support\Collection;

class TeamMemberRepository implements TeamMemberRepositoryInterface
{
    public function getAll(): Collection
    {
        return TeamMember::orderBy('order')->get();
    }
}
