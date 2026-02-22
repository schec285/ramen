<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Prefecture;
use App\Services\BlogService;

class BlogController extends Controller
{
    private BlogService $blogservice;
    private const PER_PAGE = 6; // ブログ取得件数

    public function __construct(BlogService $blogservice) {
        $this->blogservice = $blogservice;
    }

    public function index(){
        $blogs = $this->blogservice->getLatestBlogs(self::PER_PAGE);
        return view('blogs.index', [
            'blogs' => $blogs,
        ]);
    }

    public function loadMore(){
        $blogs = $this->blogservice->getLatestBlogs(self::PER_PAGE);
        return view('blogs._blog_grid', [
            'blogs' => $blogs,
        ])->render();
    }

    public function show(Blog $blog) {
        return view('blogs.show', [
            'blog' => $blog,
        ]);
    }

    public function create() {
        $prefectures = Prefecture::ordered()->pluck('name', 'id');
        return view('blogs.create', [
            'prefectures' => $prefectures,
        ]);
    }
}
