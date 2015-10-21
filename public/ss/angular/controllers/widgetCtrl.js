var ssModule = angular.module('skoolspace');

ssModule.controller('GroupWidgetController', ['$scope','groupService', function($scope, groupService){

    //Controller variables.
    $scope.pageSize = 4;
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