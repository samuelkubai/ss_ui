<div class="ibox float-e-margins">
    <div class="ibox-title update-form">
        <h5>Group Profile</h5>

        <div class="ibox-tools">

        </div>
    </div>

    <div class="ibox-content">
        <form action="{{ url('/group/'.$group->id.'/update/') }}" method="POST" enctype="multipart/form-data">
            {!! csrf_field() !!}
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
                               placeholder="Unique Username" value="{{ $group->username }}" required="required">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-6">
                        <input name="name" type="text" class="form-control" placeholder="Group Name"
                               value="{{ $group->name }}" required="required">
                    </div>
                    <div class="col-md-6">
                        @include('partials._single_institution_select')
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <div class="chat-message-form">
                            <div class="form-group">
                                <textarea class="form-control message-input" name="description"
                                          placeholder="Brief Description"
                                          required="required">
                                    {{ $group->description }}
                                </textarea>
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
