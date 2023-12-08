@extends('pelamar.layouts.main', ['title' => 'CreateProfile'])

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Input Data</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/pelamar">Home</a></li>
                        <li class="breadcrumb-item"><a href="/pelamar/profile">Profile Management</a></li>
                        <li class="breadcrumb-item active">Input Data</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="card card-info mt-2">
            <div class="card-header">
                <h3 class="card-title">Profile Form</h3>
            </div>
            <div class="card-body">
                <form action="/pelamar/profile" method="post">
                    @csrf
                    <div class="form-group row">
                        <div class="col-6">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                                name="nama" placeholder="nama" value="{{ old('nama') }}" required>
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            {{-- <input type="text" class="form-control @error('company') is-invalid @enderror" id="company"
                                name="company" placeholder="company" value="" disabled> --}}
                            <select id="jenis_kelamin" name="jenis_kelamin" class="form-control select2"
                                style="width: 100%;">
                                <option value="laki-laki">Laki - Laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="no_hp">No. Hp</label>
                            <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp"
                                name="no_hp" placeholder="no hp" value="{{ old('no_hp') }}" required>
                            @error('no_hp')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="umur">Umur</label>
                            <input type="number" class="form-control @error('umur') is-invalid @enderror" id="umur"
                                name="umur" placeholder="umur" value="{{ old('umur') }}" required>
                            @error('umur')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                        <input type="email" class="form-control @error('inputEmail3') is-invalid @enderror"
                            id="inputEmail3" name="inputEmail3" placeholder="Email" value="{{ old('inputEmail3') }}"
                            required>
                        @error('inputEmail3')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label for="deskripsi">Deskripsi</label>
                        {{-- <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi"
                            name="deskripsi" placeholder="Kota, Negara" value="{{ old('deskripsi') }}" required> --}}
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi"
                            placeholder="..." required>{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <button class="btn btn-success" type="submit">Add Profile</button>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
            <div class="card-footer bg-info"></div>
        </div>
        <!-- /.card -->
    </section>
@endsection
