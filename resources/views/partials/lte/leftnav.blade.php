<!--<aside class="main-sidebar bg-green sidebar-dark-primary elevation-4">-->
<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link bg-navy">
      <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">E-Services | SNH</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
            <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
            <a href="#" class="d-block">{{Auth::user()->first_name." ".Auth::user()->last_name}}</a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <router-link to="/patient/dashboard" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </router-link >
                </li>
                <li class="nav-item">
                    <router-link to="/patient/profile" class="nav-link">
                        <i class="nav-icon fas fas fa-user"></i>
                        <p>Profile</p>
                    </router-link >
                </li>
                <li class="nav-item">
                    <router-link to="/patient/appointments" class="nav-link">
                        <i class="nav-icon fas fas fa-calendar-day"></i>
                        <p>Appointments</p>
                    </router-link >
                </li>
                <li class="nav-item">
                    <router-link to="/patient/payments" class="nav-link">
                        <i class="nav-icon fas fa-wallet"></i>
                        <p>Payments</p>
                    </router-link >
                </li>
                <li class="nav-item">
                    <router-link to="/patient/ticket" class="nav-link">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>Tickets</p>
                    </router-link >
                </li>
                <li class="nav-item">
                    <router-link to="/patient/payment" class="nav-link">
                        <i class="nav-icon fas fa-power-off"></i>
                        <p>Log Out</p>
                    </router-link >
                </li>
            </ul>
        </nav>
    </div>
</aside>