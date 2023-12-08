@extends('Auth.layouts.app', ['title' => 'Regist'])

@section('content')
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Register a new User</p>
            @if ($message = Session::get('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong> {{ $message }} </strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <form action="{{ route('regist.store') }}" method="post">
                @csrf
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="username">Username</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                            name="username" placeholder="Username" value="{{ old('username') }}" required>
                        @error('username')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="role">Role</label>
                        <select id="role" name="role" class="form-select" style="width: 100%;">
                            <option value="Pelamar">Pelamar</option>
                            <option value="Penyedia">Penyedia</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-form-label">Email</label>
                    <input type="email" class="form-control @error('inputEmail3') is-invalid @enderror" id="inputEmail3"
                        name="inputEmail3" placeholder="Email" value="{{ old('inputEmail3') }}" required>
                    @error('inputEmail3')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-form-label">Password</label>
                    <input type="password" class="form-control @error('inputPassword3') is-invalid @enderror"
                        id="inputPassword3" name="inputPassword3" placeholder="Password" required>
                    @error('inputPassword3')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="row">
                    <button type="submit" value="login" class="btn btn-primary btn-block">Register</button>
                </div>
                <p class="my-1">
                    Already have an account?
                    <a href="{{ route('login') }}">Login here</a>
                </p>
            </form>
        </div>
        <!-- /.login-card-body -->
    </div>
@endsection
