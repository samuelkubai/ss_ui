<div class="ibox float-e-margins">
    <div class="ibox-title update-form">
        <h5>User Profile</h5>

    </div>
    <div class="ibox-content">

        <form action="http://app.skoolspace.com/profile/update" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="SGRBWChxOYbjaqIF8RoWzIvb46mHlOdANnSJkhBR">

            <div>

                <div class=" row form-group ">
                    <div class="col-md-12">
                        <label class="">Change Profile Picture:</label>
                        <input type="file" name="profile" class="form-control">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-12">
                        <input name="email" type="email" class="form-control" placeholder="Email" disabled="true"
                               value="kamausamuel11@gmail.com" required="required">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-6">
                        <input name="firstName" type="text" class="form-control" placeholder="First Name" value="Samuel"
                               required="required">
                    </div>
                    <div class="col-md-6">
                        <input name="lastName" type="text" class="form-control" placeholder="Last Name" value="Kamau"
                               required="required">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <input name="telNumber" type="text" class="form-control" placeholder="Telephone Number"
                               value="0716296907" required="required">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-12">
                        <input name="password" type="password" class="form-control" placeholder="New Password">
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Mail Notification:</label>

                    <div class="col-sm-8">
                        <input type="checkbox" class="js-switch home-search-switch" checked />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-info">Update</button>
            </div>
        </form>

    </div>
</div>
<div class="col-md-12">
    <a href="http://app.skoolspace.com/profile/destroy" class="btn btn-danger btn-sm btn-block"
       onclick="return confirm_deactivation(this);"><i class="fa fa-"></i> Deactivate skoolspace profile</a>
</div>
