<?php

namespace App\Http\Controllers;

use App\Services\BlogService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private BlogService $blogservice;

    public function __construct(BlogService $blogservice) {
        $this->blogservice = $blogservice;
    }

    public function index(Request $request){
        $perPage = 9; // 初回表示する件数
        $blogs = $this->blogservice->getLatestBlogs($perPage);

        if ($request->ajax()){
            return response()->wantsJson([
                'status' => 'ok',
                'blogs' => $blogs,
            ]);
        }
        return view('home.index', [
            'blogs' => $blogs,
        ]);
    }
}
