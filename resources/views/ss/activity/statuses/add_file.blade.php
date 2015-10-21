<a href="/" class="pull-left">
    <img alt="image" class="img-circle" ng-src="@{{ activity.user.picture }}">
</a>

<div class="media-body activity-body">
    <small class="feed-date pull-right text-navy">@{{ activity.created_at}}</small>
    <strong>
        <a href="@{{ activity.user.url }}">@{{ activity.user.name }}</a>
    </strong>
    added a new file on
    <strong>
        <a href="@{{ activity.group.url }}">@{{ activity.group.name }}</a>
    </strong>.
    <br>
    <small class="text-muted">@{{ activity.file.created_at}}</small>
    <div class="activity-file-block">
        <a href="@{{ activity.file.path  }}">
            <img class="activity-file-pic col-md-4"
                 ng-src="@{{activity.file.picture }}"
                 alt="File Picture">
        </a>

        <div class="activity-file-description-block col-md-8">
            <a href="@{{ activity.file.path  }}" class="activity-file-title">@{{ activity.file.title }}</a><br>
            <span class="activity-file-topic"> Topic: <b>@{{ activity.file.topic }}</b></span> <br>

            <div class="activity-file-size pull-left">
                <a href="#" class="btn btn-sm btn-info"><i class="fa fa-plus"></i> Backpack</a>
                <a href="@{{activity.file.path }}" class="btn btn-sm btn-white"><i class="fa fa-download"></i> Download</a>
            </div>
        </div>
    </div>

</div>
