@extends('layouts.app')

@section('content')
<div class="container p-4">
    <div class="col-12 mb-2">
      <div id="postcontent">
        <h1>Welcome to PhoneProPlus</h1>
        <h3><a href="{{ route('login') }}">Login</a> to access your own personal PhonePro System</h3>
        <hr width="50%">
        <div class="row">
          <div class="col-12 mb-2">
            <div class="d-inline">
                <strong>PhoneProPlus is an easy way to backup your PhoneBook.</strong><br>
                Also access our public database full of records below and sign up to submit your own!
                <div class="d-inline float-right mb-2">
                  <button class="btn btn-outline-dark" data-toggle="collapse" data-target="#recordsCollapse" id="recordsButton" aria-expanded="true">Collapse Records</button>
                  <button class="btn btn-outline-dark">Search Filters</button>
                  <button class="btn btn-outline-dark">Clear Filters</button>
                </div>
            </div>
          </div>
        </div>
        @if(count($records) > 0)
          <div class="collapse show" id="recordsCollapse" aria-expanded="true">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Record Id</th>
                  <th>Building Name</th>
                  <th>Address</th>
                  <th>Phone Number</th>
                  <th>Submitting User</th>
                  <th>Building Type</th>
                  <th>Last Updated</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($records as $record)
                  <tr>
                    <td>{{ $record->getId() }}</td>
                    <td>{{ $record->getBuildingName() }}</td>
                    <td><a href="https://www.google.com/search?q={{$record->getFormattedAddress()}}">{{ $record->getFormattedAddress() }}</a></td>
                    <td>{{ $record->getPhoneNumber() }}</td>
                    <td>{{ $record->getSubmittedName() }}</td>
                    <td>{{ $record->getBuildingTypeName() }}</td>
                    <td>{{ $record->getFormattedUpdatedAt() }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="row">
            <div class="col-md-12 mb-2">
              <div class="float-md-left">
                <span>{{$records->withQueryString()->links()}}</span>
              </div>
              <div class="float-md-right">
                <span class="text-muted text-small mr-sm-1"> Displaying {{ $records->firstItem() }} - {{ $records->lastItem() }} of {{ $records->total() }} records </span>
              </div>
            </div>
          </div>
        @else
          <span>No records to display</span>
        @endif
        <p>
          If this is your first time you might want to read more <a href="{{route('about')}}">about the PhoneBook</a>
        </p>
      </div>
    </div>
  </div>
@endsection
