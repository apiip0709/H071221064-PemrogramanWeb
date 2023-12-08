<header class="main-header navbar navbar-expand navbar-dark bg-dark flex-md-nowrap p-0 shadow">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <span class="text-white col-md-3 col-lg-2 me-auto ms-4 p-1 fs-4" style="pointer-events: none" href="#">
        @if (Request::is('admin/user*'))
            User Management
        @elseif (Request::is('admin/profile*'))
            Profile Management
        @elseif (Request::is('admin/jobpost*'))
            Job Post Management
        @elseif (Request::is('admin/applicant*'))
            Applicant Management
        @else
            Dashboard
        @endif
    </span>
</header>
