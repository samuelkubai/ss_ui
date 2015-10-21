<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>Group Profile</h5>
    </div>
    <div>
        <div class="ibox-content no-padding border-left-right">
            <img alt="image" class="img-responsive group-update-pic" src="{{ asset($group->profilePictureSource()) }}">
        </div>
        <div class="ibox-content profile-content">
            <h4><strong>{{ $group->name }}</strong></h4>
            <p><i class="fa fa-map-marker"></i> {{ $group->institution()->first()->name }}</p>
            <h5>
                Group Description
            </h5>
            <p>
                {{ $group->description }}
            </p>
        </div>
    </div>
</div>