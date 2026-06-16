<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BlogPost extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'image',
        'excerpt',
        'category',
        'tags',
        'author_name',
        'author_role',
        'author_image',
        'reading_time',
        'content',
        'published_at',
        'order',
    ];

    protected $casts = [
        'published_at' => 'date',
        'tags' => 'array',
        'content' => 'array',
    ];

    public static function imageUrl(string $path): string
    {
        return asset('storage/'.$path);
    }

    public function getImageUrlAttribute(): string
    {
        return static::imageUrl($this->image);
    }

    public function getAuthorImageUrlAttribute(): ?string
    {
        return $this->author_image ? static::imageUrl($this->author_image) : null;
    }

    public function comments(): HasMany
    {
        return $this->hasMany(BlogComment::class)->latest();
    }
}
