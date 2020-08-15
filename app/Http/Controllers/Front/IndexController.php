<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Controllers\getController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Admin\Product;
use App\Admin\Slider;
use App\Admin\Blog;
use App\Front\Cart;
use Auth;
use App\User;
use App\Front\Payment;
use App\Front\Billing;
use Hash;
class IndexController extends Controller
{
    //
    public function __construct(Product $product,Slider $slider,Blog $blog,User $user)
    {
    	$this->product=$product;
        $this->slider=$slider;
        $this->blog=$blog;
        $this->user=$user;
    }


    public function index()
    {
    	$productlist=$this->product->where('status',1)->paginate(12);
        $sliders=$this->slider->where('status',1)->get();
        $blogs=$this->blog->orderBy('created_at','DESC')->get();
        return view('front.index',compact('productlist','sliders','blogs'));
    }
    public function dashboard()
    {
        $cart=Cart::where('user_id',Auth::user()->id)->count();
        $paymentBook=Payment::where('user_id',Auth::user()->id)->get();
        $productArr=[];
        foreach($paymentBook as $payment)
        {

            $productId=explode(',',$payment->product_id);

            foreach($productId as $id)
            {
                array_push($productArr,$id);
            }
        }
        return view('front.users.userdashboard',compact('cart','productArr'));
    }
    

    public function contact()
    {
        return view('front.contact');
    }
    public function inquery(Request $request)
    {
        $data=$request->all();
        $email = "nepalionlinebook.com";
        $messageData=[
          'name'=>$data['name'],
          'phone'=>$data['phone_no'],
          'email'=>$data['email'],
          'subject'=>$data['subject'],
          'comment' =>$data['comment']
      ];
      Mail::send('front.emails.contact_inquery',$messageData,function($message)use($email){
        $message->to($email)->subject("Enquiry from Customer");
    });
      return redirect(route('contact'))->with('message','Thanks for inquiry.We will contact you soon as possible !!');
  }   

  public function currency()
  {
    return view('front.currency');
}
public function rasi()
{
    return view('front.rasifall');
}
public function goldsliver()
{
    return view('front.goldsilver');
}

public function about()
{
    return view('front.about');
}
public function radio()
{
        /*$ch=curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://www.liveonlineradio.net/nepali/radio-nepal.htm");
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response=curl_exec($ch);
        curl_close($ch);*/
        return view('front.hamroradio');
    }

    

    public function account()
    {
        return view('front.users.account');
    }
    public function paymentDetails()
    {
        $billingDetails=Billing::where('user_id',Auth::user()->id)->get();
        $paymentProduct=Payment::where('user_id',Auth::user()->id)->pluck('product_id');
        return view('front.users.paymentDetails',compact('billingDetails','paymentProduct'));
    }
    public function changePassword(Request $request)
    {
        $v=array(
            'current_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => "required|same:new_password"
        );
        $request->validate($v);
        $check_password = $this->user->where(['email' => Auth::User()->email])->first();
        $current_password =  $request->current_password;
        if(Hash::check($current_password,$check_password->password))
        {
            $password = bcrypt($request->new_password);
            $this->user->where('id',Auth::user()->id)->update(['password'=>$password]);
            return redirect('accountDetails')->with('message','Password changed successfully');
        }
        else
        {
         return redirect('accountDetails')->with('message','Incorrect Current Password');
     }
 }

 


}
