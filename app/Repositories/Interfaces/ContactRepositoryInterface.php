<?php

namespace App\Repositories\Interfaces;

use App\Models\ContactMessage;

interface ContactRepositoryInterface
{
    public function create(array $data): ContactMessage;
}
