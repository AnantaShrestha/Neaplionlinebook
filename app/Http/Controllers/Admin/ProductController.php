<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Category;
use App\Admin\Product;
use Illuminate\Filesystem\Filesystem;
use Yajra\Datatables\Datatables;
use Validator;
use Storage;
use Image;
use Response;


class ProductController extends Controller
{
    //
    public function __construct(Product $product,Category $category)
    {
    	$this->product=$product;
    	$this->category=$category;
    }
    public function index(Request $request,$category=null)
    {
        if($request->ajax())
        {
            if(!empty($category))
            {
                if($category=='All')
                {
                    $products=$this->product->all();
                }
                else
                {
                    $products=$this->product->where('category_id',$category)->get();
                }
            }
            else
            {
                $products=$this->product->all();
            }
            return Datatables::of($products)
            ->addColumn('underCategory',function($products){
                $categories=$this->category->find($products->category_id);
                return $categories->name;
            })

            ->addColumn('status', function($products){
                if($products->status==1)
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
            ->addColumn('pdf', function($products){
                return '<a class="btn btn-warning" href="'.asset('pdf/books/'.$products->pdf).'" target="_blank">Pdf</a>';
            })

            ->addColumn('image', function($products){
                return '<img style="width:40px" src="'.asset('images/books/'.$products->image).'">';
            })
            ->addColumn('action', function ($products) {

                $button = '<button type="button" name="edit" id="'.$products->id.'" class="edit btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="delete" url="'.url('admin/deleteProduct').'" id="'.$products->id.'" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>';
                 $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="view" id="'.$products->id.'" class="viewProduct btn btn-success btn-sm"><i class="fa fa-eye"></i></button>';
                return $button;
                   
            })
            ->rawColumns(['action' => 'action','status'=>'status','underCategory'=>'underCategory','image'=>'image','pdf'=>'pdf'])
            ->make(true);

        }
    	$categories=$this->category->all();
    	return view('admin.product.index',compact('categories'));
    }

    public function store(Request $request)
    {
        $rules = array(
            'name'=>'required|unique:products',
            'category_name'=>'required',
            'author' => 'required',
            'language' =>'required',
            'total_page'=>'required',
            'published_date'=>'required',
            'image' =>'required|image|max:2048',
            'rating'=>'required|number',
            'pdf' =>'required|mimetypes:application/pdf|max:10000',
            'rating'=>'required',
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
        $image_path = 'images/books/'.$filename;
        Image::make($image)->resize(275,400)->save($image_path);
        //pdf store
        $pdf=$request->file('pdf');
        $extension = $pdf->getClientOriginalExtension();
        $filenamePdf= rand().'.'.$extension;
        $pdf_path= 'pdf/books/';
        $pdf->move($pdf_path,$filenamePdf);
        
        $form_data=array(
            'name'=>$request->name,
            'author'=>$request->author,
            'category_id'=>$request->category_name,
            'language'=>$request->language,
            'total_page'=>$request->total_page,
            'published_date'=>$request->published_date,
            'price'=>$request->price,
            'status'=>isset($request->status) ? 1 : 0,
            'free'=>isset($request->free) ? 1 : 0,
            'upcoming'=>isset($request->upcoming) ? 1 : 0,
            'description'=>$request->description,
            'image'=>$filename,
            'pdf'=>$filenamePdf,
            'rating'=>$request->rating,

        );
        $this->product->create($form_data);
        return response()->json(['success'=>'Book Uploaded Successfully']);
    }

    public function edit(Request $request,$id)
    {
        if($request->ajax())
        {
            $data = $this->product->findOrFail($id);
            return response()->json(['data' => $data]);
        }
    }

    public function update(Request $request)
    {
        $rules = array(
            'name'=>'required',
            'category_name'=>'required',
            'author' => 'required',
            'language' =>'required',
            'total_page'=>'required',
            'published_date'=>'required',
            'image' =>'image|max:2048',
            'pdf' =>'mimetypes:application/pdf|max:10000',
            'rating'=>'required'
        );
        $error = Validator::make($request->all(), $rules);
        if($error->fails())
        {
            return Response::json(array('errors' => $error->getMessageBag()->toArray()));
        }
    
        $image = $request->file('image');
        $pdf=$request->file('pdf');
        if($image != '')
        {
            //image store
            $extension = $image->getClientOriginalExtension();
            $filename = rand().'.'.$extension;
            $image_path = 'images/books/'.$filename;
            Image::make($image)->resize(275,400)->save($image_path);
            Storage::delete('images/books/'.$request->hidden_image);
        }
        else
        {
            $filename=$request->hidden_image;
        }
        if($pdf != '')
        {
             $extension = $pdf->getClientOriginalExtension();
            $filenamePdf= rand().'.'.$extension;
            $pdf_path= 'pdf/books/';
            $pdf->move($pdf_path,$filenamePdf);
            Storage::delete('pdf/books/'.$request->hidden_pdf);
        }
        else
        {
            $filenamePdf=$request->hidden_pdf;
        }
         $form_data=array(
            'name'=>$request->name,
            'author'=>$request->author,
            'category_id'=>$request->category_name,
            'language'=>$request->language,
            'total_page'=>$request->total_page,
            'published_date'=>$request->published_date,
            'price'=>$request->price,
            'status'=>isset($request->status) ? 1 : 0,
            'free'=>isset($request->free) ? 1 : 0,
            'upcoming'=>isset($request->upcoming) ? 1 : 0,
            'description'=>$request->description,
            'image'=>$filename,
            'pdf'=>$filenamePdf,
            'rating'=>$request->rating,

        );
        $this->product->whereId($request->hidden_id)->update($form_data);
        return response()->json(['success'=>'Book has been updated Successfully']);


       
    }

    public function delete($id)
    {
        $data = $this->product->findOrFail($id);
        Storage::delete('images/books/'.$data->image);
        Storage::delete('pdf/books/'.$data->pdf);
        $data->delete();
        return response()->json(['success'=>'Book has been deleted successfully']);
    }

}
