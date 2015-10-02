<div class="modal inmodal in" id="uploadModal" tabindex="-1" role="dialog" aria-hidden="false" style="display: none;"><div class="modal-backdrop  in"></div>
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true"><i class="glyphicon glyphicon-remove-circle"></i></span><span class="sr-only">Close</span></button>
                <i class="fa fa-upload modal-icon"></i>
                <h4 class="modal-title">Upload Files</h4>
                <small class="font-bold">(File size maximum is 100mb)</small>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>File</label>
                    <input type="file" multiple placeholder="Enter your email" class="form-control">
                </div>

                <div class="form-group">
                    <label for="topic">Topic</label>
                    <select name="topic" id="topic" class="form-control">
                        <option value="">Select a topic</option>
                        <option value=""></option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="topic">Groups</label>
                    <select name="topic" id="topic" class="form-control">
                        <option value="">Select groups to share to.</option>
                        <option value=""></option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Upload Files</button>
            </div>
        </div>
    </div>
</div>