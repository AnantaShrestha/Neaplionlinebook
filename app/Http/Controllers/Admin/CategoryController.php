<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Category;
use Yajra\Datatables\Datatables;
use Validator;
use Response;
class CategoryController extends Controller
{
    //
    public function __construct(Category $category)
    {
    	$this->category=$category;

    } 
    public function index(Request $request)
    {
    	if($request->ajax())
    	{
    		$categories=$this->category->all();
    		return Datatables::of($categories)

	        ->addColumn('status', function($categories){
	        	if($categories->status==1)
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
	        ->addColumn('action', function ($categories) {

	        	$button = '<button type="button" name="edit" id="'.$categories->id.'" class="edit btn btn-primary btn-sm"><i class="fa fa-edit"></i>Edit</button>';
	            $button .= '&nbsp;&nbsp;';
	            $button .= '<button type="button" name="delete" url="'.url('admin/deleteCategory').'" id="'.$categories->id.'" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i>Delete</button>';
	            return $button;
	               
	        })
        	->rawColumns(['action' => 'action','status'=>'status'])
        	->make(true);

    	}
    	return view('admin.category.index');
    }
    public function store(Request $request)
    {
    	$rules = array(
            'name'=>'required|unique:categories',
            'slug' =>'required'
        );
        $error = Validator::make($request->all(), $rules);
        if($error->fails())
        {
            return Response::json(array('errors' => $error->getMessageBag()->toArray()));
        }

        
        $count=$this->category->count();
        $order=$count+1;
        $form_data=array(
        	'name' =>$request->name,
        	'slug' =>$request->slug,
        	'status'=>isset($request->status) ? 1 : 0,
            'sort_id' =>$order
        );
        $this->category->create($form_data);
        return response()->json(['success'=>'Category added successfull']);
    }

    public function edit(Request $request,$id)
    {
    	if($request->ajax())
        {
            $data = $this->category->findOrFail($id);
            return response()->json(['data' => $data]);
        }
    }

    public function update(Request $request)
    {
         $rules = array(
            'name'=>'required',
            'slug'=>'required'
        );
        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return Response::json(array('errors' => $error->getMessageBag()->toArray()));
        }
    
        $form_data=array(
        	'name' =>$request->name,
        	'slug' =>$request->slug,
        	'status'=>isset($request->status) ? 1 : 0,
        );
        $this->category->whereId($request->hidden_id)->update($form_data);
        return response()->json(['success' => 'Category is successfully updated']);
    }

    public function delete($id)
    {
        $data = $this->category->findOrFail($id);
        $data->delete();
        return response()->json(['success' => 'Category Deleted successfully.']);
        
    }
    public function sortingView()
    {
        $categories=$this->category->where(['status'=>1])->orderBy('sort_id','asc')->get();
        $parent_number=count($categories);
        return view('admin.category.sorting',compact('categories','parent_number'));
    }

    public function sortingUpdate(Request $request)
    {

        $order= $request->order_array;
        
        $count=0;

        foreach ($order as $ord) {

            $category_item = $this->category->find($ord);        
            $category_item->sort_id=$count;
            $category_item->update();
            $count++;
        }
        echo json_encode("Sorting Category Succesfully");
    
    }

}
