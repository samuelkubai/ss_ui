<div class="hr-line-dashed"></div>
<h5>Search</h5>
<form method="get">
    <div class="input-group">
        <input type="text"
               ng-model="search.$"
               class="input-sm form-control"
               placeholder="Search by title and description...">
    <span class="input-group-btn">
        <button type="submit" class="btn btn-sm btn-primary"> <i class="fa fa-search"></i></button>
    </span>
    </div>
    <div class="hr-line-dashed notice-group-filter"></div>
    <h5 class="notice-group-filter">Filter by:</h5>
    <div class="form-group">
        <select  ng-model="search.group.username">
            <option value="">All Groups Combined.</option>
            @foreach(\Auth::user()->joinedGroups as $group)
                <option value="{{ $group->username }}">
                    {{ $group->name }}
                </option>
            @endforeach
        </select>
    </div>
</form>
