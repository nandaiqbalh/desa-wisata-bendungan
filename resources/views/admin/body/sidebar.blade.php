@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
@endphp
<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
			<div class="ulogo">
				 <a href="{{url('admin/dashboard')}}">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">
						  <img src="{{asset('backend/images/logo-light.png')}}" alt="">
						  <h3><b>Desa Bendungan</b></h3>
					 </div>
				</a>
			</div>
        </div>

      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">

		<li class="{{($route == 'admin.dashboard') ? 'active' : ''}}">
            <a href="{{url('/admin/dashboard')}}">
            <i data-feather="pie-chart"></i>
			<span>Dashboard</span>
          </a>
        </li>

        <li class="treeview {{($prefix == '/admin/program')?'active' : ''}}" >
            <a href="#">
              <i data-feather="server"></i>
              <span>Program</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{($route == 'programs.index') || ($route == 'programs.create') || ($route == 'programs.edit') ? 'active' : ''}}"><a href="{{route('programs.index')}}"><i class="ti-more"></i>Program</a></li>
              <li class="{{($route == 'program-category.index') || ($route == 'program-category.create') || ($route == 'program-category.edit') ? 'active' : ''}}"><a href="{{route('program-category.index')}}"><i class="ti-more"></i>Program Category</a></li>
            </ul>
        </li>

        <li class="treeview {{($prefix == '/admin/event')?'active' : ''}}" >
            <a href="#">
              <i data-feather="server"></i>
              <span>Event</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{($route == 'events.index') || ($route == 'events.create') || ($route == 'events.edit') ? 'active' : ''}}"><a href="{{route('events.index')}}"><i class="ti-more"></i>Events</a></li>
              {{-- <li class="{{($route == 'program-category.index') || ($route == 'program-category.create') || ($route == 'program-category.edit') ? 'active' : ''}}"><a href="{{route('program-category.index')}}"><i class="ti-more"></i>Program Category</a></li> --}}
            </ul>
        </li>
      </ul>
    </section>

	<div class="sidebar-footer">
		<!-- item-->
		<a href="{{route('admin.logout')}}" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
	</div>
  </aside>
