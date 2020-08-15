<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use App\Admin\Blog;
use App\Admin\Advertisement;
use Crypt;
class BlogController extends Controller
{
    //
    public function __construct(Blog $blog)
    {
    	$this->blog=$blog;
    }

    public function blog()
    {
    	$blogs=$this->blog->where('status',1)->orderBy('created_at','DESC')->paginate(3);
        $advertisement=Advertisement::where(['page'=>'Blog','status'=>1])->limit(4)->get();

    	return view('front.blog',compact('blogs','advertisement'));
    }

    public function singleBlog($id=null)
    {
    	try
    	{
    		$id = Crypt::decrypt($id);
    		$blogs=$this->blog->where('status',1)->find($id);
    		$relatedblog=$this->blog->where('id','!=',$blogs->id)->get();
            $advertisement=Advertisement::where(['page'=>'Blog','status'=>1])->limit(3)->get();
    		return view('front.blog.blogdetails',compact('blogs','relatedblog','advertisement'));
    	}
    	catch (DecryptException $e) 
		{
		    return view('front.error.404');
		}
    }
}
