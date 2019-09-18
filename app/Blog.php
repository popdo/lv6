<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'name',
        'title',
        'user_id',
        'content',
        'status',
        'comment_status',
        'comment_count'
    ];

    
    /* ------------
    | 模型关系
    * ------------- */
    
    public function user (){
        return $this->belongsTo('App\User');
    }

    // 获取文章用户名
    public function user_name (){
        return $this->user()->value('name');
    }
}
