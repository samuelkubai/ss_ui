<div class="col-lg-12" ng-hide="loading == true">
    <div class="wrapper wrapper-content animated fadeInUp" >
        <ul class="notes">
            <li class="fx-fade-up fx-speed-800" ng-repeat="notice in filteredNotices = (searchedNotices = (allNotices | filter:search) | limitTo: numberOfNotices)">
                <div class="notice-card">
                    <small>@{{ notice.created_at }}</small>
                    <h4>@{{ notice.title }}</h4>

                    <p>@{{ notice.message }}</p>
                    <span class="pull-left">- @{{ notice.user.name }}</span>
                    <a data-toggle="modal"
                       data-target="#delete_notice"
                       ng-click="deleteNotice(notice)">
                        <i class="fa fa-trash-o pull-left"></i>
                    </a>
                </div>
            </li>
        </ul>
    </div>
    <h1 class="text-center" ng-show="filteredNotices.length == 0">No notices found.</h1>
</div>
<div class="col-lg-12" ng-show="loading == true">
    @include('partials._colorful_loader')
</div>
<nav class="text-center" ng-hide="filteredNotices.length == 0">
    <ul class="pager">
        <li ng-hide="filteredNotices.length >= searchedNotices.length ">
            <a href="" ng-click="showMoreNotices()"><i class="fa fa-spinner"></i> Load More Notices</a>
        </li>
        <li ng-show="filteredNotices.length >= searchedNotices.length" class="disabled">
            <a>No More Notices </a>
        </li>
    </ul>
</nav>