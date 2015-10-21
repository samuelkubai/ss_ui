var ssModule = angular.module('skoolspace');

ssModule.controller('GroupController', ['$scope','groupService', function($scope, groupService){

    //Controller variables.
    $scope.pageSize = 5;
    $scope.allGroups = [];
    $scope.currentPage = 1;
    $scope.search = {'group': {}};

    //Controller functions
    $scope.groupInit = function() {
        groupService.getAllGroups().success(function(data) {
            $scope.allGroups = data.data;
        });
    };

    $scope.groupInit();

}]);