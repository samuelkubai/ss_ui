<a href="/" class="pull-left">
    <img alt="image" class="img-circle" ng-src="@{{ activity.user.picture }}">
</a>

<div class="media-body activity-body">
    <small class="feed-date pull-right text-navy">@{{ activity.created_at }}</small>
    <strong>
        <a href="@{{ activity.user.url }}">@{{ activity.user.name }}</a>
    </strong> created a new pin on
    <strong>
        <a href="@{{ activity.group.url }}">@{{ activity.group.name }}</a>
    </strong>.
    <br>
    <small class="text-muted">@{{ activity.notice.created_at }}</small>

    <div class="well activity-notice">
        <small>@{{ activity.notice.created_at }}</small>
        <h4>@{{ activity.notice.title }}</h4>
        @{{ activity.notice.message }}
    </div>
    <br>
</div>
