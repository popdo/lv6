<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Doing\BlogDoing;
use App\User;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    protected $do;
    public function __construct(BlogDoing $doing){
        $this->do = $doing;
        $this->middleware('auth',[
            'except' => ['index','show']
        ]);
    }


    // 首页文章页
    public function index(){
        return view('blogs.index');
    }

    // 文章列表页-用户中心
    public function op(User $user){
        $this->authorize('self',$user);
        $blogs = $user->blogs()->orderBy('id','desc')->paginate(20);

        return view('blogs.op',compact('blogs'));
    }

    public function create(){
        //
    }


    public function store(Request $request){
        //
    }


    public function show(Blog $blog){
        return view('blogs.show',compact('blog'));
    }

    // 文章编辑页面
    public function edit(Blog $blog){
        $this->authorize('self',$blog);
        return view('blogs.edit',compact('blog'));
    }

    // 更新文章方法
    public function update(Request $request, Blog $blog){
        $this->authorize('self',$blog);
        $blog->update([
            'title' => $request->title,
            'name' => $request->name ?:urlencode($request->title),
            'content' => $request->content
        ]);
        session()->flash('success','更新成功');
        return back();
    }

    // 删除文章方法
    public function destroy(Blog $blog){
        $this->authorize('self',$blog);
        $blog->delete();
        session()->flash('success','删除成功');
        // return back();
        // return json_encode(['success'=>'删除成功!']);
    }
}
