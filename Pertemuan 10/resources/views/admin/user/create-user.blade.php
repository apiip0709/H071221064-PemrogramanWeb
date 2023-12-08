@extends('admin.layouts.main', ['title' => 'CreateUser'])

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
                        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                        <li class="breadcrumb-item"><a href="/admin/user">User Management</a></li>
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
                <h3 class="card-title">User Form</h3>
            </div>
            <div class="card-body">
                <form action="/admin/user" method="post">
                    @csrf
                    <div class="form-group row">
                        <div class="col-6">
                            <label for="username">Username</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror"
                                id="username" name="username" placeholder="Username" value="{{ old('username') }}"
                                required>
                            @error('username')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="role">Role</label>
                                <select id="role" name="role" class="form-control select2" style="width: 100%;">
                                    <option value="Pelamar">Pelamar</option>
                                    <option value="Penyedia">Penyedia</option>
                                </select>
                            </div>
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
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                        <input type="password" class="form-control @error('inputPassword3') is-invalid @enderror"
                            id="inputPassword3" name="inputPassword3" placeholder="Password" required>
                        @error('inputPassword3')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <button class="btn btn-success" type="submit">Add User</button>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
            <div class="card-footer bg-info"></div>
        </div>
        <!-- /.card -->
    </section>
@endsection
