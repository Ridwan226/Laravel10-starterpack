@extends('auth.template')

@section('content')
  <div class="container-login100">

    <div class="wrap-login100 p-6">
      @if ($errors->any())
        @foreach ($errors->all() as $error)
          <div class="alert alert-danger" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
            <strong>Oh snap!</strong> {{ $error }}
          </div>
        @endforeach
      @endif
      <form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
        @csrf
        <span class="login100-form-title">
          Registration
        </span>
        <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
          <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
            <i class="mdi mdi-account" aria-hidden="true"></i>
          </a>
          <input class="input100 border-start-0 ms-0 form-control" name="name" type="text" placeholder="Name"
            value="{{ old('name') }}" required autocomplete="name" autofocus>
        </div>
        <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
          <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
            <i class="zmdi zmdi-email" aria-hidden="true"></i>
          </a>
          <input class="input100 border-start-0 ms-0 form-control" type="email" placeholder="Email" name="email"
            value="{{ old('email') }}" required autocomplete="email" autofocus>
        </div>

        <div class="wrap-input100 validate-input input-group" id="Password-toggle">
          <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
            <i class="zmdi zmdi-eye" aria-hidden="true"></i>
          </a>
          <input class="input100 border-start-0 ms-0 form-control" type="password" placeholder="Password" name="password"
            required autocomplete="new-password">
        </div>

        <div class="wrap-input100 validate-input input-group" id="Password-toggle">
          <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
            <i class="zmdi zmdi-eye" aria-hidden="true"></i>
          </a>
          <input class="input100 border-start-0 ms-0 form-control" type="password" placeholder="Confirm Password"
            name="password_confirmation" required autocomplete="new-password">
        </div>

        <div class="container-login100-form-btn">
          <button type="submit" class="login100-form-btn btn-primary">
            Register
          </button>
        </div>
        <div class="text-center pt-3">
          <p class="text-dark mb-0">Already have account?<a href="{{ url('login') }}" class="text-primary ms-1">Sign
              In</a></p>
        </div>

      </form>
    </div>
  </div>

@endsection
