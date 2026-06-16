<?php

namespace App\Repositories\Eloquent;

use App\Models\Faq;
use App\Repositories\Interfaces\FaqRepositoryInterface;
use Illuminate\Support\Collection;

class FaqRepository implements FaqRepositoryInterface
{
    public function getAll(): Collection
    {
        return Faq::orderBy('order')->get();
    }
}
