<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="/admin" class="brand-link">
        <img src="{{ asset('img/logo.jpg') }}" alt="..." class="brand-image img-circle elevation-3 mx-1"
            style="opacity: .8">
        <span class="brand-text font-weight-light mx-2">Innovate JobNest</span>
    </a>

    <div class="sidebar">
        <!-- SidebarSearch Form -->
        <div class="form-inline mt-3">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="/admin" class="nav-link {{ Request::is('admin') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('admin/user*') ? 'menu-open' : '' }}">
                    <a href="/admin/user" class="nav-link {{ Request::is('admin/user*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            User Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/user"
                                class="nav-link {{ Request::is('admin/user') || Request::is('admin/user/*/edit') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage Data</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/user/create"
                                class="nav-link {{ Request::is('admin/user/create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Input Data</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ Request::is('admin/profile*') ? 'menu-open' : '' }}">
                    <a href="/admin/profile" class="nav-link {{ Request::is('admin/profile*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-circle"></i>
                        <p>
                            Profile Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            @if (!Request::is('admin/profile/create'))
                                <a href="/admin/profile"
                                    class="nav-link {{ Request::is('admin/profile') || Request::is('admin/profile/*/edit') || Request::is('admin/profile*') ? 'active' : '' }} ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Manage Data</p>
                                </a>
                            @else
                                <a href="/admin/profile"
                                    class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Manage Data</p>
                                </a>
                            @endif
                        </li>
                        <li class="nav-item">
                            <a href="/admin/profile/create"
                                class="nav-link {{ Request::is('admin/profile/create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Input Data</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ Request::is('admin/jobpost*') ? 'menu-open' : '' }}">
                    <a href="/admin/jobpost" class="nav-link {{ Request::is('admin/jobpost*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-tie"></i>
                        <p>
                            Job Post Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            @if (!Request::is('admin/jobpost/create'))
                                <a href="/admin/jobpost"
                                    class="nav-link {{ Request::is('admin/jobpost') || Request::is('admin/jobpost/*/edit') || Request::is('admin/jobpost*') ? 'active' : '' }} ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Manage Data</p>
                                </a>
                            @else
                                <a href="/admin/jobpost"
                                    class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Manage Data</p>
                                </a>
                            @endif
                        </li>
                        <li class="nav-item">
                            <a href="/admin/jobpost/create"
                                class="nav-link {{ Request::is('admin/jobpost/create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Input Data</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ Request::is('admin/apply') ? 'menu-open' : '' }}">
                    <a href="/admin/user" class="nav-link {{ Request::is('admin/apply') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-id-card"></i>
                        <p>
                            Applicant Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/apply" class="nav-link {{ Request::is('admin/apply') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage Data</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <form action="{{ route('keluar') }}" method="post"
                        onsubmit="return confirm('Yakin ingin Logout?')">
                        @csrf
                        <button type="submit" class="nav-link btn btn-block btn-outline-light text-secondary my-3">
                            <i class="fas fa-sign-out-alt mx-0"></i>
                            <p>LogOut</p>
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
</aside>
{{-- </nav> --}}
