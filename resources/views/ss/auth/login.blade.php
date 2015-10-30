<!DOCTYPE html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Welcome to skoolspace</title>
    <link  rel="icon" href="{{ asset('ss/icons/main.png') }}" type="image/icon"/>
    <link  rel="shortcut icon" href="{{ asset('ss/icons/main.png') }}" type="image/icon"/>
    <link href="{{ asset('ss/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('ss/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('ss/css/plugins/iCheck/custom.css') }}" rel="stylesheet">

    <link href="{{ asset('ss/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('ss/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('ss/css/login.css') }}" rel="stylesheet">

</head>

<body class="gray-bg">

<div class="middle-box text-center loginscreen  animated fadeInDown">
    <div>
        <div>

            <h1 class="logo-name login-logo">SS+</h1>

        </div>
        <h3>Welcome to skoolspace</h3>
        <p>
            Where we help you get and share files and notifications to your fellow students easily.
        </p>
        <p>Login in. To see it in action.</p>
        @if (count($errors) > 0)
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="alert alert-danger">{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <form class="m-t" role="form" method="post" action="{{ url('/login') }}">
            {!! csrf_field() !!}

            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Email" required="">
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password" required="">
            </div>
            <div class="form-group">
                <div class="checkbox i-checks"><label> <input type="checkbox" name="remember"><i></i> Remember Me </label></div>
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

            <a href="{{ url('password/email') }}"><small>Forgot password?</small></a>
            <p class="text-muted text-center"><small>Do not have an account?</small></p>
            <a class="btn btn-sm btn-white btn-block" href="{{ url('/register') }}">Create an account</a>
        </form>
        <p class="m-t"> <small>The skoolspace app © 2015</small> </p>
    </div>
</div>

<!-- Mainly scripts -->
<script src="{{ asset('ss/js/jquery-2.1.1.js') }}"></script>
<script src="{{ asset('ss/js/bootstrap.min.js') }}"></script>

<!-- iCheck -->
<script src="{{ asset('ss/js/plugins/iCheck/icheck.min.js') }}"></script>
<script>
    $(document).ready(function(){
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
    });
</script>



</body>
</html>