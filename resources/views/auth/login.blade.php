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
      <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
        @csrf
        <span class="login100-form-title pb-5">
          Login
        </span>
        <div class="panel panel-primary">

          <div class="panel-body tabs-menu-body p-0 pt-5">
            <div class="tab-content">
              <div class="tab-pane active">
                <div class="wrap-input100 validate-input input-group"
                  data-bs-validate="Valid email is required: ex@abc.xyz">
                  <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                    <i class="zmdi zmdi-email text-muted" aria-hidden="true"></i>
                  </a>
                  <input class="input100 border-start-0 form-control ms-0" name="email" required
                    value="{{ old('email') }}" type="email" placeholder="Email">
                </div>
                <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                  <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                    <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                  </a>
                  <input class="input100 border-start-0 form-control ms-0" name="password" required
                    autocomplete="current-password" type="password" placeholder="Password">
                </div>
                <div class="text-end pt-4">
                  <p class="mb-0"><a href="{{ route('password.request') }}" class="text-primary ms-1">Forgot
                      Password?</a></p>
                </div>
                <div class="container-login100-form-btn">
                  <button type="submit" class="login100-form-btn btn-primary">
                    Login
                  </button>
                </div>
                <div class="text-center pt-3">
                  <p class="text-dark mb-0">Not a member?<a href="{{ url('register') }}" class="text-primary ms-1">Sign
                      UP</a></p>
                </div>

              </div>

            </div>
          </div>
        </div>

      </form>
    </div>
  </div>

@endsection
