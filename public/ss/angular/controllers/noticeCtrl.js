var ssModule = angular.module('skoolspace');

ssModule.controller('NoticeController', ['$scope', 'noticeService', function($scope, noticeService){

    //Controller variables
    $scope.search = {};
    $scope.loading = true;
    $scope.pageSize = 6;
    $scope.currentPage = 1;
    $scope.allNotices = [];
    $scope.noticeToBeDeleted = {};

    //Controller functions
    $scope.deleteNotice = function(notice){
      $scope.noticeToBeDeleted = notice;
    };

    $scope.noticeInit = function()
    {
        $scope.loading = true;
        noticeService.getAllNotices().success(function(data){
            $scope.allNotices = data.data;
            $scope.loading = false;
        });
    };

    //Controller Initialization calls
    $scope.noticeInit();
}]);
