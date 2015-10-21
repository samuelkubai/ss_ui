<div class="modal inmodal in" id="createGroup" tabindex="-1" role="dialog" aria-hidden="false" style="display: none;"><div class="modal-backdrop  in"></div>
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true"><i class="glyphicon glyphicon-remove-circle"></i></span><span class="sr-only">Close</span></button>
                <i class="fa fa-group modal-icon"></i>
                <h4 class="modal-title">Create Group</h4>
            </div>
            <form action="{{ url('group/create') }}" method="post" data-parsley-validate>
                {!! csrf_field() !!}
                <div class="modal-body">
                        <div class="form-group">
                            <input type="text"
                                   placeholder="Enter your group's name"
                                   name="name" class="form-control"
                                   required>
                        </div>

                        <div class="form-group">
                            <input type="text"
                                   placeholder="Enter your group's unique username"
                                   name="username" class="form-control"
                                   required>
                        </div>

                        <div class="form-group">
                            <textarea
                                    name="description"
                                    id="message"
                                    cols="30" rows="3"
                                    class="form-control"
                                    placeholder="Enter group's brief description..." required></textarea>
                        </div>

                        @include('partials._single_institution_select')


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                    <button type="submit"
                            class="btn btn-primary">
                       <i class="fa fa-group"></i> Create Group
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>