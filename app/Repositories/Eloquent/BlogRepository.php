<?php

namespace App\Repositories\Eloquent;

use App\Models\BlogComment;
use App\Models\BlogPost;
use App\Repositories\Interfaces\BlogRepositoryInterface;
use Illuminate\Support\Collection;

class BlogRepository implements BlogRepositoryInterface
{
    public function findBySlug(string $slug): ?BlogPost
    {
        return BlogPost::where('slug', $slug)->first();
    }

    public function getRecent(string $excludeSlug, int $limit = 3): Collection
    {
        return BlogPost::where('slug', '!=', $excludeSlug)
            ->orderBy('order')
            ->take($limit)
            ->get();
    }

    public function getCategoriesWithCounts(): Collection
    {
        return BlogPost::selectRaw('category, count(*) as posts_count')
            ->whereNotNull('category')
            ->groupBy('category')
            ->orderBy('category')
            ->get();
    }

    public function getPopularTags(int $limit = 8): array
    {
        return BlogPost::pluck('tags')
            ->filter()
            ->flatten()
            ->unique()
            ->take($limit)
            ->values()
            ->all();
    }

    public function addComment(BlogPost $post, array $data): BlogComment
    {
        return $post->comments()->create($data);
    }
}
