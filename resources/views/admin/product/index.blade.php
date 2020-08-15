@extends('admin.layouts.default')
@section('headlink')
<style type="text/css">
 #productDetails
 {
    position:fixed;
    width:30%;
    z-index:1111111;
    top:30%;
    right:15%;
    padding:30px;
    background:#fff;
    border:10px solid #ccc;
    box-shadow:0 0 30px rgba(0,0,0,0.8); 
 }
 #productDetails ul li
 {
  line-height:30px;
 }

</style>
@endsection
@section('page_title','Product Details')
@section('content')
<div class="row rows">
        <div class="col-12">
        
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Product Details</h3>
              <button type="button" style="float:right" class="btn btn-success" id="create_record">Add Product</button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="product_table" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Product Name</th>
                  <th>
                    <select name="selectCategory" class="form-control" id="selectCategory">
                      <option value="All" Selected>All</option>
                      @foreach($categories as $category)
                      <option value="{{$category->id}}">{{$category->name}}</option>
                      @endforeach
                   </select>
                  </th>
                  <th>Author</th>
                  <th>Published Year</th>
                  <th>Pdf</th>
                  <th>Image</th>
                  <th>Status</th>
                  <th style="width:120px">Action</th>
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
@include('admin.product.create-edit')

@endsection
@section('script')
<script type="text/javascript">

	$(document).ready(function(){
    var url="{!! route('admin.productDetails') !!}";
    datatable(url);
    $('#selectCategory').on('change',function(){
      var selectType=$(this).val();
      url="{!! route('admin.productDetails') !!}"+'/'+selectType;
      datatable(url);
      $('#product_table').DataTable().ajax.reload();
    });
    function datatable(url)
    {
        $('#product_table').DataTable(
        {
          processing: true,
          serverside: true,
          destroy:true,
          ajax: url,
          columns: [
            { data: 'name', name:'name' },
            { data: 'underCategory', name: 'underCategory',orderable:false},
            { data:'author', name:'author'},
            { data:'published_date',name:'published_date'},
            {data: 'pdf',name:'pdf',searchable:false,orderable:false},
            { data:'image',name:'image',searchable:false,orderable:false},
            { data: 'status', name:'status'},
            { data: 'action', name: 'action',searchable:false,orderable:false}
            
            
          ]
        });

    }

		$('#create_record').click(function(){
      $('#form_result').html('');
          $('#form_result').hide();
			$('#submit_data')[0].reset();
			$('.modal-title').text('Add Product');
			$('#action').val('Add');
			$('#action_button').val('Add');
			$('#form_result').html('');
      $('#storeImage').html('');
      $('#storePdf').html('');
			$('#productModal').modal('show');


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
      url:"{{url('admin/editProduct')}}"+'/'+id,
      dataType:"json",
      success:function(html)
      {
        $('#name').val(html.data.name);
        $('#author').val(html.data.author);
        $('#total_page').val(html.data.total_page);
        $('#published_date').val(html.data.published_date);
        $('#price').val(html.data.price);
        $('#description').val(html.data.description);
        $('#rating').val(html.data.rating);
        $('#storeImage').html("<img src={{ URL::to('/') }}/images/books/" + html.data.image + " width='30px' class='img-thumbnail' />");
          $('#storeImage').append("<input type='hidden' name='hidden_image' value='"+html.data.image+"' />");
          $('#storePdf').html("<iframe src={{ URL::to('/') }}/pdf/books/" + html.data.pdf + " width='30px' height='33px'></iframe>");
          $('#storePdf').append("<input type='hidden' name='hidden_pdf' value='"+html.data.pdf+"' />");
        if(html.data.status==1)
        {
          $('#status').prop("checked",true);
        }
        else
        {
          $('#status').prop("checked",false);

        }
        if(html.data.free==1)
        {
          $('#free').prop("checked",true);
        }
        else
        {
          $('#free').prop("checked",false);

        }
        if(html.data.upcoming==1)
        {
          $('#upcoming').prop("checked",true);
        }
        else
        {
          $('#upcoming').prop("checked",false);

        }
        $('[name=category_name] option').filter(function() { 
            return ($(this).val() == html.data.category_id); //To select
        }).prop('selected', true);
        $('[name=language] option').filter(function() { 
            return ($(this).val() == html.data.language); //To select
        }).prop('selected', true);
        $('#hidden_id').val(html.data.id);
        $('.modal-title').text('Edit Product');
        $('#action_button').val('Edit');
        $('#action').val('Edit');
        $('#productModal').modal('show');

      }
    })
  });
</script>
<script type="text/javascript">
  $('#productDetails').hide();
  $(document).on('click','.viewProduct',function() {
      var id=$(this).attr('id');
      var tags='';
      $.ajax({
          url:"{{url('admin/editProduct')}}"+'/'+id,
          dataType:"json",
          success:function(html)
          {
            var text='';
            if(html.data.free==1)
            {
              text='For Free';
            }
            else if(html.data.upcoming==1)
            {
              text='Upcoming ';
            }
            else
            {
              text='For Sale';
            }
              tags='<div id="productDetails" class="productDetails"><ul style="margin:0px;padding:0px;list-style:none">';
              tags+='<li>'+'<strong>Product Name : </strong>'+ html.data.name +'</li>';
              tags+='<li>'+'<strong>Author : </strong>'+ html.data.author +'</li>';
              tags+='<li>'+'<strong>Language : </strong>'+ html.data.language +'</li>';
              tags+='<li>'+'<strong>Publisher Year :</strong>'+ html.data.published_date +'</li>';
              tags+='<li>'+'<strong>Price : </strong> Rs '+ html.data.price +'</li>';
              tags+='<li>'+'<strong>Total Page : </strong>'+ html.data.total_page +'</li>';
              tags+='<li>'+'<strong>Book Type : </strong>'+ text +'</li>';
              tags+='<li>'+'<strong>Rating : </strong>'+ html.data.rating +'</li>';
              tags+='</ul></div>';
              $(tags).insertAfter('.rows');
          }

      },function(){
          $('#productDetails').remove();
      });

  });
  $(document).on('mouseout','.viewProduct',function(){
     $('.productDetails').each(function() {
          $(this).remove();
    });
  });
</script>
@endsection