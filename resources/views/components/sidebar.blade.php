<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-warning elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
        <img src="{{ asset('images/app/main_logo.svg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-bold">Jerad <sup>Coffee</sup></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-3">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ url('dashboard') }}" class="nav-link {{ request()->is('dashboard*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                @if (session('role') == 'owner')
                    <li class="nav-header">MASTER</li>
                    <li class="nav-item">
                        <a href="{{ url('/product') }}"
                            class="nav-link {{ request()->is('product*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-database"></i>
                            <p>
                                Products
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/account') }}"
                            class="nav-link {{ request()->is('account*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Account Users
                            </p>
                        </a>
                    </li>
                @endif
                <li class="nav-header">TRANSACTION</li>
                <li class="nav-item">
                    <a href="{{ url('/order/create') }}"
                        class="nav-link {{ request()->is('order/create') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Create Order
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/order') }}" class="nav-link {{ request()->is('order') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Orders
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
