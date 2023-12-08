@extends('admin.layouts.main', ['title' => 'Showjobpost'])

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <a href="/admin/jobpost">
                        <button class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                            Back</button>
                    </a>
                    <h1>Show Data</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                        <li class="breadcrumb-item"><a href="/admin/jobpost">Job Post Management</a></li>
                        <li class="breadcrumb-item active">Show Data</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="container-xxl wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gy-5 gx-4">
                <div class="col-lg-8">
                    <div class="d-flex align-items-center mb-5">
                        <div class="text-start ps-4">
                            <h3 class="mb-3">{{ $jobpost->posisi }} <b>( {{$perusahaan->namaCompany}} )</b></h3>
                            <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $jobpost->lokasi }}</span>
                            <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>{{ $jobpost->type }}</span>
                            <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>Rp.{{ $formattedGaji }}</span>
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
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Published On: {{ $jobpost->created_at }}</p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Vacancy: {{ $jumlahPosisi }} Position</p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Job Nature: {{ $jobpost->type }}</p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Salary: Rp.{{ $formattedGaji }}</p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Location: {{ $jobpost->lokasi }}</p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Contact: {{ $jobpost->email }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Job Detail End -->
@endsection
