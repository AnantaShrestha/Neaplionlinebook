<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Advertisement;
use Yajra\Datatables\Datatables;
use Validator;
use Storage;
use Image;

class AdvertisementController extends Controller
{
    //
    public function __construct(Advertisement $advertisement)
    {
    	$this->advertisement=$advertisement;
    }
    public function index(Request $request)
    {
    	$count=$this->advertisement->count();
    	if($request->ajax())
        {
            $advertisement=$this->advertisement->all();
            return Datatables::of($advertisement)
            ->addColumn('status', function($advertisement){
                if($advertisement->status==1)
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
            ->addColumn('image', function($advertisement){
                return '<img style="width:250px" src="'.asset('images/advertisement/'.$advertisement->image).'">';
            })
            ->addColumn('action', function ($advertisement) {

                $button = '<button type="button" name="edit" id="'.$advertisement->id.'" class="edit btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="delete" url="'.url('admin/deleteAvertisement').'" id="'.$advertisement->id.'" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>';
                 $button .= '&nbsp;&nbsp;';
                return $button;
                   
            })
            ->rawColumns(['action' => 'action','status'=>'status','image'=>'image'])
            ->make(true);

        }

    	return view('admin.advertisement.index');
    }

    public function store(Request $request)
    {
    	$rules = array(
    		'title'=>'required',
            'page'=>'required',
            'image' =>'required|image|mimes:jpeg,jpg,png,gif|max:100000'
        );
        $error = Validator::make($request->all(), $rules);
        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }
    	$count=$this->advertisement->count();
    	$order=$count+1;
    	
         //image store
        $image=$request->file('image');
        $extension = $image->getClientOriginalExtension();
        $filename = rand().'.'.$extension;
        $image_path = 'images/advertisement/'.$filename;
        Image::make($image)->resize(800,450)->save($image_path);
    	$form_data=array(
    		'title'=>$request->title,
            'sort_id'=>$order,
            'page'=>$request->page,
            'status'=>isset($request->status) ? 1: 0,
            'image'=>$filename,
        );
        $this->advertisement->create($form_data);
    	return response()->json(['success'=>'Advertisement added succcessfully']);
    }


    public function edit(Request $request,$id)
    {
    	if($request->ajax())
        {
            $data = $this->advertisement->findOrFail($id);
            return response()->json(['data' => $data]);
        }
    }
     public function update(Request $request)
    {
    	$rules = array(
            'title'=>'required',
            'image' =>'image|mimes:jpeg,jpg,png,gif|max:100000',
            'page' => 'required'
        );
        $error = Validator::make($request->all(), $rules);
        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        
        $image = $request->file('image');
        if($image != '')
        {
            //image store
            $extension = $image->getClientOriginalExtension();
            $filename = rand().'.'.$extension;
            $image_path = 'images/advertisement/'.$filename;
            Image::make($image)->resize(800,350)->save($image_path);
            Storage::delete('images/advertisement/'.$request->hidden_image);
        }
        else
        {
            $filename=$request->hidden_image;
        }
       $form_data=array(
            'title'=>$request->title,
            'page'=>$request->page,
            'status'=>isset($request->status) ? 1:0,
            'image'=>$filename,
        );
        $this->advertisement->whereId($request->hidden_id)->update($form_data);
        return response()->json(['success'=>'Advertisement has been updated Successfully']);


    }

    public function delete($id)
    {
        $data = $this->advertisement->findOrFail($id);
        Storage::delete('images/advertisement/'.$data->image);
        $data->delete();
        return response()->json(['success'=>'Advertisement has been deleted successfully']);
    }
}
