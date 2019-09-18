<?php

namespace App\Http\Controllers;

use App\Option;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        
    }

    // 站点设置编辑页
    public function edit (){
        $this->authorize('admin-home',auth()->user());
        $options = $this->options();
        return view('options.edit',compact('options'));
    }


    // 站点设置更新方法
    public function update(Request $request)
    {
        $this->authorize('admin-home',auth()->user());
        $data = [
            'site_name'     => $request->site_name,
            'site_keywords' => $request->site_keywords,
            'site_info'     => $request->site_info,
            'site_copy'     => $request->site_copy
        ];
        foreach ($data as $key => $value) {
            Option::where('key',$key)->update(['value'=>$value]);
        }
        session()->flash('success','更新成功');
        return back();
    }

    // 获取所有选项 1、用于控制器内部调用 2、用于公共变量中调用
    public function options (){
        return Option::pluck('value','key');
    }
}
