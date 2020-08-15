@extends('admin.layouts.default')
@section('page_title','Advertisement Details')
@section('content')
<div class="row">
        <div class="col-12">
        
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Advertisement Details</h3>
              <button type="button" style="float:right" class="btn btn-success" id="create_record">Add Advertisement</button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="advertisement_table" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Title</th>
                  <th>Image</th>
                  <th>Status</th>
                  <th>Page</th>
                  <th>Action</th>
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
@include('admin.advertisement.create-edit')
@endsection
@section('script')
<script>
	$(document).ready(function(){
	 $('#advertisement_table').DataTable(
	      {
	        processing: true,
	        serverside: true,
	        ajax: '{!! route('admin.advertisementDetails') !!}',
	        columns: [
	          { data: 'title', name:'title'},
	          { data: 'image', name: 'image',orderable:false,searchable: false },
	          { data: 'status', name:'status',orderable:false},
	          { data: 'page', name:'page'},
	          { data: 'action', name: 'action',searchable: false}
	          
	          
	        ]
      	});
		$('#create_record').click(function(){
      $('#form_result').html('');
          $('#form_result').hide();
				$('#submit_data')[0].reset();
				$('.modal-title').text('Add Advertisement');
				$('#action').val('Add');
				$('#action_button').val('Add');
				$('#form_result').html('');
				$('#advertisementModal').modal('show');
		});
	});
</script>
<script src="{{asset('admin/create-edit.js')}}"></script>
<script type="text/javascript">
  $(document).on('click','.edit',function(){
    var id = $(this).attr('id');
    $('#form_result').html('');
    $.ajax({
      url:"{{url('admin/editAdvertisement')}}"+'/'+id,
      dataType:"json",
      success:function(html)
      {
        $('#title').val(html.data.title);
        $('#storeImage').html("<img src={{ URL::to('/') }}/images/advertisement/" + html.data.image + " width='30px' class='img-thumbnail' />");
          $('#storeImage').append("<input type='hidden' name='hidden_image' value='"+html.data.image+"' />");
    
        if(html.data.status==1)
        {
          $('#status').prop("checked",true);
        }
        else
        {
          $('#status').prop("checked",false);

        }
        $('[name=page] option').filter(function() { 
            return ($(this).val() == html.data.page); //To select
        }).prop('selected', true);
        $('#hidden_id').val(html.data.id);
        $('.modal-title').text('Edit Advertisement');
        $('#action_button').val('Edit');
        $('#action').val('Edit');
        $('#advertisementModal').modal('show');

      }
    })
  });
</script>
@endsection