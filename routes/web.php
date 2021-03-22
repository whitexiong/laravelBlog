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

//Route::get('/home', 'HomeController@index')->name('home');




//修改主路徑
Route::get('/', 'HomeController@index')->name('home');


Route::group(['middleware' => 'auth', 'namespace' => 'Admin', 'prefix' => 'admin'], function(){
    Route::get('/', 'HomeController@index');
    Route::resource('articles', 'ArticleController');  //單數變爲複數
    Route::post('comment', 'CommentController@store'); //评论提交地址
    Route::get('article/{id}', 'ArticleController@show'); //文章详情评论展示页面

    Route::resource('tags', 'TagController');  //标签列表
    Route::post('tags/create', 'TagController@store'); //标签提交
    Route::get('tag/{id}', 'TagController@list'); //根据标签展示的文章列表
});
