<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SS+ | Page not found</title>

    <link href="{{ asset('css/login.min.css') }}" rel="stylesheet">

</head>

<body class="gray-bg">


<div class="middle-box text-center animated fadeInDown">
    <h1>404</h1>
    <h3 class="font-bold">Page Not Found</h3>

    <div class="error-desc">
        Sorry, but the page you are looking for has note been found. Try checking the URL for error, then hit the refresh button on your browser or try found something else in our app.
        <br><a href="{{ url('/') }}" class="btn btn-primary m-t">Back Home</a>
    </div>
</div>

<!-- Mainly scripts -->
<script src="{{ asset('js/login.min.js') }}"></script>

</body>

</html>
