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

@if(session()->has('errors'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
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
            <hr width="50%">
            <div class="d-inline float-right mb-2">
              <button class="btn btn-outline-dark" data-toggle="collapse" data-target="#recordsCollapse" id="recordsButton" aria-expanded="true">Collapse Records</button>
              <a class="btn btn-outline-dark" data-toggle="modal" data-target="#searchModal">Search Filters</a>
              @include('includes.search')
              <a class="btn btn-outline-dark" href="{{ route('welcome')}}">Clear Filters</a>
            </div>
          </div>
        </div>
      </div>
      @if(count($records) > 0)
        <div class="collapse show" id="recordsCollapse" aria-expanded="true">
          <table class="table table-bordered table-hover">
            <thead class="thead-dark">
              <tr>
                <th>Record Id</th>
                <th>Building Name</th>
                <th>Address</th>
                <th>Phone Number</th>
                <th>Submitting User</th>
                <th>Building Type</th>
                <th>Last Updated</th>
                @auth
                  <th>Save</th>
                @endauth
              </tr>
            </thead>
            <tbody>
              @foreach ($records as $record)
                <tr>
                  <td>{{ $record->getId() }}</td>
                  <td>{{ $record->getBuildingName() }}</td>
                  <td><a href="https://www.google.com/search?q={{$record->getFormattedAddress()}}">{{ $record->getFormattedAddress() }}</a></td>
                  <td>{{ $record->getPhoneNumber() }}</td>
                  <td><a href="{{ route('user.profile', $record->user) }}">{{ $record->getSubmittedName() }}</a></td>
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
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="row" id="page-btns">
          <div class="col-md-12 mb-2">
            @if($records->total())
              <nav id="items-pagination" class="mt-4 mb-3">
                <ul class="pagination justify-content-left mb-0">
                  @if (!$records->onFirstPage())
                    <li class="page-item p-1" id="page-item-next">
                      <button class="page-link prev" type="submit" form="main-form" name="first-page-button" value="first">First Page</button>
                    </li>
                  @endif
                  @if(!$records->onFirstPage())
                    <li class="page-item p-1" id="page-item-prev">
                      <button class="page-link prev" type="submit" form="main-form" name="back-page-button" value="backward"><</button>
                    </li>
                  @endif
                  @if($records->currentPage() != $records->lastPage())
                    <li class="page-item p-1" id="page-item-next">
                      <button class="page-link next" type="submit" form="main-form" name="forward-page-button" value="forward">></button>
                    </li>
                    <li class="page-item p-1" id="page-item-next">
                      <button class="page-link prev" type="submit" form="main-form" name="last-page-button" value="last">Last Page</button>
                    </li>
                  @endif
                </ul>
              </nav>
            @endif
            <span class="text-muted text-small mr-sm-1"> Displaying {{ $records->firstItem() }} - {{ $records->lastItem() }} of {{ $records->total() }} records </span>
            <br>
            <span class="text-muted text-small mr-sm-1"> For more advanced filtering, check out the "Search Filters" button at the top of the page.</span>
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
