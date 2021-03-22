<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag_mapping extends Model
{
    //
    protected $table = 'tag_mapping';
    protected $fillable = ['article_id', 'tag_id'];
    public $timestamps = true;   //时间戳是否更新
}
