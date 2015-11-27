<li class="" data-toggle="tooltip" data-placement="right" title="Profile Information">
    <a href="{{ url('profile') }}"
       class="btn btn-lg btn-rounded
                @if($title =='My Profile')
                    btn-primary
                @else
                    btn-white
                @endif
            ">
        <i class="fa fa-info-circle"></i>
    </a>
</li>

<li class="" data-toggle="tooltip" data-placement="right" title="Your settings">
    <a href="{{ url('profile') }}"
       class="btn btn-lg btn-rounded
                @if($title == 'My Settings')
               btn-primary
           @else
               btn-white
           @endif
               ">
        <i class="fa fa-cogs"></i>
    </a>
</li>