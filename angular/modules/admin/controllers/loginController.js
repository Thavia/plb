'use strict';

/**
 *
 * @ngdoc controller
 * @name trocarController
 * @description  Controller pela troca de senha
 */
app.controller('loginController', ['$scope', '$location', '$rootScope', 'gestaoCache', 'CACHE_KEYS','loginService','$window',
    function ($scope, $location, $rootScope, gestaoCache, CACHE_KEYS, loginService,$window) {

        var self = this;

        $scope.loginModel = {

            username: null,
            password: null

        };

        self.nick = $location.$$host.split('.', 1)[0];
        self.clicado = false;

        self.logar = function () {




            loginService.login($scope.loginModel).then(

                function(response){

                    gestaoCache.sessionPut('user', response, response);
                    self.clicado = false;
                    $window.location.href = '/dashboard';
                },

                function(response) {
                    console.log(response);
                    self.clicado = false;

                }


            );
            $scope.erros = null;
            self.clicado = true;


        };


    }]);
