@extends('admin.layouts.default')
@section('page_title','News Details')
@section('content')
<div class="row">
        <div class="col-12">
        
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">News Details</h3>
             <button type="button" style="float:right;margin-left:10px" class="btn btn-primary" id="breaking_news">Breaking News</button>
              <button  type="button" style="float:right" class="btn btn-success" id="create_record">Add News</button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="news_table" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Title</th>
                  <th>
                    <select name="selectCategory" class="form-control" id="selectCategory">
                        <option value="All" selected>All</option>
                        @foreach($newscategories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                  </th>
                  <th style="width:100px">Date</th>
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
@include('admin.news.create-edit')
@endsection
@section('script')
<script type="text/javascript">
	$(document).ready(function(){
    var url="{!! route('admin.newsDetails') !!}";
    datatable(url);
    $('#selectCategory').on('change',function(){
      var selectType=$(this).val();
      url="{!! route('admin.newsDetails') !!}"+'/'+selectType;
      datatable(url);
      $('#news_table').DataTable().ajax.reload();

    });
		function datatable(url)
    {
        $('#news_table').DataTable(
        {
          processing: true,
          serverside: true,
          destroy:true,
          ajax: url,
          columns: [
            { data: 'title', name:'name' },
            { data: 'underCategory', name: 'underCategory',orderable:false},
            { data: 'date' , name:'date' },
            { data: 'status', name:'status',orderable:false},
            { data: 'image', name:'image',orderable:false},
            { data: 'action', name: 'action',searchable: false,orderable:false}
            
            
          ]
        });
    }

		$('#create_record').click(function(){
      $('#form_result').html('');
          $('#form_result').hide();
			$('#submit_data')[0].reset();
			$('.modal-title').text('Add News');
			$('#action').val('Add');
			$('#action_button').val('Add');
			$('#storeImage').html('');
			$('#form_result').html('');
			$('#newsModal').modal('show');
		});
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
      url:"{{url('admin/editNews')}}"+'/'+id,
      dataType:"json",
      success:function(html)
      {
        $('#news_title').val(html.data.title);
        $('#date').val(html.data.date);
        $('#description').val(html.data.description);
        $('#storeImage').html("<img src={{ URL::to('/') }}/images/news/" + html.data.image + " width='30px' class='img-thumbnail' />");
          $('#storeImage').append("<input type='hidden' name='hidden_image' value='"+html.data.image+"' />");
    
        if(html.data.status==1)
        {
          $('#status').prop("checked",true);
        }
        else
        {
          $('#status').prop("checked",false);

        }
        if(html.data.hotnews==1)
        {
          $('#hotnews').prop("checked",true);
        }
        else
        {
          $('#hotnews').prop("checked",false);

        }
        
        $('[name=newscategory] option').filter(function() { 
            return ($(this).val() == html.data.newscategory_id); //To select
        }).prop('selected', true);
        $('#hidden_id').val(html.data.id);
        $('.modal-title').text('Edit News');
        $('#action_button').val('Edit');
        $('#action').val('Edit');
        $('#newsModal').modal('show');

      }
    })
  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $('#breaking_news').on('click',function(){
       $('#breaking_result').html('');
         var id =1;
         $.ajax({

            url:"{{url('admin/breakingNews')}}"+'/'+id,
            dataType:"json",
            success:function(html)
            {
              $('#breaking_id').val(html.data.id);
              $('#breaking').val(html.data.news);
              $('#breakingnewsModal').modal('show');
            }

         });
         

    });
    $('#breaking_form').on('submit',function(){
      event.preventDefault();
        $.ajax({
            url:"{{route('updateBreaking')}}",
            method:"POST",
            data:new FormData(this),
            contentType:false,
            cache:false,
            processData:false,
            dataType:"json",
            beforeSend:function(){
              $('#breaking_action').val('Updating...');
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
                $('#breaking_result').html(html);

              }
              if(data.success)
              {
                toastr.success(data.success);
                $('#breaking_form')[0].reset();
                $('#breaking_result').html('');
              }
              $('#breaking_action').val('Update');
            }
        })
    });
  });
</script>
@endsection
