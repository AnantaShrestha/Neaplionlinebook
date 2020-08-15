<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use App\Admin\Product;
use App\Admin\Category;
use App\Admin\Advertisement;
use Crypt;
class ProductController extends Controller
{
    //
    public function __construct(Product $product,Category $category)
    {
    	$this->product=$product;
    	$this->category=$category;
    }
    public function allBook()
    {
    	$productlist=$this->product->where('status',1)->paginate(12);
        $advertisement=Advertisement::where(['page'=>'Book','status'=>1])->limit(4)->get();

    	return view('front.allbook',compact('productlist','advertisement'));
    }
    public function categoryBook($url=null)
    {
    	$category=$this->category->where(['slug'=>$url,'status'=>1])->orderBy('sort_id','asc')->first();
    	$productlist=$this->product->where('category_id',$category->id)->paginate(12);
        $advertisement=Advertisement::where(['page'=>'Book','status'=>1])->limit(4)->get();
    	return view('front.categoryBook',compact('category','productlist','advertisement'));

    }
    public function free()
    {
    	$productlist=$this->product->where(['status'=>1,'free'=>1])->paginate(12);
    	return view('front.free',compact('productlist'));

    }
    public function sell()
    {
    	$productlist=$this->product->where(['status'=>1,'free'=>0])->paginate(12);
    	return view('front.sell',compact('productlist'));
    }
    public function singleDetails($id=null)
    {
    	try
    	{
    		$id = Crypt::decrypt($id);
    		$singleProduct=$this->product->where('status',1)->find($id);
    		$relatedProduct=$this->product->where('category_id','!=',$singleProduct->category_id)->get();
    		$categoryName=$this->category->where('id',$singleProduct->category_id)->pluck('name')->first();
    		return view('front.products.productdetails',compact('singleProduct','relatedProduct','categoryName'));
    	}
    	catch (DecryptException $e) 
		{
		    return view('front.error.404');
		}

    }

    public function search(Request $request)
    {
        $search_product=$request->product;
        $productlist=\DB::table('products')->where('name','like','%'.$search_product.'%')->where('status','1')->paginate(12);
        return view('front.allbook',compact('productlist','search_product'));

    }
}