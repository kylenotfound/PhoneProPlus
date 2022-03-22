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

@if (session()->has('errors'))
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
    @if (auth()->id() == $user->getId())
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
        @if (count($saves) > 0)
          <div class="p-3">
            <h3>Remove All Saves</h3>
            <br />
            <form method="POST" action="{{ route('unsave.all')}}">
              @csrf
              <button type="submit" class="btn btn-danger" 
                onclick="return confirm('Are you sure you want to remove all of your saved records?');">
                Remove All
              </button>
            </form>
          </div>  
        @endif
        @if (count($records) > 0)
          <div class="p-3">
            <h3>Remove All Created Records</h3>
            <br />
            <form method="POST" action="{{ route('record.delete.all') }}">
              @csrf
              <button type="submit" class="btn btn-danger" 
                onclick="return confirm('Are you sure you want to remove all of your created records?');">
                Remove All Records
              </button>
            </form>
          </div>
          <div class="p-3">
            <h3>Remove All Public Records</h3>
            <br />
            <form method="POST" action="{{ route('record.delete.all.public') }}">
              @csrf
              <button type="submit" class="btn btn-danger" 
                onclick="return confirm('Are you sure you want to remove all of your created public records?');">
                Remove All Public
              </button>
            </form>
          </div>
          <div class="p-3">
            <h3>Remove All Private Records</h3>
            <br />
            <form method="POST" action="{{ route('record.delete.all.private') }}">
              @csrf
              <button type="submit" class="btn btn-danger" 
                onclick="return confirm('Are you sure you want to remove all of your created private records?');">
                Remove All Private
              </button>
            </form>
          </div>  
        @endif
      </div>
    @else
      <div class="col-md-9">
        <div class="p-2">
          @if(count($publicRecords) > 0)
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Record Id</th>
                    <th>Location Name</th>
                    <th>Address</th>
                    <th>Phone Number</th>
                    <th>Building Type</th>
                    <th>Updated At</th>
                    <th>Save</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($records as $record)
                    @inject('visibilityTypes', 'App\Models\VisibilityType')
                    @if ($record->isPrivate() == $visibilityTypes::PUBLIC_RECORD)
                      <tr>
                        <td><a href="{{ route('record.view', $record)}}">{{ $record->getId() }}</a></td>
                        <td>{{ $record->getBuildingName() }}</td>
                        <td>{{ $record->getFormattedAddress() }}</td>
                        <td>{{ $record->getPhoneNumber() }}</td>
                        <td>{{ $record->getBuildingTypeName() }}</td>
                        <td>{{ $record->getFormattedUpdatedAt() }}</td>
                        @auth
                          <td>
                            @if ($record->user != auth()->user())
                              @if ($record->isSaved())
                                <form action="{{ route('unsave') }}" method="POST">
                                  @csrf
                                  <input type="hidden" name="user_id" value="{{ auth()->id() }}" />
                                  <input type="hidden" name="record_id" value="{{ $record->getId() }}"/>
                                  <button class="btn btn-sm btn-outline-dark" type="submit">Unsave</button>
                                </form>
                              @else
                                <form action="{{ route('save') }}" method="POST">
                                  @csrf
                                  <input type="hidden" name="user_id" value="{{ auth()->id() }}" />
                                  <input type="hidden" name="record_id" value="{{ $record->getId() }}"/>
                                  <button class="btn btn-sm btn-outline-dark" type="submit">Save</button>
                                </form>
                              @endif
                            @endif
                          </td>
                        @endauth
                      </tr>  
                    @endif
                  @endforeach
                </tbody>
              </table>
              {{ $records->withQueryString()->links() }}
            </div>
          @else
            <span class="text-muted">No records found.</span>
          @endif
        </div>
      </div>
    @endif
  </div>
</div>

@endsection
