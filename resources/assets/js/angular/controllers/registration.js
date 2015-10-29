var ssModule = angular.module('registration', ['jcs-autoValidate', 'toaster', 'ngAnimate', 'ngFx']);

ssModule.run([
    'bootstrap3ElementModifier',
    function (bootstrap3ElementModifier) {
        bootstrap3ElementModifier.enableValidationStateIcons(true);
    }]);

ssModule.controller('RegistrationController', ['$scope','$http','toaster', function($scope, $http, toaster){


    //Controller Data attributes.
    var self = this;
    self.form = {};
    $scope.step = 1;
    $scope.loading = null;
    $scope.registered = null;
    $scope.errorMessage = '';

    //Controller Functions
    $scope.nextStep = function() {
        $scope.step += 1;
    };

    $scope.prevStep = function() {
        $scope.step -= 1;
    };

    $scope.backToTheForm = function(){
        $scope.step = 5;
    };

    $scope.onSubmit = function(){

        if($scope.step <= 4)
        {
            $scope.nextStep();

        } else {
            $scope.nextStep();
            $scope.loading = true;
            var registrationPromise = $http.post('register', $scope.form);

            registrationPromise.success(function(status) {
                $scope.loading = false;
                toaster.pop("success","Welcome", "You have successfully created your account.");
                $scope.step = 8;
            });

            registrationPromise.error(function(status, data){
                $scope.loading = false;
                toaster.pop("error","Ooops", "The email address has already been taken.");
                $scope.step = 7;
            });
        }
    };




}]);

ssModule.directive('confirmPassword', ['defaultErrorMessageResolver', function ConfirmPasswordValidatorDirective(defaultErrorMessageResolver) {
    defaultErrorMessageResolver.getErrorMessages().then(function (errorMessages) {
        errorMessages['confirmPassword'] = 'Please ensure the passwords match.';
    });

    return {
        restrict : 'A',
        require : 'ngModel',
        scope : {
            confirmPassword : '=confirmPassword'
        },
        link : function(scope, element, attributes, ngModel) {
            ngModel.$validators.confirmPassword = function(modelValue) {
                return modelValue === scope.confirmPassword;
            };

            scope.$watch('confirmPassword', function() {
                ngModel.$validate();
            });
        }
    };
}]);

