<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


/**
 * Class Article
 * @package App
 * @author white
 * @dis us php artisan make:model Article create  that model article
 */
class Article extends Model
{

    protected $table = 'articles';
    protected $fillable = ['title', 'body', 'user_id'];



    public function hasManyComments()
    {
        //一多多的关系

//        $data = $this->hasMany('App\Comment', 'article_id', 'id');
//
//        dd($data);
//        exit();
        return $this->hasMany('App\Comment', 'article_id', 'id');
    }

}
