@extends('admin.layouts.default')
@section('page_title','Site Setting')
@section('content')
@include('message')
<form method="post" action='{{route("admin.sitesettingUpdate")}}' enctype="multipart/form-data">
	@csrf
<div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Contact Info & Logo</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             
                <div class="card-body">
                  <div class="form-group">
                    <label for="contact">Contact No</label>
                    <input type="text" name="contact" class="form-control" id="contact" value="{{$sitesetting->contact}}">
                  </div>
                  <div class="form-group">
                    <label for="constact">Email</label>
                    <input type="email"name="email" class="form-control" id="email" value="{{$sitesetting->email}}" >
                  </div>
                   <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text"name="address" class="form-control" id="address" value="{{$sitesetting->address}}">
                  </div>
                
                  <div class="form-group">
                    <label for="exampleInputFile">Logo <span id="storeImage"><img src="{{asset('images/logo/'.$sitesetting->logo)}}" style="width:40px"></span></label>
                    <input type="file" name="logo" id="logo" class="form-control">
                    <input type="hidden" name="hidden_logo" value="{{$sitesetting->logo}}">

                  </div>
                 
                </div>
                <!-- /.card-body -->

                
         
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
</div>
<div class="row">
          <!-- left column -->
    <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Us</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             
                <div class="card-body">
                  <div class="form-group">
                    	<textarea class='form-control' name="about" id="about" rows="25">{{$sitesetting->about}}</textarea>
                    
                  </div>
              
                 
                </div>
                <!-- /.card-body -->

                
         
            </div>
            <!-- /.card -->

    </div>
          <!--/.col (left) -->
</div>
<div class="row">
          <!-- left column -->
    <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">What We Do</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             
                <div class="card-body">
                  <div class="form-group">
                    	<textarea class='form-control' name="what" id="what" rows="12">{{$sitesetting->what}}</textarea>
                  </div>
              
                 
                </div>
                <!-- /.card-body -->

                
         
            </div>
            <!-- /.card -->

     </div>
          <!--/.col (left) -->
</div>
<div class="row">
          <!-- left column -->
    <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Mission</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             
                <div class="card-body">
                  <div class="form-group">
                    	<textarea class='form-control' name="mission" id="mission" rows="12">{{$sitesetting->mission}}</textarea>
                  </div>
              
                 
                </div>
                <!-- /.card-body -->

                
         
            </div>
            <!-- /.card -->

     </div>
          <!--/.col (left) -->
</div>

<div class="row">
          <!-- left column -->
    <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Vision</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             
                <div class="card-body">
                  <div class="form-group">
                    	<textarea class='form-control' name="vision" id="vision" rows="12">{{$sitesetting->visioni}}</textarea>
                  </div>
              
                 
                </div>
                <!-- /.card-body -->

                
         
            </div>
            <!-- /.card -->

     </div>
          <!--/.col (left) -->
</div>
<div class="button" style="margin:30px 0">
	<input type="submit" name="Update" value="Update" class="btn btn-success">
</div>
</form>
@endsection