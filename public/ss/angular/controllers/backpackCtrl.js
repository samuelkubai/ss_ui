var ssModule = angular.module('skoolspace');

ssModule.controller('BackpackController', ['$scope','fileService', 'groupService', 'toaster',
    function($scope, fileService, groupService, toaster){

    //Controller variables.
    $scope.pageSize = 12;
    $scope.noOfGroups = 3;
    $scope.allFiles = [];
    $scope.currentPage = 1;
    $scope.search = {};

    $scope.topicIndex = null;
    $scope.moreIndex = null;
    $scope.sharingIndex = null;

    $scope.fileToBeDeleted = {};
    $scope.fileToBeShared = {};

    //Controller functions
    $scope.deleteFile = function(file)
    {
        $scope.fileToBeDeleted = file;
    };

    $scope.shareFile = function(fileId, groupId, index)
    {
        $scope.sharingIndex = index;

        fileService.shareFile(fileId, groupId).success(function(data){
            toaster.pop("success", "You have successfully shared the file.");
            $scope.sharingIndex = null;
        });
    };

    $scope.setFileToBeShared = function(file)
    {
        $scope.fileToBeShared = file;
    };

    $scope.showMoreDetails = function(index)
    {
        $scope.moreIndex = index;
    };

    $scope.showLessDetails = function()
    {
        $scope.moreIndex = null;
    };

    $scope.filterWithTopic = function(topicName ,index) {
        $scope.search = {
            'topic':  topicName
        };
        if(topicName == '')
        {
            $scope.topicIndex = null;
        } else {
            $scope.topicIndex = index;
        }

    };

    $scope.fileInit = function() {

        fileService.getAllBackPackFiles().success(function(data) {
            $scope.allFiles = data.data;
        });

        fileService.getAllBackPackTopics().success(function(data) {
            $scope.allTopics = data.data
        })
    };

    $scope.myGroupInit = function() {

        groupService.getAllGroups().success(function(data){
           $scope.myGroups = data.data;
        });
    };

    $scope.fileInit();
    $scope.myGroupInit();

}]);