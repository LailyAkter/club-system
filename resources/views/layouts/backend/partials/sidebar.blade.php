<!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('dashboard')}}">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-university" aria-hidden="true"></i>
                </div>
                <div class="sidebar-brand-text">Embassy Information</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{url('dashboard')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Menu
            </div>

            <li class="nav-item active">
                <a class="nav-link" href="{{route('country.index')}}">
                    <i class="fas fa-globe" aria-hidden="true"></i>
                    <span>Country</span>
                </a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="{{route('designation.index')}}">
                    <i class="fas fa-users" aria-hidden="true"></i>
                    <span>Designation</span>
                </a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="{{url('soft/country')}}">
                    <i class="fas fa-archive" aria-hidden="true"></i>
                    <span>Country Soft Delete</span>
                </a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="{{url('soft/designation')}}">
                    <i class="fas fa-trash" aria-hidden="true"></i>
                    <span>Designation Soft Delete</span>
                </a>
            </li>


            <li class="nav-item active">
                <a class="nav-link" href="{{url('audits')}}">
                    <i class="fas fa-history" aria-hidden="true"></i>
                    <span>History</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->
