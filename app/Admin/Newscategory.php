<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Newscategory extends Model
{
    //
    protected $fillable=['name','slug','status','sort_id'];

    public function news()
    {
    	return $this->hasMany('App\Admin\News')->where('status',1);
    }
}
