var ssModule = angular.module('skoolspace');

ssModule.controller('SiteController', ['$scope', function($scope){

    //Controller variables
    $scope.showingAlerts = false;

    //Controller functions
    $scope.refreshAlerts = refreshAlerts;
    $scope.showAlerts = showAlerts;
    $scope.hideAlerts = hideAlerts;

    //Function Declarations
    function refreshAlerts() {

    }

    function showAlerts() {
        $scope.showingAlerts = true;
    }

    function hideAlerts() {
        $scope.showingAlerts = false;
    }
}]);