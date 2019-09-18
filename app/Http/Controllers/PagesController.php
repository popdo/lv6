<?php
// 前台自定义页面的控制器
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function root (){
        return view('welcome');
    }
}
