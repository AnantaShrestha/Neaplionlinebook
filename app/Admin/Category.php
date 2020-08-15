<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable=[
    	'name','slug','status','sort_id'
    ];

    public function books()
    {
    	return $this->hasMany('App\Admin\Product')->where('status',1);
    }
}
