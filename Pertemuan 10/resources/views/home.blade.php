@extends('layout.main', ['title' => ''])

@section('content')
    <!-- Spinner Start -->
    @include('partials.spinner')
    <!-- Spinner End -->

    <!-- Navbar Start -->
    @include('partials.navbar')
    <!-- Navbar End -->

    <!-- Carousel Start -->
    @include('partials.caraousel')
    <!-- Carousel End -->

    <!-- About Start -->
    @include('partials.about')
    <!-- About End -->

    <!-- Footer Start -->
    @include('partials.footer')
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
@endsection
