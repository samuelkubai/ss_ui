<div class="modal inmodal in" id="createDiscussion" tabindex="-1" role="dialog" aria-hidden="false" style="display: none;"><div class="modal-backdrop  in"></div>
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true"><i class="glyphicon glyphicon-remove-circle"></i></span><span class="sr-only">Close</span></button>
                <i class="fa fa-comments modal-icon"></i>
                <h4 class="modal-title">Create Discussion</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" placeholder="Discussion title..." class="form-control">
                </div>

                <div class="form-group">
                    <label for="message">Question</label>
                    <textarea name="message" id="message" cols="30" rows="3" class="form-control"></textarea>
                </div>

                @include('partials._single_group_selector')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Create Discussion</button>
            </div>
        </div>
    </div>
</div>