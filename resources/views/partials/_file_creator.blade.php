<div id="uploadFilesForm" style="display: none">
    <h3>Upload Files</h3>

    <div class="hr-line-dashed"></div>
    <form action="{{ url('#') }}" method="post">
        <div class="form-group">
            <input type="file" multiple placeholder="Enter your email" class="form-control">
        </div>

        <div class="form-group">
            <select name="topic" id="topic" class="form-control">
                <option value="">Select a topic</option>
                <option value=""></option>
            </select>
        </div>

        @include('partials._single_group_selector')
        <button type="submit" class="btn btn-sm btn-primary pull-right"><i
                    class="fa fa-upload"></i> Upload
        </button>
        <button type="button" class="btn btn-sm btn-white" id="hideFileCreatorBtn">
            <i class="fa fa-times-circle"></i> Close
        </button>
    </form>
</div>