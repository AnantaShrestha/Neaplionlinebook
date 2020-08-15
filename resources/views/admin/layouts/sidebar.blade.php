<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    @php 
      $logo=App\Admin\Sitesetting::find(1);
     
    @endphp
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('images/logo/'.$logo->logo)}}" style="background:#fff" class="elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Nepali Online Book</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.home')}}" class="nav-link {{ (request()->is('admin/home')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{route('admin.sliderDetails')}}" class="nav-link {{ (request()->is('admin/sliderDetails')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Slider</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.categoryDetails')}}" class="nav-link {{ (request()->is('admin/categoryDetails')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Book Category</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{route('admin.productDetails')}}" class="nav-link {{ (request()->is('admin/productDetails')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Books</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.newscategoryDetails')}}" class="nav-link {{ (request()->is('admin/newscategoryDetails')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>News Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.newsDetails')}}" class="nav-link {{ (request()->is('admin/newsDetails')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>News</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{route('admin.audiocategoryDetails')}}" class="nav-link {{ (request()->is('admin/audiocategoryDetails')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Audio Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.audioDetails')}}" class="nav-link {{ (request()->is('admin/audioDetails')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Audio</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.blogDetails')}}" class="nav-link {{ (request()->is('admin/blogDetails')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Blog</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{route('admin.advertisementDetails')}}" class="nav-link {{ (request()->is('admin/advertisementDetails')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Advertisement</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.customerDetails')}}" class="nav-link {{ (request()->is('admin/customerDetails')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Customer</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{route('admin.payment')}}" class="nav-link {{ (request()->is('admin/customerDetails')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Payment</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="{{route('admin.uniqueVisitor')}}" class="nav-link {{ (request()->is('admin/uniqueVisitor')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Unique Visitor</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{route('admin.sitesetting')}}" class="nav-link {{ (request()->is('admin/sitesetting')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Site Setting</p>
                </a>
              </li>
             
            </ul>
          </li>
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>