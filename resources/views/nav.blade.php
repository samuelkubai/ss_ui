<nav class="navbar navbar-static-top" role="navigation">
    <div class="navbar-header">
        <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
            <i class="fa fa-reorder"></i>
            <span class="fa fa-bars"></span>
        </button>
        <a href="{{ url('/') }}" class="navbar-brand">SS+</a>
    </div>
    <div class="navbar-collapse collapse" id="navbar">
        <ul class="nav navbar-nav nav-menu">
            <li class="">
                <a class="nav-icon" aria-expanded="false" role="button" href="{{ url('/') }}">
                    <i class="fa fa-home fa-lg"></i>
                    Home
                </a>
            </li>
            <li>
                <a class="nav-icon" aria-expanded="false" role="button"  style="padding-left: 6px; padding-right: 6px" href="{{ url("/backpack ") }}">
                    <i class="fa fa-briefcase fa-lg"></i> Backpack
                </a>
            </li>
        </ul>
        <form class="navbar-form navbar-left" role="search">
            <div class="nav-search-group form-group">
                <input type="text" class="nav-search form-control" placeholder="Search files in your backpack...">
                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
            </div>
        </form>
        <ul class="nav navbar-top-links navbar-right">
            <li>
                <a class="nav-icon" aria-expanded="false" role="button" href="{{ url("/groups ") }}"> <i class="fa fa-group fa-lg"></i></a>
            </li>

            <li>
                <a class="nav-icon" aria-expanded="false" role="button" href="{{ url("/noticeboard ") }}"> <i class="glyphicon glyphicon-pushpin nav-pushpin"></i></a>
            </li>

            <li>
                <a class="nav-icon" aria-expanded="false" role="button" href="{{ url("/discussions ") }}"> <i class="fa fa-comments fa-lg"></i></a>
            </li>


            <li>
                <a class="nav-icon" aria-expanded="false" role="button" href="{{ url("/profile/") }}" >
                    <img src="{{asset('ss/img/profile.jpg')}}"
                         alt="User's Profile Picture"
                         class="img-circle nav-prof-pic">
                </a>
            </li>
            <li>
                <a class="nav-icon" aria-expanded="false" role="button" href="{{ url("/logout ") }}"> <i class="fa fa-sign-out fa-lg"></i></a>
            </li>
        </ul>
    </div>
</nav>