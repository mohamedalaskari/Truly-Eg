<?php

namespace App\Models\Concerns;

trait HasInitials
{
    public function getInitialsAttribute(): string
    {
        $words = preg_split('/\s+/', trim($this->name));

        $initials = collect($words)
            ->take(2)
            ->map(fn (string $word) => mb_strtoupper(mb_substr($word, 0, 1)))
            ->implode('');

        return $initials ?: '?';
    }
}
