'use strict';

app.factory('loginService', function($http, $q, $rootScope, RESOURCES, stringUtils) {

    function loginService() {
        var self = this;

        self = {
            login: login,
            recuperarSenha: recuperarSenha
        };


        angular.extend(self, stringUtils);

        return self;


        function login(data) {


            var deferred = $q.defer();
            $http.post(RESOURCES.URL_PLB + 'login/login', data)
                .success(function (response) {
                    deferred.resolve(response);
                })
                .error(function (response) {
                    deferred.reject(response);
                })
            ;
            return deferred.promise;
        };

        function recuperarSenha(data) {


            var deferred = $q.defer();
            $http.post(RESOURCES.URL_PLB + 'login/recuperarSenha', data)
                .success(function (response) {
                    deferred.resolve(response);
                })
                .error(function (response) {
                    deferred.reject(response);
                })
            ;
            return deferred.promise;
        };


    }


    return new loginService();
});
