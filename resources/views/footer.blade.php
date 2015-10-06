
<!-- Mainly scripts -->
<script src="{{ asset('/ss/js/jquery-2.1.1.js') }}"></script>
<script src="{{ asset('/ss/js/bootstrap.js')}}"></script>
<script src="{{ asset('/ss/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
<script src="{{ asset('/ss/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('/ss/js/plugins/jeditable/jquery.jeditable.js') }}"></script>
<script src="{{ asset('/ss/js/scripts/basic.js') }}"></script>

@yield('jquery_scripts')
<!-- Custom and plugin javascript -->
<script src="{{ asset('/ss/js/inspinia.js') }}"></script>
<script src="{{ asset('/ss/js/plugins/pace/pace.min.js') }}"></script>
<script src="{{ asset('/ss/js/moment.js') }}"></script>
<!-- <script type="text/javascript" src=" asset('/datetime/js/bootstrap-datepicker.js') }}"></script> -->


<!-- Switchery -->
<script src="{{ asset('/ss/js/plugins/switchery/switchery.js') }}"></script>
<script src="{{ asset('ss/js/switchery_init.js') }}"></script>

<!-- select2 -->
<script src="{{ asset('/ss/select/js/select2.min.js') }}"></script>
<script src="{{ asset('/ss/js/select_init_elements.js') }}"></script>

<!-- Peity -->
<script src="{{ asset('/ss/js/plugins/peity/jquery.peity.min.js') }}"></script>
<script src="{{ asset('/ss/js/demo/peity-demo.js') }}"></script>

<!-- Custom and plugin javascript -->
<script src="{{ asset('/ss/js/inspinia.js') }}"></script>
<script src="{{ asset('/ss/js/plugins/pace/pace.min.js') }}"></script>

<!-- ICheck plugin -->
<script src="{{ asset('ss/js/plugins/iCheck/icheck.min.js') }}"></script>
<script src="{{ asset('ss/js/i-check_initialization.js') }}"></script>


<!-- jQuery UI -->
<script src="{{ asset('/ss/js/plugins/jquery-ui/jquery-ui.min.js') }}"></script>

<!-- Toastr -->
<script src="{{ asset('/ss/js/plugins/toastr/toastr.min.js') }}"></script>


<!-- Input Mask-->
<script src="{{ asset('/ss/js/plugins/jasny/jasny-bootstrap.min.js') }}"></script>

<!-- alert delay -->
<script>
    $('.alert').delay(3000).slideUp(300);
</script>

<!-- Overlay activation -->
<script>
    $('#flash-overlay-modal').modal();
</script>

<!-- Item deletion confirmation -->
<script src="{{ asset('ss/js/delete_confirmations.js') }}"></script>

@yield('script')