var ssModule = angular.module('skoolspace');

ssModule.controller('SingleGroupFilesController', ['$scope','fileService', 'groupService', 'toaster',
    function($scope, fileService, toaster){

        //Controller variables.
        $scope.pageSize = 12;
        $scope.allFiles = [];
        $scope.currentPage = 1;
        $scope.search = {};

        $scope.topicIndex = null;
        $scope.moreIndex = null;
        $scope.sharingIndex = null;

        $scope.fileToBeDeleted = {};
        $scope.fileToBeAddedToBagPack = {};

        //Controller functions
        $scope.deleteFile = function(file)
        {
            $scope.fileToBeDeleted = file;
        };

        $scope.addToBackpack = function(fileId, groupId, index)
        {
            $scope.sharingIndex = index;

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
            var groupUsername = $('#group').data('name');
            fileService.getAllGroupFiles(groupUsername).success(function(data) {
                $scope.allFiles = data.data;
            });

            fileService.getAllGroupTopics(groupUsername).success(function(data) {
                $scope.allTopics = data.data
            })
        };


        $scope.fileInit();

    }]);