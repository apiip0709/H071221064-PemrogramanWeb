@extends('layout.main', ['title' => '| JobsDetail'])

@section('content')
    <!-- Spinner Start -->
    @include('partials.spinner')
    <!-- Spinner End -->

    <!-- Navbar Start -->
    @include('partials.navbar')
    <!-- Navbar End -->

    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gy-5 gx-4">
                <div class="col-lg-8">
                    <a href="{{ route('jobs') }}">
                        <button class="btn btn-primary btn-sm mb-3"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                            Back</button>
                    </a>
                    <div class="d-flex align-items-center mb-5">
                        <div class="text-start">
                            <h3 class="mb-3">{{ $jobpost->posisi }} <b>( {{ $perusahaan->namaCompany }} )</b></h3>
                            <span class="text-truncate me-3"><i
                                    class="fa fa-map-marker-alt text-primary me-2"></i>{{ $jobpost->lokasi }}</span>
                            <span class="text-truncate me-3"><i
                                    class="far fa-clock text-primary me-2"></i>{{ $jobpost->type }}</span>
                            <span class="text-truncate me-0"><i
                                    class="far fa-money-bill-alt text-primary me-2"></i>{{ $formattedGaji }}</span>
                        </div>
                    </div>

                    <div class="mb-5">
                        <h4 class="mb-3">Job description</h4>
                        <p>{{ $jobpost->deskripsi }}</p>
                        <h4 class="mb-4">Company Detail</h4>
                        <p class="m-0">{{ $perusahaan->detail }}</p>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="bg-light rounded p-5 mb-4 wow slideInUp" data-wow-delay="0.1s">
                        <h4 class="mb-4">Job Summery</h4>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Published On: {{ $jobpost->created_at }} </p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Vacancy: {{ $jumlahPosisi }} Position</p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Job Nature: {{ $jobpost->type }}</p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Salary: Rp.{{ $formattedGaji }}</p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Location: {{ $jobpost->lokasi }}</p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Contact: {{ $jobpost->email }}</p>
                        @if (Auth::user()->role == 'Pelamar')
                            @if ($userApply->isNotEmpty())
                                @if ($userApply->first()->status == 'menunggu')
                                    <button class="btn btn-secondary" disabled>Menunggu...</button>
                                @elseif ($userApply->first()->status == 'diterima')
                                    <button class="btn btn-success" disabled>Diterima</button>
                                @else
                                    <a class="btn btn-secondary" href="/jobs/{{ $jobpost->id }}/apply/create">Apply
                                        Now</a>
                                @endif
                            @elseif ($otherApply->isNotEmpty())
                                @if ($otherApply->first()->status == 'menunggu')
                                    <button class="btn btn-secondary" disabled>Kosong</button>
                                @else
                                    <a class="btn btn-secondary" href="/jobs/{{ $jobpost->id }}/apply/create">Apply
                                        Now</a>
                                @endif
                            @else
                                <a class="btn btn-secondary" href="/jobs/{{ $jobpost->id }}/apply/create">Apply Now</a>
                            @endif
                        @endif

                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Job Detail End -->

    <!-- Footer Start -->
    @include('partials.footer')
    <!-- Footer End -->
@endsection
