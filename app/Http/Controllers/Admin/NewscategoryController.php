<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Newscategory;
use Yajra\Datatables\Datatables;
use Validator;
use Response;

class NewscategoryController extends Controller
{
    //
    public function __construct(Newscategory $newscategory)
    {
    	$this->newscategory=$newscategory;
    }
    public function index(Request $request)
    {
    	if($request->ajax())
    	{
    		$newscategories=$this->newscategory->all();
    		return Datatables::of($newscategories)

	        ->addColumn('status', function($newscategories){
	        	if($newscategories->status==1)
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
	        ->addColumn('action', function ($newscategories) {

	        	$button = '<button type="button" name="edit" id="'.$newscategories->id.'" class="edit btn btn-primary btn-sm"><i class="fa fa-edit"></i>Edit</button>';
	            $button .= '&nbsp;&nbsp;';
	            $button .= '<button type="button" name="delete" url="'.url('admin/deletenewsCategory').'" id="'.$newscategories->id.'" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i>Delete</button>';
	            return $button;
	               
	        })
        	->rawColumns(['action' => 'action','status'=>'status'])
        	->make(true);

    	}
    	return view('admin.newscategory.index');
    }
    public function store(Request $request)
    {
    	$rules = array(
            'name'=>'required|unique:newscategories',
            'slug' =>'required'
        );
        $error = Validator::make($request->all(), $rules);
        if($error->fails())
        {
            return Response::json(array('errors' => $error->getMessageBag()->toArray()));
        }
        
        $count=$this->newscategory->count();
        $order=$count+1;
        $form_data=array(
        	'name' =>$request->newscategory_name,
        	'slug' =>$request->slug,
        	'status'=>isset($request->status) ? 1 : 0,
            'sort_id'=>$order
        );
        $this->newscategory->create($form_data);
        return response()->json(['success'=>'News Category added successfull']);
    }

    public function edit(Request $request,$id)
    {
    	if($request->ajax())
        {
            $data = $this->newscategory->findOrFail($id);
            return response()->json(['data' => $data]);
        }
    }

    public function update(Request $request)
    {
         $rules = array(
            'newscategory_name'=>'required',
            'slug'=>'required'
        );
        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return Response::json(array('errors' => $error->getMessageBag()->toArray()));
        }
        if(isset($request->status))
        {
        	$status=1;
        }
        else
        {
        	$status=0;
        }
        $form_data=array(
        	'name' =>$request->newscategory_name,
        	'slug' =>$request->slug,
        	'status'=>$status
        );
        $this->newscategory->whereId($request->hidden_id)->update($form_data);
        return response()->json(['success' => 'News Category is successfully updated']);
    }

    public function delete($id)
    {
        $data = $this->newscategory->findOrFail($id);
        $data->delete();
        return response()->json(['success' => 'Category Deleted successfully.']);
        
    }

    public function sortingView()
    {
        $newscategory=$this->newscategory->get();
        $parent_number=count($newscategory);
        return view('admin.newscategory.sorting',compact('newscategory','parent_number'));

    }
    public function sortingUpdate(Request $request)
    {
        $order= $request->order_array;
        $count=0;
        foreach ($order as $ord) {

            $category_item = $this->newscategory->find($ord);        
            $category_item->sort_id=$count;
            $category_item->update();
            $count++;
        }
        echo json_encode("Sorting News Category Succesfully");
    }
}
