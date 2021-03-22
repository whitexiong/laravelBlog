<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    //
    protected $table = 'tags';
    protected $fillable = ['tag_name'];
//    public $timestamps = true;   //时间戳是否更新
}
