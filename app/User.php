<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
    /* ------------
    | 模型关系
    * ------------- */
    
    // 一对多

    public function blogs (){
        return $this->hasMany('App\Blog');
    }

    // 多对多

    // 粉丝关系
    public function followers (){
        return $this->belongsToMany(User::class,'followers','user_id','follower_id');
    }

    // 关注关系
    public function followings (){
        return $this->belongsToMany(User::class,'followers','follower_id','user_id');
    }

    /* ------------
    | 关注与粉丝
    * ------------- */
    
    // 首页显示自己与已关注的的所有微博
    // 该章节具体教程 https://learnku.com/courses/laravel-essential-training/5.8/dynamic-flow/4119
    public function feed(){
        // 1、通过 followings 方法取出所有关注用户的信息，再借助 pluck 方法将 id 进行分离并赋值给 user_ids
        $user_ids = $this->followings->pluck('id')->toArray();

        // 2、将当前用户的 id 加入到 user_ids 数组中；
        array_push($user_ids, $this->id);

        // 3、使用 Laravel 提供的 查询构造器 whereIn 方法取出所有用户的微博动态并进行倒序排序；
        return Status::whereIn('user_id', $user_ids)->with('user')->orderBy('created_at', 'desc');

        // 使用了 Eloquent 关联的 预加载 with 方法，预加载避免了 N+1 查找的问题，大大提高了查询效率。N+1 问题

    }

    // 关注功能
    public function follow ($user_ids){
        if( !is_array($user_ids)){
            $user_ids = compact('user_ids');
        }
        $this->followings()->sync($user_ids,false);
    }

    // 取消关注功能
    public function unfollow ($user_ids){
        if( !is_array($user_ids)){
            $user_ids = compact('user_ids');
        }
        $this->followings()->detach($user_ids);
    }

    // 判断当前登录用户是否关注了某用户
    public function is_followed ($user_id){
        // 用contains方法 判断用户 B 是否包含在用户 A 的关注人列表上即可
        return $this->followings->contains($user_id);
    }

    
    /* ------------
    | 头像获取
    * ------------- */

    // 获取加密邮箱字符串
    public function hashEmail (){
        // 通过 $this->attributes['email'] 获取到用户的邮箱；
        // 用 strtolower 方法将邮箱转换为小写，并md5转码
        return md5(strtolower(trim($this->attributes['email'])));
    }

    // 获取gravatar头像
    public function gravatar ($size=100){
        return "http://www.gravatar.com/avatar/{$this->hashEmail()}?s=$size";
    }

    // 获取机器人头像
    public function robohash ($size=100,$setBg=0){
        $bg = $setBg == 1 ? '&bgset=bg2':'';
        return "http://robohash.org/{$this->hashEmail()}.jpg?size={$size}x{$size}{$bg}&ignoreext=false";
    }

    // 获取矢量风格头像
    public function avatars (){
        return "https://avatars.dicebear.com/v2/avataaars/{$this->hashEmail()}.svg?options[mood][]=happy";
    }

}
