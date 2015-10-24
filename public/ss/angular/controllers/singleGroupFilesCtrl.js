var ssModule = angular.module('skoolspace');

ssModule.controller('SingleGroupFilesController', ['$scope','fileService', 'toaster',
    function($scope, fileService, toaster){

        //Controller variables.
        $scope.pageSize = 12;
        $scope.allFiles = [];
        $scope.currentPage = 1;
        $scope.search = {};

        $scope.moreIndex = null;
        $scope.topicIndex = null;
        $scope.addingIndex = null;
        $scope.fileNameLength = 20;
        $scope.sharingIndex = null;

        $scope.fileToBeDeleted = {};
        $scope.fileToBeAddedToBagPack = {};

        //Controller functions
        $scope.deleteFile = function(file)
        {
            $scope.fileToBeDeleted = file;
        };

        $scope.addToBackpack = function(file, index){
            $scope.addingIndex = index;
            var fileId = file.id;
            var backpackPromise = fileService.addToBackpack(fileId);
            backpackPromise.success(function(){
                $scope.addingIndex = null;
                file.inBackpack = true;
                toaster.pop("success","", "The file was successfully added to you backpack.");
            });
            backpackPromise.error(function(){
                $scope.addingIndex = null;
                toaster.pop("errors", "", "The file is already in your backpack.");
            });
        };

        $scope.showMoreDetails = function(index)
        {
            $scope.moreIndex = index;
            $scope.fileNameLength = 100;
        };

        $scope.showLessDetails = function()
        {
            $scope.moreIndex = null;
            $scope.fileNameLength = 20;
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