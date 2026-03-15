<?php

namespace App\Services;

use App\Models\Blog;
use App\Models\Tag;
use App\Models\Prefecture;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Str;

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

    public function createBlog(array $data)
    {
        // タグデータを一時保存して除外
        $tagNames = $data['tags'] ?? [];
        unset($data['tags']);

        $data['user_id'] = Auth::id();
        $blog = Blog::create($data);

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
