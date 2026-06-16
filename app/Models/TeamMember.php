<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    protected $fillable = [
        'name',
        'role',
        'bio',
        'image',
        'order',
    ];

    public function getImageUrlAttribute(): string
    {
        return asset('storage/'.$this->image);
    }
}
