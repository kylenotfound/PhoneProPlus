@extends('layouts.app')

@section('content')
<div class="container-sm">
    <div class="col-12 mb-2">
      <div id="postcontent">
        <h1>Welcome to PhoneProPlus</h1>
        <h3><a href="{{ route('login') }}">Login</a> to access your own personal PhonePro System</h3>
        <hr>
        <div class="row">
          <div class="col-xs-12 col-sm-8 col-sm-push-4 col-md-7 col-md-push-5 col-lg-8 col-lg-push-4">
            <p>
              <strong>PhoneProPlus is an easy way to backup your PhoneBook.</strong><br>
              Also access our public database full of records below and sign up to submit your own!<br>
            </p>
          </div>
        </div>
        @if(count($records) > 0)
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Record Id</th>
                <th>Building Name</th>
                <th>Address</th>
                <th>Phone Number</th>
                <th>Submitting User</th>
                <th>Building Type</th>
                <th>Created At</th>
                <th>Updated At</th>
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
                  <td>{{ $record->getFormattedCreatedAt() }}</td>
                  <td>{{ $record->getFormattedUpdatedAt() }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
          {{$records->withQueryString()->links()}}
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
