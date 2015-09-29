<html>
<head>
    <meta charset="UTF-8">
    <title>SS +</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="{{ asset('/css/style.min.css') }}">


</head>
<body>

@include('ss.nav.top.index')

@yield('content')

<!-- compiled and minified javascript -->
<script src="{{ asset('/js/libs/jquery.min.js') }}"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="{{ asset('/js/libs/bootstrap.min.js') }}"></script>
<script src="{{ asset('/js/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('/js/slick.min.js') }}"></script>
<script src="{{ asset('/js/app.js') }}"></script>

</body>
</html>