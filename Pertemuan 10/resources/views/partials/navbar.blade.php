<!-- Navbar Start -->
<style>
    .dd {
        width: 160px;
        border-radius: 5px;
    }

    .dm {
        right: 0;
        text-align: center;
        justify-content: center
    }

    .d-out {
        height: 35px;
    }
</style>
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
        <h1 class="m-0 text-primary">JobNest</h1>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="{{ route('home') }}" class="nav-item nav-link {{ Request::is('/') ? 'active' : '' }}">Home</a>
            <a href="{{ route('about') }}"
                class="nav-item nav-link {{ Request::is('about*') ? 'active' : '' }}">About</a>
            @if (Auth::check())
                <a href="{{ route('jobs') }}"
                    class="nav-item nav-link {{ Request::is('jobs*') ? 'active' : '' }}">Jobs</a>
            @endif
            <a href="{{ route('contact') }}" class="nav-item nav-link">Contact</a>
        </div>

        <div class="ms-auto mx-4">
            @if (Auth::check())
                <div class="nav-item dropdown">
                    <button type="button" class="nav-link dropdown-toggle btn btn-primary dd" role="button"
                        data-bs-toggle="dropdown">
                        Setting
                    </button>
                    <ul class="dropdown-menu dm">
                        @if (Auth::user()->role == 'Pelamar')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('pelamar') }}">Your Profile</a>
                            </li>
                        @elseif (Auth::user()->role == 'Penyedia')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('penyedia') }}">Dashboard</a>
                            </li>
                        @elseif (Auth::user()->role == 'Admin')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin') }}">Dashboard</a>
                            </li>
                        @endif
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form action="{{ route('keluar') }}" method="post"
                                onsubmit="return confirm('Yakin ingin Logout?')">
                                @csrf
                                <button type="submit" class="dropdown-item btn btn-outline-light text-secondary d-out">
                                    <p>LogOut</p>
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <a href="{{ route('login') }}" class="btn btn-primary" role="button" style="height: 40px;">Login</a>
                <a href="{{ route('regist') }}" class="btn btn-outline-primary rounded" role="button"
                    style="height: 40px;">Sign up</a>
            @endif
        </div>
    </div>
</nav>
<!-- Navbar End -->
