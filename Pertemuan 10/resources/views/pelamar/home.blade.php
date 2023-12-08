@extends('pelamar.layouts.main', ['title' => 'ShowProfile'])

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard {{ Auth()->user()->name }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/pelamar">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="section setting">
        <div class="col-xl-10">
            <div class="card">
                <div class="card-body pt-3">
                    <ul class="nav nav-tabs nav-tabs-bordered" id="profileTabs">
                        <li class="nav-item">
                            <a class="nav-link active" id="overview-tab" data-toggle="tab"
                                href="#profile-overview">Overview</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="overview-tab" data-toggle="tab" href="#profile-apply">Apply</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="berkas-tab" data-toggle="tab" href="#profile-edit">Berkas</a>
                        </li>
                    </ul>

                    <div class="tab-content pt-2">
                        <div class="tab-pane fade show active profile-overview" id="profile-overview">
                            @if (!$profile)
                                Silahkan isi di input profile
                            @else
                                <div class="mb-3">
                                    <h3>Data Diri</h3>
                                    <p>Nama : {{ $profile->nama }} </p>
                                    <p>Umur : {{ $profile->umur }} </p>
                                    <p>Gender : {{ $profile->jenis_kelamin }} </p>
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
                            @endif
                        </div>

                        <div class="tab-pane fade show profile-apply" id="profile-apply">
                            <div class="card mt-2">
                                <div class="card-header">
                                    <h1 class="card-title">My Applicant</h1>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Perusahaan</th>
                                                <th>Posisi</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        @foreach ($applyData as $data)
                                            <tbody>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $data['perusahaan'] }}</td>
                                                <td>{{ $data['posisi'] }}</td>
                                                <td>{{ $data['status'] }}</td>
                                            </tbody>
                                        @endforeach
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>

                        <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                            <form>
                                <h3 class="mb-3"> Sertifikat / Skill </h3>
                                @foreach ($skill as $item)
                                    <p>
                                        <a href="{{ asset('storage/photo-user-' . $profile->id . '/' . $item->skill) }}"
                                            target="_blank" class="text-primary">{{ $item->skill }}</a>
                                    </p>
                                @endforeach
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
