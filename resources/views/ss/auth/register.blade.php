<html ng-app="skoolspace">
    <head >

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title }}</title>

        <link href="{{ asset('ss/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('ss/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
        <link href="{{ asset('ss/select/css/select2.min.css') }}" rel="stylesheet" />

        <link href="{{ asset('ss/css/animate.css') }}" rel="stylesheet">
        <link href="{{ asset('ss/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('ss/angular/vendor/toaster-master/toaster.min.css') }}" rel="stylesheet">


    </head>

    <body class="gray-bg"   ng-controller="RegistrationCtrl">
    <toaster-container toaster-options="{'close-button': true, 'progress-bar': true}"></toaster-container>
    <div class="loginColumns animated fadeInDown" ng-hide="registered">
        <div class="row">

            <div class="col-md-6">
                <h2 class="font-bold">Welcome to SS+</h2>

                <p>
                    Perfectly designed and precisely prepared for school stakeholders to use
                    in managing and sharing resources in their various groups.
                </p>

                <p> Join skoolspace to get informed and share among your peers and make school group management that much
                    easier.</p>

                <p>
                    <b>Welcome to the skoolspace community!</b>
                </p>

            </div>
            <div class="col-xs-12 col-md-6">
                <div class="ibox-content">
                    <form name="registrationForm.personal" novalidate="novalidate"
                          ng-submit="onSubmit()"
                          ng-show="stageOne && !registered">
                            <h3>Lets start with your personal details.. </h3>
                            <input type="hidden"
                                   name="_token"
                                   value="{{ csrf_token() }}"
                                    ng-model="ctrl.form._token">
                            <div class="form-group">
                                <input type="text"
                                       class="form-control"
                                       placeholder="First Name"
                                       name="firstName"
                                       ng-model="form.firstName"
                                       ng-minlength= "2"
                                       required >
                            </div>
                            <div class="form-group">
                                <input type="text"
                                       class="form-control"
                                       placeholder="Last Name"
                                       ng-model="form.lastName"
                                       ng-minlength= "2"
                                       required>
                            </div>
                            <div class="form-group">
                                <input type="email"
                                       class="form-control"
                                       placeholder="Email"
                                       name="email"
                                       ng-model="form.email"
                                       required>
                            </div>
                            <div class="form-group">
                                <input type="password"
                                       class="form-control"
                                       placeholder="Password"
                                       name="password"
                                       ng-model="form.password"
                                       ng-minlength= "5"
                                       ng-maxlength= "12"
                                       required>
                            </div>
                            <div class="form-group">
                                <input type="password"
                                       class="form-control"
                                       name="password_confirmation"
                                       ng-model="form.password_confirmation"
                                       placeholder="Confirm Password"
                                       ng-minlength= "5"
                                       ng-maxlength= "12"
                                       confirm-password="form.password"
                                       required>
                            </div>
                            <button type="submit"
                                    class="btn btn-primary block full-width m-b"
                                   >Next
                            </button>

                            <span class="text-center">Step 1 of 2</span>

                            <p class="text-muted text-center">
                                <small>Do you already have an account?</small>
                            </p>
                            <a class="btn btn-sm btn-white btn-block" href="{{ url('/login') }}">Login</a>
                        </form>
                        <form name="registrationForm.personal"
                              novalidate="novalidate"
                              ng-submit="onSubmit()"
                              ng-hide="stageOne || registered">
                            <h3>...lastly please provide your school details </h3>

                            <div class="form-group">
                                <select
                                        name="group"
                                        id="group"
                                        class="single-group-selector" style="width: 100%"
                                        ng-model="form.institution"
                                        disable-valid-styling="true"
                                        required>
                                    <option value="">Please select your univeristy...</option>
                                    @foreach($institutions as $institution)
                                        <option value="{{ $institution->id }}">{{ $institution->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <select
                                        name="course"
                                        id="course"
                                        class="single-course-selector"
                                        style="width: 100%;"
                                        ng-model = "form.course"
                                        disable-valid-styling="true"
                                        required>
                                    <option value="">Please select your course...</option>
                                    @foreach($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select
                                        name="year"
                                        id="year"
                                        class="single-year-selector"
                                        style="width: 100%;"
                                        ng-model="form.year"
                                        disable-valid-styling="true"
                                        required>
                                    <option value="">Please select the year of your intake...</option>
                                    <option value="2013">2013</option>
                                    <option value="2014">2014</option>
                                    <option value="2015">2015</option>
                                    <option value="2016">2016</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select
                                        name="intake"
                                        id="intake"
                                        class="single-intake-selector"
                                        style="width: 100%;"
                                        ng-model="form.intake"
                                        disable-valid-styling="true"
                                        required>
                                    <option value="">Please select your intake...</option>
                                    <option value="1">January Intake</option>
                                    <option value="2">March Intake</option>
                                    <option value="3">September Intake</option>
                                </select>
                            </div>
                            <button type="button"
                                    class="btn btn-white pull-left"
                                    ng-click="stageOne = true">Back</button>

                            <button type="submit" class="btn btn-primary pull-right" ng-hide="loading">Register</button>
                            <button type="button" class="btn btn-info pull-right" ng-show="loading"><i class="fa fa-spinner fa-spin"></i></button>
                            <br>
                            <br>
                            <br>
                            <span class="text-center">Step 2 of 2</span>

                            <p class="text-muted text-center">
                                <small>Do you already have an account?</small>
                            </p>
                            <a class="btn btn-sm btn-white btn-block" href="{{ url('/login') }}">Login</a>
                        </form>
                </div>
            </div>
        </div>
        <hr>
        <div class="row" >
            <div class="col-md-6">
                skoolspace
            </div>
            <div class="col-md-6 text-right">
                <small> © 2015-2016</small>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="middle-box text-center loginscreen  animated fadeInDown" ng-show="registered">
            <div>
                <div>

                    <h1 class="logo-name">SS+</h1>

                </div>
                <h2 class="normal">Activate your account</h2>
                <p>A link has been sent to your email account to verify your account. Please verify your account within 7 days</p>
                <p class="p-b-20">...or just verify account Now!</p>




                <a href="{{ '/' }}" class="btn btn-primary btn-cons">Continue.</a>


                <p class="m-t"> <small>skoolspace framework built for school group management <br> &copy; 2014</small> </p>
            </div>
        </div>
    </div>
    <!--Vendor libraries -->

    <!-- Jquery -->
    <script src="{{ asset('/ss/js/jquery-2.1.1.js') }}"></script>
    <!-- Angular -->
    <script src="{{ asset('/ss/angular/vendor/angular/angular.min.js') }}"></script>
    <script src="{{ asset('/ss/angular/vendor/angular-animate/angular-animate.min.js') }}"></script>
    <script src="{{ asset('/ss/js/jcs-auto-validate.min.js') }}"></script>

    <!-- select2 -->
    <script src="{{ asset('/ss/select/js/select2.min.js') }}"></script>
    <script src="{{ asset('/ss/js/select_init_elements.js') }}"></script>

    <!--Angular scripts -->
    <script src="{{ asset('/ss/angular/mainApp.js') }}"></script>
    <script src="{{ asset('/ss/angular/controllers/registration.js') }}"></script>
    <script>
        angular.module("skoolspace").constant("CSRF_TOKEN", '{{ csrf_token() }}');
    </script>

    <!-- Toastr -->
    <script src="{{ asset('ss/angular/vendor/toaster-master/toaster.min.js') }}"></script>
    </body>
</html>