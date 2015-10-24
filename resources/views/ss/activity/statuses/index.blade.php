<div>
    <div class="feed-activity-list" ng-hide="loading == true">
        <div class="feed-element fx-fade-down fx-speed-800" ng-repeat="activity in activities">
            <span ng-show="fileActivity(activity)">
                @include('ss.activity.statuses.add_file')
            </span>
            <span ng-hide="fileActivity(activity)">
                @include('ss.activity.statuses.add_notice')
            </span>
        </div>
        <span ng-show="activities.length == 0">
            <h2 class="text-center">No activities found, but</h2>
            <h4 class="text-center">you can try out skoolspace features and enjoy various activities </h4>
        </span>

    </div>
    <div class="feed-activity-list" ng-show="loading == true">
        @include('partials._circular_loader')
    </div>
    <button
            class="btn btn-primary btn-block m more-posts-btn"
            ladda="loadingPosts"
            data-style="expand-left"
            ng-show="hasMoreActivities"
            ng-click="loadMore()">
        <span ng-hide="loadingPosts">
            <i class="fa fa-arrow-down" ></i> Show More
        </span>
        <span ng-show="loadingPosts">
            <i class="fa fa-spinner fa-spin"></i> Loading Posts
        </span>

    </button>
    <button
            disabled
            class="btn btn-primary btn-block m more-posts-btn"
            ladda="loadingPosts"
            data-style="expand-left"
            ng-hide="hasMoreActivities">
        <span ng-hide="loadingPosts">
             No More Posts
        </span>
    </button>
</div>