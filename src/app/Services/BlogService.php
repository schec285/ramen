<?php

namespace App\Services;

use App\Models\Blog;
use App\Models\Tag;
use App\Models\Prefecture;

class BlogService
{
    public function getLatestBlogs(int $perPage)
    {
        return Blog::with(['user', 'tags'])
            ->latest()
            ->paginate($perPage);
    }

    public function getBlog(string $blogId)
    {
        return Blog::with(['user', 'tags'])->findOrFail($blogId);
    }

    public function createBlog(Blog $blog)
    {
        // タグデータを一時保存して除外
        $tagNames = $blog->tags ?? [];
        unset($blog->tags);

        $blog->save();

        // タグを処理して紐づける
        if (!empty($tagNames)) {
            $tagIds = [];
            foreach ($tagNames as $tagName) {
                $tagName = trim($tagName);

                $tag = Tag::firstOrCreate([
                    'name' => $tagName,
                ]);
                $tagIds[] = $tag->id;
            }
            $blog->tags()->sync($tagIds);
        }
        return $blog;
    }
}
