var ssModule = angular.module('skoolspace');

ssModule.controller('GroupController', ['$scope','groupService', function($scope, groupService){

    //Controller variables.
    $scope.pageSize = 5;
    $scope.allGroups = [];
    $scope.currentPage = 1;
    $scope.search = {'group': {}};
    $scope.loading = true;

    //Controller functions
    $scope.groupInit = function() {
        $scope.loading = true;
        groupService.getAllGroups().success(function(data) {

            $scope.loading = false;
            $scope.allGroups = data.data;
        });
    };

    $scope.groupInit();

}]);