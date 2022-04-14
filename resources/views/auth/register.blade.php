@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8 mb-2 p-2">
      <div class="card">
        <div class="card-header">{{ __('Register') }}</div>
        <div class="card-body">
          <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('username') }}</label>
              <div class="col-md-6">
                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                @error('username')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('name') }}</label>
              <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('email address') }}</label>
              <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('password') }}</label>
              <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('re-enter password') }}</label>
              <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                <br />
                <div class="d-flex col-md-12 mb-2 text-center">
                    @if (env('APP_ENV') != 'prod')
                      <div class="p-2">
                        <a href="login/google" class="btn btn-lg btn-primary" style="background-color: #dd4b39;" type="submit"><i class="devicon-google-plain"></i> Login with Google</a>
                      </div>
                    @endif
                    <button class="btn btn-lg btn-primary" style="background-color: #569fca;" type="submit">Register</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('styles')
  <style>
    body {
        background: linear-gradient(90deg, rgba(207,120,224,1) 25%, rgba(100,249,179,1) 100%);
    }
  </style>
@endsection
