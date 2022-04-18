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

  <div class="container p-4">
    <div class="row justify-content-center">
      <h1 class="mb-2 text-center">Record #{{ $record->getId() }}</h1>
      <div class="col-md-8 mb-2">
        <div class="card">
          @if (auth()->id() == $record->user->getId())
            <div class="card-header">
                <div class="d-inline">
                <a class="btn btn-lg btn btn-outline-danger m-2 float-right" data-toggle="modal" data-target="#deleteRecordModal">Delete Record</a>
                <a class="btn btn-lg btn btn-outline-info m-2 float-right" data-toggle="modal" data-target="#editRecordModal">Edit Record</a>
                </div>
            </div>
          @endif
          <div class="card-body">
            <div class="col-sm-8">
              <span>Location Name: {{ $record->getBuildingName() }}</span>
            </div>
            <div class="col-sm-8">
              <span>Address: {{ $record->getFormattedAddress() }}</span>
            </div>
            <div class="col-sm-8">
              <span>Phone Number: {{ $record->getPhoneNumber() }}</span>
            </div>
            <div class="col-sm-8">
              <span>Building Type: {{ $record->getBuildingTypeName() }}</span>
            </div>
            <div class="col-sm-8">
              <span>Visibility Type: {{ $record->getVisibilityTypeName() }}</span>
            </div>
            <div class="col-sm-8">
              <span>Submitting User: <a href="{{ route('user.profile', $record->user)}}">
                {{ $record->user->getUserName() }}</a>
              </span>
            </div>
            <div class="col-sm-8">
              <span>Notes: {{ $record->getNote() }}</span>
            </div>
          </div>
        </div>
        @include('records.edit')
        @include('records.delete')
      </div>
    </div>
  </div>
@endsection
