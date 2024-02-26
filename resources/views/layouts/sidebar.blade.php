<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->is('dashboard*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Charts -->
    @if (session('role') == 'owner')
        <li class="nav-item {{ request()->is('product*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('product') }}">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Products</span></a>
        </li>
        <li class="nav-item {{ request()->is('account*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('account') }}">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Users Account</span></a>
        </li>
        <li class="nav-item {{ request()->is('order*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('order') }}">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Orders</span></a>
        </li>
    @endif

    <!-- Nav Item - Tables -->
    @if (session('role') == 'admin')
        <li class="nav-item">
            <a class="nav-link" href="{{ url('orders') }}">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Orders</span></a>
        </li>
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->

</ul>
<!-- End of Sidebar -->
