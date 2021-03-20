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
    Route::post('comment', 'CommentController@store');
    Route::get('article/{id}', 'ArticleController@show');


});
