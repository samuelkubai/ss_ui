<nav class="navbar navbar-static-top desktop-nav" role="navigation">
    <div class="navbar-header">
        <button aria-controls="navbar" aria-expanded="false"
                data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="fa fa-bars"></span>
        </button>
        <a href="{{ url('/') }}" class="navbar-brand" id="navbar-brand">SS+</a>
    </div>
    <div class="navbar-collapse collapse" id="navbar">

        <ul class="nav navbar-top-links navbar-right">

            <li>
                <a class="
                @if($title == 'Home')
                        nav-active
                 @endif
                 nav-icon"
                   aria-expanded="false" role="button" href="{{ url("/ ") }}">
                     Home
                </a>
            </li>

            <li>
                <a class="
                @if($title == 'BackPack')
                        nav-active
                 @endif
                        nav-icon" aria-expanded="false" role="button" href="{{ url("/backpack ") }}">
                    <i class="fa fa-briefcase fa-lg"></i> Backpack
                </a>
            </li>
            <li>
                <a class="
                @if($title == 'All Groups')
                        nav-active
                 @endif
                        nav-icon" aria-expanded="false" role="button" href="{{ url("/groups ") }}">
                    <i class="fa fa-group fa-lg"></i> Groups
                </a>
            </li>

            <li>
                <a class="
                @if($title == 'NoticeBoard')
                        nav-active
                 @endif
                        nav-icon" aria-expanded="false" role="button" href="{{ url("/noticeboard ") }}">
                    <i class="glyphicon glyphicon-pushpin nav-pushpin"></i> Board
                </a>
            </li>

            <li>
                <a class="mobile-show
                @if($title == 'My Profile')
                        nav-active
                 @endif
                        nav-icon" aria-expanded="false" role="button" href="{{ url("/profile ") }}">
                    <i class="fa fa-cogs"></i> Profile
                </a>
            </li>

            <li>
                <a class=" mobile-show nav-icon" aria-expanded="false" role="button" href="{{ url("/logout ") }}">
                    <i class="fa fa-sign-out"></i> Logout
                </a>
            </li>
            <li class="dropdown mobile-hide">
                <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#" aria-expanded="false">
                    <img alt="image" class="img-circle nav-prof-pic" src="{{ asset(\Auth::user()->profilePictureSource()) }}">
                    <i class="fa fa-angle-down fa-lg"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li>
                        <a class="nav-icon" aria-expanded="false" role="button" href="{{ url("/profile ") }}">
                            <i class="fa fa-user"></i> Profile
                        </a>
                        <a class="nav-icon" aria-expanded="false" role="button" href="{{ url("/logout ") }}">
                            <i class="fa fa-sign-out"></i> Logout
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>

<nav class="mobile-nav navbar navbar-static-top">
    <div class=" centre-nav " id="navbar">
        <ul class="nav navbar-top-links ">
            <li>
                <a class="
                @if($title == 'Home')
                        nav-active

                 @endif
                        nav-icon"
                   aria-expanded="false" role="button" href="{{ url("/ ") }}">
                    <i class="fa fa-home fa-lg"></i>
                </a>
            </li>

            <li>
                <a class="
                @if($title == 'BackPack')
                        nav-active
                 @endif
                        nav-icon" aria-expanded="false" role="button" href="{{ url("/backpack ") }}">
                    <i class="fa fa-briefcase fa-lg"></i>
                </a>
            </li>
            <li>
                <a class="
                @if($title == 'All Groups')
                        nav-active
                 @endif
                        nav-icon" aria-expanded="false" role="button" href="{{ url("/groups ") }}">
                    <i class="fa fa-group fa-lg"></i>
                </a>
            </li>

            <li>
                <a class="
                @if($title == 'NoticeBoard')
                        nav-active
                 @endif
                        nav-icon" aria-expanded="false" role="button" href="{{ url("/noticeboard ") }}">
                    <i class="glyphicon glyphicon-pushpin nav-pushpin"></i>
                </a>
            </li>

            <li class="pull-right">
                <a class="nav-icon" aria-expanded="false" role="button" href="{{ url("/logout") }}">
                    <i class="fa fa-sign-out fa-lg"></i>
                </a>
            </li>
            <li class="pull-right">
                <a class="nav-icon" aria-expanded="false" role="button" href="{{ url("/profile ") }}">
                    <i class="fa fa-user fa-lg"></i>
                </a>
            </li>
           <!-- <li class="dropdown mobile-hide ">
                <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#" aria-expanded="false">
                    <i class="fa fa-ellipsis-v fa-lg"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li>
                        <a class="nav-icon" aria-expanded="false" role="button" href="{{ url("/profile ") }}">
                            <i class="fa fa-cogs"></i> Profile
                        </a>
                        <a class="nav-icon" aria-expanded="false" role="button" href="{{ url("/logout ") }}">
                            <i class="fa fa-sign-out"></i> Logout
                        </a>
                    </li>
                </ul>
            </li> -->
        </ul>
    </div>
</nav>