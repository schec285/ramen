<?php
namespace App\Services;

use App\Models\Blog;
class BlogService
{
    public function getLatestBlogs(int $perPage)
    {
        return Blog::with(['user', 'tags'])
            ->latest()
            ->paginate($perPage);
    }
}