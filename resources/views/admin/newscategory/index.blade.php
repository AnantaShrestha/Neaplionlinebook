@extends('admin.layouts.default')
@section('page_title','Newscategory Details')
@section('content')
<div class="row">
        <div class="col-12">
        
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">News Category Details</h3>
              <button type="button" style="float:right;margin-left:5px" class="btn btn-success" id="create_record">Add News Category</button>
              <a style="float:right" class="btn btn-warning" href="{{route('admin.sortingNewscategory')}}">Sorting Category</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="newscategory_table" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>News Category Name</th>
                  <th>News Category Slug</th>
                  <th>Status</th>
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
@include('admin.newscategory.create-edit')
@endsection
@section('script')
<script type="text/javascript">
	$(document).ready(function(){

		$('#newscategory_table').DataTable(
    	{
    		processing: true,
    		serverside: true,
    		ajax: '{!! route('admin.newscategoryDetails') !!}',
    		columns: [
    			{ data: 'name', name:'name' },
    			{ data: 'slug', name: 'slug' },
    			{ data: 'status', name:'status'},
    			{ data: 'action', name: 'action',searchable: false}
    			
    			
    		]
   		});
		$('#create_record').click(function(){
			$('#form_result').html('');
	        $('#form_result').hide();
			$('#submit_data')[0].reset();
			$('.modal-title').text('Add News Category');
			$('#action').val('Add');
			$('#action_button').val('Add');
			$('#form_result').html('');
			$('#newscategoryModal').modal('show');


		});
		$('#name').keyup(function(){
			$newscategory_name=$("#name").val()
			$("#slug").val($newscategory_name.replace(/\s+/g, '_'));
		})
	});
</script>


<script src="{{asset('admin/create-edit.js')}}"></script>

<script type="text/javascript">
	$(document).on('click','.edit',function(){
		var id = $(this).attr('id');
		$('#form_result').html('');
	        $('#form_result').hide();
		$('#form_result').html('');
		$.ajax({
			url:"{{url('admin/editnewsCategory')}}"+'/'+id,
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
				$('.modal-title').text('Edit News Category');
				$('#action_button').val('Edit');
				$('#action').val('Edit');
				$('#newscategoryModal').modal('show');

			}
		})
	});
</script>

@endsection
