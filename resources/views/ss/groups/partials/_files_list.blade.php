<div class="col-lg-9 animated fadeInRight">
    <div class="row">
        <div class="col-lg-12" ng-hide="loading == true">
            <div class="file-box fx-zoom-down fx-speed-800"
                 ng-repeat="file in filteredFiles = (searchedFiles = (allFiles | filter:search) | limitTo:numberOfFiles)">
                <div class="file">
                    <a href="#">
                        <span class="corner"></span>

                        <div class="icon" ng-show="file.icon">
                            <a href="@{{ file.path }}">
                                <img ng-src="@{{ file.icon }}" alt="@{{ file.name }}' image.">
                            </a>
                        </div>
                        <div class="image" ng-hide="file.icon">
                            <a href="@{{ file.path }}">
                                <img ng-src="@{{ file.path }}" alt="@{{ file.name }}' image."
                                     class="img-responsive">
                            </a>
                        </div>
                        <div class="file-name">
                            @{{ file.name | cut:false:fileNameLength:' ....' }}
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
                                    ng-hide="file.inBackpack || addingIndex == $index"
                                    ng-click="addToBackpack(file, $index)"
                                    data-target="#add_to_backpack"
                                    class="file-options-option btn btn-xs btn-white pull-right">
                                <i class="fa fa-briefcase"></i>
                            </button>
                            <button type="button"
                                    ng-show="addingIndex == $index"
                                    class="file-options-option btn btn-xs btn-white pull-right">
                                <i class="fa fa-spinner fa-spin"></i>
                            </button>
                            <button type="button"
                                    data-toggle="modal"
                                    ng-show="file.yourFile"
                                    data-target="#delete_file"
                                    ng-click="deleteFile(file)"
                                    class="file-options-option btn btn-xs btn-white pull-right">
                                <i class="glyphicon glyphicon-remove-circle"></i>
                            </button>
                        </div>
                    </a>
                </div>
            </div>
            <h1 class="text-center fx-zoom-down fx-speed-800" ng-show="filteredFiles.length == 0 && loading == false">No Files found</h1>
            <h4 class="text-center fx-zoom-down fx-speed-800" ng-show="filteredFiles.length == 0 && loading == false">...feel free to upload more files.</h4>
        </div>
        <div class="col-lg-12" ng-show="loading == true">
            @include('partials._colorful_loader')
        </div>
    </div>
    <nav class="text-center" ng-hide="filteredFiles.length == 0">
        <ul class="pager">
            <li ng-hide="filteredFiles.length >= searchedFiles.length ">
                <a href="" ng-click="showMoreFiles()"><i class="fa fa-spinner"></i> Load More Files</a>
            </li>
            <li ng-show="filteredFiles.length >= searchedFiles.length" class="disabled">
                <a>No More Files </a>
            </li>
        </ul>
    </nav>
</div>
