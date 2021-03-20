<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *强制登錄
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

//        throw  new \Exception("hello laravel", 1);  //錯誤測試
        return view('home')->withArticles(\App\Article::all());   //返回視圖

        //withArticles 等價 with('Articles', 100);
    }
}
