<h2 class="group-search-tagline" id="groupsPage">
    {{ $title }}
    <span class="pull-right">
        <a href="#"
           data-toggle="modal"
           id="groupCreateButton"
           data-target="#createGroup"
           class="btn btn-sm btn-info">
            <i class="fa fa-plus"></i> Create Group</a>
    </span>
</h2>
<div class="search-form">
    <div class="input-group">
        <input type="search"
               placeholder="Search by group name or group institution..."
               name="q"
               ng-model="search.group.$"
               class="form-control input-lg">

        <div class="input-group-btn">
            <button class="btn btn-lg btn-primary" type="submit">
                <i class="fa fa-search fa-lg"></i>
            </button>
        </div>
    </div>
</div>

<span class="group-search-filter-section">
    <span class="file-control">
        <label>
            <input type="checkbox" ng-model="search.group.institution"
                   ng-true-value="'{{ Auth::user()->institution->name }}'" ng-false-value="">
            My Institution's Groups
        </label>
    </span>
    <span class="file-control">
        <label>
            <input type="checkbox" ng-model="search.group.joined"
                   ng-true-value="true" ng-false-value="">
            My Groups
        </label>
    </span>
</span>

