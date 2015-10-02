<div class="ibox float-e-margins">
    <div class="ibox-title update-form">
        <h5>Group Profile</h5>

        <div class="ibox-tools">

        </div>
    </div>

    <div class="ibox-content">
        <form action="http://app.skoolspace.com/ss/update" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="SGRBWChxOYbjaqIF8RoWzIvb46mHlOdANnSJkhBR">

            <div>
                <div class=" row form-group ">
                    <div class="col-md-12">
                        <label class="">Change Group Profile Picture:</label>
                        <input type="file" name="profile" class="form-control">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-12">
                        <input name="username" type="text" class="form-control" disabled="true"
                               placeholder="Unique Username" value="ss" required="required">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-6">
                        <input name="name" type="text" class="form-control" placeholder="Group Name"
                               value="skoolspace group" required="required">
                    </div>
                    <div class="col-md-6">
                        <select name="school_affiliation" id="school"
                                class="pull-right col-md-12 form-control" tabindex="-1" aria-hidden="true">
                            <option value="Jomo Kenyatta University of Agriculture and Technology"> JKUAT</option>
                            <option value="Kenyatta University"> Kenyatta University</option>
                            <option value="University of Nairobi"> University of Nairobi</option>
                            <option value="Moi University"> Moi University</option>
                            <option value="Other Institution" selected=""> Other Institution</option>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <div class="chat-message-form">
                            <div class="form-group">
                                <textarea class="form-control message-input" name="description"
                                          placeholder="Brief Description"
                                          value="Here you get updates on new features and any news from the skoolspace team. You should also create or join your own groups to enjoy the full features of skoolspace."
                                          required="required">Here you get updates on new features and any news from the skoolspace team. You should also create or join your own groups to enjoy the full features of skoolspace.</textarea>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-info">Update</button>
            </div>
        </form>
    </div>


</div>
<div class="ibox float-e-margins">
    <div class="ibox-title update-form">
        <h5>Change Administrator (This change is permanent)</h5>
    </div>

    <div class="ibox-content">
        <form action="http://app.skoolspace.com/ss/update/administrator" method="POST">
            <input type="hidden" name="_token" value="SGRBWChxOYbjaqIF8RoWzIvb46mHlOdANnSJkhBR">

            <div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <input name="email" type="email" class="form-control"
                               placeholder="New Administrator skoolspace Email" required="required">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-info">Register New Administrator</button>
            </div>
        </form>
    </div>
</div>
<div class="col-md-12">
    <a href="http://app.skoolspace.com/ss/delete" class="btn btn-danger btn-sm btn-block"
       onclick="return confirm_deletion(this);"><i class="fa fa-"></i> Delete Group</a>
</div>
