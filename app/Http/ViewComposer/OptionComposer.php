<?php
namespace App\Http\ViewComposer;

use App\Http\Controllers\OptionController;
use Illuminate\View\View;

class OptionComposer
{
    // 创建构造函数，将OptionController中的数据获取过来
    protected $options;
    public function __construct (OptionController $options){
        $this->options = $options;
    }
    // 配置公共变量
    public function compose (View $view){
        $view->with([
            'options'=>$this->options->options(), // 获取站点设置数据
        ]);
    }
}
