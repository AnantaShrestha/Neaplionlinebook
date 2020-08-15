@extends('admin.layouts.default')
@section('page_title','Dashboard')
@section('content')
<div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>150</h3>

                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$countProduct}}</h3>

                <p>No of Books</p>
              </div>
              <div class="icon">
                <i class="fa fa-book"></i>
              </div>
              <a href="{{route('admin.productDetails')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$countUser}}</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{route('admin.customerDetails')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$countUnique}}</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="{{route('admin.uniqueVisitor')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
</div>
<div class="row" style="margin:40px 0">
  <form method="post" id="userGraph">
    @csrf
    <select class="form-control" name="selectType" id="selectType">
       <option value="Weekly">Weekly</option>
       <option value="Monthly">Monthly</option>
        <option value="Six" selected>Last 6 Month</option>
    </select>
  </form>
   <canvas id="myChart" width="100%"></canvas>
</div>
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
<script>

$(document).ready(function(){
  var selectType,url;
  var mychart;      
  selectType=($("#selectType option:selected").val().split('#')[0]);
  callAjax(selectType);
  $('#selectType').on('change',function(e){
    e.preventDefault();
    mychart.destroy();
    var selectval=$(this).val();
    callAjax(selectval);

  });
    
    function callAjax(selectType)
    {
      $.ajax({
          url:"{{route('getlastsixmonthdata')}}",
          type:'post',
          data:{selectType:selectType,_token:'{{csrf_token()}}'},
          cache: false,
          dataType:'JSON',
          success:function(response)
          { 
            
              barChart(response);

          }
      });
    }
    function barChart(response)
    {
        var ctx = document.getElementById("myChart").getContext('2d');
         mychart= new Chart(ctx,config = {
                  type: 'line',
                  data: {
                      labels:response.months,
                      datasets: [{
                              data:response.userCount,
                              label: "Number Of User",
                              fill: false,
                              backgroundColor: "#17a2b8",
                              borderColor: "#17a2b8",
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
                                      steps: 1,
                                      max:response.max
                                  }
                              }]
                      },
                      title: {
                          display: true,
                          text:response.title
                      }
                  }
        });
    }
      

});
</script>
@endsection