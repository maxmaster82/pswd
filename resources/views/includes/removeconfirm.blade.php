<div class="modal fade" id="removeConfirm" tabindex="-1" role="dialog" aria-labelledby="removeConfirmLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <h2>Remove "<span></span>" account?</h2>
            </div>
            <div class="modal-footer">
                <form>
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-primary confirm-remove-btn">Yes</button>
                </form>
            </div>
        </div>
    </div>
</div>