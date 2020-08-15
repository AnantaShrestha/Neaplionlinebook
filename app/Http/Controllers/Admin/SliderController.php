<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Filesystem\Filesystem;
use App\Admin\Slider;
use Yajra\Datatables\Datatables;
use Validator;
use Image;
use Storage;

class SliderController extends Controller
{
    //
    public function __construct(Slider $slider)
    {
    	$this->slider=$slider;
    }
    public function index(Request $request)
    {
    	if($request->ajax())
    	{
    		$slider=$this->slider->all();
    		return Datatables::of($slider)

	        ->addColumn('status', function($slider){
	        	if($slider->status==1)
	        	{
	        		$status='<button class="btn btn-success">Active</button>';
	        		return $status;
	        	}
	        	else
	        	{
	        		$status='<button class="btn btn-danger">InActive</button>';
	        		return $status;
	        	}
	        })
	        ->addColumn('image',function($slider){
	        	return '<img style="width:120px" src="'.asset('images/slider/'.$slider->image).'">';
	        })
	        ->addColumn('action', function ($slider) {

	        	$button = '<button type="button" name="edit" id="'.$slider->id.'" class="edit btn btn-primary btn-sm"><i class="fa fa-edit"></i>Edit</button>';
	            $button .= '&nbsp;&nbsp;';
	            $button .= '<button type="button" name="delete" url="'.url('admin/deleteSlider').'" id="'.$slider->id.'" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i>Delete</button>';
	            return $button;
	               
	        })
        	->rawColumns(['action' => 'action','status'=>'status','image'=>'image'])
        	->make(true);

    	}
    	return view('admin.slider.index');
    }

    public function store(Request $request)
    {
    	$rules = array(
            'title'=>'required',
            'image' =>'required|image|max:2048'
        );
        $error = Validator::make($request->all(), $rules);
        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        if(isset($request->status))
        {
            $status=1;
        }
        else
        {
        	$status=0;
        }
         //image store
        $image=$request->file('image');
        $extension = $image->getClientOriginalExtension();
        $filename = rand().'.'.$extension;
        $image_path = 'images/slider/'.$filename;
        Image::make($image)->resize(1500,550)->save($image_path);
        $form_data=array(
        	'title' =>$request->title,
        	'image' =>$filename,
        	'status'=>$status,
        	'description'=>$request->description
        );
        $this->slider->create($form_data);
        return response()->json(['success'=>'Slider added successfull']);
    }

    public function edit(Request $request,$id)
    {
        if($request->ajax())
        {
            $data = $this->slider->findOrFail($id);
            return response()->json(['data' => $data]);
        }
    }

    public function update(Request $request)
    {
    	$rules = array(
            'title'=>'required',
            'image' =>'image|max:2048'
        );
        $error = Validator::make($request->all(), $rules);
        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        if(isset($request->status))
        {
            $status=1;
        }
        else
        {
        	$status=0;
        }
        $image = $request->file('image');
    	if($image != '')
        {
            //image store
            $extension = $image->getClientOriginalExtension();
            $filename = rand().'.'.$extension;
            $image_path = 'images/slider/'.$filename;
            Image::make($image)->resize(1500,550)->save($image_path);
            Storage::delete('images/slider/'.$request->hidden_image);
        }
        else
        {
            $filename=$request->hidden_image;
        }
        $form_data=array(
        	'title' =>$request->title,
        	'image' =>$filename,
        	'status'=>$status,
        	'description'=>$request->description
        );
        $this->slider->whereId($request->hidden_id)->update($form_data);
        return response()->json(['success'=>'Slider has been updated Successfully']);

    }

    public function delete($id)
    {
    	$data = $this->slider->findOrFail($id);
        Storage::delete('images/slider/'.$data->image);
        $data->delete();
        return response()->json(['success'=>'SLider has been deleted successfully']);
    }

}
