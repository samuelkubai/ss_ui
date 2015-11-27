<!DOCTYPE html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Welcome to skoolspace</title>
    <link  rel="icon" href="{{ asset('icons/main.png') }}" type="image/icon"/>
    <link  rel="shortcut icon" href="{{ asset('icons/main.png') }}" type="image/icon"/>
    <link href="{{ asset('js/login.min.css') }}" rel="stylesheet">

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
        <p><a href="{{ url('/register') }}">Create an account,</a> To see it in action.</p>
        @if (count($errors) > 0)
                @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                @endforeach
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
            <button type="submit"
                    class="btn btn-primary block full-width m-b">Login</button>

            <a href="{{ url('password/email') }}"><small>Forgot password?</small></a>
            <p class="text-muted text-center"><small>Do not have an account?</small></p>
            <a class="btn btn-sm btn-info btn-block"
               href="{{ url('/register') }}"
                style="background-color: #1dc4a2!important;">Create an account</a>
        </form>
        <p class="m-t"> <small>The skoolspace app &copy; 2015</small> </p>
    </div>
</div>

<!-- Mainly scripts -->
<script src="{{ asset('js/login.min.js') }}"></script>
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