<div class="hr-line-dashed"></div>
<h5>Search</h5>
<form action="{{ url('#') }}" method="post">
    <div class="input-group">
        <input type="text" ng-model="search" placeholder="Search by notice name or group..." class="input-sm form-control">
    <span class="input-group-btn">
        <button type="button" class="btn btn-sm btn-primary"> Search</button>
    </span>
    </div>
    <div class="hr-line-dashed"></div>
    <h5>Show:</h5>
    <div class="radio i-checks"><label> <input type="radio" value="option1" name="a" checked> <i></i> All Note </label></div>
    <div class="radio i-checks"><label> <input type="radio" value="option1" name="a"> <i></i> Only My Notes </label></div>
    <div class="hr-line-dashed notice-group-filter"></div>
    <h5 class="notice-group-filter">Filter by:</h5>
    <div class="form-group notice-group-select-group">
        <select name="groups" id="groups" class="notice-group-select"></select>
    </div>
</form>
