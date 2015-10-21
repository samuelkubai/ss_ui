<div>
    <div class="feed-activity-list" >
        <div class="feed-element" ng-repeat="activity in activities">
            <span ng-show="fileActivity(activity)">
                @include('ss.activity.statuses.add_file')
            </span>
            <span ng-hide="fileActivity(activity)">
                @include('ss.activity.statuses.add_notice')
            </span>
        </div>
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