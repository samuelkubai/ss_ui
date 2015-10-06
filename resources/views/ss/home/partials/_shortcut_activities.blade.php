<div class="ibox">
    <div class="ibox-title">
        <h4>Share something with your friends...</h4>
    </div>
    <div class="ibox-content" id="creatorSpace" style="display: none">
        @include('partials._notice_creator')
        @include('partials._file_creator')
    </div>
    <div class="panel-footer">
        <button class="btn btn-sm btn-primary" id="showNoticeCreatorBtn">
            <i class="glyphicon glyphicon-pushpin"></i> Create Pin
        </button>
        <button class="btn btn-sm btn-primary" id="showFilesCreatorBtn">
            <i class="fa fa-upload"></i> Upload Files
        </button>
    </div>
</div>