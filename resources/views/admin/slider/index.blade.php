@extends('admin.layouts.default')
@section('page_title','Slider Details')
@section('content')
<div class="row">
        <div class="col-12">
        
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Slider Details</h3>
              <button type="button" style="float:right" class="btn btn-success" id="create_record">Add Slider</button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="slider_table" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Title</th>
                  <th>Status</th>
                  <th>Image</th>
                  <th>Description</th>
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
@include('admin.slider.create-edit')
@endsection

@section('script')
<script type="text/javascript">
$(document).ready(function(){
	$('#slider_table').DataTable({
    		processing: true,
    		serverside: true,
    		ajax: '{!! route('admin.sliderDetails') !!}',
    		columns: [
    			{ data: 'title', name:'name' },
    			{ data: 'status', name:'status'},
    			{ data: 'image', name:'image' },
    			{ data: 'description', name:'description'},
    			{ data: 'action', name: 'action',searchable: false}
    			
    			
    		]
   	});

   	$('#create_record').click(function(){
      $('#form_result').html('');
          $('#form_result').hide();
   		$('#submit_data')[0].reset();
		$('.modal-title').text('Add Slider');
		$('#action').val('Add');
		$('#action_button').val('Add');
		$('#form_result').html('');
		$('#sliderModal').modal('show');
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
      url:"{{url('admin/editSlider')}}"+'/'+id,
      dataType:"json",
      success:function(html)
      {
        $('#title').val(html.data.title);
        $('#description').val(html.data.description);
        $('#storeImage').html("<img src={{ URL::to('/') }}/images/slider/" + html.data.image + " width='30px' class='img-thumbnail' />");
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
        $('.modal-title').text('Edit Slider');
        $('#action_button').val('Edit');
        $('#action').val('Edit');
        $('#sliderModal').modal('show');

      }
    })
  });

</script>
@endsection