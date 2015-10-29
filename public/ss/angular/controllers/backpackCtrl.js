var ssModule = angular.module('skoolspace');

ssModule.controller('BackpackController', ['$scope', 'fileService', 'groupService', 'toaster',
    function ($scope, fileService, groupService, toaster) {

        //Controller variables.
        $scope.numberOfFiles = 16;
        $scope.noOfGroups = 3;
        $scope.allFiles = [];
        $scope.loading = true;
        $scope.search = {};

        $scope.moreIndex = null;
        $scope.topicIndex = null;
        $scope.myGroups = [];
        $scope.fileNameLength = 20;
        $scope.sharingIndex = null;

        $scope.fileToBeDeleted = {};
        $scope.fileToBeShared = {};

        //Controller functions
        $scope.deleteFile = function (file) {
            alert('Hi');
            $scope.fileToBeDeleted = file;
        };

        $scope.shareFile = function (groupId) {
            var fileId = $scope.fileToBeShared.id;
            var filePromise = fileService.shareFileToGroup(groupId, fileId);
            filePromise.success(function (data) {
                toaster.pop("success", "You have successfully shared the file.");
                $scope.sharingIndex = null;
            });
            filePromise.error(function (data, status) {
                toaster.pop("info", data);
                $scope.sharingIndex = null;
            });
        };

        $scope.setFileToBeShared = function (file) {
            $scope.fileToBeShared = file;
        };

        $scope.showMoreDetails = function (index) {
            $scope.moreIndex = index;
            $scope.fileNameLength = 100;
        };

        $scope.showLessDetails = function () {
            $scope.moreIndex = null;
            $scope.fileNameLength = 20;
        };

        $scope.filterWithTopic = function (topicName, index) {
            $scope.search = {
                'topic': topicName
            };
            if (topicName == '') {
                $scope.topicIndex = null;
            } else {
                $scope.topicIndex = index;
            }

        };

        $scope.showMoreFiles = function(){
            $scope.numberOfFiles += 8;
        };

        $scope.fileInit = function () {
            $scope.loading = true;
            fileService.getAllBackPackFiles().success(function (data) {
                $scope.allFiles = data.data;
                $scope.loading = false;
            });

            fileService.getAllBackPackTopics().success(function (data) {
                $scope.allTopics = data.data
            });

        };

        $scope.myGroupInit = function () {

            groupService.getAllGroups().success(function (data) {
                $scope.myGroups = data.data;
            });
        };

        $scope.fileInit();
        $scope.myGroupInit();

    }]);