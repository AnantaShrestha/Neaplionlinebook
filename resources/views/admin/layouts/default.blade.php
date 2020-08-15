<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Nepali Online Book</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
 
  <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}">

  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <link rel="stylesheet" href="{{asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/dist/css/adminlte.min.css')}}">

  <link rel="stylesheet" href="{{asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/summernote/summernote-bs4.css')}}">

  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">

    <link rel="stylesheet" href="{{asset('admin/plugins/toastr/toastr.min.css')}}">
  @section('headlink')
  @show
<script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('admin/plugins/jquery-ui/jquery-ui.min.js')}}"></script>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <style type="text/css">
    .card-title {
  line-height:40px !important;
}
.content-wrapper>.content {
    display: block !important;
    overflow: hidden !important;
  }
  #category-ul
  {
    padding:0px;
  }
  .list-group-item
  {
    display:block;
    list-style:none;
    background:#fafafa;
    color:#1d1d1d;
    padding:10px 20px;
    cursor: move;
    margin-bottom:5px;
  }
  </style>
  @include('admin.layouts.header')
  @include('admin.layouts.sidebar')
  @include('admin.auth.changepassword')
  <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
         <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">@yield('page_title')</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">@yield('page_title')</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
        @yield('content')
      </div>
    </section>
  
  </div>

 @include('admin.layouts.footer')


  <aside class="control-sidebar control-sidebar-dark">

  </aside>

</div>

<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('admin/plugins/jquery-knob/jquery.knob.min.js')}}"></script>

<script src="{{asset('admin/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('admin/plugins/daterangepicker/daterangepicker.js')}}"></script>

<script src="{{asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>

<script src="{{asset('admin/plugins/summernote/summernote-bs4.min.js')}}"></script>

<script src="{{asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>

<script src="{{asset('admin/dist/js/adminlte.min.js')}}"></script>

<script src="{{asset('admin/dist/js/pages/dashboard.js')}}"></script>

<script src="{{asset('admin/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{asset('admin/plugins/toastr/toastr.min.js')}}"></script>
@section('script')
@show

<script type="text/javascript">
  $(document).ready(function(){
    $('#password').on('click',function(){
        $('#change_submit')[0].reset();
        $('#changing_error').html('');
        $('#changePass').val('Change Password');
        $('#passwordModal').modal('show');
    });
    $('#change_submit').on('submit',function(){
      event.preventDefault();
      $.ajax({
        url:"{{route('admin.changePassword')}}",
        method:"POST",
        data:new FormData(this),
        contentType:false,
        cache:false,
        processData:false,
        dataType:"json",
        beforeSend:function(){
          $('#changePass').val('Updating...');
        },
        success:function(data)
        {
          var html='';
          if(data.errors)
          {
            html='<div class="alert alert-danger">';
            for(var count=0; count < data.errors.length; count++)
            {
              html+='<p style="margin:0px">' + data.errors[count] + '</p>';
            }
            html += '</div>';
            $('#changing_error').html(html);

          }
          if(data.success)
          {
            toastr.success(data.success);
            $('#change_submit')[0].reset();
            $('#changing_error').html('');

          }
          if(data.failed)
          {
            toastr.error(data.failed);
            $('#changing_error').html('');

            
          }
          $('#changePass').val('Change Password');

        }
      });

    });
  });
</script>
</body>
</html>
