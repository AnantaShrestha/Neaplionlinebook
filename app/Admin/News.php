<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //
    protected $fillable=['title','date','image','hotnews','status','newscategory_id','description'];
}
