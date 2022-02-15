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

<div class="container p-4">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <h2 class="d-inline mb-2">Your PhoneProPlus Records</h2>
      <hr width="30%">
      <div class="card">
        <div class="card-header">
          <span class="d-inline">Welcome, {{ auth()->user()->getUsername() }}</span>
          <a class="d-inline btn btn-lg btn-outline-dark float-right" href="{{ route('record.create') }}">New Record</a>
        </div>
        @if(count($records) > 0)
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Record Id</th>
                  <th>Location Name</th>
                  <th>Address</th>
                  <th>Phone Number</th>
                  <th>Building Type</th>
                  <th>Visibility Type</th>
                  <th>Created At</th>
                  <th>Updated At</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($records as $record)
                  <tr>
                    <td>{{ $record->getId() }}</td>
                    <td>{{ $record->getBuildingName() }}</td>
                    <td>{{ $record->getFormattedAddress() }}</td>
                    <td>{{ $record->getPhoneNumber() }}</td>
                    <td>{{ $record->getBuildingTypeName() }}</td>
                    <td>{{ $record->getVisibilityTypeName() }}</td>
                    <td>{{ $record->getFormattedCreatedAt() }}</td>
                    <td>{{ $record->getFormattedUpdatedAt() }}</td>
                    <td>
                      <a class="btn btn-sm btn-outline-dark" href="{{ route('record.view', ['record' => $record]) }}">View</a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            {{$records->withQueryString()->links()}}
          </div>
        @endif
      </div>
    </div>
    @if (count($records) <= 0)
      <div class="text-muted">
        <span>No records to display</span>
      </div>
    @endif
  </div>
</div>
@endsection
