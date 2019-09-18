<?php

namespace App\Doing;
use App\User;

class UserDoing
{
    // 查:列表
    public function list (){
        //
    }

    // 查:单条
    public function find ($id){
        return User::findOrFail($id);
    }

    // 增:
    function store($request){
        User::create([
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