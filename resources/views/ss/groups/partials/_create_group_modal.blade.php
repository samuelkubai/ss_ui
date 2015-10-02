<div class="modal inmodal in" id="createGroup" tabindex="-1" role="dialog" aria-hidden="false" style="display: none;"><div class="modal-backdrop  in"></div>
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true"><i class="glyphicon glyphicon-remove-circle"></i></span><span class="sr-only">Close</span></button>
                <i class="fa fa-group modal-icon"></i>
                <h4 class="modal-title">Create Group</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" placeholder="Enter your group's name" class="form-control">
                </div>

                <div class="form-group">
                    <label>Username</label>
                    <input type="text" placeholder="Enter your group's unique username" class="form-control">
                </div>

                <div class="form-group">
                    <label for="topic">Institution</label>
                    <select name="topic" id="topic" class="form-control">
                        <option value="">Select a your institution</option>
                        <option value=""></option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="message">Brief Description</label>
                    <textarea name="message" id="message" cols="30" rows="3" class="form-control"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Create Group</button>
            </div>
        </div>
    </div>
</div>