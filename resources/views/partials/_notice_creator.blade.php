<div id="createNoticeForm" style="display: none">
    <h3>Create Notice</h3>

    <div class="hr-line-dashed"></div>
    <form action="{{ url('/noticeboard/create') }}" method="post" data-parsley-validate>
        {!! csrf_field() !!}
        <div class="form-group">
            <input type="text" name="title" placeholder="Notice title..."
                   class="form-control" required>
        </div>

        <div class="form-group">
            <textarea name="message" id="message" cols="30" rows="3" placeholder="Write the notice's message..."
                      class="form-control" required></textarea>
        </div>

        @include('partials._single_required_group_selector')

        <button type="submit" class="btn btn-sm btn-primary pull-right"><i
                    class="glyphicon glyphicon-pushpin" id="createNoticeFormButton"></i> Pin
        </button>
        <button type="button" class="btn btn-sm btn-white" id="hideNoticeCreatorBtn">
            <i class="fa fa-times-circle"></i> Close
        </button>
    </form>
</div>