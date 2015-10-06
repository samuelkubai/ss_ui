<h2 class="group-search-tagline">
    All groups
    <span class="pull-right"><a data-toggle="modal" href="#" data-target="#createGroup" class="btn btn-sm btn-info"><i class="fa fa-plus"></i> Create Group</a></span>
</h2>
<div class="search-form">
    <form action="{{ url('/groups/') }}" method="get">
        <div class="input-group">
            <input type="search" placeholder="Search by group name or group institution..." name="q" class="form-control input-lg">
            <div class="input-group-btn">
                <button class="btn btn-lg btn-primary" type="submit">
                    <i class="fa fa-search fa-lg"></i>
                </button>
            </div>
        </div>
    </form>
</div>
<span class="file-control"><label><input type="radio" value="option1" name="a" checked> <i></i> All Groups </label></span>
<span class="file-control"><label><input type="radio" value="option1" name="a"> <i></i> My institution's groups </label></span>
<span class="file-control"><label><input type="radio" value="option1" name="a"> <i></i> My Groups </label></span>
