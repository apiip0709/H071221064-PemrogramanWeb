@extends('pelamar.layouts.main', ['title' => 'CreateSkill'])

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Input Skill</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/pelamar">Home</a></li>
                        <li class="breadcrumb-item"><a href="/pelamar/skill">Skill Management</a></li>
                        <li class="breadcrumb-item active">Input Skill</li>
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
                <form action="/pelamar/skill" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="nama">Nama</label>
                        <select class="form-control select2" name="nama" id="nama">
                            <option value="{{ $profile->id }}">{{ $profile->nama }}</option>
                        </select>
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group row mb-3">
                        <label for="inputfile">Upload File</label>
                        <input type="file" class="form-control @error('inputfile') is-invalid @enderror" name="inputfile" id="inputfile">
                        @error('inputfile')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <button class="btn btn-success" type="submit">Add Skill</button>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
            <div class="card-footer bg-info"></div>
        </div>
        <!-- /.card -->
    </section>
@endsection
