<?php

namespace App\Doing;
use App\Blog;

class BlogDoing
{
    // 查:列表
    public function list (){
        //
    }

    // 查:单条
    public function find ($id){
        return Blog::findOrFail($id);
    }

    // 增:
    function store($request){
        Blog::create([
            'name' => $request->name,
        ]);
    }
    // 改: 
    public function update ($request,$id){
        $date = $this->find($id);
        $date->name = $request->name;
        $date->save();
    }
    // 删: 
    public function destroy ($id) {
        return $this->find($id)->delete();
    }
}