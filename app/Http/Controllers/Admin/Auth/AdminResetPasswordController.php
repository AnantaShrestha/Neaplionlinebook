<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Admin\Admin;
use App\PasswordReset;

class AdminResetPasswordController extends Controller
{
    //
     public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function showEmailForm()
    {
    	return view('admin.auth.email');
    }
     public function sendresetEmail(Request $request)
    {
    	$rules=array('email'=>'required');
    	$request->validate($rules);
    	$data=$request->all();
    	$countUser=Admin::where('email',$data['email'])->count();
    	if($countUser>0)
    	{
    		//$users=User::whereEmail('email',$data->email)->first();
    		$ifexists = PasswordReset::where('email',$request->email)->count();
    
            if($ifexists > 0){
                PasswordReset::where('email',$request->email)->delete();
            }
    		PasswordReset::insert(['token'=>$data['_token'],'email'=>$data['email']]);
    		$url= url('/').'/admin/password/reset/'.$data['_token'].'/'.$data['email'];
    		$email=$data['email'];
    		$messageData=[
	          'email'=>$data['email'],
	          'token'=>$data['_token'],
	          'url' =>$url,        
	      ];
	        Mail::send('admin.auth.resetemail',$messageData,function($message)use($email){
	            $message->to($email)->subject("Password Reset");
	        });
	        return redirect()->back()->with('message','We have send you password reset link');
    		
    	}
    	else
    	{
    		return redirect()->back()->with('errormessage','Admin does not exits in our record');
    	}

    }
    public function showresetLink($token,$email)
    {
    	$check=PasswordReset::where(['token'=>$token,'email'=>$email])->count();
    	if($check>0)
    	{
    		$reset=PasswordReset::where(['token'=>$token,'email'=>$email])->first();
    		$token=$reset->token;
    		$email=$reset->email;
    		return view('admin.auth.reset',compact('token','email'));
    	}
    	else
    	{
    		return view('front.error.404');
    	}
    }
    public function reset(Request $request)
    {
    	$rules=array('password'=>'required','password_confirmation'=>'required|same:password');
    	$request->validate($rules);
    	$password = bcrypt($request->password);
        Admin::where('email',$request->email)->update(['password'=>$password]);
        PasswordReset::where(['token'=>$request->token,'email'=>$request->email])->delete();
         return redirect(route('admin.admin-login'))->with('message','Password changed successfully');

    }
     protected function guard()
    {
        return Auth::guard('admin');
    }
}
