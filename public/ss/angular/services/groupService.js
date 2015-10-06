var groupModule = angular.module('groupModule');

groupModule.factory('groupService', ['httpService',function(httpService){

    var getGroups = function(){
        return httpService.get('ss/dataTest/groups.json')
    };
    return{
        getGroups: getGroups
    };
}]);