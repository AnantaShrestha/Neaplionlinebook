<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Validator;
use App\Admin\Blog;
use Image;
use Storage;
use Response;
class BlogController extends Controller
{
    //
    public function __construct(Blog $blog)
    {
    	$this->blog=$blog;
    }
    public function index(Request $request)
    {
    	if($request->ajax())
    	{
    		 $blog=$this->blog->all();
            return Datatables::of($blog)
           
            ->addColumn('status', function($blog){
                if($blog->status==1)
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
            ->addColumn('image', function($blog){
                return '<img style="width:120px" src="'.asset('images/blog/'.$blog->image).'">';
            })
            ->addColumn('action', function ($blog) {

                $button = '<button type="button" name="edit" id="'.$blog->id.'" class="edit btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="delete" url="'.url('admin/deleteBlog').'" id="'.$blog->id.'" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>';

             

                return $button;
                   
            })
            ->rawColumns(['action' => 'action','status'=>'status','image'=>'image'])
            ->make(true);
    	}
    	return view('admin.blog.index');
    }

    public function store(Request $request)
    {
    	$rules = array(
            'title'=>'required|unique:blogs',
            'author'=>'required',
            'image' =>'required|image|max:2048',
            'description' => 'required'
        );
        $error = Validator::make($request->all(), $rules);
        if($error->fails())
        {
            return Response::json(array('errors' => $error->getMessageBag()->toArray()));
        }

        $image=$request->file('image');
        $extension = $image->getClientOriginalExtension();
        $filename = rand().'.'.$extension;
        $image_path = 'images/blog/'.$filename;
        Image::make($image)->resize(900,500)->save($image_path);
        $form_data=array(
        	'title'=>$request->blog_title,
        	'author'=>$request->author,
        	'image' =>$filename,
            'status' =>isset($request->status) ? 1 : 0,
        	'description' => $request->description
        );
        $this->blog->create($form_data);
        return response()->json(['success'=>'Blog added successfuly']);
    }
    public function edit(Request $request,$id=null)
    {
        if($request->ajax())
        {
            $data=$this->blog->find($id);
            return response()->json(['data' => $data]);

        }
    }

    public function update(Request $request)
    {
        $rules = array(
            'title'=>'required',
            'author'=>'required',
            'image' =>'image|max:2048',
            'description' => 'required'
        );
        $error = Validator::make($request->all(), $rules);
        if($error->fails())
        {
            return Response::json(array('errors' => $error->getMessageBag()->toArray()));
        }

         $image = $request->file('image');
        if($image != '')
        {
            //image store
            $extension = $image->getClientOriginalExtension();
            $filename = rand().'.'.$extension;
            $image_path = 'images/blog/'.$filename;
            Image::make($image)->resize(900,500)->save($image_path);
            Storage::delete('images/blog/'.$request->hidden_image);
        }
        else
        {
            $filename=$request->hidden_image;
        }
        $form_data=array(
            'title'=>$request->blog_title,
            'author'=>$request->author,
            'image' =>$filename,
            'status' =>isset($request->status) ? 1 : 0,
            'description' => $request->description
        );
        $this->blog->whereId($request->hidden_id)->update($form_data);
        return response()->json(['success'=>'Blog update successfuly']);
    }

    public function delete($id=null)
    {
         $data = $this->blog->findOrFail($id);
        Storage::delete('images/blog/'.$data->image);
        $data->delete();
        return response()->json(['success'=>'Blog has been deleted successfully']);
    }
}
