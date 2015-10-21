<div class="row">
    @foreach($members as $member)
        <div class="col-lg-4">
            <div class="contact-box">
                <a href="{{ url('group/'.$group->username.'/member/'.$member->id) }}">
                    <div class="col-sm-4">
                        <div class="text-center">
                            <img alt="image" class="img-circle m-t-xs img-responsive" src="{{ asset($member->profilePictureSource()) }}">
                            <div class="m-t-xs font-bold">{{ $member->profilePictureSource() }}</div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <h3><strong>{{ $member->first_name }}</strong></h3>
                        <p><i class="fa fa-map-marker"></i> Riviera State 32/106</p>
                        <address>
                            <strong>Twitter, Inc.</strong><br>
                            795 Folsom Ave, Suite 600<br>
                            San Francisco, CA 94107<br>
                            <abbr title="Phone">P:</abbr> {{ $member->email }}
                        </address>
                    </div>
                    <div class="clearfix"></div>
                </a>
            </div>
        </div>
    @endforeach
</div>