<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
//        \DB::table('articles')->delete();

        DB::table('articles')->delete();


        //输出10条数据
        for ($i = 0 ; $i < 10; $i++) {

//            $article = new \App\Article();
//            $article->title = 'hello';
//            $article->body = '1111';
//
//            $article->save();


            \App\Article::create([
                'title'   => 'Title '.$i,
                'body'    => 'Body '.$i,
                'user_id' => 1,
            ]);


        }


    }
}
