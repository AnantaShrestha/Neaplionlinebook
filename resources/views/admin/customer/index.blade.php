@extends('admin.layouts.default')
@section('page_title','Customer Details')
@section('content')
<div class="row">
        <div class="col-12">
        
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Customer Details</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="customer_table" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Full Name</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Phone Number</th>
                  <th>Register On</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->address}}</td>
                        <td>{{$user->phone_no}}</td>
                        <td>{{date('Y-F-d-D ', strtotime($user->created_at))}}</td>

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


