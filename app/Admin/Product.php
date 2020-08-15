<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable=[
    	'name','category_id','author','language','published_date','total_page','status','free','upcoming','price','image','pdf','description','rating'
    ];

}
