// Declare app level module which depends on views, and components
var app = angular.module('prm', [
    'app.ENV', 'ngRoute', 'ngTable', 'ngCookies', 'ngSanitize',  'jlareau.pnotify', 'ui.notify', 'ui.bootstrap', 'ui.select','ui.utils.masks',
    'checklist-model',  'ui.validate', 'ui.mask', 'ngCpfCnpj', 'ngCkeditor','naif.base64','highcharts-ng', 'validation.match',
    'ui.bootstrap.showErrors'
]);


app.config(['$routeProvider', '$locationProvider', function ($routeProvider, $locationProvider) {
    //remove o # da URL
    $locationProvider.html5Mode(true);
    $routeProvider

        .when('/', {
            templateUrl: 'modules/prm/adminApp/views/index.html'
        })

        .when('/login', {

            templateUrl: 'modules/admin/views/login.html',
            controller: 'loginController',
            controllerAs: 'loginCtrl',
            public: true
        })
        .when('/dashboard', {

            templateUrl: 'modules/prm/schoolApp/views/index.html',
            controller: 'schoolAppController',
            controllerAs: 'dashCtrl'


        })


        //caso não seja nenhuma desses, redireciona para a rota '/404'
        .otherwise({
            redirectTo: "/404"
        });
}]);

app.run(['$rootScope', '$templateCache', '$location', '$route', 'encerrarSessao', 'ENV','CACHE_KEYS', 'gestaoCache','$window',
    function($rootScope, $templateCache, $location, $route, encerrarSessao, ENV, CACHE_KEYS, gestaoCache ,$window) {
        $rootScope.env = "DEV";

        var self = this;
        templates.setTemplates($templateCache);
        templates.getTemplates($rootScope, $templateCache);


        $rootScope.usuarioEstaAutenticado = function() {


            var retrievedObject = gestaoCache.sessionGet(CACHE_KEYS.USUARIO_CONTA);
            if (retrievedObject != null) {
                return true;
            }


        };
    }]);




