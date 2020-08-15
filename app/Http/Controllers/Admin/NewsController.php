<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\News;
use App\Admin\Newscategory;
use App\Admin\Breakingnews;
use Yajra\Datatables\Datatables;
use Validator;
use Storage;
use Image;
use Response;

class NewsController extends Controller
{
    //
    public function __construct(News $news,Newscategory $newscategory)
    {
    	$this->news=$news;
    	$this->newscategory=$newscategory;
    }
    public function index(Request $request,$category=null)
    {
    	if($request->ajax())
    	{
    		 if(!empty($category))
             {
                if($category=='All')
                {
                    $news=$this->news->all();
                }
                else
                {
                    $news=$this->news->where('newscategory_id',$category)->get();
                }
             }
             else
             {
                $news=$this->news->all();
             }
            return Datatables::of($news)
            ->addColumn('underCategory',function($news){
                $newscategories=$this->newscategory->find($news->newscategory_id);
                return $newscategories->name;
            })

            ->addColumn('status', function($news){
                if($news->status==1)
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
            ->addColumn('image', function($news){
                return '<img style="width:120px" src="'.asset('images/news/'.$news->image).'">';
            })
            ->addColumn('action', function ($news) {

                $button = '<button type="button" name="edit" id="'.$news->id.'" class="edit btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="delete" url="'.url('admin/deleteNews').'" id="'.$news->id.'" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>';
                 $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="view" id="'.$news->id.'" class="viewProduct btn btn-success btn-sm"><i class="fa fa-eye"></i></button>';
                
                return $button;
                   
            })
            ->rawColumns(['action' => 'action','status'=>'status','underCategory'=>'underCategory','image'=>'image'])
            ->make(true);

    	}
    	$newscategories=$this->newscategory->all();
    	return view('admin.news.index',compact('newscategories'));
    }
    public function store(Request $request)
    {
    	$rules = array(
            'news_title'=>'required',
            'date'=>'required|date',
         	'newscategory'=>'required',
            'image' =>'required|image|max:2048',
            'description' => 'required'
        );
        $error = Validator::make($request->all(), $rules);
        if($error->fails())
        {
            return Response::json(array('errors' => $error->getMessageBag()->toArray()));
        }
         //image store
        $image=$request->file('image');
        $extension = $image->getClientOriginalExtension();
        $filename = rand().'.'.$extension;
        $image_path = 'images/news/'.$filename;
        Image::make($image)->resize(900,500)->save($image_path);
         $form_data=array(
            'title'=>$request->news_title,
            'date'=>$request->date,
            'newscategory_id'=>$request->newscategory,
            'status'=>isset($request->status) ? 1 : 0,
            'hotnews'=>isset($request->hotnews) ? 1 : 0,
            'description'=>$request->description,
            'image'=>$filename,
        );
        $this->news->create($form_data);
        return response()->json(['success'=>'News added Succesfully']);
    }


    public function edit(Request $request,$id)
    {
        if($request->ajax())
        {
            $data = $this->news->findOrFail($id);
            return response()->json(['data' => $data]);
        }

    }

    public function update(Request $request)
    {
    	$rules = array(
            'news_title'=>'required',
            'date'=>'required|date',
         	'newscategory'=>'required',
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
            $image_path = 'images/news/'.$filename;
            Image::make($image)->resize(900,500)->save($image_path);
            Storage::delete('images/news/'.$request->hidden_image);
        }
        else
        {
            $filename=$request->hidden_image;
        }
       $form_data=array(
            'title'=>$request->news_title,
            'date'=>$request->date,
            'newscategory_id'=>$request->newscategory,
            'status'=>isset($request->status) ? 1 : 0,
            'hotnews'=>isset($request->hotnews) ? 1 : 0,
            'description'=>$request->description,
            'image'=>$filename,
        );
        $this->news->whereId($request->hidden_id)->update($form_data);
        return response()->json(['success'=>'News has been updated Successfully']);


    }

     public function delete($id)
    {
        $data = $this->news->findOrFail($id);
        Storage::delete('images/news/'.$data->image);
        $data->delete();
        return response()->json(['success'=>'News has been deleted successfully']);
    }


    public function breaking(Request $request,$id=null)
    {

        if($request->ajax())
        {
            $data =Breakingnews::findOrFail($id);
            return response()->json(['data' => $data]);
        }
    }
    public function updateBreaking(Request $request)
    {
        $rules = array(
            'breaking'=>'required',  
        );
        $error = Validator::make($request->all(), $rules);
        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        $form_data=array(
            'news' =>$request->breaking
        );
        Breakingnews::whereId($request->breaking_id)->update($form_data);
        return response()->json(['success'=>'Breaking News Update Successfully']);
    }
    
}
