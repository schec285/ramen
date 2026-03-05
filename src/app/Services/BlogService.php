<?php

namespace App\Services;

use App\Models\Blog;
use Illuminate\Support\Facades\Auth;

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
        // モック実装: ハードコーディングされたデータを追加
        $data = array_merge($data, [
            'user_id' => Auth::id(),                // ログインユーザーのID
            'postal_code' => '1000001',              // 仮郵便番号（東京）
            'prefecture_id' => 1,                  // 東京都のID
            'city' => '千代田区',                    // 仮市区町村（東京）
            'address' => '千代田1-1',                // 仮住所
            'latitude' => 35.693565851452725,      // 仮座標（東京）
            'longitude' => 139.74974193440832,     // 仮座標（東京）
        ]);

        $blog = Blog::create($data);
        return $blog;
    }
}
