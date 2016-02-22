'use strict';

/**
 * @ngdoc service
 * @name gestaoCache
 * @module encerrarSessao
 * @description  Realiza o logout da aplicação limpando todas sujeiras deixadas pelo sistema, cookies, sessionS;
 */
app.factory('encerrarSessao', function($rootScope, $cookies, $window, AppURLService, CACHE_KEYS, gestaoCache, RESOURCES, EVENTOS) {


    function encerrarSessao() {

        var self = this;

        // interface
        self = {

            storage: $window.sessionStorage,
            realizaLogout: realizaLogout,
            estouraException: estouraException
        };

        return self;

        function realizaLogout() {
            angular.forEach(CACHE_KEYS, function(value, key) {

                gestaoCache.cookieRemove(value);
                gestaoCache.sessionRemove(value);

            });

            $window.location.href = AppURLService.getUrlLogin();
        };


        function estouraException(rejection) {
            var detalhes = "\n";
            var titulo = (rejection.data.descricao);
            /*angular.forEach(rejection.data.detalhes, function(x, y) {
             angular.forEach(x, function(value, key) {
             detalhes += key.toUpperCase() + ": '" + value + "'\n";
             });
             $rootScope.$emit(EVENTOS.GET_NOTIFICATION_REQUISICAO_400, titulo, detalhes);
             });*/


        };


    }

    return new encerrarSessao();

});
