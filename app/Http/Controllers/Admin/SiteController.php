<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Sitesetting;
use Image;
use Storage;

class SiteController extends Controller
{
    //
    public function __construct(Sitesetting $sitesetting)
    {
    	$this->sitesetting=$sitesetting;

    }
    public function index($id=1)
    {
    	$sitesetting=$this->sitesetting->find($id);
    	
    	return view('admin.sitesetting.index',compact('sitesetting'));
    }

    public function update(Request $request,$id=1)
    {
    	$validatedData = $request->validate([
        	'contact'=>'required',
    		'email' =>'required',
    		'address'=>'required',
    		'logo' =>'image|max:2048',
    		'about'=>'required',
    		'mission'=>'required',
    		'vision' =>'required',
    		'what' =>'required',
   		 ]);
    	$logo=$request->file('logo');
    	if($logo!='')
    	{
    		 //image store
            $extension = $logo->getClientOriginalExtension();
            $filename = rand().'.'.$extension;
            $image_path = 'images/logo/'.$filename;
            Image::make($logo)->save($image_path);
            Storage::delete('images/logo/'.$request->hidden_logo);
    	}
    	else
    	{
    		$filename=$request->hidden_logo;
    	}
    	 $form_data=array(
            'contact'=>$request->contact,
            'email'=>$request->email,
            'address' =>$request->address,
            'logo' =>$filename,
            'about' => $request->about,
            'mission' => $request->mission,
            'what' => $request->what,
            'visioni' => $request->vision
        );
    	$this->sitesetting->where('id',$id)->update($form_data);
    	return redirect()->back()->with('message','Site Setting update successfully');
    }
}
