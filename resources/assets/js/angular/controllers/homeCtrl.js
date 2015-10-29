var ssModule = angular.module('skoolspace');

ssModule.controller('HomeController', ['$scope', 'activityService', 'fileService', 'toaster',
    function ($scope, activityService, fileService, toaster) {

        //Controller variables.
        $scope.userId = '';
        $scope.lastPage = 1;
        $scope.loading = true;
        $scope.activities = [];
        $scope.addingIndex = null;
        $scope.loadingPosts = false;
        $scope.hasMoreActivities = true;

        //Controller functions.
        $scope.addToBackpack = function (file, index) {
            $scope.addingIndex = index;
            var fileId = file.id;
            var backpackPromise = fileService.addToBackpack(fileId);
            backpackPromise.success(function () {
                $scope.addingIndex = null;
                file.inBackpack = true;
                toaster.pop("success", "", "The file was successfully added to you backpack.");
            });
            backpackPromise.error(function () {
                $scope.addingIndex = null;
                toaster.pop("errors", "", "The file is already in your backpack.");
            });
        };

        $scope.init = function () {
            $scope.loading = true;
            $scope.lastpage = 1;
            var params = {page: $scope.lastpage};
            var userId = $('#user').data('id');
            activityService.getAllUserActivities(userId, params).success(function (data) {
                $scope.activities = data.data;
                $scope.currentpage = data.paginator.current_page;
                $scope.hasMoreActivities = data.paginator.has_more;
                $scope.loading = false;
            });
        };

        $scope.loadMore = function () {
            $scope.loadingPosts = true;
            $scope.lastpage += 1;
            var params = {page: $scope.lastpage};
            var userId = $('#user').data('id');
            activityService.getAllUserActivities(userId, params).success(function (data) {
                $scope.activities = $scope.activities.concat(data.data);
                $scope.hasMoreActivities = data.paginator.has_more;
                $scope.loadingPosts = false;
            });
        };

        $scope.fileActivity = function (activity) {
            return (activity.type == 'add_file');
        };

        //Initialize the relevant variables.
        $scope.init();

    }]);