var groupModule = angular.module('groupModule', []);

groupModule.controller('GroupCtrl', ['$scope','groupService', function($scope, groupService){

    var populateGroups = function(groups)
    {
        $scope.groups = groups;
    };

    groupService.getGroups().success(function(data)
    {
        $scope.groups = data;
    });

}]);