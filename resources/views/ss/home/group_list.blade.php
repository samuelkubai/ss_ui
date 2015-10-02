<div class="ibox float-e-margins">
    <div class="ibox-title blue-skin" style="color: #ffffff;" data-toggle="tooltip"
         data-placement="bottom" title="This are the groups you are currently part of.">
        <i class="fa fa-group"></i> Groups
    </div>
    <div class="ibox-content">
        <div class="file-manager">
            <div class="input-group m-b">
                <input type="text" class="form-control" placeholder="Search for a group..">
                <span class="input-group-btn">
                    <button type="button" class="btn btn-primary"><i class="fa fa-search"></i></button>
                </span>
            </div>
            <ul class="folder-list" style="padding: 0">
                <li class="group-list-item">
                    <a href="#" class="group-list-label" style="color: white;padding-left: 90px;">
                        My Groups
                    </a>
                </li>
                @for($i = 1; $i <= 3; $i++)
                    <li class="group-list-item">
                        <a href="/">
                                <img
                                    src="{{ asset('ss/img/profile.jpg') }}"
                                    alt=" Group Number: {{ $i }}'s image "
                                    class="img-circle small-group-pic">
                            <span class="small-group-name">
                                Bsc. IT 2ND CLASS OF 2012
                            </span>
                        </a>
                        <a href="" class="" style="float: right;margin-top:-35px;"><i class="glyphicon glyphicon-remove-circle" ></i></a>
                    </li>
                @endfor
                    <li class="group-list-item">
                            <a href="{{ url('/groups/all') }}" class="group-list-label" style="padding-left: 90px;color: white;">
                                All Groups
                            </a>
                    </li>
                @for($i = 1; $i <= 3; $i++)
                    <li class="group-list-item">
                        <a href="/">
                            <img
                                    src="{{ asset('ss/img/profile.jpg') }}"
                                    alt=" Group Number: {{ $i }}'s image "
                                    class="img-circle small-group-pic">
                            <span class="small-group-name">
                                Bsc. IT 2ND CLASS OF 201{{ $i }}
                            </span>
                        </a>
                        <a href="" class="" style="float: right;margin-top:-35px;"><i class="fa fa-plus-circle" ></i></a>
                    </li>
                @endfor
            </ul>
        </div>
    </div>
</div>