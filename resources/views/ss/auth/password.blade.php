<!DOCTYPE html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Forgot your password?</title>

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
        <h3>Password reset</h3>

        <p>Forgot you password, do not worry we just need the email you used for your account.</p>
        @if (count($errors) > 0)
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="alert alert-danger">{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <form class="m-t" role="form" method="post" action="{{ url('/password/email') }}">
            {!! csrf_field() !!}

            <div class="form-group">
                <label for="email" class="control-label">What email did you create the account with?</label>
                <input type="email"
                       class="form-control"
                       placeholder="Email"
                       name="email"
                       ng-model="form.email"
                       required>
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b">Send Password Reset Link</button>

            <p class="text-muted text-center"><small>Cancel password reset?</small></p>
            <a class="btn btn-sm btn-white btn-block" href="{{ url('/login') }}">Login</a>
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