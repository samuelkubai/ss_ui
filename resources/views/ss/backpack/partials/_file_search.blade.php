<div class="hr-line-dashed"></div>
<form action="{{ url('#') }}" method="post">
    <h5>Search</h5>
    <div class="input-group">
        <input type="text" placeholder="Search by name, owner or topic" class="input-sm form-control">
    <span class="input-group-btn">
        <button type="button" class="btn btn-sm btn-primary"><i class="fa fa-search"></i></button>
    </span>
    </div>
    <div class="hr-line-dashed"></div>
    <h5>Show</h5>
    <div class="radio i-checks"><label> <input type="radio" value="option1" name="a" checked> <i></i> All Files </label></div>
    <div class="radio i-checks"><label> <input type="radio" value="option1" name="a"> <i></i> Only My Files </label></div>
</form>
