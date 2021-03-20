<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Comment;


class CommentController extends Controller
{


    /**
     * 添加成功
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

//        dd($request);
        if (Comment::create($request->all())) {
            return redirect()->back();
        } else {
            return redirect()->back()->withInput()->withErrors('评论发表失败！');
        }
    }


}
