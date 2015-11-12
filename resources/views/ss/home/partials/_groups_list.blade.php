<div class="col-lg-12">
    <div class="ibox float-e-margins group-list-container" id="groupListContainer" ng-controller="GroupWidgetController">
        <form action="" method="get">
            <div class="ibox-title" data-toggle="tooltip"
                 data-placement="bottom"
                 title="Quick access to all groups.">
                <h5>Groups</h5>

                <div class="ibox-tools">
                    <div class="home-search-switch checkbox">
                        <small class="home-search-switch-text">My Groups</small>

                        <label>
                            <input type="checkbox" ng-model="search.group.joined"
                                   ng-true-value="true" ng-false-value="">
                        </label>
                    </div>
                </div>
            </div>
            <div class="ibox-content">

                <div class="input-group">
                    <input type="text"
                           name="q"
                           placeholder="Search for a group..."
                           ng-model="search.group.$"
                           class="input-sm form-control">
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-search"></i></button>
                        </span>
                </div>

                <ul class="home-search-list" ng-hide="loading">
                    <span dir-paginate="group in filteredGroups = (allGroups | filter:search | itemsPerPage: pageSize)">
                        <li>
                            <a href="@{{ group.group.url }}">
                                <img class="home-search-pic col-md-4"
                                     ng-src="@{{ group.group.picture }}"
                                     alt="@{{ group.group.name }}'s profile picture"></a>
                             <span class="home-search-item">
                                 <a href="@{{ group.group.url }}"><h5
                                             class="home-search-title">@{{ group.group.name }}</h5></a>
                                    <span class="text-navy home-search-institution"> @{{ group.group.institution }}</span>
                                <div class="home-search-follow-btn ">
                                    <span class="pull-left home-search-description">
                                        @{{ group.group.description +  '...' }}
                                    </span>
                                    <span ng-show="group.group.joined">
                                        @include('partials._joined_leave_btn')
                                    </span>
                                    <span ng-hide="group.group.joined">
                                        @include('partials._follow_btn')
                                    </span>
                                </div>
                            </span>
                        </li>
                        <div class="hr-line-dashed home-search-divider"></div>
                    </span>

                    <dir-pagination-controls boundary-links="true"
                                             template-url="/ss/angular/vendor/pagination/dirPagination.tpl.html"></dir-pagination-controls>
                    <span ng-show="filteredGroups.length == 0">
                        <div class="hr-line-dashed home-search-divider"></div>
                        <li>
                            <h3 class="text-center">No Groups found.</h3>
                        </li>
                        <div class="hr-line-dashed home-search-divider"></div>
                    </span>

                </ul>
                <div ng-show="loading">
                    <h3 class="text-center">Fetching groups <i class="fa fa-spinner fa-spin"></i></h3>
                </div>
            </div>
        </form>
    </div>
</div>