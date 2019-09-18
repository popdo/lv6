<?php

namespace App\Http\Controllers;

use App\Blog;
use App\User;
use App\Option;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    public function index(){
        $this->authorize('admin-home',auth()->user());
        return view('home');
    }

    // 文章管理页
    public function blogs(){
        $blogs = Blog::orderBy('id','desc')->paginate(16);

        return view('admin.blogs',compact('blogs'));
    }

    

    
}
