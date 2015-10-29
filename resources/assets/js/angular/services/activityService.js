var ssModule = angular.module('skoolspace');

ssModule.factory('activityService', ['httpService',function(httpService){

    var getAllUserActivities = function(userId, param){
        var stringUserId = String(userId);
        return httpService.get('user/activities/' + stringUserId, param)
    };

    var getAllGroupActivities = function(groupUsername, param){
        var stringGroupUsername = String(groupUsername);
        return httpService.get('group/activities/' + stringGroupUsername, param)
    };

    return{
        getAllUserActivities: getAllUserActivities,
        getAllGroupActivities: getAllGroupActivities
    };
}]);