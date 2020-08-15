@extends('admin.layouts.default')
@section('page_title','News Details')
@section('content')
<div class="row">
        <div class="col-12">
        
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Blog Details</h3>
              <button type="button" style="float:right" class="btn btn-success" id="create_record">Add Blog</button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="blog_table" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Title</th>
                  <th>Author</th>
                  <th>Created On</th>
                  <th>Status</th>
                  <th>Image</th>
                  <th style="width:100px">Action</th>
                </tr>
                </thead>
              
          
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
</div>
@include('admin.blog.create-edit')
@endsection
@section('script')
<script type="text/javascript">
	$(document).ready(function(){
		
		$('#blog_table').DataTable(
    	{
    		processing: true,
    		serverside: true,
    		ajax: '{!! route('admin.blogDetails') !!}',
    		columns: [
    			{ data: 'title', name:'name' },
    			{ data: 'author' , name:'author' },
    			{ data: 'created_at', name:'created_at'},
    			{ data: 'status', name:'status',orderable:false,searchable: false},
    			{ data: 'image', name:'image',orderable:false,searchable: false},
    			{ data: 'action', name: 'action',searchable: false}
    			
    			
    		]
   		});
		$('#create_record').click(function(){
      $('#form_result').html('');
          $('#form_result').hide();
			$('#submit_data')[0].reset();
			$('.modal-title').text('Add Blog');
			$('#action').val('Add');
			$('#action_button').val('Add');
			$('#storeImage').html('');
			$('#form_result').html('');
			$('#blogModal').modal('show');
		});
	});
</script>
<script src="{{asset('admin/create-edit.js')}}"></script>
<script type="text/javascript">
  $(document).on('click','.edit',function(){
    var id = $(this).attr('id');
    $('#form_result').html('');
          $('#form_result').hide();
    $.ajax({
      url:"{{url('admin/editBlog')}}"+'/'+id,
      dataType:"json",
      success:function(html)
      {
        $('#title').val(html.data.title);
        $('#author').val(html.data.author);
        $('#description').val(html.data.description);
        $('#storeImage').html("<img src={{ URL::to('/') }}/images/blog/" + html.data.image + " width='30px' class='img-thumbnail' />");
          $('#storeImage').append("<input type='hidden' name='hidden_image' value='"+html.data.image+"' />");
    
        if(html.data.status==1)
        {
          $('#status').prop("checked",true);
        }
        else
        {
          $('#status').prop("checked",false);

        }
        
        $('#hidden_id').val(html.data.id);
        $('.modal-title').text('Edit News');
        $('#action_button').val('Edit');
        $('#action').val('Edit');
        $('#blogModal').modal('show');

      }
    });
  });
</script>
@endsection
