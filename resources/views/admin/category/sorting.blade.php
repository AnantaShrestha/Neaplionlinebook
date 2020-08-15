@extends('admin.layouts.default')
@section('page_title','Sorting Category')
@section('content')
<div class="row">
        <div class="col-12">
        
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Sorting Category </h3>
              <a style="float:right" href="{{route('admin.categoryDetails')}}" class="btn btn-warning">Go Back</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            	<div class="category-list">
            		<ul id="category-ul">
            			<input type="hidden" value="{{route('admin.sortCategoryUpdate')}}" class="url">
            			@foreach($categories as $key=>$category)
            				<li class="list-group-item" aria-expanded="true"  aria-controls="{{$category->name}}">
            					<input type="hidden" value="{{csrf_token()}}" class="token">
								<input type="hidden" value="{{$category->id}}" class="categoryId">
								<input type="hidden" value="{{$parent_number}}"  class="parent_number">
								<i class="fa fa-circle" style="color:#ccc"></i>&nbsp;&nbsp;
            					{{$category->name}}
            				</li>
            			@endforeach
            		</ul>
            	</div>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
</div>
@endsection
@section('script')
<script src="{{asset('admin/sorting.js')}}"></script>
@endsection