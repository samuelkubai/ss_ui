<div class="row">
    @foreach($members as $member)
        <div class="col-lg-4">
            <div class="contact-box">
                <a href="{{ url('/'.$group->username.'/'.$member->id.'/member') }}">
                    <div class="col-sm-4">
                        <div class="text-center">
                            <img alt="image" class="img-circle m-t-xs img-responsive" src="{{ asset($member->profilePictureSource()) }}">
                            @if($group->isAdministrator($member))
                                <div class="m-t-xs font-bold" style="color: #1ab394;">Admin</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <h3><strong>{{ $member->first_name }}</strong></h3>
                        <p><i class="fa fa-building-o"></i> {{ $member->institution->name }}</p>
                        <p><i class="fa fa-bookmark"></i> {{ $member->course->name }}</p>
                        <address>
                            <abbr title="Email">E:</abbr> {{ $member->email }}
                        </address>
                    </div>
                    <div class="clearfix"></div>
                </a>
            </div>
        </div>
    @endforeach
</div>
<div class="text-center">
    {!! $members->render() !!}
</div>