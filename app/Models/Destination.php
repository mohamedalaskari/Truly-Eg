<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'gallery',
        'history',
        'attractions',
        'cultural_experiences',
        'travel_tips',
        'conclusion',
        'info',
        'map_position',
        'col_span',
        'aspect_class',
        'card_size',
        'order',
    ];

    protected $casts = [
        'col_span' => 'integer',
        'gallery' => 'array',
        'attractions' => 'array',
        'cultural_experiences' => 'array',
        'travel_tips' => 'array',
        'info' => 'array',
        'map_position' => 'array',
    ];

    private const TRIP_CATEGORY_MAP = [
        'cairo' => 'Cairo & Giza',
        'luxor' => 'Upper Egypt (Luxor/Aswan)',
        'aswan' => 'Upper Egypt (Luxor/Aswan)',
        'hurghada' => 'Red Sea Riviera',
        'siwa-oasis' => 'Western Desert & Oases',
        'sharm-el-sheikh' => 'Red Sea Riviera',
    ];

    public static function imageUrl(string $path): string
    {
        return asset('storage/'.$path);
    }

    public function getImageUrlAttribute(): string
    {
        return static::imageUrl($this->image);
    }

    public function getGalleryUrlsAttribute(): array
    {
        return collect($this->gallery ?? [])
            ->map(fn (string $image) => static::imageUrl($image))
            ->all();
    }

    public function getTripCategoryAttribute(): ?string
    {
        return self::TRIP_CATEGORY_MAP[$this->slug] ?? null;
    }

    public function getToursCountAttribute(): int
    {
        $category = $this->trip_category;

        if (! $category) {
            return 0;
        }

        return Trip::where('destination_category', $category)->count();
    }
}
