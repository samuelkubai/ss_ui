<a href="@{{ activity.user.url }}" class="pull-left">
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
                 ng-show="activity.file.icon"
                 ng-src="@{{activity.file.icon }}"
                 alt="File Icon">
            <img class="activity-file-pic col-md-4"
                 ng-hide="activity.file.icon"
                 ng-src="@{{activity.file.path }}"
                 alt="File Picture">
        </a>

        <div class="activity-file-description-block col-md-8">
            <a href="@{{ activity.file.path  }}" class="activity-file-title">@{{ activity.file.title }}</a><br>
            <span class="activity-file-topic"> Topic: <b>@{{ activity.file.topic }}</b></span> <br>

            <div class="activity-file-size pull-left">
                <span ng-hide="activity.file.inBackpack">
                    <a ng-click="addToBackpack(activity.file, $index)"
                       ng-hide="addingIndex == $index"
                       class="btn btn-sm btn-info">
                        <i class="fa fa-plus"></i> Backpack
                    </a>
                    <a ng-show="addingIndex == $index"
                       class="btn btn-sm btn-info">
                        <i class="fa fa-spinner fa-spin"></i> Adding
                    </a>
                </span>
                <span ng-show="activity.file.inBackpack">
                    <a class="btn btn-sm btn-info disabled">
                        In Backpack
                    </a>
                </span>

                <a href="@{{activity.file.path }}" class="btn btn-sm btn-white"><i class="fa fa-download"></i> Download</a>
            </div>
        </div>
    </div>

</div>
