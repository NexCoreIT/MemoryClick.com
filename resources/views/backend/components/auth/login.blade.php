

@extends('backend.components.auth.app')
@section('login')


<div class="page page-center">
    <div class="container container-tight py-4">
      <div class="text-center mb-4">
        <a href="{{ route('home') }}" class="navbar-brand navbar-brand-autodark"><svg xmlns="http://www.w3.org/2000/svg" width="110" height="32" viewBox="0 0 232 68"
            class="navbar-brand-image">
           
        </svg></a>
      </div>
      <div class="card card-md">
        <div class="card-body">
          <h2 class="h2 text-center mb-4">Login to your account</h2>
          <form action="{{route('store')}}" method="post" enctype="multipart/form-data">

              @csrf

              <div class="form-floating mb-3">
                  <input class="form-control" id="inputEmail" name="email" value="{{old('email')}}" type="email" placeholder="name@example.com" />
                  <label for="inputEmail">Email address</label>
                  @error('email')
                  <strong class="text-danger">{{ $message }}</strong>
                  @enderror
              </div>
              <div class="form-floating mb-3">
                <input class="form-control" name="password" id="inputPassword" type="password" placeholder="Password" />
                <label for="inputPassword">Password</label>

                @error('password')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>

              <div class="form-check mb-3">
                  <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                  <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
              </div>
              <div class="d-flex align-items-left justify-content-between mt-4 mb-0">
                  {{-- <a class="small" href="password.html">Forgot Password?</a> --}}
                  <button class="btn btn-primary" type="submit" >Login</button>
              </div>
          </form>
        </div>
        {{-- <div class="hr-text">or</div> --}}
        {{-- <div class="card-body">
          <div class="row">
            <div class="col align-center"><a href="#" class="btn w-100">

                <svg xmlns="http://www.w3.org/2000/svg" class="icon text-github" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 19c-4.3 1.4 -4.3 -2.5 -6 -3m12 5v-3.5c0 -1 .1 -1.4 -.5 -2c2.8 -.3 5.5 -1.4 5.5 -6a4.6 4.6 0 0 0 -1.3 -3.2a4.2 4.2 0 0 0 -.1 -3.2s-1.1 -.3 -3.5 1.3a12.3 12.3 0 0 0 -6.2 0c-2.4 -1.6 -3.5 -1.3 -3.5 -1.3a4.2 4.2 0 0 0 -.1 3.2a4.6 4.6 0 0 0 -1.3 3.2c0 4.6 2.7 5.7 5.5 6c-.6 .6 -.6 1.2 -.5 2v3.5" /></svg>
                Login with Google
              </a></div>

          </div>
        </div> --}}
      </div>
      <div class="text-center text-muted mt-3">
        Don't have account yet? <a href="{{route('registration')}}" tabindex="-1">Sign up</a>
      </div>
    </div>
  </div>
  @endsection
