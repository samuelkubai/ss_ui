var ssModule = angular.module('skoolspace');

ssModule.factory('fileService', ['httpService',function(httpService){

    var getAllBackPackFiles = function(){
        return httpService.get('all/backpack/files')
    };

    var getAllBackPackTopics = function(){
        return httpService.get('all/backpack/topics')
    };

    var getAllGroupFiles = function(groupUsername){
        var stringGroupUsername = String(groupUsername);
        return httpService.get('group/files/' + stringGroupUsername)
    };

    var getAllGroupTopics = function(groupUsername){
        var stringGroupUsername = String(groupUsername);
        return httpService.get('group/topics/' + stringGroupUsername)
    };

    var shareFile = function(groupId, fileId)
    {
        return httpService.get('all/backpack/topics');
    };
    return{
        shareFile: shareFile,
        getAllGroupFiles: getAllGroupFiles,
        getAllGroupTopics: getAllGroupTopics,
        getAllBackPackFiles: getAllBackPackFiles,
        getAllBackPackTopics: getAllBackPackTopics
    };
}]);