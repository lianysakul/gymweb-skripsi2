<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-dumbbell"></i>
      </div>
      <div class="sidebar-brand-text mx-3">NewHeat <sup>Pro</sup></div>
  </a>
  
  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard with Dropdown -->
  <li class="nav-item">
    <a href="{{ route('dashboard') }}" class="nav-link">
        <i class="nav-icon fas fa-home"></i>
        <p>Dashboard</p>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProducts" aria-expanded="true" aria-controls="collapseProducts">
        <i class="fas fa-fw fa-cog"></i>
        <span>Products</span>
    </a>
    <div id="collapseProducts" class="collapse" aria-labelledby="headingProducts" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Product Categories:</h6>
            <a class="collapse-item" href="{{ route('mysupplementproducts.index') }}">Supplement Products</a>
            <a class="collapse-item" href="{{ route('trainingproducts.index') }}">Training Products</a>
        </div>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProductsells" aria-expanded="true" aria-controls="collapseProductsells">
        <i class="nav-icon fas fa-dollar-sign"></i>
        <span>Sells</span>
    </a>
    <div id="collapseProductsells" class="collapse" aria-labelledby="headingProductsells" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Sell Categories:</h6>
            <a class="collapse-item" href="{{ route('supplementsells.index') }}">Supplement Sells</a>
            <a class="collapse-item" href="{{ route('trainingsells.index') }}">Training Sells</a>
        </div>
    </div>
</li>

  <li class="nav-item">
      <a href="{{ route('members.index') }}" class="nav-link">
          <i class="nav-icon fas fa-users"></i> <!-- Ikon untuk anggota -->
          <p>Members</p>
      </a>
  </li>

  <li class="nav-item">
      <a href="{{ route('staff.index') }}" class="nav-link">
          <i class="nav-icon fas fa-chalkboard-teacher"></i>
          <p>Staffs</p>
      </a>
  </li>

  @if(Auth::user()->is_role == '0')
  <li class="nav-item">
      <a href="{{ route('profile.show', Auth::user()->id) }}" class="nav-link">
          <i class="nav-icon fas fa-user"></i>
          <p>Profile</p>
      </a>
  </li>
  @endif

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">
  
  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul>
