<?php

namespace App\Http\Controllers;

use App\Services\BlogService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private BlogService $blogservice;
    private const PER_PAGE = 6; // ブログ取得件数

    public function __construct(BlogService $blogservice) {
        $this->blogservice = $blogservice;
    }

    public function index(){
        $blogs = $this->blogservice->getLatestBlogs(self::PER_PAGE);
        return view('home.index', [
            'blogs' => $blogs,
        ]);
    }

    public function loadMore(Request $request){
        $blogs = $this->blogservice->getLatestBlogs(self::PER_PAGE);
        return view('home._blog_grid', [
            'blogs' => $blogs,
        ])->render();
    }
}
