var ssModule = angular.module('skoolspace');

ssModule.factory('noticeService', ['httpService',function(httpService){

    var getAllNotices = function(){
        return httpService.get('all/board/notices')
    };
    return{
        getAllNotices : getAllNotices
    }
}]);