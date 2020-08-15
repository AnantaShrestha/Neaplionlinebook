<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use App\Front\Cart;
use App\Admin\Product;
use App\Front\Billing;
use App\Front\Payment;
use Auth;
use Crypt;
class CartController extends Controller
{
    //
    public function __construct(Cart $cart,Product $products)
    {
    	$this->cart=$cart;
    	$this->product=$products;
    }
    public function cart()
    {
    	$carts=$this->getUserCart()->get();
    	return view('front.users.cart',compact('carts'));
    }
    public function cartStore(Request $request)
    {
    	$countProduct=$this->getUserCart()->where(['product_id'=>$request->product_id,'user_id'=>Auth::user()->id])->count();
    	if($countProduct>0)
    	{
    		return redirect()->back()->with('errormessage','Book already exist in cart');
    	}
    	$form_data=array(
    		'product_id'=>$request->product_id,
    		'user_id' =>$request->user_id,
    	);
    	$this->cart->create($form_data);
    	return redirect('cart')->with('message','Book added successfully in cart');
    }
    public function delete($id)
    {
    	try
    	{
    		$id = Crypt::decrypt($id);
    		$cart=$this->cart->find($id);
    		$cart->delete();
    		return redirect()->back()->with('message','Book has been deleted from your cart');
    	}
    	catch (DecryptException $e) 
		{
		    return view('front.error.404');
		}
    }

    public function checkout()
    {
        $carts=$this->getUserCart()->get();
        return view('front.users.checkout',compact('carts'));
    }



    public function checkoutProcess(Request $request){
        $data = $request->all();

        //khalti
        if($data['hub'] === 'khalti'){
            $url = "https://khalti.com/api/v2/payment/verify/";
            $data = http_build_query(array(
                'token' => $request['token'],
                'amount'  => $request['amount']
            ));

            # Make the call using API.
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS,$data);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            
            $headers = ['Authorization:'.config('services.khalti.public_key')];
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            // Response
            $response = curl_exec($curl);
            $status_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            curl_close($curl);
        }
        
        //esewa
        if((isset($data['q']) && $data['q']==='su' )||($data['hub']==='esewa') ) {
            // $url = "https://uat.esewa.com.np/epay/transrec";
            // $data =[
            //     'amt'=> $data['amt'], //total payement amount of product or service
            //     'rid'=> $data['refId'], //A unique payment reference code from eSewa generated on SUCCESSFUL transaction
            //     'pid'=> $data['oid'], //Merchant code provided by eSewa
            //     'scd'=> 'epay_payment' //Merchant code provided by eSewa
            // ];
            // // ?q=su&oid=ee2c3ca1-696b-4cc5-a6be-2c40d929d453&amt=100&refId=000AE01
            
            // $curl = curl_init($url);
            // curl_setopt($curl, CURLOPT_URL, $url);
            // curl_setopt($curl, CURLOPT_POST, true);
            // curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        
            // $response = curl_exec($curl);
            // $status_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            // curl_close($curl);
        }
    
        if($data['hub']==='cellpay'){
            // cellpay doesnot have payment varification service
//             "refId" => "125433"
//   "status" => "SUCCESS"
//   "invoice_no" => "5f34356b0be8e"
//   "amount" => "500"
//   "net_amount" => "495"
//   "hub" => "cellpay"
// ]

        }

        $insertBill = [];
        $insertBill['bill_no'] = date('Y-m-d').'-'.rand().'-'.$data['invoice_no'];
        $insertBill['ref_id'] = $data['refId'];
        $insertBill['hub']=$data['hub'];
        $insertBill['amount']=$data['amount'];
        $insertBill['net_price']=$data['net_amount'];
        $insertBill['status'] =$data['status'];
        $insertBill['vat_price']='0';
        $insertBill['e_d_charge']='0';
        $insertBill['service_charge']='0';
        $insertBill['delivery_charge']='0';
        $insertBill['taxable_amount']='0';
        $insertBill['user_id']=$data['invoice_no'];
        $insertBill['gross_total']=$data['net_amount'];
        $billing=(new Billing)->create($insertBill);
       
        if($billing->status='SUCCESS')
        {
            $userCart=$this->cart->with('cartProduct')->where(['user_id'=>$data['invoice_no']])->get();
            $product_id=[];
            foreach($userCart as $productId)
            {
                array_push($product_id,$productId->product_id);
            }
            $strProductId=implode(',',$product_id);
            $insertPayment=[];
            $insertPayment['user_id']=$data['invoice_no'];
            $insertPayment['bill_id']=$billing->id;
            $insertPayment['product_id']=$strProductId;
            $insertPayment['status']='SUCCESS';
            (new Payment)->create($insertPayment);
            foreach($userCart as $deleteCart)
            {
                $cart=$this->cart->find($deleteCart->id);
                $cart->delete();
            }
        }
        return redirect('/')->with('message','Your payment has been successfully accepted from'.$data['hub'].'please login to get access');

    }

    public function paymentFailure(Request $request){
        //show error message to the same page 
        return back()->with('message')->with('errormessage','Transaction Failed');
    }

    protected function getUserCart()
    {
        return $this->cart->with('cartProduct')->where('user_id',Auth::user()->id);
    }


   
}