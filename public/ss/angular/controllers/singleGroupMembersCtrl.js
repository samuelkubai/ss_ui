var ssModule = angular.module('skoolspace');

ssModule.controller('SingleGroupMembersController', ['$scope','groupService', 'toaster',
    function($scope, groupService, toaster){

        //Controller variables.
        $scope.pageSize = 12;
        $scope.allMembers = [];
        $scope.currentPage = 1;
        $scope.search = {};


        //Controller functions
        $scope.membersInit = function() {
            $scope.groupUsername = $('#group').data('name');
            groupService.getAllGroupMembers($scope.groupUsername).success(function(data) {
                $scope.allMembers = data.data;
            });
        };

        //Initialize controller variables.
        $scope.membersInit();

    }]);