var ssModule = angular.module('skoolspace');

ssModule.controller('SingleGroupActivitiesController', ['$scope','activityService', function($scope, activityService){

    //Controller variables.
    $scope.activities = [];
    $scope.lastPage = 1;
    $scope.loadingPosts = false;
    $scope.groupUsername = '';
    $scope.hasMoreActivities = true;
    $scope.groupUsername = '';

    //Controller functions
    $scope.init = function() {
        $scope.lastpage=1;
        var params = {page:  $scope.lastpage};
        var groupUsername = $('#group').data('name');
        activityService.getAllGroupActivities(groupUsername, params).success(function(data) {
            $scope.activities = data.data;
            $scope.currentpage = data.paginator.current_page;
            $scope.hasMoreActivities = data.paginator.has_more;
        });
    };

    $scope.loadMore = function() {
        $scope.loadingPosts = true;
        $scope.lastpage +=1;
        var params = {page:  $scope.lastpage};
        var groupUsername = $('#group').data('name');
        activityService.getAllGroupActivities(groupUsername, params).success(function(data) {
            $scope.activities = $scope.activities.concat(data.data);
            $scope.hasMoreActivities = data.paginator.has_more;
            $scope.loadingPosts = false;
        });
    };

    $scope.fileActivity = function(activity){
        return (activity.type == 'add_file');
    };

    $scope.init();

}]);