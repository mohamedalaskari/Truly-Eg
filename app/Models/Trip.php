<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Trip extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'image',
        'price',
        'original_price',
        'duration',
        'location',
        'rating',
        'reviews_count',
        'destination_category',
        'trip_type',
        'group_size',
        'is_featured',
        'order',
        'description',
        'highlights',
        'itinerary',
        'includes',
        'excludes',
        'gallery',
        'accommodations',
        'rating_breakdown',
        'reviews',
        'faqs',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'original_price' => 'decimal:2',
        'rating' => 'decimal:1',
        'reviews_count' => 'integer',
        'is_featured' => 'boolean',
        'highlights' => 'array',
        'itinerary' => 'array',
        'includes' => 'array',
        'excludes' => 'array',
        'gallery' => 'array',
        'accommodations' => 'array',
        'rating_breakdown' => 'array',
        'reviews' => 'array',
        'faqs' => 'array',
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

    public function hasDiscount(): bool
    {
        return $this->original_price !== null && $this->original_price > $this->price;
    }

    public function getDiscountPercentAttribute(): int
    {
        if (! $this->hasDiscount()) {
            return 0;
        }

        return (int) round((($this->original_price - $this->price) / $this->original_price) * 100);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(TripComment::class)->latest();
    }

    public function getUpcomingDeparturesAttribute(): array
    {
        $tripDays = max((int) $this->duration - 1, 0);
        $priceModifiers = [0, 50, -30, 100, 0, 75];
        $statuses = ['Available', 'Available', 'Few Spots Left', 'Available', 'Sold Out', 'Available'];

        return collect($priceModifiers)
            ->map(function (int $modifier, int $index) use ($tripDays, $statuses) {
                $start = now()->addWeeks(($index + 1) * 2)->startOfDay();

                return [
                    'start' => $start,
                    'end' => $start->copy()->addDays($tripDays),
                    'price' => (float) $this->price + $modifier,
                    'status' => $statuses[$index],
                ];
            })
            ->all();
    }
}
