<li class="" data-toggle="tooltip" data-placement="right" title="Group Activities">
    <a href="{{ url('group/'.$group->username) }}"
       class="btn btn-lg btn-rounded
                @if($title == $group->name)
                    btn-primary
                @else
                    btn-white
                @endif
            ">
        <i class="fa fa-home"></i>
    </a>
</li>
@if($group->isAMember(\Auth::user()))
    <li class="" data-toggle="tooltip" data-placement="right" title="Group Files">
        <a href="{{ url('group/'.$group->username.'/files') }}"
           class="btn btn-lg btn-rounded
            @if($title == $group->name . "'s files")
                btn-primary
            @else
                btn-white
            @endif

                ">
            <i class="fa fa-folder"></i>
        </a>
    </li>
    <li class="" data-toggle="tooltip" data-placement="right" title="{{ $group->members->count() }} Members">
        <a href="{{ url('group/'.$group->username.'/members') }}"
           class="btn btn-lg btn-rounded
            @if($title == 'Group  Members' || $title == $group->name. "'s Members")
                btn-primary
            @else
                btn-white
            @endif
                ">
            <i class="fa fa-user"></i>
        </a>
    </li>
    @if($group->isAdministrator(\Auth::user()))
    <li class="" data-toggle="tooltip" data-placement="right" title="Edit group">
        <a href="{{ url('group/'.$group->username.'/update') }}"
           class="btn btn-lg btn-rounded
            @if($title == $group->name. ' Update')
                btn-primary
            @else
                btn-white
            @endif
                ">
            <i class="fa fa-edit"></i>
        </a>
    </li>
    @endif
@else
    <li class="">
        <a href="{{ url('group/' . $group->username . '/join') }}"
           class="btn btn-lg btn-rounded btn-white">
            <i class="fa fa-plus fa-lg"></i>
        </a>
    </li>
@endif