<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('school.home') }}">
  <div class="sidebar-brand-icon rotate-n-15">
    <i class="fas fa-calendar"></i>
  </div>
  <div class="sidebar-brand-text mx-3">TAMS</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item  {{ $activelink =="01" ? 'active' : '' }}" >
  <a class="nav-link" href="{{ route('school.home') }}">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>School Dashboard</span></a>
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
    <i class="fas fa-fw fa-users"></i>
    <span>Teachers</span>
  </a>
  <div id="collapseTwo" class="collapse {{ $activemenu =="a" ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded"> 
      <a class="collapse-item {{ $activelink =="a1" ? 'active' : '' }}" href="{{ route('school.teacher.create') }}">Add Teachers</a>
      <a class="collapse-item {{ $activelink =="a2" ? 'active' : '' }}" href="cards.html">View Teachers</a>
    </div>
  </div>
</li>

<li class="nav-item  " >
  <a class="nav-link" href="{{ route('school.home') }}">
    <i class="fas fa-upload"></i>
    <span>Upload attendance</span></a>
</li>



<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
    <i class="fas fa-fw fa-table"></i>
    <span>Reports</span>
  </a>
  <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded"> 
      <a class="collapse-item" href="login.html">Daily Report</a>
      <a class="collapse-item" href="register.html">Statics</a>
    
    </div>
  </div>
</li>


<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>