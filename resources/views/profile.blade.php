@extends('layouts.app')

@section('content')

@if(session()->has('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{session()->get('success')}}
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	  <span aria-hidden="true">&times;</span>
	</button>
  </div>
@endif

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

<div class="container rounded bg-white mt-5 mb-5">
  <div class="row">
    <div class="col-md-3 border-right">
      <div class="d-flex flex-column align-items-center text-center p-3 py-5">
        <img class="rounded-circle mb-2" width="200px" src="{{ $user->getAvatar() }}">
        <span class="font-weight-bold">{{ $user->getUsername() }}</span>
        <span class="text-black-50">{{ $user->getEmail() }}</span><span> </span>
      </div>
    </div>
    <div class="col-md-5 border-right">
      <div class="p-3 py-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h4 class="text-right">Update Profile</h4>
        </div>
        <form method="POST" action="{{ route('profile.update', ['user' => auth()->user()]) }}">
          @csrf
          <div class="row mt-2">
            <div class="col-md-6">
              <label class="form-label">Username</label>
              <input type="text" class="form-control" placeholder="{{ $user->getUsername() }}" name="username">
            </div>
            <div class="col-md-6">
              <label class="form-label">Name</label>
              <input type="text" class="form-control" placeholder="{{ $user->getName() }}" name="name">
            </div>
            @if ($user->external_id == null)
              <div class="col-md-6">
                <label class="form-label">Email</label>
                <input type="text" class="form-control" placeholder="{{ $user->getEmail() }}" name="email">
              </div>
              <div class="col-md-6">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" placeholder="Change your password?" name="password">
              </div>
            @endif
          </div>
          <div class="mt-5 text-center">
            <button class="btn btn-lg btn-outline-success" type="submit">Save Profile</button>
          </div>
        </form>
      </div>
    </div>
    <div class="col-md-4">
        <!-- add something cool here -->
    </div>
  </div>
</div>

@endsection
