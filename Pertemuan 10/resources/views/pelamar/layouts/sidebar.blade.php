<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('home') }}" class="brand-link">
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
                    <a href="/pelamar" class="nav-link {{ Request::is('pelamar') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>User Dashboard</p>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('pelamar/profile*') ? 'menu-open' : '' }}">
                    <a href="/pelamar/profile" class="nav-link {{ Request::is('pelamar/profile*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-circle"></i>
                        <p>
                            Profile Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            @if (!Request::is('pelamar/profile/create'))
                                <a href="/pelamar/profile"
                                    class="nav-link {{ Request::is('pelamar/profile')  ? 'active' : '' }} ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Manage Data</p>
                                </a>
                            @else
                                <a href="/pelamar/profile" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Manage Data</p>
                                </a>
                            @endif
                        </li>
                        @if ($profile)
                        <li class="nav-item">
                            <a href="/pelamar/profile/{{$profile->id}}/edit"
                                class="nav-link {{ Request::is('pelamar/profile/*/edit') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Edit Profile</p>
                            </a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a href="/pelamar/profile/create"
                                class="nav-link {{ Request::is('pelamar/profile/create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Input Profile</p>
                            </a>
                        </li>
                            
                        @endif
                    </ul>
                </li>
                <li class="nav-item {{ Request::is('pelamar/skill*') ? 'menu-open' : '' }}">
                    <a href="/pelamar/skill" class="nav-link {{ Request::is('pelamar/skill*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file"></i>
                        <p>
                            Skill Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            @if (!Request::is('pelamar/skill/create'))
                                <a href="/pelamar/skill"
                                    class="nav-link {{ Request::is('pelamar/skill') || Request::is('pelamar/skill/*/edit') || Request::is('pelamar/skill*') ? 'active' : '' }} ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Manage Data</p>
                                </a>
                            @else
                                <a href="/pelamar/skill" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Manage Data</p>
                                </a>
                            @endif
                        </li>
                        <li class="nav-item">
                            <a href="/pelamar/skill/create"
                                class="nav-link {{ Request::is('pelamar/skill/create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Input Skill</p>
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
