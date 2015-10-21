var ssModule = angular.module('skoolspace');

ssModule.controller('HomeController', ['$scope','activityService', function($scope, activityService){

    //Controller variables.
    $scope.activities = [];
    $scope.lastPage = 1;
    $scope.loadingPosts = false;
    $scope.hasMoreActivities = true;

    //Controller functions.
    $scope.init = function() {
        $scope.lastpage=1;
        var params = {page:  $scope.lastpage};
        var userId = 22;
        activityService.getAllUserActivities(userId, params).success(function(data) {
            $scope.activities = data.data;
            $scope.currentpage = data.paginator.current_page;
            $scope.hasMoreActivities = data.paginator.has_more;
        });
    };

    $scope.loadMore = function() {
        $scope.loadingPosts = true;
        $scope.lastpage +=1;
        var params = {page:  $scope.lastpage};
        var userId = 22;
        activityService.getAllUserActivities(userId, params).success(function (data) {
            $scope.activities = $scope.activities.concat(data.data);
            $scope.hasMoreActivities = data.paginator.has_more;
            $scope.loadingPosts = false;
        });
    };

    $scope.fileActivity = function(activity){
        return (activity.type == 'add_file');
    };

    //Initialize the relevant variables.
    $scope.init();

}]);