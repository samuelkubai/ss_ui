<div class="modal inmodal in" id="delete_notice" tabindex="-1" role="dialog" aria-hidden="false" style="display: none;"><div class="modal-backdrop  in"></div>
    <div class="modal-dialog">
        <div class="modal-content animated flipInY">
            <div class="modal-header delete-modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true"><i class="glyphicon glyphicon-remove-circle"></i></span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Confirm Notice Deletion</h4>
                <small class="font-bold">(Notice will be deleted permanently.)</small>
            </div>
            <div class="modal-body">
                Are you sure you want to delete Notice <b>@{{ noticeToBeDeleted.title }}</b> By: @{{ noticeToBeDeleted.user.name }}?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Cancel</button>
                <a href="@{{ noticeToBeDeleted.url.delete }}" type="button" class="btn btn-danger">Delete File</a>
            </div>
        </div>
    </div>
</div>