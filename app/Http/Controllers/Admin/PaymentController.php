<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Front\Payment;
use App\Front\Billing;
class PaymentController extends Controller
{
	public function index()
	{
		 $paymentDetails =\DB::table('billings')
         ->leftJoin('payments', 'billings.id', '=', 'payments.bill_id')
         ->get();
		return view('admin.payment.index',compact('paymentDetails'));
	}
}