@extends('admin.layouts.default')
@section('page_title','Audio Details')
@section('content')
<div class="row">
        <div class="col-12">
        
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Audio Details</h3>
              <button type="button" style="float:right" class="btn btn-success" id="create_record">Add Audio</button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="audio_table" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Title</th>
                  <th>Under Category</th>
                  <th>Status</th>
                  <th>Audio</th>
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
@include('admin.audio.create-edit')
@endsection
@section('script')
<script type="text/javascript">
	$(document).ready(function(){

    $('#audio_table').DataTable(
      {
        processing: true,
        serverside: true,
        ajax: '{!! route('admin.audioDetails') !!}',
        columns: [
          { data: 'title', name:'title' },
          { data: 'underCategory', name: 'underCategory' },
          { data: 'status', name:'status',orderable:false,searchable: false},
          { data: 'audio', name:'audio',orderable:false,searchable: false},
          { data: 'action', name: 'action',searchable: false}
          
          
        ]
      });
		
		$('#create_record').click(function(){
      $('#form_result').html('');
          $('#form_result').hide();
			$('#submit_data')[0].reset();
			$('.modal-title').text('Add Audio');
			$('#action').val('Add');
			$('#action_button').val('Add');
			$('#form_result').html('');
			$('#audioModal').modal('show');


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
      url:"{{url('admin/editAudio')}}"+'/'+id,
      dataType:"json",
      success:function(html)
      {
        $('#title').val(html.data.title);
        
        $('#storeImage').html("<audio controls><source src={{ URL::to('/') }}/audio/" + html.data.audio + " type='audio/mp3'></audio>");
          $('#storeImage').append("<input type='hidden' name='hidden_audio' value='"+html.data.audio+"' />");
    
        if(html.data.status==1)
        {
          $('#status').prop("checked",true);
        }
        else
        {
          $('#status').prop("checked",false);

        }
       
        $('[name=audio_category] option').filter(function() { 
            return ($(this).val() == html.data.audiocategory_id); //To select
        }).prop('selected', true);
        $('#hidden_id').val(html.data.id);
        $('.modal-title').text('Edit Audio');
        $('#action_button').val('Edit');
        $('#action').val('Edit');
        $('#audioModal').modal('show');

      }
    })
  });
</script>

@endsection
