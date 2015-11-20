<!DOCTYPE html>
<html lang="en" ng-app="skoolspace">
    @include('head')
<body class="top-navigation">
<toaster-container toaster-options="{'close-button': true, 'progress-bar': true}"></toaster-container>
<div id="wrapper" ng-cloak>
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
                <strong>Copyright</strong> skoolspace &copy; 2015
            </div>
            <div>
                <a href="{{ 'https://www.facebook.com/skoolspace' }}"><i class="fa fa-facebook-square fa-lg"></i></a>
                <a href="{{ 'https://twitter.com/skoolspace1' }}"><i class="fa fa-twitter-square fa-lg"></i></a>
                <a href="{{ 'https://www.linkedin.com/company/skoolspace?trk=top_nav_home' }}"><i class="fa fa-linkedin-square fa-lg"></i></a>
                <a href="{{ 'https://plus.google.com/communities/112482468990525759162' }}"><i class="fa fa-google-plus-square fa-lg"></i></a>
            </div>
        </div>
    </div>
</div>
@include('footer')
<script type="text/javascript">
    // create the back to top button
    $('body').prepend('<a href="#" class="back-to-top">Back to Top</a>');

    var amountScrolled = 300;

    $(window).scroll(function() {
        if ($(window).scrollTop() > amountScrolled) {
            $('a.back-to-top').fadeIn('slow');
        } else {
            $('a.back-to-top').fadeOut('slow');
        }
    });

    $('a.back-to-top, a.simple-back-to-top').click(function() {
        $('body').animate({
            scrollTop: 0
        }, 'fast');
        return false;
    });
</script>
</body>

</html>
