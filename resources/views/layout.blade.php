<!DOCTYPE html>
<html lang="en" ng-app="skoolspace">
    @include('head')
<body class="top-navigation">

<div id="wrapper">
    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom white-bg">
            @include('nav')
        </div>
        <div class="wrapper wrapper-content" style="padding-right: 0px; padding-left: 0px; margin-right: 0px;">
             <!-- include('flash::message') -->
                @yield('content')
        </div>
        <div class="footer">
            <div class="pull-right">
                Share, notify, be informed, This is <b>skoolspace</b>.
            </div>
            <div>
                <strong>Copyright</strong> skoolspace &copy; 2015
            </div>
        </div>
    </div>
</div>
@include('footer')
</body>

</html>
