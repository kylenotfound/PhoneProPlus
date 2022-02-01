<div class="modal fade" id="deleteRecordModal" tabindex="-1" role="dialog" aria-labelledby="deleteRecordModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteRecord">Delete Record #{{ $record->getId() }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <span>Would you like to delete this record?</span><br />
        <span class="text-muted">This will delete this record from your profile and the public record</span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <form method="POST" action="{{ route('record.delete', ['record' => $record]) }}">
          @csrf
          <button type="submit" class="btn btn-primary">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>
