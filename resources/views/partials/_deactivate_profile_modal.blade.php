<div class="modal inmodal in" id="deactivate_profile" tabindex="-1" role="dialog" aria-hidden="false" style="display: none;"><div class="modal-backdrop  in"></div>
    <div class="modal-dialog">
        <div class="modal-content animated flipInY">
            <div class="modal-header delete-modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true"><i class="glyphicon glyphicon-remove-circle"></i></span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Deactivate profile.</h4>
                <small class="font-bold">(You will lose all your account progress permanently.)</small>
            </div>
            <div class="modal-body">
               Are you sure you want to deactivate your profile {{ $user->first_name }} {{ $user->last_name }}?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Cancel</button>
                <a href="{{ url('profile/deactivate') }}" type="button" class="btn btn-danger">Deactivate Profile</a>
            </div>
        </div>
    </div>
</div>