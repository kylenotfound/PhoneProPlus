@extends('layouts.app')

@section('content')

  @if ($errors->any())
    <div class="alert alert-danger">
      @foreach ($errors->all() as $error)
        @if(!$loop->first)
          <br>
        @endif
          {{ $error }}
      @endforeach
    </div>
  @endif

  <section>
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">
              <h2 class="mb-5">Sign in</h2>
              <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="row mb-3">
                  <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                  <div class="col-md-8">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                  <div class="col-md-8">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-6">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                      <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                      </label>
                    </div>
                  </div>
                </div>
                <div class="d-flex justify-content-center">
                    @if (env('APP_ENV') != 'prod')
                      <div class="p-2">
                        <a href="login/google" class="btn btn-lg btn-primary" style="background-color: #dd4b39;" type="submit"><i class="devicon-google-plain"></i> Login with Google</a>
                      </div>
                    @endif
                    <div class="p-2">
                      <button class="btn btn-lg btn-primary" style="background-color: #569fca;" type="submit">Sign in</button>
                    </div>
                </div>
              </form>
              <hr class="my-2">
              <div class="row mb-0">
                @if (Route::has('password.request'))
               <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                  </a>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('styles')
  <style>
    body {
        background: linear-gradient(90deg, rgba(207,120,224,1) 25%, rgba(100,249,179,1) 100%);
    }
  </style>
@endsection
