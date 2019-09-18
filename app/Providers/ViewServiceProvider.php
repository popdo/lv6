<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // 视图合成器：让变量可以在控制器以外的公共部分显示
        // 向layouts.app视图传递变量 total
        // view()->composer('layouts.app',function($view){
        //     $view->with([
        //         'total'=> 20
        //     ]);
        // });
        view()->composer(['layouts.app','layouts.footer','inc._navbar'],'App\Http\ViewComposer\OptionComposer@compose');
    }
}
