<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SG Inventory @yield('title')</title>

    {{-- CSS --}}
    <link rel="stylesheet" href="/assets/css/style.css">

    {{-- Bootsrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    {{-- DataTable CSS --}}
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    {{-- BOX ICONS CSS --}}
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="/assets/img/logo.jpg" alt="logo">
                </span>

                <div class="text header-text">
                    <span class="name">SG Inventory</span>
                    <span class="catat">Catatan Data</span>
                </div>
            </div>

            <i class="bx bx-chevron-right toggle"></i>
        </header>

        <div class="menu-bar">
            <div class="menu">
                {{-- <li class="search-box">
                    <i class="bx bx-search icon"></i>
                    <input type="text" placeholder="Search...">
                </li> --}}
                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="/">
                            <i class='bx bx-home-alt icon'></i>
                            <span class="text nav-text">Dashbord</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="/kantor">
                            <i class='bx bx-buildings icon '></i>
                            <span class="text nav-text">Kantor</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="{{ route('karyawan') }}">
                            <i class='bx bx-briefcase-alt-2 icon'></i>
                            <span class="text nav-text">Karyawan</span>
                        </a>
                    </li>
                    <li class="nav-link dropdown">
                        <a class="nav-link" href="/produk" aria-expanded="false">
                            <i class='bx bx-package icon'></i>
                            <span class="text nav-text">Produk</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('produk.show', 'Classic-Cars') }}">Classic Cars</a></li>
                            <li><a class="dropdown-item" href="{{ route('produk.show', 'Motorcycles') }}">Motorcycles</a></li>
                            <li><a class="dropdown-item" href="{{ route('produk.show', 'Planes') }}">Planes</a></li>
                            <li><a class="dropdown-item" href="{{ route('produk.show', 'Ships') }}">Ships</a></li>
                            <li><a class="dropdown-item" href="{{ route('produk.show', 'Trains') }}">Trains</a></li>
                            <li><a class="dropdown-item" href="{{ route('produk.show', 'Trucks-and-Buses') }}">Trucks and Buses</a></li>
                            <li><a class="dropdown-item" href="{{ route('produk.show', 'Vintage-Cars') }}">Vintage Cars</a></li>
                        </ul>                        
                    </li>
                </ul>
            </div>

            <div class="bottom-content">
                <li class="mode">
                    <div class="moon-sun">
                        <i class='bx bx-moon icon moon'></i>
                        <i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Dark Mode</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>
            </div>
        </div>
    </nav>

    <section class="section">
        @yield('content')
    </section>

    {{-- JS --}}
    <script src="/assets/js/script.js"></script>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    {{-- JQuery JS --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    {{-- DataTable JS --}}
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    {{-- Table JS --}}
    <script src="/assets/js/tableScript.js"></script>
</body>

</html>
