@extends('Auth.layouts.app' , ['title' => 'Login'])
@section('content')

<div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">User Login</p>
      @if($message = Session::get('failed'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong> {{ $message }} </strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true" >&times;</span>
        </button>
      </div>
      @endif
      @if($message = Session::get('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong> {{ $message }} </strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true" >&times;</span>
        </button>
      </div>
      @endif
      <form action="{{ route('autentikasi') }}" method="post">
      @csrf
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col">
            <button type="submit" value="login" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
        <p class="my-1">
          Forgot your password?
          <a href="{{ route('forget-password') }}">Reset it here</a>
        </p>
        <p class="mb-1">
          Don't have an account? 
          <a href="{{ route('regist') }}">Register here</a>
        </p>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
@endsection