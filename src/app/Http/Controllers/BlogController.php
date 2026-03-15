<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\StoreBlogRequest;
use App\Models\Blog;
use App\Models\Prefecture;
use App\Services\BlogService;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Str;

class BlogController extends Controller
{
    private BlogService $blogservice;
    private const PER_PAGE = 6; // ブログ取得件数

    public function __construct(BlogService $blogservice)
    {
        $this->blogservice = $blogservice;
    }

    public function index()
    {
        $blogs = $this->blogservice->getLatestBlogs(self::PER_PAGE);
        return view('blogs.index', [
            'blogs' => $blogs,
        ]);
    }

    public function loadMore()
    {
        $blogs = $this->blogservice->getLatestBlogs(self::PER_PAGE);
        return view('blogs._blog_grid', [
            'blogs' => $blogs,
        ])->render();
    }

    public function show(Blog $blog)
    {
        return view('blogs.show', [
            'blog' => $blog,
        ]);
    }

    public function create()
    {
        return view('blogs.create');
    }

    public function store(StoreBlogRequest $request)
    {
        $blog = new Blog($request->validated());
        $blog->user_id = Auth::id();
        $blog->id = Str::uuid(); // ブログID
        $thumbnailDir = 'blogs/' . $blog->id; // ブログ画像保存ディレクトリ
        try {
            $file = $request->file('thumbnail');
            if (!$file || !$file->isValid()) {
                return back()->withErrors(['thumbnail' => '無効な画像です']);
            }
            $thumbnailPath = $file->store($thumbnailDir, 'public');
            $blog->thumbnail_image_path = $thumbnailPath;
            $data = $this->blogservice->createBlog($blog); // ブログ登録
        }catch (\Exception $e) {
            if (isset($thumbnailPath)) {
                Storage::disk('public')->delete($thumbnailPath);
            }
            return back()->withErrors(['error' => 'ブログの保存に失敗しました: ' . $e->getMessage()]);
        }

        return redirect()->route('blogs.show', [
            'blog' => $data
        ]);
    }
}
