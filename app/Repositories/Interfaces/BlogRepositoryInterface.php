<?php

namespace App\Repositories\Interfaces;

use App\Models\BlogComment;
use App\Models\BlogPost;
use Illuminate\Support\Collection;

interface BlogRepositoryInterface
{
    public function findBySlug(string $slug): ?BlogPost;

    public function getRecent(string $excludeSlug, int $limit = 3): Collection;

    public function getCategoriesWithCounts(): Collection;

    public function getPopularTags(int $limit = 8): array;

    public function addComment(BlogPost $post, array $data): BlogComment;
}
