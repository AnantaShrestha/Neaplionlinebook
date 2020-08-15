<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Audiocategory;
use App\Admin\Audio;
use App\Admin\Advertisement;

class AudioController extends Controller
{
    //
    public function __construct(Audiocategory $audiocategory,Audio $audio)
    {

    	$this->audiocategory=$audiocategory;
    	$this->audio=$audio;
    }

    public function audio()
    {
        $audio=$this->audio->where('status',1)->orderBy('created_at','DESC')->get();
        $advertisement=Advertisement::where(['page'=>'Blog','status'=>1])->limit(3)->get();

    	return view('front.allaudio',compact('advertisement'));
    }
    public function getAudio()
    {
        $audio=$this->audio->where('status',1)->orderBy('created_at','DESC')->get();
        return response()->json($audio);
    }


    public function getAudioCategory(Request $request,$id=null)
    {
        if($request->ajax())
        {

            $audioCategory=$this->audiocategory->where(['status'=>1,'id'=>$id])->orderBy('sort_id','asc')->first();
            $audio=$this->audio->where(['status'=>1,'audiocategory_id'=>$audioCategory->id])->get();
            return response()->json($audio); 
        } 
    }

}
