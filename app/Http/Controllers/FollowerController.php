<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    // 关注用户
    public function store (User $user){
        $this->authorize('follow',$user);//不能关注自己

        if( ! auth()->user()->is_followed($user->id) ){
            auth()->user()->follow($user->id);
        }
        session()->flash('success','关注成功!');
        return back();
    }

    // 取消关注
    public function destroy (User $user){
        $this->authorize('follow',$user);//不能关注自己
        
        if( auth()->user()->is_followed($user->id) ){
            auth()->user()->unfollow($user->id);
        }
        session()->flash('success','取消关注成功!');
        return back();
    }
}
