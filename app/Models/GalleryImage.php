<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
    protected $fillable = [
        'image',
        'alt',
        'order',
    ];

    public function getImageUrlAttribute(): string
    {
        return asset('storage/'.$this->image);
    }
}
