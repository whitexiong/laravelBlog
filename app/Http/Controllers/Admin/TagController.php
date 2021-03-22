<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tags;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TagController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tag_name' => 'required|max:20',
        ]);


        //验证失败
        if ($validator->fails()) {
            return redirect('admin/tag/create')
                ->withErrors($validator)  //返回错误信息
                ->withInput();
        }else{

            $tag = new Tags();
            $tag->tag_name = $request->get('tag_name');
            $tag->save();


            return redirect('admin/tags');
        }


    }


    /**
     *
     * @return mixed
     */
    public function index()
    {


        $tags = Tags::all();

        \App\Tags::all();
//        foreach ($tags as $tag){
//            echo $tag->tag_name;
//        }


        return view('admin/tag/create')->withTags(\App\Tags::all());
    }


    /**
     * 标签列表
     * @return mixed
     */
    public function list()
    {
        return view('admin/tag/create')->withArticles(Tags::all());
    }



    /**
     * 刪除的方法
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {

        Tags::find($id)->delete();


        return redirect()->back()->withInput()->withErrors("刪除成功");
    }




}
