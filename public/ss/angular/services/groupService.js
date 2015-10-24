var ssModule = angular.module('skoolspace');

ssModule.factory('groupService', ['httpService',function(httpService){

    var getAllGroups = function(){
        return httpService.get('all/groups')
    };

    var getAllGroupMembers = function(groupUsername){
        return httpService.get('/group/members/' + groupUsername)
    };
    return{
        getAllGroups: getAllGroups,
        getAllGroupMembers: getAllGroupMembers
    };
}]);