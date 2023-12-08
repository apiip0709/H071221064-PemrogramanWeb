@extends('admin.layouts.main', ['title' => 'ApplyAdminEdit'])

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/penyedia">Home</a></li>
                        <li class="breadcrumb-item active">Apply Post</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="section setting mt-3">
        <div class="container">
            <div class="row gy-5 gx-4">
                <div class="col-lg-8">
                    <a href="{{ route('penyedia') }}">
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
                        <h4 class="mb-4">Profile Pelamar</h4>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Nama: {{ $profile->nama }} </p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>email: {{ $profile->email }} Position</p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>no. Hp: {{ $profile->no_hp }}</p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Umur: Rp.{{ $profile->umur }}</p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Gender: {{ $profile->jenis_kelamin }}</p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>deskripsi diri: {{ $profile->deskripsi }}</p>
                        <h4 class="mb-2">Skill / Sertifikat</h4>
                        @if ($skill && count($skill) > 0)
                            @foreach ($skill as $item)
                                <p>
                                    <i class="fa fa-angle-right text-primary me-2"></i>
                                    <a href="{{ asset('storage/photo-user-' . $profile->id . '/' . $item->skill) }}"
                                        target="_blank" class="text-primary">{{ $item->skill }}</a>
                                </p>
                            @endforeach
                        @else
                            <p>Kosong</p>
                        @endif

                        @if ($userApply->status == 'menunggu')
                            <form action="/jobs/{{ $jobpost->id }}/apply/{{ $userApply->id }}" method="post">
                                @csrf
                                @method('put')
                                <div class="form-group row mt-5">
                                    <div class="col">
                                        <select id="status" name="status" class="form-control select2"
                                            style="width: 100%;">
                                            <option value="diterima">Di Terima</option>
                                            <option value="dibatalkan">Di Tolak</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <button class="btn btn-success" type="submit">Kirim</button>
                                </div>
                            </form>
                        @else
                            <div class="col">
                                @if ($userApply->status == 'diterima')
                                    <button type="submit" value="login" class="btn btn-success btn-block" style="cursor: pointer" 
                                        disabled>Diterima</button>
                                @else
                                    <button type="submit" value="login" class="btn btn-danger btn-block" style="cursor: pointer"
                                        disabled>Ditolak</button>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
