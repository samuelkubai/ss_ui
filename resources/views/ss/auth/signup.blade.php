<html ng-app="registration">
<head >

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Join skoolspace</title>

    <link href="{{ asset('ss/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('ss/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('ss/select/css/select2.min.css') }}" rel="stylesheet" />

    <link href="{{ asset('ss/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('ss/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('ss/angular/vendor/toaster-master/toaster.min.css') }}" rel="stylesheet">


</head>

<body class="gray-bg"   ng-controller="RegistrationController">
<toaster-container toaster-options="{'close-button': true, 'progress-bar': true}"></toaster-container>

<div class="middle-box text-center loginscreen  animated fadeInDown">

    <div ng-show="step == 1" class="fx-bounce-right fx-speed-20">
        <div>

            <h1 class="logo-name login-logo" style="color: #18a689;">SS+</h1>

        </div>
        <h3>Hi</h3>
        <p>
            To make your experience of skoolspace memorable, we would like to ask a few questions
        </p>
        <p>This will be fast, I promise.</p>
        <br>
            <button type="button"
                    ng-click="nextStep()"
                    class="btn btn-primary block full-width m-b">Let's Start</button>

            <p class="text-muted text-center"><small>Do not have an account?</small></p>
            <a class="btn btn-sm btn-white btn-block" href="{{ url('/login') }}">Login</a>
        <p class="m-t"> <small>The skoolspace app © 2015</small> </p>
    </div>
    <div ng-show="step == 2" class="fx-bounce-right fx-speed-20">
        <div>

            <h1 class="logo-name login-logo" style="color: #18a689;">SS+</h1>

        </div>
        <h3>What should we call you?</h3>
        <form class="m-t"
              role="form"
              name="registrationForm.personal"
              novalidate="novalidate"
              ng-submit="onSubmit()">
            <input type="hidden"
                   name="_token"
                   value="{{ csrf_token() }}"
                   ng-model="ctrl.form._token">
            <div class="form-group">
                <label for="firstName" class="control-label">First Name</label>
                <input type="text"
                       class="form-control"
                       placeholder="First Name"
                       name="firstName"
                       ng-model="form.firstName"
                       ng-minlength= "2"
                       required >
            </div>
            <div class="form-group">
                <label for="firstName" class="control-label">Last Name</label>
                <input type="text"
                       class="form-control"
                       placeholder="Last Name"
                       ng-model="form.lastName"
                       ng-minlength= "2"
                       required>
            </div>

            <button type="submit"
                    class="btn btn-primary block full-width m-b">Continue</button>

            <p class="text-muted text-center"><small>Made a mistake?</small></p>
            <button type="button"
                    ng-click="prevStep()"
                    class="btn btn-sm btn-white btn-block">Back</button>
        </form>
        <p class="m-t"> <small>The skoolspace app © 2015</small> </p>
    </div>
    <div ng-show="step == 3" class="fx-bounce-right fx-speed-20">
        <div>

            <h1 class="logo-name login-logo" style="color: #18a689;">SS+</h1>

        </div>
        <h3>...a few school details...</h3>
        <form class="m-t"
              role="form"
              name="registrationForm.personal"
              novalidate="novalidate"
              ng-submit="onSubmit()">
            <input type="hidden"
                   name="_token"
                   value="{{ csrf_token() }}"
                   ng-model="ctrl.form._token">
            <div class="form-group">
                <label for="institution" class="control-label">What institution do you belong to?</label>
                <select
                        name="institution"
                        id="institution"
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
                <label for="course" class="control-label">What course are you taking?</label>
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
                <label for="year" class="control-label">What year did you join campus?</label>
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
                <label for="firstName" class="control-label">What month was your intake?</label>
                <select
                        name="intake"
                        id="intake"
                        class="single-intake-selector"
                        style="width: 100%;"
                        ng-model="form.intake"
                        disable-valid-styling="true"
                        required>
                    <option value="">Please select your intake...</option>
                    <option value="1st">January Intake</option>
                    <option value="2nd">March Intake</option>
                    <option value="3rd">September Intake</option>
                </select>
            </div>

            <button type="submit"
                    class="btn btn-primary block full-width m-b">Continue</button>

            <p class="text-muted text-center"><small>Made a mistake?</small></p>
            <button type="button"
                    ng-click="prevStep()"
                    class="btn btn-sm btn-white btn-block">Back</button>
        </form>
        <p class="m-t"> <small>The skoolspace app © 2015</small> </p>
    </div>
    <div ng-show="step == 4" class="fx-bounce-right fx-speed-20">
        <div>

            <h1 class="logo-name login-logo" style="color: #18a689;">SS+</h1>

        </div>
        <h3>...secure your account.</h3>
        <form class="m-t"
              role="form"
              name="registrationForm.personal"
              novalidate="novalidate"
              ng-submit="onSubmit()">
            <input type="hidden"
                   name="_token"
                   value="{{ csrf_token() }}"
                   ng-model="ctrl.form._token">
            <div class="form-group">
                <label for="password" class="control-label">What password would you prefer?</label>
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
                <label for="password_confirmation" class="control-label">Kindly, type it again to be secure.</label>
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
                    class="btn btn-primary block full-width m-b">Continue</button>

            <p class="text-muted text-center"><small>Made a mistake?</small></p>
            <button type="button"
                    ng-click="prevStep()"
                    class="btn btn-sm btn-white btn-block">Back</button>
        </form>
        <p class="m-t"> <small>The skoolspace app © 2015</small> </p>
    </div>
    <div ng-show="step == 5" class="fx-bounce-right fx-speed-20">
        <div>

            <h1 class="logo-name login-logo" style="color: #18a689;">SS+</h1>

        </div>

        <form class="m-t"
              role="form"
              name="registrationForm.personal"
              novalidate="novalidate"
              ng-submit="onSubmit()">
            <input type="hidden"
                   name="_token"
                   value="{{ csrf_token() }}"
                   ng-model="ctrl.form._token">
            <div class="form-group">
                <label for="email" class="control-label">What email can we use to notify you?</label>
                <input type="email"
                       class="form-control"
                       placeholder="Email"
                       name="email"
                       ng-model="form.email"
                       required>
            </div>
            <button type="submit"
                    class="btn btn-primary block full-width m-b">Continue</button>

            <p class="text-muted text-center"><small>Made a mistake?</small></p>
            <button type="button"
                    ng-click="prevStep()"
                    class="btn btn-sm btn-white btn-block">Back</button>
        </form>
        <p class="m-t"> <small>The skoolspace app © 2015</small> </p>
    </div>
    <div ng-show="step == 6" class="fx-bounce-right fx-speed-20">
        <div>

            <h1 class="logo-name login-logo" style="color: #18a689;">SS+</h1>

        </div>
        <h3>Thanks.</h3>

        <p>
            That was easy right, @{{ form.firstName }}
        </p>
        <p>Kindly be patient as we set up your account.</p>
        <br>
        <p ng-hide="loading">
            @include('partials._circular_loader')
        </p>

        <p class="m-t"> <small>The skoolspace app © 2015</small> </p>
    </div>
    <div ng-show="step == 8" class="fx-rotate-counterclock fx-speed-20">
        <div>

            <h1 class="logo-name login-logo" style="color: #18a689;">SS+</h1>

        </div>
        <h3>All done!</h3>

        <p>
            Remember to verify your email address, @{{ form.firstName }} within 7 days.
        </p>
        <p> Please try out various skoolspace features, feel free to pin notices ,share files and join other groups</p>
        <p> You have successfully joined your class group automatically.</p>
        <br>
        <p>
        <h2>Welcome to skoolspace</h2>
        <a href="{{ url('/') }}"
                class="btn btn-primary block full-width m-b">Continue</a>
        </p>

        <p class="m-t"> <small>The skoolspace app © 2015</small> </p>
    </div>
    <div ng-show="step == 7" class="fx-bounce-right fx-speed-20">
        <div>

            <h1 class="logo-name login-logo" style="color: #18a689;">SS+</h1>

        </div>
        <h3>Whoops.</h3>

        <p>
            I am sorry, @{{ form.firstName }}
        </p>
        <p>Please check you credentials, an account has already been created with that email</p>
        <br>

        <p>
        <h2>Please check you credentials</h2>

        <button type="button"
                ng-click="backToTheForm()"
                class="btn btn-sm btn-info btn-block">Back</button>
        </p>

        <p class="m-t"> <small>The skoolspace app © 2015</small> </p>
    </div>
</div>

<!--Vendor libraries -->

<!-- Jquery -->
<script src="{{ asset('/ss/js/jquery-2.1.1.js') }}"></script>
<!-- Angular -->
<script src="{{ asset('/ss/angular/vendor/angular/angular.min.js') }}"></script>
<script src="{{ asset('/ss/angular/vendor/animate/angular-animate.min.js') }}"></script>
<script src="{{ asset('/ss/js/jcs-auto-validate.min.js') }}"></script>
<script src="{{ asset('ss/angular/vendor/TweenMax/TweenMax.min.js') }}"></script>
<script src="{{ asset('ss/angular/vendor/ngFx/ngFx.min.js') }}"></script>

<!-- select2 -->
<script src="{{ asset('/ss/select/js/select2.min.js') }}"></script>
<script src="{{ asset('/ss/js/select_init_elements.js') }}"></script>

<!--Angular scripts -->
<script src="{{ asset('/ss/angular/controllers/registration.js') }}"></script>
<script>
    angular.module("registration").constant("CSRF_TOKEN", '{{ csrf_token() }}');
</script>

<!-- Toastr -->
<script src="{{ asset('ss/angular/vendor/toaster-master/toaster.min.js') }}"></script>
</body>
</html>