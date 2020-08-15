<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Audio;
use App\Admin\Audiocategory;
use Yajra\Datatables\Datatables;
use Validator;
use Storage;
use Response;
class AudioController extends Controller
{
    //
    public function __construct(Audio $audio,Audiocategory $audiocategory)
    {
    	$this->audio=$audio;
    	$this->audiocategory=$audiocategory;

    }
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $audio=$this->audio->all();
             return Datatables::of($audio)
            ->addColumn('underCategory',function($audio){
                $audiocategory=$this->audiocategory->find($audio->audiocategory_id);
                return $audiocategory->name;
            })

            ->addColumn('status', function($audio){
                if($audio->status==1)
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
            ->addColumn('audio', function($audio){
                return '
                <audio controls>
                      <source src="'.asset("audio/".$audio->audio).'" type="audio/mp3">
                </audio>';
            })
            ->addColumn('action', function ($audio) {

                $button = '<button type="button" name="edit" id="'.$audio->id.'" class="edit btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="delete" url="'.url('admin/deleteAudio').'" id="'.$audio->id.'" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>';
                 $button .= '&nbsp;&nbsp;';
                
                return $button;
                   
            })
            ->rawColumns(['action' => 'action','status'=>'status','underCategory'=>'underCategory','audio'=>'audio'])
            ->make(true);

        }
    	$audiocategory=$this->audiocategory->all();
    	return view('admin.audio.index',compact('audiocategory'));
    }
   public function store(Request  $request)
   {
   		$rules = array(
            'title'=>'required|unique:audio',
            'audio_category'=>'required',
            'audio' =>'required|file|mimes:audio/mpeg,mpga,mp3,wav,aac|max:10000000'
        );
        $error = Validator::make($request->all(), $rules);
        if($error->fails())
        {
            return Response::json(array('errors' => $error->getMessageBag()->toArray()));
            
        }
         $audio=$request->file('audio');
         $size=$request->file('audio')->getSize();
         $extension=$audio->getClientOriginalExtension();
         $filename= rand().'.'.$extension;
         $audio_path= 'audio/';
         $audio->move($audio_path,$filename);
        

         $form_data=array(
            'title'=>$request->title,
            'audiocategory_id'=>$request->audio_category,
            'status'=>isset($request->status) ? 1 : 0,
            'audio'=>$filename
         );
         $this->audio->create($form_data);
         return response()->json(['success'=>'Audio added successfully']);
         
   }

   public function edit(Request $request,$id)
   {
        if($request->ajax())
        {
            $data=$this->audio->find($id);
            return response()->json(['data' => $data]);

        }
   }
   public function update(Request $request)
   {    
        $rules = array(
            'title'=>'required',
            'audio_category'=>'required',
            'audio' =>'file|mimes:audio/mpeg,mpga,mp3,wav,aac|max:10000000'
        );
        $error = Validator::make($request->all(), $rules);
        if($error->fails())
        {
            return Response::json(array('errors' => $error->getMessageBag()->toArray()));
        }
        $audio=$request->file('audio');
        if($audio!='')
        {   
             $size=$audio->getSize();
             $extension=$audio->getClientOriginalExtension();
             $filename= rand().'.'.$extension;
             $audio_path= 'audio/';
             $audio->move($audio_path,$filename);
             Storage::delete('audio/'.$request->hidden_audio);
        }
        else
        {
            $filename=$request->hidden_audio;
        }
        $form_data=array(
            'title'=>$request->title,
            'audiocategory_id'=>$request->audio_category,
            'status'=>isset($request->status) ? 1 : 0,
            'audio'=>$filename,
        );
        $this->audio->whereId($request->hidden_id)->update($form_data);
        return response()->json(['success'=>'Audio has been updated Successfully']);
   }

   public function delete($id=null)
   {
        $data=$this->audio->find($id);
        Storage::delete('audio/'.$data->audio);
        $data->delete();
        return response()->json(['success'=>'Audio deleted successfully']);
   }


}
