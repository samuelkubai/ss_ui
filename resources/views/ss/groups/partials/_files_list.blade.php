<div class="col-lg-9 animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <span  dir-paginate="file in allFiles | filter:search | itemsPerPage: pageSize">


                <div class="file-box">
                    <div class="file">
                        <a href="#">
                            <span class="corner"></span>

                            <div class="image">
                                <img ng-src="@{{ file.path }}" alt="@{{ file.name }}' image."
                                     class="img-responsive">
                            </div>
                            <div class="file-name">
                                @{{ file.name }}
                                <br>
                                <small>Topic: <b>@{{ file.topic }}</b></small>
                                <br>
                                <span ng-show="moreIndex == $index">
                                    <small>Added: <b>@{{ file.created_at }}</b></small>
                                    <br>
                                    <small>By: <b>@{{ file.user.name }}</b></small>
                                    <br>
                                </span>
                                <small>
                                    <button class="btn btn-xs btn-white"
                                            ng-hide="moreIndex == $index"
                                            ng-click="showMoreDetails($index)">
                                        <i class="fa fa-chevron-down"></i>
                                    </button>
                                </small>
                                <small>
                                    <button class="btn btn-xs btn-white"
                                            ng-show="moreIndex == $index"
                                            ng-click="showLessDetails()">
                                        <i class="fa fa-chevron-up"></i>
                                    </button>
                                </small>
                                <button type="button"
                                        data-toggle="modal"
                                        data-target="#add_to_backpack"
                                        ng-click="addToBacpack(file)"
                                        class="file-options-option btn btn-xs btn-white pull-right">
                                    <i class="fa fa-briefcase"></i>
                                </button>
                                <button type="button"
                                        data-toggle="modal"
                                        data-target="#delete_file"
                                        ng-click="deleteFile(file)"
                                        class="file-options-option btn btn-xs btn-white pull-right">
                                    <i class="glyphicon glyphicon-remove-circle"></i>
                                </button>
                            </div>
                        </a>
                    </div>
                </div>

            </span>
        </div>
    </div>
</div>