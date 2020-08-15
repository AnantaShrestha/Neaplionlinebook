<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    //
    protected $fillable=['title','image','sort_id','status','page'];
}
