var ssModule = angular.module('registration', ['jcs-autoValidate', 'toaster']);

ssModule.run([
    'bootstrap3ElementModifier',
    function (bootstrap3ElementModifier) {
        bootstrap3ElementModifier.enableValidationStateIcons(true);
    }]);

ssModule.controller('RegistrationCtrl', ['$scope','$http','toaster', function($scope, $http, toaster){


    //Controller Data attributes.
    var self = this;
    self.form = {};
    $scope.stageOne = true;
    $scope.loading = false;
    $scope.registered = false;

    //Controller Functions
    self.toggleStages = function() {
        $scope.stageOne = !$scope.stageOne;
    };


    $scope.onSubmit = function(){

        if($scope.stageOne)
        {
            self.toggleStages();
        } else {
            $scope.loading = true;

            var registrationPromise = $http.post('register', $scope.form);

            registrationPromise.success(function(status) {
                $scope.loading = false;
                toaster.pop("success","Welcome", "You have successfully created your account.");
                $scope.registered = true;
            });

            registrationPromise.error(function(status, data){
                $scope.loading = false;
                toaster.pop("error","Ooops", "The email address has already been taken.");

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

