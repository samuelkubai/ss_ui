<!DOCTYPE html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title }}</title>

    <link  rel="icon" href="{{ asset('icons/main.png') }}" type="image/icon"/>
    <link  rel="shortcut icon" href="{{ asset('icons/main.png') }}" type="image/icon"/>

    <link href="{{ asset('js/login.min.css') }}" rel="stylesheet">


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

        <p class="m-t"> <small>The skoolspace app &copy; 2015</small> </p>
    </div>
</div>

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