<div class="ibox float-e-margins">
    <div class="ibox-content">
        <div class="file-manager">
            <button class="btn btn-primary btn-block" id="nb-noticeCreatorShowBtn">
                <i class="glyphicon glyphicon-pushpin"></i> Pin Notice
            </button>
            <!-- Notice creation section -->
            @include('partials._notice_creator')

            <!-- Notice filtering section -->
            @include('ss.noticeboards.partials._notice_search_section')
            <div class="clearfix"></div>
        </div>
    </div>
</div>