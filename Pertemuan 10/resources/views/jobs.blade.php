@extends('layout.main', ['title' => '| Jobs'])

@section('content')
    <!-- Spinner Start -->
    @include('partials.spinner')
    <!-- Spinner End -->

    <!-- Navbar Start -->
    @include('partials.navbar')
    <!-- Navbar End -->

    <!-- Search Start -->
    @include('partials.search')
    <!-- Search End -->

    <!-- Category Start -->
    @include('partials.category')
    <!-- Category End -->

    @include('partials.jobs')

    <!-- Footer Start -->
    @include('partials.footer')
    <!-- Footer End -->
@endsection
