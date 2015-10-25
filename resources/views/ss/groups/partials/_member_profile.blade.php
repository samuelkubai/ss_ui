<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>Profile Detail</h5>
    </div>
    <div>
        <div class="ibox-content no-padding border-left-right">
            <img alt="image" class="img-responsive group-update-pic" src="{{ asset($member->profilePictureSource()) }}">
        </div>
        <div class="ibox-content profile-content">
            <h4><strong>{{ $member->first_name . ' ' . $member->last_name }}</strong></h4>
            <p><i class="fa fa-building-o"></i> {{ $member->institution->name }}</p>
            <h5>
                Email: {{ $member->email }}
            </h5>
        </div>
    </div>
</div>