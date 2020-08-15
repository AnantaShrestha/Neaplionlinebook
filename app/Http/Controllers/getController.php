<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin\Category;
use App\Admin\Product;
use App\Admin\Newscategory;
use App\Admin\News;
use App\Admin\Sitesetting;
use App\ Admin\Audiocategory;
use App\Front\Cart;
use Auth;
class getController extends Controller
{
    //
    
    public static function getCategory()
    {
    	$categories=Category::where('status',1)->orderBy('sort_id','asc')->get();
    	return $categories;
    }
    public static function getnewsCategory()
    {
    	$newscategories=Newscategory::where('status',1)->orderBy('sort_id','asc')->get();
    	return $newscategories;
    }
    public static function getSitesetting($id=1)
    {
        $sitesetting=Sitesetting::find($id);
        return $sitesetting;
    }
    public static function getAudioCategory()
    {
        $audiocategory=Audiocategory::where('status',1)->orderBy('sort_id','asc')->get();
        return $audiocategory;
    }
    public static function getcartNumber()
    {
        $countCart=Cart::where('user_id',Auth::user()->id)->count();
        return $countCart;
    }

}
