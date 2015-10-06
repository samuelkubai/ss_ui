<div class="col-lg-12">
    <div class="panel blank-panel">

        <div class="panel-body ">
            <ul class="group-navigation">
                <li class="active"><a href="{{ url('group/'.$group->id) }}" class="btn btn-lg btn-rounded btn-primary"><i class="fa fa-laptop"></i></a></li>
                <li class=""><a href="{{ url('group/files') }}" class="btn btn-lg btn-rounded btn-white"><i class="fa fa-folder"></i></a></li>
                <li class=""><a href="{{ url('group/members') }}" class="btn btn-lg btn-rounded btn-white"><i class="fa fa-users"></i></a></li>
                <li class=""><a href="{{ url('group/'.$group->id.'/update') }}" class="btn btn-lg btn-rounded btn-white"><i class="fa fa-edit"></i></a></li>
            </ul>

            <ul class="mobile-group-navigation">
                <li class="active"><a href="#" class="btn btn-lg btn-rounded btn-primary"><i class="fa fa-laptop"></i></a></li>
                <li class=""><a href="#" class="btn btn-lg btn-rounded btn-primary"><i class="fa fa-desktop"></i></a></li>
                <li class=""><a href="#" class="btn btn-lg btn-rounded btn-primary"><i class="fa fa-signal"></i></a></li>
                <li class=""><a href="#" class="btn btn-lg btn-rounded btn-primary"><i class="fa fa-fa-edit"></i></a></li>
            </ul>
        </div>
    </div>
</div>