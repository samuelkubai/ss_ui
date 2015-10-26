<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>Profile Detail</h5>

    </div>
    <div>
        <div class="ibox-content no-padding border-left-right">
            <img alt="image" class="img-responsive group-update-pic" src="{{ asset($user->profilePictureSource()) }}">
        </div>
        <div class="ibox-content profile-content">
            <h4><strong>{{ $user->first_name. ' ' .$user->last_name }}</strong></h4>
            <p><i class="fa fa-building-o"></i> {{ $user->institution->name }}</p>
            <p><i class="fa fa-bookmark"></i> {{ $user->course->name }}</p>
            <h5>
                Email: {{ $user->email }}
            </h5>
        </div>
    </div>
</div>