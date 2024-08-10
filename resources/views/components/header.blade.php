<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item ">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <div class="user-panel d-flex align-items-center">
            <div class="d-flex align-items-center justify-content-center rounded-circle border overflow-hidden" style="width: 40px; height: 40px;">
                <img src="{{ asset('images/users/' . session('image')) }}" alt="User Image" width="100%" height="100%">
            </div>
            <div class="info">
                <a href="#" class="d-block text-dark">{{ session('user') }}</a>
            </div>
        </div>
        <button type="button" class="btn btn-warning mx-2">
            <a href="{{ url('/logout') }}" class="text-dark font-weight-bold flat">Logout</a>
        </button>
    </ul>
</nav>
<!-- /.navbar -->
