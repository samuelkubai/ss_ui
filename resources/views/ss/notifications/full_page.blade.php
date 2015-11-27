<div class="wrapper wrapper-content" style="padding-top: 2px;">
    <div class="row animated fadeInRight">
        <div class="col-md-6 col-md-offset-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <a href="" style="color: inherit" ng-click="hideAlerts()">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>

                    <div class="ibox-tools">
                        <a href="">
                            Clear all
                        </a>
                    </div>
                </div>
                <div class="ibox-content">

                    <div>
                        <div class="feed-activity-list">
                            @for($i = 0; $i < 10; $i++)
                                <div class="feed-element">
                                    <a href="#" class="pull-left">
                                        <img alt="image" class="img-circle" src="{{ asset('icons/user_avatar.png') }}">
                                    </a>

                                    <div class="media-body">
                                        <a href="" style="color: inherit">
                                            <small class="pull-right">
                                                <button class="btn btn-xs btn-white btn-rounded"><i class="fa fa-angle-double-right"></i></button>
                                            </small>
                                                <strong>Monica Smith</strong> posted a new blog <strong>Bsc.IT {{ ++$i }}rd class group</strong> <br>
                                            <small class="text-muted">Today 5:60 pm - 12.06.2014</small>
                                        </a>
                                    </div>
                                </div>
                            @endfor
                        </div>

                        <button class="btn btn-info btn-block m more-posts-btn">
                            <i class="fa fa-archive"></i> Older Alerts
                        </button>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>