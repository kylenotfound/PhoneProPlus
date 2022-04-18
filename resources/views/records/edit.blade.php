<div class="modal fade" id="editRecordModal" tabindex="-1" role="dialog" aria-labelledby="editRecordModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editRecord">Edit Record #{{ $record->getId() }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="{{ route('record.edit', ['record' => $record]) }}">
          @csrf
          <div class="modal-body">
            <div class="mb-2">
              <label class="form-label">Location Name</label>
              <input class="form-control" type="text" name="building_name" placeholder="{{ $record->getBuildingName() }}">
            </div>
            <div class="mb-2">
              <label class="form-label">Address</label>
              <input class="form-control" type="text" name="address" placeholder="{{ $record->getAddress() }}">
            </div>
            <div class="mb-2">
              <label class="form-label">City</label>
              <input class="form-control" type="text" name="city" placeholder="{{ $record->getCity() }}">
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
              <input class="form-control" type="text" name="phone_number" placeholder="{{ $record->getPhoneNumber() }}">
            </div>
            <div class="row">
              <div class="col-md-6">
                <label class="form-label">Building Type</label>
                <div class=" mb-2">
                  @include('includes.building_types')
                </div>
              </div>
              <div class="col">
                <label class="form-label">Visibility Type</label>
                <div class="col-7 mb-2">
                  @inject('visibilityTypes', 'App\Models\VisibilityType')
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="is_private" value="{{ $visibilityTypes::PUBLIC_RECORD }}">
                    <label class="form-check-label" for="visibilityType">Public</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="is_private" value="{{ $visibilityTypes::PRIVATE_RECORD }}">
                    <label class="form-check-label" for="visibilityType">Private</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="mb-2">
              <label class="form-label">Notes</label>
              <textarea class="form-control" maxlength="256" oninput="displayCharsLeft(this, 256)" name="notes" rows="5" placeholder="Notes"></textarea>
              <div class="d-inline mb-2" id="charsLeft"></div>
            </div>
          </div>
          <div class="modal-footer">
            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-outline-success">Edit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
