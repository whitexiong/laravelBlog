<?php

namespace App\Http\Controllers\Admin;

use App\Tag_mapping;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Article;

class ArticleController extends Controller
{
    //


    public function index()
    {
        return view('admin/article/index')->withArticles(Article::all());
    }

    /**新增方法
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin/article/create');
    }


    /**
     * 表單提交地址
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:articles|max:255',
            'body' => 'required',
        ]);



        $article = new Article;
        $article->title = $request->get('title');
        $article->body = $request->get('body');
        $article->user_id = $request->user()->id;

//        dd($article);

        if ($article->save()) {
            return redirect('admin/articles');
        } else {
            return redirect()->back()->withInput()->withErrors('保存失败！');
        }
    }


    /**
     * 刪除的方法
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {

        Article::find($id)->delete();

        return redirect()->back()->withInput()->withErrors("刪除成功");
    }


    /**
     * 修改填充
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit($id)
    {
        $article_id = $id;  // 取到的id


        if(!is_numeric($article_id) and $article_id < 0){

            return redirect()->back()->withInput()->withErrors("非法请求");
        }else{

                $articles = DB::table('articles')
                    ->where('id', '=', $article_id)
                    ->where('id', '>=', 0)
                    ->get();

                $articlesArr = array(
                    'id' => $articles[0]->id,
                    'title' => $articles[0]->title,
                    'body'  => $articles[0]->body
                );



                //读取标签
                $tags = DB::table('tag_mapping')
                    ->where('article_id', '=',$article_id)
                    ->get();


                //封装标签id
                $tagIdData = array();
                $i = 0;
                foreach ($tags as $tag){
                    if(isset($tag)){
                        $tagIdData[$i] = $tag->tag_id;
                        $i++;
                    }
                }



                //查询对应的标签
                $tags = DB::table('tags')
                        ->whereIn('id',$tagIdData)
                        ->get();

//                dd($tags);


                return view('admin/article/edit', $articlesArr)->with('tag', $tags);

        }
    }


    /**
     * 更新操作
     * @param Request $request
     */
    public function update(Request $request){


//        \Validator::make($request->all(), [
//            'title' => [
//                'max:4',
//                'required',
//                Rule::unique('articles')->ignore($request->get('id'))
//            ],
//            'body' => 'required'
//        ])->validate();



        dd($request->all());



        $articles =  $request->all();
        $articlesData = new Article(); //文章更新
        $tagMpping = new Tag_mapping(); //标签更新



        $data['title'] = $articles['title'];
        $data['body'] = $articles['body'];


        //ToDO LIST
//        $tagMappingData = [
//            'article_id' => $articles->id,
//            'tag_id'    =>  $articles
//        ];


        $affect =  DB::table('articles')->where('id', '=', $articles['id'])->update($data);

        if($affect == 1){
            return redirect('admin/articles');
        }else{

            //TODO
            return redirect()->back()->withInput()->withSuccess("更新成功");
        }


    }


    /**
     * 做数据验证公共
     * @param Request $request
     */
    public  function  volidatas(Request $request)
    {



    }

    /**
     *
     * @param $id
     * @return mixed
     */
    public function show($id)
    {



        return view('article/show')->withArticle(Article::with('hasManyComments')->find($id));
    }

}


