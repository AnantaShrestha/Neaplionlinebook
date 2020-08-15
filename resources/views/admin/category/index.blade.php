@extends('admin.layouts.default')
@section('page_title','Category Details')
@section('content')
<div class="row">
        <div class="col-12">
        
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Category Details</h3>
              <button type="button" style="float:right;margin-left:5px" class="btn btn-success" id="create_record">Add Category</button>
              <a style="float:right" class="btn btn-warning" href="{{route('admin.sortingCategory')}}">Sorting Category</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="category_table" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Category Name</th>
                  <th>Category Slug</th>
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
@include('admin.category.create-edit')
@endsection
@section('script')
<script type="text/javascript">
	$(document).ready(function(){

		$('#category_table').DataTable(
    	{
    		processing: true,
    		serverside: true,
    		ajax: '{!! route('admin.categoryDetails') !!}',
    		columns: [
    			{ data: 'name', name:'name' },
    			{ data: 'slug', name: 'slug' },
    			{ data: 'status', name:'status',orderable:false,searchable: false},
    			{ data: 'action', name: 'action',searchable: false}
    			
    			
    		]
   		});
		$('#create_record').click(function(){
			$('#form_result').html('');
	        $('#form_result').hide();
			$('#submit_data')[0].reset();
			$('.modal-title').text('Add Category');
			$('#action').val('Add');
			$('#action_button').val('Add');
			$('#form_result').html('');
			$('#categoryModal').modal('show');


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
		$.ajax({
			url:"{{url('admin/editCategory')}}"+'/'+id,
			dataType:"json",
			success:function(html)
			{
				$('#form_result').html('');
	        	$('#form_result').hide();
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
				$('.modal-title').text('Edit Category');
				$('#action_button').val('Edit');
				$('#action').val('Edit');
				$('#categoryModal').modal('show');

			}
		})
	});
</script>

@endsection
