<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Audiocategory;
use Yajra\Datatables\Datatables;
use Validator;
use Response;


class AudiocategoryController extends Controller
{
    //
     public function __construct(Audiocategory $audiocategory)
    {
    	$this->audiocategory=$audiocategory;
    }	
    public function index(Request $request)
    {

    	if($request->ajax())
    	{
    		$audiocategory=$this->audiocategory->all();
    		return Datatables::of($audiocategory)

	        ->addColumn('status', function($audiocategory){
	        	if($audiocategory->status==1)
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
	        ->addColumn('action', function ($audiocategory) {

	        	$button = '<button type="button" name="edit" id="'.$audiocategory->id.'" class="edit btn btn-primary btn-sm"><i class="fa fa-edit"></i>Edit</button>';
	            $button .= '&nbsp;&nbsp;';
	            $button .= '<button type="button" name="delete" url="'.url('admin/deleteaudioCategory').'" id="'.$audiocategory->id.'" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i>Delete</button>';
	            return $button;
	               
	        })
            ->editColumn('created_at',function($audiocategory){
                $date=date('Y-F-d-D ', strtotime($audiocategory->created_at));
                return $date;
            })
        	->rawColumns(['action' => 'action','status'=>'status'])
        	->make(true);

    	}
    	return view('admin.audiocategory.index');
    }

    public function store(Request $request)
    {
    	$rules = array(
            'name'=>'required|unique:audiocategories',
            'slug' =>'required'
        );
        $error = Validator::make($request->all(), $rules);
        if($error->fails())
        {
            return Response::json(array('errors' => $error->getMessageBag()->toArray()));
        }
        
        $count=$this->audiocategory->count();
        $order=$count+1;
        $form_data=array(
        	'name' =>$request->name,
        	'slug' =>$request->slug,
        	'status'=>isset($request->status) ? 1 : 0,
            'sort_id'=>$order,
        );
        $this->audiocategory->create($form_data);
        return response()->json(['success'=>'Audio Category added successfull']);
    }
    public function edit(Request $request,$id)
    {
    	if($request->ajax())
        {
            $data = $this->audiocategory->findOrFail($id);
            return response()->json(['data' => $data]);
        }
    }
   public function update(Request $request)
    {
        $rules = array(
            'name'=>'required',
            'slug' =>'required'
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
        $this->audiocategory->whereId($request->hidden_id)->update($form_data);
        return response()->json(['success' => 'Audio Category is successfully updated']);
    }

    public function delete($id)
    {
    	$data = $this->audiocategory->findOrFail($id);
        $data->delete();
        return response()->json(['success' => 'Audio Category Deleted successfully.']);
    }


    public function sortingView()
    {
        $audiocategory=$this->audiocategory->where(['status'=>1])->orderBy('sort_id','asc')->get();
        $parent_number=count($audiocategory);
        return view('admin.audiocategory.sorting',compact('audiocategory','parent_number'));
    }

    public function sortingUpdate(Request $request)
    {

        $order= $request->order_array;
        
        $count=0;

        foreach ($order as $ord) {

            $category_item = $this->audiocategory->find($ord);        
            $category_item->sort_id=$count;
            $category_item->update();

            $count++;
        }
        echo json_encode("Sorting News Category Succesfully");
    
    }
}
