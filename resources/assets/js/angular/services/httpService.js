var ssModule = angular.module('skoolspace');

ssModule.factory('httpService' ,['$http' ,function($http){

        var baseUrl = "/api/ss/";

        var get = function(url, param){
            var stringUrl = String(url);
          return $http({
              url: baseUrl + stringUrl,
              method: "GET",
              params: param
          });
        };

        var post = function(url, object){
            return $http.post(baseUrl + url, object);
        };

        return{
            get: get,
            post: post
        };
    }]
);