var ssModule = angular.module('skoolspace');

ssModule.factory('groupService', ['httpService',function(httpService){

    var getAllGroups = function(){
        return httpService.get('all/groups')
    };

    var getGroupMemberActivities = function(groupUsername, userId, params){
        var stringGroupUsername = String(groupUsername);
        var stringUserId = String(userId);
        return httpService.get('group/' + stringGroupUsername + '/member/' + stringUserId, params)
    };
    return{
        getAllGroups: getAllGroups,
        getGroupMemberActivities: getGroupMemberActivities
    };
}]);