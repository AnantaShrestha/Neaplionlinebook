<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use App\Admin\News;
use App\Admin\Newscategory;
use App\Admin\Advertisement;
use Crypt;
class NewsController extends Controller
{
    //
    public function __construct(News $news,Newscategory $newscategory)
    {
    	$this->news=$news;
    	$this->newscategory=$newscategory;
    }
    public function news()
    {
    	$newslisting=$this->news->where('status',1)->orderBy('date','DESC')->paginate(8);
    	$hotnews=$this->news->where(['status'=>1,'hotnews'=>1])->orderBy('date','DESC')->paginate(5);
        $advertisement=Advertisement::where(['page'=>'News','status'=>1])->limit(4)->get();

    	return view('front.news',compact('newslisting','hotnews','advertisement'));
    }
    public function newsCategory($url=null)
    {
    	$newscategory=$this->newscategory->where(['status'=>1,'slug'=>$url])->first();
    	$newslisting=$this->news->where(['status'=>1,'newscategory_id'=>$newscategory->id])->orderBy('date','DESC')->paginate(5);
    	$hotnews=$this->news->where(['status'=>1,'hotnews'=>1])->orderBy('date','DESC')->paginate(5);
        $advertisement=Advertisement::where(['page'=>'News','status'=>1])->limit(4)->get();

    	return view('front.categoryNews',compact('newscategory','newslisting','hotnews','advertisement'));
    }

    public function singleNews($id=null)
    {
    	try
    	{
    		$id = Crypt::decrypt($id);
    		$singleNews=$this->news->where('status',1)->find($id);
    		$newscategoryName=$this->newscategory->where('id',$singleNews->category_id)->pluck('name')->first();
    		$hotnews=$this->news
    		->where('status',1)
    		->where('id','!=',$id)
    		->where('newscategory_id','=',$singleNews->newscategory_id)
    		->orderBy('date','DESC')
    		->paginate(5);
            $advertisement=Advertisement::where(['page'=>'News','status'=>1])->limit(3)->get();
    		return view('front.news.newsDetails',compact('singleNews','newscategoryName','hotnews','advertisement'));
    	}
    	catch (DecryptException $e) 
		{
		    return view('front.error.404');
		}
    }
}
