<nav class="navbar navbar-default">
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active">
			<a href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
		  </li>
        <li><a href="{{ url('/groups') }}">Groups</a></li>
        <li><a href="{{ url('noticeboard') }}">Noticeboard</a></li>
        <li><a href="{{ url('forums') }}">Forums</a></li>
        <li><a href="#">Backpack</a></li>
        <li><a href="#">Profile</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Settings</a></li>
        <li><a href="#">Logout</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
	
    <div class="navbar-header">
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="#">SS+</a>
    </div>
</nav>