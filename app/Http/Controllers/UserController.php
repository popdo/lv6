<?php

namespace App\Http\Controllers;

use App\Http\Requests\updateUserRequest;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',[
            'except' => 'show'
        ]);
    } 

    // 管理页:用户列表
    public function index()
    {
        $this->authorize('admin-home',auth()->user());
        $users = User::orderBy('id','desc')->paginate(10);
        return view('users.index',compact('users'));
    }

    // 个人中心
    public function show(User $user){
        $posts = $user->blogs()->simplePaginate(8);
        return view('users.show',compact('user','posts'));
    }

    // 更新个人资料页
    public function edit(User $user)
    {
        $this->authorize('self',$user);
        return view('users.edit',compact('user'));
    }

    // 更新个人资料
    public function update(updateUserRequest $request, User $user)
    {
        $this->authorize('self',$user);
        
        $data['name'] = $request->name;
        // filled方法：存在且内容不为空
        if($request->filled('password')){
            $data['password'] = bcrypt($request->password);
        }
        $user->update($data);
        session()->flash('success','更新成功!');
        return back();
    }

    // 删除用户
    public function destroy(User $user)
    {
        // 仅管理员有权限删除用户
        $this->authorize('admin_unself',$user);

        $user->delete();
        session()->flash('success','删除成功');
        // return back();
    }

    // 关注列表
    public function followings (User $user){
        $title = $user->name.'关注的人';
        $users = $user->followings()->paginate(12);
        return view('users.list',compact('users','title'));
    }

    // 粉丝列表
    public function followers (User $user){
        $title = $user->name.'的粉丝';
        $users = $user->followers()->paginate(12);
        // dd($user);
        return view('users.list',compact('users','title'));
    }
}
