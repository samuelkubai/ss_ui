<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> | {{ $title}}</title>
    <link  rel="icon" href="{{ asset('icons/main.png') }}" type="image/icon"/>
    <link  rel="shortcut icon" href="{{ asset('icons/main.png') }}" type="image/icon"/>
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
    <!-- Angular -->
    <script src="{{ asset('/js/angular.min.js') }}"></script>
    @yield('styles')
</head>