@extends('admin.layouts.default')
@section('page_title','Payment Details')
@section('content')
<div class="row">
  <div class="col-12">

    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Payment Details</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="customer_table" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>S.No</th>
              <th>Bill No</th>
              <th>Payment Hub</th>
              <th>Product Name</th>
              <th>Amount</th>
              <th>Charged Price</th>
              <th>User Email</th>

            </tr>
          </thead>
          <tbody>
            @php $count=1; @endphp
            @foreach($paymentDetails as $payment)
            <tr>
              <td>{{$count++}}</td>
              <td>{{$payment->bill_no}}</td>
              <td>{{$payment->hub}}</td>
              <td>@php
                $productName=[];
                  $productId=explode(',',$payment->product_id);
                  foreach($productId as $id)
                  {
                    $product_name=App\Admin\Product::select('name')->where('id',$id)->first();
                    array_push($productName,$product_name->name);
                  }
                 
              @endphp {{implode(',',$productName)}}</td>
              <td>Rs.{{$payment->amount}}</td>
              <td>{{$payment->net_price}}</td>
              <td>@php $userEmail=App\Front\User::select('email')->where('id',$payment->user_id)->first(); @endphp {{$userEmail->email}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script>
  $('#customer_table').DataTable();
</script>
@endsection


