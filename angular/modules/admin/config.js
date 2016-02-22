/**
 *
 * @ngdoc service
 * @name config
 * @description  Configurações do modulo
 */
app.config(function ($httpProvider) {


    $httpProvider.defaults.headers.common = {};
    $httpProvider.defaults.headers.post = {};
    $httpProvider.defaults.headers.put = {};
    $httpProvider.defaults.headers.patch = {};


    $httpProvider.interceptors.push(function ($q, $rootScope) {

        var x = 0;
        return {
            'request': function (config) {
                x++;
                $rootScope.applicationState = false;
                return $q.when(config);
            },
            'response': function (response) {


                if ((--x) === 0)
                    $rootScope.applicationState = true;
                return $q.when(response);

            }, 'responseError': function (rejection) {

                if (!(--x))
                    $rootScope.applicationState = true;

                //if (rejection.hasOwnProperty("status") == true && rejection.status == 401)
                //    encerrarSessao.realizaLogout();

                //if (rejection.hasOwnProperty("status") == true && rejection.status == 400)
                //    encerrarSessao.estouraException(rejection);

                return $q.reject(rejection);
            }
        };

    });


});


// Roda em prod
app.config(['$compileProvider', function ($compileProvider) {
    $compileProvider.aHrefSanitizationWhitelist(/^\s*(https?|ftp|mailto|file|javascript):/);
    $compileProvider.debugInfoEnabled(false);
}]);
