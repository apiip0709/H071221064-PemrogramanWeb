@extends('Penyedia.layouts.main', ['title' => 'PenyediaDashboard'])

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <a href="/penyedia">
                        <button class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                            Back</button>
                    </a>
                    <h1>Add Company</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/penyedia">Home</a></li>
                        <li class="breadcrumb-item"><a href="/penyedia">Profile Management</a></li>
                        <li class="breadcrumb-item active">Add Company</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="card card-info mt-3">
            @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="card-header">
                <h3 class="card-title">Job Post Form</h3>
            </div>
            <div class="card-body">
                <form action="/penyedia/company" method="post">
                    @csrf
                    <div class="form-group row">
                        <label for="namaCompany">Nama Perusahaan</label>
                        <input type="text" class="form-control @error('namaCompany') is-invalid @enderror"
                            id="namaCompany" name="namaCompany" placeholder="Nama Perusahan"
                            value="{{ old('namaCompany') }}" required>
                        @error('namaCompany')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label for="detail">Detail Perusahaan</label>
                        {{-- <input type="text" class="form-control @error('detail') is-invalid @enderror" id="detail"
                            name="detail" placeholder="Masukkan Detail" value="{{ old('detail') }}" required> --}}
                        <textarea class="form-control @error('detail') is-invalid @enderror" id="detail" name="detail"
                            placeholder="Kota, Negara" required>{{ old('detail') }}</textarea>
                        @error('detail')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <button class="btn btn-success" type="submit">Add Company</button>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
            <div class="card-footer bg-info"></div>
        </div>
        <!-- /.card -->
    </section>
@endsection
