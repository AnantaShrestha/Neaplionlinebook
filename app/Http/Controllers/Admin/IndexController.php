<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Product;
use App\Admin\Admin;
use App\Front\User;
use App\Admin\Uniquevisitor;
use Validator;
use Carbon\Carbon;
use Auth;
use Hash;
class IndexController extends Controller
{
    //
    public function index()
    { 
        
    	$countUser=User::count();
        $countProduct=Product::count();
        $countUnique=Uniquevisitor::count();
    	return view('admin.home',compact('countUser','countProduct','countUnique'));
    }
    public function changePassword(Request $request)
    {
        $rules = array(
                'current_password'=>'required',
                'new_password' =>'required',
                'confirm_password' => 'required|same:new_password'
        );
        $error = Validator::make($request->all(), $rules);
        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        $users=Admin::where(['id'=>Auth::user()->id])->first();
        $current_password=$request->current_password;
        if(Hash::check($current_password,$users->password))
        {
            $new_password=bcrypt($request->new_password);
            Admin::where('id',Auth::user()->id)->update(['password'=>$new_password]);
            return response()->json(['success' =>'Password Changed Successfuly']);
        }
        else
        {
            return response()->json(['failed' =>'Incorrect Current Password']);
        }

    }

        function backup()
        {
                $rules = array(
                'current_password'=>'required',
                'new_password' =>'required',
                'confirm_password' => 'required|same:new_password'
            );
            $error = Validator::make($request->all(), $rules);
            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }
            $users=Admin::where(['id'=>Auth::user()->id])->pluck('password');

            $current_password=$request->current_password;
            if(Hash::check($current_password,$users))
            {
                $new_password=bcrypt($request->new_password);
                Admin::where('id',Auth::user()->id)->update(['password'=>$new_password]);
                return response()->json(['success' =>'Password Changed Successfuly']);
            }
            else
            {
                return response()->json(['failed' =>'Incorrect Current Password']);
            }
        }

        public function customer()
        {
            $users=User::orderBy('created_at','asc')->get();
            return view('admin.customer.index',compact('users'));
        }

       

}
