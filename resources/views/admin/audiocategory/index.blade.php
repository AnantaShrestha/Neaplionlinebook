@extends('admin.layouts.default')
@section('page_title','Audio Category Details')
@section('content')
<div class="row">
        <div class="col-12">
        
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Audio Category Details</h3>
              <button type="button" style="float:right;margin-left:5px" class="btn btn-success" id="create_record">Add Audio Category</button>
              <a style="float:right" href="{{route('admin.sortingAudiocategory')}}" class="btn btn-warning">Sorting Category</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="audiocategory_table" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Audio Category Name</th>
                  <th>Slug</th>
                  <th>Status</th>
                  <th>Created On</th>
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
@include('admin.audiocategory.create-edit')
@endsection
@section('script')
<script type="text/javascript">
	$(document).ready(function(){

		$('#audiocategory_table').DataTable(
    	{
    		processing: true,
    		serverside: true,
    		ajax: '{!! route('admin.audiocategoryDetails') !!}',
    		columns: [
    			{ data: 'name', name:'name' },
    			{ data: 'slug', name: 'slug' },
    			{ data: 'status', name:'status'},
    			{ data:'created_at',name:'created_at'},
    			{ data: 'action', name: 'action',searchable: false}
    			
    			
    		]
   		});
		$('#create_record').click(function(){
			$('#form_result').html('');
	        $('#form_result').hide();
			$('#submit_data')[0].reset();
			$('.modal-title').text('Add Audio Category');
			$('#action').val('Add');
			$('#action_button').val('Add');
			$('#form_result').html('');
			$('#audiocategoryModal').modal('show');


		});
		$('#name').keyup(function(){
			$category_name=$("#name").val()
			$("#slug").val($category_name.replace(/\s+/g, '_'));
		})
	});
</script>
<script src="{{asset('admin/create-edit.js')}}"></script>

<script type="text/javascript">
	$(document).on('click','.edit',function(){
		var id = $(this).attr('id');
		$('#form_result').html('');
	    $('#form_result').hide();
		$.ajax({
			url:"{{url('admin/editaudiocategory')}}"+'/'+id,
			dataType:"json",
			success:function(html)
			{
				$('#name').val(html.data.name);
				$('#slug').val(html.data.slug);
				if(html.data.status==1)
				{
					$('#status').prop("checked",true);
				}
				else
				{
					$('#status').prop("checked",false);

				}
				$('#hidden_id').val(html.data.id);
				$('.modal-title').text('Edit Audio Category');
				$('#action_button').val('Edit');
				$('#action').val('Edit');
				$('#audiocategoryModal').modal('show');

			}
		})
	});
</script>

@endsection
