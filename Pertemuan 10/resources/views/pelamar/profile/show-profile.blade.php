{{-- @extends('admin.layouts.main', ['title' => 'ShowProfile'])

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Show Profile {{ Auth()->user()->name }}</h1>
                    <a href="/admin/profile/create">
                        <button class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>Add Profile</button>
                    </a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                        <li class="breadcrumb-item"><a href="/admin/profile">Profile Management</a></li>
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
                    <div class="card">
                        <div class="card-body mx-3">
                            <div class="mb-3">
                                <h3>Data Diri</h3>
                                <p>Nama : {{$profile->nama}} </p>
                                <p>Umur : {{$profile->umur}} </p>
                                <p>Gender : {{$profile->jenis_kelamin}} </p>
                            </div>
                            <div class="mb-3">
                                <h3>Kontak</h3>
                                <p>Email : {{ $profile->email }}</p>
                                <p>No. Hp : {{ $profile->no_hp }}</p>
                            </div>
                            <div class="mb-3">
                                <h3>Deskripsi Diri</h3>
                                <p>{{ $profile->deskripsi }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="bg-light rounded p-5 mb-4 wow slideInUp" data-wow-delay="0.1s">
                        {{-- <h4 class="mb-4">Job Summery</h4> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Job Detail End -->
@endsection --}}
