var ssModule = angular.module('skoolspace');

ssModule.factory('groupService', ['httpService',function(httpService){

    var getAllGroups = function(){
        return httpService.get('all/groups')
    };
    return{
        getAllGroups: getAllGroups
    };
}]);