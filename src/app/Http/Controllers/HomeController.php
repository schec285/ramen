<?php

namespace App\Http\Controllers;

use App\Models\Blog;

class HomeController extends Controller
{
    public function index(){
        $perPage = 9; // 初回表示する件数
        $blogs = Blog::with(['user', 'tags'])->latest()->paginate($perPage);
        return view('home.index', compact('blogs'));
    }
}
