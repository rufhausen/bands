<div class="modal fade" id="confirm">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Delete Confirmation</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you, want to delete this {{ $data_type }}?</p>
                @if(isset($message))
                    <p class="text-danger">{{ $message }}</p>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-sm btn-primary" id="delete-btn">Delete</button>

            </div>
        </div>
    </div>
</div>
