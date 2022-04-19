@extends('layouts.app')

@section('content')

@if ($errors->any())
  <div class="alert alert-danger">
    @foreach ($errors->all() as $error)
      @if(!$loop->first)
        <br>
      @else
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      @endif
      {{ $error }}
    @endforeach
  </div>
@endif

<div class="container p-4">
  <div class="row justify-content-center">
    <div class="col-md-6 mb-2">
      <h1 class="text-center">Create a new Record</h1>
      <form method="POST" action="{{ route('record.store') }}">
        @csrf
        <div class="mb-2">
          <label class="form-label">Building Name<i style="color: red">*</i></label>
          <input class="form-control" type="text" name="building_name" placeholder="My Building"></input>
        </div>
        <div class="mb-2">
          <label class="form-label">Address<i style="color: red">*</i></label>
          <input class="form-control" type="text" name="address" placeholder="1170 White Horse Rd."></input>
        </div>
        <div class="row mb-2">
          <div class="col-6">
            <label class="form-label">City<i style="color: red">*</i></label>
            <input class="form-control" type="text" name="city" placeholder="Voorhees">
           </div>
          <div class="col">
            <label class="form-label">State<i style="color: red">*</i></label>
            @include('includes.states')
          </div>
          <div class="col">
            <label class="form-label">Zipcode<i style="color: red">*</i></label>
            <input class="form-control" type="text" name="zipcode" placeholder="08043">
          </div>
        </div>
        <div class="mb-2">
          <label class="form-label">Phone Number<i style="color: red">*</i></label>
          <input class="form-control" type="text" name="phone_number" placeholder="(888) 555-9999"></input>
        </div>
        <hr />
        <div class="row">
          <div class="col-md-6">
            <label class="form-label">Building Type<i style="color: red">*</i></label>
            <div class="mb-2">
              @include('includes.building_types')
            </div>
            <span class="text-muted font-italic">What type of building is this record?</span>
          </div>
          <div class="col-md-6 mb-2">
            <label class="form-label">Visibility Type<i style="color: red">*</i></label><br />
            @inject('visibilityTypes', 'App\Models\VisibilityType')
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="is_private" value="{{ $visibilityTypes::PUBLIC_RECORD }}">
              <label class="form-check-label" for="visibilityType">Public</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="is_private" value="{{ $visibilityTypes::PRIVATE_RECORD }}">
              <label class="form-check-label" for="visibilityType">Private</label>
            </div>
            <br />
            <span class="text-muted font-italic">Is the record public? Or, private for you only?</span>
          </div>
        </div>
        <hr />
        <div class="form-group">
          <label for="notes">Notes</label>
          <textarea class="form-control" maxlength="256" oninput="displayCharsLeft(this, 256)" name="notes" rows="5"
            placeholder="Apartment Number: 5"></textarea>
          <div class="d-inline mb-2" id="charsLeft"></div>
        </div>
        <hr />
        <div class="row">
          <div class="col text-center">
            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
            <button type="submit" class="btn btn-outline-dark text-center">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection

@section('styles')
  <style>
    textarea {
      resize: none;
    }
  </style>
@endsection
