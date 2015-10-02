<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> | {{ $title }}</title>
    <link  rel="icon" href="{{ asset('ss/icons/main.png') }}" type="image/icon"/>
    <link  rel="shortcut icon" href="{{ asset('ss/icons/main.png') }}" type="image/icon"/>
    <link href="{{ asset('ss/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('ss/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('ss/css/plugins/switchery/switchery.css') }}" rel="stylesheet">

    @yield('styles')

    <link href="{{asset('ss/css/animate.css')}}" rel="stylesheet">
    <link href="{{ asset('ss/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('ss/css/myStyle.css') }}" rel="stylesheet">


    <link href="{{asset('ss/css/plugins/jasny/jasny-bootstrap.min.css')}}" rel="stylesheet">



</head>

<body class="top-navigation">

<div id="wrapper">
    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom white-bg">
            <nav class="navbar navbar-static-top" role="navigation">
                <div class="navbar-header">
                    <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                        <i class="fa fa-reorder"></i>
                        <span class="fa fa-bars"></span>
                    </button>
                    <a href="{{ url('/') }}" class="navbar-brand">SS+</a>
                </div>
                <div class="navbar-collapse collapse" id="navbar">
                    <ul class="nav navbar-nav nav-menu">
                        <li class="">
                            <a aria-expanded="false" role="button" href="{{ url('/') }}">
                                <i class="fa fa-home"></i>
                                Home
                            </a>
                        </li>
                        <li>
                            <a aria-expanded="false" role="button"  style="padding-left: 6px; padding-right: 6px" href="{{ url("/backpack ") }}">
                                <i class="fa fa-briefcase"></i> Backpack
                            </a>
                        </li>
                    </ul>
                    <form class="navbar-form navbar-left" role="search">
                        <div class="nav-search-group form-group">
                            <input type="text" class="nav-search form-control" placeholder="Search files in your backpack...">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <a aria-expanded="false" role="button" href="{{ url("/discussions ") }}"> <i class="fa fa-comments fa-lg"></i></a>
                        </li>
                        <li>
                            <a aria-expanded="false" role="button" href="{{ url("/noticeboard ") }}"> <i class="glyphicon glyphicon-pushpin nav-pushpin"></i></a>
                        </li>
                        <li>
                            <a aria-expanded="false" role="button" href="{{ url("/groups ") }}"> <i class="fa fa-group fa-lg"></i></a>
                        </li>
                        <li>
                            <a aria-expanded="false" role="button" href="{{ url("/profile/") }}" >
                                <img src="{{asset('ss/img/profile.jpg')}}"
                                     alt="User's Profile Picture"
                                     class="img-circle nav-prof-pic">
                            </a>
                        </li>
                        <li>
                            <a aria-expanded="false" role="button" href="{{ url("/logout ") }}"> <i class="fa fa-sign-out fa-lg"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="wrapper wrapper-content" style="padding-right: 0px; padding-left: 0px; margin-right: 0px;">

            <div class="">
                <div class="">

                    <!-- include('flash::message') -->
                    @yield('content')
                </div>
            </div>
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


<!-- Mainly scripts -->
<script src="{{ asset('/ss/js/jquery-2.1.1.js') }}"></script>
<!-- <script src="  asset('/ss/js/bootstrap.min.js') "></script> -->
<script src="{{ asset('/ss/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
<script src="{{ asset('/ss/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('/ss/js/plugins/jeditable/jquery.jeditable.js') }}"></script>

<!-- Custom and plugin javascript -->
<script src="{{ asset('/ss/js/inspinia.js') }}"></script>
<script src="{{ asset('/ss/js/plugins/pace/pace.min.js') }}"></script>
<script src="{{ asset('/ss/js/moment.js') }}"></script>
<script type="text/javascript" src="{{ asset('/ss/js/bootstrap.js')}}"></script>
<!-- <script type="text/javascript" src=" asset('/datetime/js/bootstrap-datepicker.js') }}"></script> -->


<!-- Switchery -->
<script src="{{ asset('/ss/js/plugins/switchery/switchery.js') }}"></script>

<!-- Peity -->
<script src="{{ asset('/ss/js/plugins/peity/jquery.peity.min.js') }}"></script>
<script src="{{ asset('/ss/js/demo/peity-demo.js') }}"></script>

<!-- Custom and plugin javascript -->
<script src="{{ asset('/ss/js/inspinia.js') }}"></script>
<script src="{{ asset('/ss/js/plugins/pace/pace.min.js') }}"></script>

<!-- jQuery UI -->
<script src="{{ asset('/ss/js/plugins/jquery-ui/jquery-ui.min.js') }}"></script>

<!-- Toastr -->
<script src="{{ asset('/ss/js/plugins/toastr/toastr.min.js') }}"></script>


<!-- Input Mask-->
<script src="{{ asset('/ss/js/plugins/jasny/jasny-bootstrap.min.js') }}"></script>
<script>
    $('.alert').delay(3000).slideUp(300);
</script>
<script>
    $('#flash-overlay-modal').modal();
</script>
<script type="text/javascript">
    function confirm_deletion(node) {
        return confirm("Are you sure you want to delete this?");
    }
    function confirm_deactivation(node) {
        return confirm("Are you sure you want to deactivate your account?");
    }
</script>
<script>
    var elem = document.querySelector('.js-switch');
    var switchery = new Switchery(elem, { size: 'small' });
</script>
@yield('script')
<script>
    function validateText(id)
    {
        if($("#" + id).val() == null || $("#" + id).val() == "")
        {
            var div = $("#" + id).closest("div");
            div.addClass("has-error");
            return false;
        }
        else
        {
            var div = $("#" + id).closest("div");
            div.removeClass("has-error");
            return true;
        }
    }
    $(document).ready(
            function(){
                @yield('validation')
            }
    );

</script>


</body>

</html>
