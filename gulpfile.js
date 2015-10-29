var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.scripts([
        '/scripts/switchery_init.js',
        '/scripts/select_init_elements.js',
        '/scripts/i-check_initialization.js',
        '/scripts/basic.js',
        '/scripts/backpack.js'
    ], './public/js/my.js');
    mix.scripts([
        'jquery-2.1.1.js',
        '/plugins/jquery-ui/jquery-ui.min.js',
        'bootstrap.js',
        'hopscotch.min.js',
        'inspinia.js',
        '/plugins/pace/pace.min.js',
        'moment.js',
        '/plugins/switchery/switchery.js',
        '/select/js/select2.min.js',
        '/inspinia.js',
        '/plugins/pace/pace.min.js',
        '/plugins/iCheck/icheck.min.js',
        'toastr.min.js',
        'parsley.min.js',
        '/plugins/metisMenu/jquery.metisMenu.js',
        '/plugins/slimscroll/jquery.slimscroll.min.js',
        '/plugins/jeditable/jquery.jeditable.js'
    ], './public/js/vendor.js');
    mix.scripts([
        '/angular/vendor/angular/angular.min.js',
        '/angular/vendor/validate/jcs-auto-validate.min.js',
        '/angular/vendor/pagination/dirPagination.js',
        '/angular/vendor/TweenMax/TweenMax.min.js',
        '/angular/vendor/ngFx/ngFx.min.js',
        '/angular/vendor/toaster-master/toaster.min.js',
        '/angular/vendor/animate/angular-animate.min.js',
        '/angular/mainApp.js',
        '/angular/services/httpService.js',
        '/angular/services/fileService.js',
        '/angular/services/noticeService.js',
        '/angular/services/groupService.js',
        '/angular/services/activityService.js',
        '/angular/controllers/homeCtrl.js',
        '/angular/controllers/widgetCtrl.js',
        '/angular/controllers/groupCtrl.js',
        '/angular/controllers/noticeCtrl.js',
        '/angular/controllers/backpackCtrl.js',
        '/angular/controllers/singleGroupFilesCtrl.js',
        '/angular/controllers/singleGroupMemberCtrl.js',
        '/angular/controllers/singleGroupActivitiesCtrl.js'
    ], './public/js/angular.js');
    mix.styles([
        '/bootstrap.min.css',
        '/font-awesome/css/font-awesome.css',
        '/select/css/select2.min.css',
        '/plugins/iCheck/custom.css',
        '/plugins/switchery/switchery.css',
        '/toastr.min.css',
        '/parsley.css',
        '/hopscotch.min.css',
        '/angular/toaster/toaster.min.css',
        '/animate.css',
        '/style.css',
        '/myStyle.css',
        '/plugins/jasny/jasny-bootstrap.min.css',
    ])

});
