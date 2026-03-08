<?php

namespace App\Services;

use App\Models\Blog;
use App\Models\Tag;
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

        // モック実装: ハードコーディングされたデータを追加
        $data = array_merge($data, [
            'user_id' => Auth::id(),                // ログインユーザーのID
            'postal_code' => '1000001',              // 仮郵便番号（東京）
            'prefecture_id' => 1,                  // 東京都のID
            'city' => '千代田区',                    // 仮市区町村（東京）
            'address' => '千代田1-1',                // 仮住所
        ]);

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
