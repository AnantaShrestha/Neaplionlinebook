<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //
    protected $fillable=['title','status','image','author','description'];
}
