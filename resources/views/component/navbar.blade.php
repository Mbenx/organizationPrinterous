  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          @if (Auth::user()->role == 'AcountManager')
          <img src="{{ asset('/storage/organizations/'.Auth::user()->organization->logo)}}" class="img-circle" alt="User Image">          
          @else          
          <img src="dist/img/admin.png" class="img-circle" alt="User Image">            
          @endif
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        {{-- <li>
          <a href="/">
            <i class="fa fa-dashboard"></i> 
            <span>Dashboard</span>
          </a>
        </li>  --}}
        <li>
          <a href="/organization">
            <i class="fa fa-file"></i> 
            <span>Organizations</span>
          </a>
        </li>
        <li>
          <a href="/person">
            <i class="fa fa-book"></i> 
            <span>Persons</span>
          </a>
        </li>        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>