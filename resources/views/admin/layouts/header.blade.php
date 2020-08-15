  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link" id="password"><i class="fa fa-key"></i> Change Password</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="" onclick="event.preventDefault(); document.getElementById('adminlogout-form').submit();" class="nav-link"><i class="fas fa-sign-out-alt mr-2"></i> Logout</a>
        <form id="adminlogout-form" action="{{route('admin.admin-logout')}}" method="POST" style="display:none">
          {{ csrf_field() }}
        </form>
      </li>
    
    </ul>



  </nav>
  <!-- /.navbar -->