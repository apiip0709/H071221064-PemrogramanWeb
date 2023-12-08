@extends('layout.main', ['title' => '| ApplyJobs'])

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
                <div class="col-lg-7">
                    <a href="/jobs/{{ $jobpost->id }}">
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

                <div class="col-lg-5">
                    <div class="bg-light rounded p-5 mb-4 wow slideInUp" data-wow-delay="0.1s">
                        <h3 class="mb-3">Validasi Kembali</h3>
                        @if ($message = Session::get('failed'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('failed') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <form action="/jobs/{{ $jobpost->id }}/apply" method="post">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="email" name="email" class="form-control" id="email" placeholder="Email"
                                    required>
                                <div class="input-group-append">
                                    <div class="input-group-text" style="height: 40px">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <input type="password" name="password" class="form-control" id="password"
                                    placeholder="Password" required>
                                <div class="input-group-append">
                                    <div class="input-group-text" style="height: 40px">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <select class="form-control" name="job" id="job">
                                    <option value="{{ $jobpost->id }}">{{ $jobpost->posisi }}</option>
                                </select>
                            </div>

                            <div class="row">
                                <!-- /.col -->
                                <div class="col">
                                    <button type="submit" value="login" class="btn btn-primary btn-block">Apply</button>
                                </div>
                                <!-- /.col -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Footer Start -->
    @include('partials.footer')
    <!-- Footer End -->
@endsection
