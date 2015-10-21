<div id="uploadFilesForm" style="display: none">
    <h3>Upload Files</h3>

    <div class="hr-line-dashed"></div>
    <form action="{{ url('upload/file') }}" method="post" enctype="multipart/form-data" data-parsley-validate>
        {!! csrf_field() !!}
        <div class="form-group">
            <input type="file" name="files[]" multiple placeholder="Enter your email" class="form-control" required>
        </div>

        @include('partials._single_topic_selector')

        <input type="text" name="group" value="{{ $group->username }}" hidden>

        <button type="submit" class="btn btn-sm btn-primary pull-right"><i
                    class="fa fa-upload"></i> Upload
        </button>
        <button type="button" class="btn btn-sm btn-white" id="hideFileCreatorBtn">
            <i class="fa fa-times-circle"></i> Close
        </button>
    </form>
</div>