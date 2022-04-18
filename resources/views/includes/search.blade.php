<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true" id="main-form">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="searchRecord">Search for a Record</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="{{ route('search') }}" id="main-form">
          @csrf
          <div class="modal-body">
            <div class="mb-2">
              <label class="form-label">Location Name</label>
              <input class="form-control" type="text" name="building_name" />
            </div>
            <div class="mb-2">
              <label class="form-label">Address</label>
              <input class="form-control" type="text" name="address">
            </div>
            <div class="mb-2">
              <label class="form-label">City</label>
              <input class="form-control" type="text" name="city">
            </div>
            <div class="row mb-2">
              <div class="col">
                <label class="form-label">State</label>
                @include('includes.states')
              </div>
              <div class="col">
                <label class="form-label">Zipcode</label>
                <input class="form-control" type="text" name="zipcode" placeholder="08043">
               </div>
            </div>
            <div class="mb-2">
              <label class="form-label">Phone Number</label>
              <input class="form-control" type="text" name="phone_number">
            </div>
            <div class="row">
              <label class="form-label">Building Type</label>
              <div class="col-md-6 mb-2">
                @include('includes.building_types')
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <input type="hidden" name="page-number" value="{{ $records->currentPage() }}">
            <input type="hidden" name="total-page-numbers" value="{{ $records->lastPage() }}">
            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-outline-success">Search</button>
          </div>
        </form>
      </div>
    </div>
  </div>
