
<!-- Mainly scripts -->
<script src="{{ asset('/ss/js/jquery-2.1.1.js') }}"></script>
<script src="{{ asset('/ss/js/bootstrap.js')}}"></script>
<script src="{{ asset('/ss/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
<script src="{{ asset('/ss/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('/ss/js/plugins/jeditable/jquery.jeditable.js') }}"></script>
<script src="{{ asset('/ss/js/scripts/basic.js') }}"></script>

<!-- Angular -->
<script src="{{ asset('/ss/angular/vendor/angular/angular.min.js') }}"></script>
<script src="{{ asset('/ss/js/jcs-auto-validate.min.js') }}"></script>
<script src="{{ asset('ss/angular/vendor/pagination/dirPagination.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.17.0/TweenMax.min.js"></script>
<script src="{{ asset('ss/angular/vendor/ngFx/ngFx.min.js') }}"></script>
<script src="{{ asset('ss/angular/vendor/toaster-master/toaster.min.js') }}"></script>
<script src="{{ asset('/ss/angular/vendor/animate/angular-animate.min.js') }}"></script>




    <!--Angular scripts -->
    <script src="{{ asset('/ss/angular/mainApp.js') }}"></script>
    <script src="{{ asset('/ss/angular/services/httpService.js') }}"></script>
    <script src="{{ asset('/ss/angular/services/fileService.js') }}"></script>
    <script src="{{ asset('/ss/angular/services/noticeService.js') }}"></script>
    <script src="{{ asset('/ss/angular/services/groupService.js') }}"></script>
    <script src="{{ asset('/ss/angular/services/activityService.js') }}"></script>
    <script src="{{ asset('/ss/angular/controllers/homeCtrl.js') }}"></script>
    <script src="{{ asset('/ss/angular/controllers/widgetCtrl.js') }}"></script>
    <script src="{{ asset('/ss/angular/controllers/groupCtrl.js') }}"></script>
    <script src="{{ asset('/ss/angular/controllers/noticeCtrl.js') }}"></script>
    <script src="{{ asset('/ss/angular/controllers/backpackCtrl.js') }}"></script>
    <script src="{{ asset('/ss/angular/controllers/singleGroupFilesCtrl.js') }}"></script>
    <script src="{{ asset('/ss/angular/controllers/singleGroupMembersCtrl.js') }}"></script>
    <script src="{{ asset('/ss/angular/controllers/singleGroupActivitiesCtrl.js') }}"></script>


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
<script src="{{ asset('ss/js/toastr.min.js') }}"></script>
{!! Toastr::render() !!}

<!-- Parsley -->
<script src="{{ asset('ss/js/parsley.min.js') }}"></script>


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