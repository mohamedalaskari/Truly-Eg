<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogCommentRequest;
use App\Repositories\Interfaces\BlogRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function __construct(
        private readonly BlogRepositoryInterface $blogRepository
    ) {
    }

    public function show(string $slug): View
    {
        $post = $this->blogRepository->findBySlug($slug);

        abort_if(! $post, 404);

        return view('blog.show', [
            'post' => $post,
            'recentPosts' => $this->blogRepository->getRecent($post->slug),
            'categories' => $this->blogRepository->getCategoriesWithCounts(),
            'tags' => $this->blogRepository->getPopularTags(),
            'comments' => $post->comments,
        ]);
    }

    public function storeComment(StoreBlogCommentRequest $request, string $slug): RedirectResponse
    {
        $post = $this->blogRepository->findBySlug($slug);

        abort_if(! $post, 404);

        $this->blogRepository->addComment($post, $request->validated());

        return back()
            ->withFragment('comments')
            ->with('status', 'Thank you for your comment! It has been posted below.');
    }
}
