
<!-- Mainly scripts -->
<script src="{{ asset('/ss/js/jquery-2.1.1.js') }}"></script>
<script src="{{ asset('/ss/js/bootstrap.js')}}"></script>
<script src="{{ asset('/ss/js/hopscotch.min.js')}}"></script>
<script src="{{ asset('/ss/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
<script src="{{ asset('/ss/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('/ss/js/plugins/jeditable/jquery.jeditable.js') }}"></script>
<script src="{{ asset('/ss/js/scripts/basic.js') }}"></script>

@if(\Auth::user()->isNew())
    <script src="{{ asset('/ss/js/scripts/tour.js') }}"></script>
@endif

<!-- Angular -->
<script src="{{ asset('/js/angular.js') }}"></script>

@yield('jquery_scripts')
<!-- Custom and plugin javascript -->
<script src="{{ asset('/ss/js/inspinia.js') }}"></script>
<script src="{{ asset('/ss/js/plugins/pace/pace.min.js') }}"></script>
<script src="{{ asset('/ss/js/moment.js') }}"></script>


<!-- Switchery -->
<script src="{{ asset('/ss/js/plugins/switchery/switchery.js') }}"></script>
<script src="{{ asset('ss/js/switchery_init.js') }}"></script>

<!-- select2 -->
<script src="{{ asset('/ss/select/js/select2.min.js') }}"></script>
<script src="{{ asset('/ss/js/select_init_elements.js') }}"></script>

<!-- Custom and plugin javascript -->
<script src="{{ asset('/ss/js/inspinia.js') }}"></script>
<script src="{{ asset('/ss/js/plugins/pace/pace.min.js') }}"></script>

<!-- ICheck plugin -->
<script src="{{ asset('ss/js/plugins/iCheck/icheck.min.js') }}"></script>
<script src="{{ asset('ss/js/i-check_initialization.js') }}"></script>


<!-- jQuery UI -->
<script src="{{ asset('/ss/js/plugins/jquery-ui/jquery-ui.min.js') }}"></script>

<!-- Toastr -->
<script src="{{ asset('ss/js/toastr.min.js') }}"></script>
{!! Toastr::render() !!}

<!-- Parsley -->
<script src="{{ asset('ss/js/parsley.min.js') }}"></script>


@yield('script')