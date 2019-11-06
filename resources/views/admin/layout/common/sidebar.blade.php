<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.home') }}">
  <div class="sidebar-brand-icon rotate-n-15">
    <i class="fas fa-calendar"></i>
  </div>
  <div class="sidebar-brand-text mx-3">TAMS</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item  {{ $activelink =="01" ? 'active' : '' }}" >
  <a class="nav-link" href="{{ route('admin.home') }}">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Master
</div>


<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item {{ $activemenu =="a" ? 'active' : '' }}">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-fw fa-university"></i>
    <span>Schools</span>
  </a>
  <div id="collapseTwo" class="collapse {{ $activemenu =="a" ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Custom Schools:</h6>
      <a class="collapse-item {{ $activelink =="a1" ? 'active' : '' }}" href="{{ route('admin.school.create') }}">Add Schools</a>
      <a class="collapse-item {{ $activelink =="a2" ? 'active' : '' }}" href="{{ route('admin.school.view') }}">View Schools</a>
    </div>
  </div>
</li>


@if(Auth::user()->id !=1)
<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
    <i class="fas fa-fw fa-users"></i>
    <span>Users</span>
  </a>
  <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Custom Users:</h6>
      <a class="collapse-item" href="utilities-color.html">Add Users</a>
      <a class="collapse-item" href="utilities-border.html">View Users</a> 
    </div>
  </div>
</li>



<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
    <i class="fas fa-fw fa-user"></i>
    <span>Teachers</span>
  </a>
  <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded"> 
      <a class="collapse-item" href="login.html">Add Teachers</a>
      <a class="collapse-item" href="register.html">Teacher Statics</a>
    
    </div>
  </div>
</li> 
@endif
<li class="nav-item  {{ $activelink =="02" ? 'active' : '' }} " >
  <a class="nav-link " href="#">
    <i class="fas fa-fw fa-table"></i>
    <span>Reports</span></a>
</li>
<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>