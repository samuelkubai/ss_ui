<!DOCTYPE html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title }}</title>

    <link href="{{ asset('ss/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('ss/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('ss/css/plugins/iCheck/custom.css') }}" rel="stylesheet">

    <link href="{{ asset('ss/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('ss/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('ss/css/login.css') }}" rel="stylesheet">

</head>

<body class="gray-bg">

<div class="middle-box text-center loginscreen  animated fadeInDown">
    <div ng-show="step == 7" class="fx-bounce-right fx-speed-20">
        <div>

            <h1 class="logo-name login-logo" style="color: #18a689;">SS+</h1>

        </div>
        <h3>Please activate your account</h3>

        <p>
            An email has been resent to your email address please check and verify your email.
        </p>
        <p>...then you can continue enjoying skoolspace.</p>
        <br>

        <p>

        <a href="{{ url('notActivated/'.$user->id) }}"
                class="btn btn-sm btn-info btn-block">Resend the confirmation email.</a>
        </p>

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