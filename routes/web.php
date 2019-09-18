<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

/* ------------
| 管理中心
* ------------- */

Route::get('/home', 'HomeController@index')->name('home');
// 用户管理页
Route::get('home/users', 'HomeController@users')->name('home.users');
Route::get('home/blogs', 'HomeController@blogs')->name('home.blogs');


/* ------------
| 站点设置
* ------------- */

Route::get('options/edit', 'OptionController@edit')->name('options.edit');
Route::patch('options/update','OptionController@update')->name('options.update');
// Route::resource('options', 'OptionController',['only'=>['index','update','ddd']]);

/* ------------
| 用户
* ------------- */
Route::get('user/{user}/followings','UserController@followings')->name('user.followings');
Route::get('user/{user}/followers','UserController@followers')->name('user.followers');
Route::resource('user', 'UserController',['except'=>['create','store']]);

// 关注/取消关注
Route::post('/user/follow/{user}', 'FollowerController@store')->name('follow.store');
Route::delete('/user/follow/{user}', 'FollowerController@destroy')->name('follow.destroy');

/* ------------
| 博客
* ------------- */

Route::get('blogs/user/{user}', 'BlogController@op')->name('blogs.op');
Route::resource('blogs', 'BlogController');
