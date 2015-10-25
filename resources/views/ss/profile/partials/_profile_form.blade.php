<div class="ibox float-e-margins">
    <div class="ibox-title update-form">
        <h5>User Profile</h5>
        <span class="pull-right">
             <a href="#">
                 <img
                         src="{{ asset($user->profilePictureSource()) }}"
                         alt="Group class second 2013's picture"
                         class="activity-group-pic">
             </a>
         </span>
    </div>
    <div class="ibox-content">

        <form action="h{{ url('/profile/update') }}" method="post" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <div>
                <div class=" row form-group ">
                    <div class="col-md-12">
                        <label class="">Change Profile Picture:</label>
                        <input type="file" name="profile" class="form-control">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-12">
                       <p class="form-control-static"><b>Email: </b> {{ $user->email }}</p>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-6">
                        <input name="firstName" type="text" class="form-control" placeholder="First Name" value="{{ $user->first_name }}"
                               required="required">
                    </div>
                    <div class="col-md-6">
                        <input name="lastName" type="text" class="form-control" placeholder="Last Name" value="{{ $user->last_name }}"
                               required="required">
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
                        <input type="checkbox" name="mail" class="js-switch home-search-switch" checked />
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
