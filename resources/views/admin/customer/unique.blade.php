@extends('admin.layouts.default')
@section('head')
<title>Unique Visitor</title>
@endsection
@section('page_title','Unique Visitor')
@section('content')
<div class="row">
    <div class="col-12">
    	<div class="card">
    		<div class="card-header">
              <h3 class="card-title">Unique Visitor Details</h3>
            </div>
             <div class="card-body">
             	<select  style='float:right;width:20%' class="form-control" id="selectDuration">
              		<option selected value="Six">6 Months</option>
              		<option value="Monthly">Last One Months</option>
              		<option value="Weekly">Last Seven Days</option>
             	 </select>
	            <div class="customer_chart">
	            	<canvas id="uniqueChart" width="100%" height="40px"></canvas>
	            </div>
	              <table id="unique_table" class="table table-bordered table-striped">
	                <thead class="tablehead">
		                <tr>
		                  <th>Ip Address</th>
		                  <th>Operating system</th>
		                  <th>Browser</th>
		                  <th>Device</th>
		                  <th>Visited Date</th>
		                </tr>
	                </thead>
	              </table>
            </div>
    	</div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
	(function(){
		datatable();
   		function datatable()
   		{
   			$('#unique_table').DataTable({
   				processing: true,
	    		serverside: true,
	    		destroy: true,
				ajax: "{!!route('admin.uniqueVisitor')!!}",
				columns:[
					{data:'ip',name:'ip'},
					{data:'os',name:'os',orderable:false},
					{data:'browser',name:'browser',orderable:false},
					{data:'device',name:'device',orderable:false},
					{data:'created_at',name:'created_at'}
				]
   			});
   		}

	})();
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.2/Chart.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		var selectType;
   	 	var myChart;
  		selectType=($("#selectDuration option:selected").val().split('#')[0]);
		callAjax(selectType);
		function callAjax(selectType)
		{
			$.ajaxSetup({
			  headers: {
			    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			  }
			});
			$.ajax({
				url:"{{route('admin.uniqueGraph')}}",
				type:"POST",
				data:{selectType:selectType},
				success:function(data)
				{
					var date=[];
					var number=[];
					var max;

					if(max%2==0)
				  {
				      max=data.max+6;
				  }
				  else
				  {
				      max=data.max+5;
				  }
          			console.log(data.unique);
					$.each(data.unique,function(key,value){
						date.push(key);
						number.push(value);
					});
					chart(date,number,max);

				}
			});
		}
		function chart(date,number,max)
		{

        var ctx = document.getElementById("uniqueChart").getContext('2d');
        myChart= new Chart(ctx,config = {
                  type: 'line',
                  data: {
                      labels:date,
                      datasets: [{
                              data:number,
                              label: "Number Of Unique Visitor",
                              fill: false,
                              backgroundColor: "rgba(255,153,0,1)",
                              borderColor: "rgba(255,153,0,1)",
                              borderCapStyle: 'butt',
                              borderDash: [5, 5],
                          }]
                  },
                  options: {
                      responsive: true,
                      scales: {
                          xAxes: [{
                                  display: true,
                                  scaleLabel: {
                                      display: true
                              
                                  }
                              }],
                          yAxes: [{
                                  display: true,
                                  ticks: {
                                      beginAtZero: true,
                                      steps: 5,
                                      max:max
                                  }
                              }]
                      },
                      title: {
                          display: true,
                          text:""
                      }
                  }
        });  
		}
    $('#selectDuration').on('change',function(){
        myChart.destroy();
        selectType=$(this).val();
        callAjax(selectType);
    });
	});
</script>
@endsection