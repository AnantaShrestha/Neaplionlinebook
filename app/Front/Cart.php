<?php

namespace App\Front;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
    protected $fillable=['product_id','user_id'];

    public function cartProduct()
    {
    	return $this->belongsTo('App\Admin\Product', 'product_id');
    }
}
