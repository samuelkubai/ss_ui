var ssModule = angular.module('skoolspace');

ssModule.factory('fileService', ['httpService',function(httpService){

    var addToBackpack = function(fileId){
        var stringFileId = String(fileId);
        return httpService.get('add/file/' + stringFileId)
    };

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

    var shareFileToGroup = function(groupId, fileId)
    {
        var stringFileId = String(fileId);
        var stringGroupId = String(groupId);
        return httpService.get('share/file/' + stringFileId + '/group/' + stringGroupId);
    };



    return{
        addToBackpack: addToBackpack,
        getAllGroupFiles: getAllGroupFiles,
        shareFileToGroup: shareFileToGroup,
        getAllGroupTopics: getAllGroupTopics,
        getAllBackPackFiles: getAllBackPackFiles,
        getAllBackPackTopics: getAllBackPackTopics
    };
}]);