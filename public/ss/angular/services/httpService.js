var skoolspace = angular.module('skoolspace');

skoolspace.factory('httpService' ,['$http' ,function($http){

        var baseUrl = "http://localhost:8000/";

        var get = function(url){
          return $http.get(baseUrl + url);
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