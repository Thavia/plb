'use strict';

app.factory('signUpService', function($http, $q, $rootScope, RESOURCES, stringUtils) {

    function signUpService() {
        var self = this;

        self = {
            salvarUsuario: salvarUsuario,
            verificaEmail: verificaEmail,
            getCursos: getCursos,
            addCurso: addCurso,
            getGnToken: getGnToken,
            salvarCCToken: salvarCCToken,
            getSubscriptionStatus: getSubscriptionStatus
        };


        angular.extend(self, stringUtils);

        return self;


        function exibe(id) {
            var deferred = $q.defer();
            $http.get(RESOURCES.URL_ADMIN_CONFIGURACAO_PRESET + '/' + id)
                .success(function (response) {
                    deferred.resolve(response);
                })
                .error(function (response) {
                    deferred.reject(response);
                })
            ;
            return deferred.promise;
        }


        function listar(filter, params) {

            var link = RESOURCES.URL_ADMIN_CONFIGURACAO_PRESET;

            var url = self.transformLink(link, filter, params);
            // url += '&incluir=usuario.unidades,usuario.perfil';
            return $http.get(url);

        };


        function excluir(id) {
            var deferred = $q.defer();

            var url = RESOURCES.URL_ADMIN_CONFIGURACAO_PRESET + '/' + id;
            url += '?_method=delete';

            $http.post(url)
                .success(function (response) {
                    deferred.resolve(response);
                })
                .error(function (response) {
                    deferred.reject(response);
                })
            ;

            return deferred.promise;
        };


        function criar(info) {
            var deferred = $q.defer();
            $http.post(RESOURCES.URL_ADMIN_CONFIGURACAO_PRESET, info)
                .success(function (response) {
                    deferred.resolve(response);
                })
                .error(function (response) {
                    deferred.reject(response);
                })
            ;
            return deferred.promise;
        };


        function editar(id, info) {
            var deferred = $q.defer();
            $http.put(RESOURCES.URL_ADMIN_CONFIGURACAO_PRESET + '/' + id, info)
                .success(function (response) {
                    deferred.resolve(response);
                })
                .error(function (response) {
                    deferred.reject(response);
                })
            ;
            return deferred.promise;
        };

        function duplicarClicado(id) {
            var deferred = $q.defer();
            $http.post(RESOURCES.URL_ADMIN_CONFIGURACAO_PRESET + '/duplicar/' + id)
                .success(function (response) {
                    deferred.resolve(response);
                })
                .error(function (response) {
                    deferred.reject(response);
                })
            ;
            return deferred.promise;
        };


        function gerarPRM(presetId, dados) {
            var deferred = $q.defer();
            $http.post(RESOURCES.URL_ADMIN_CONFIGURACAO_PRESET + '/gera/' + presetId, dados)
                .success(function (response) {
                    deferred.resolve(response);
                })
                .error(function (response) {
                    deferred.reject(response);
                })
            ;
            return deferred.promise;
        };

        function verificaNick(nick) {
            var deferred = $q.defer();
            $http.get(RESOURCES.URL_ADMIN_CONFIGURACAO_PRESET + '/verificaApelido/' + nick)
                .success(function (response) {
                    deferred.resolve(response);
                })
                .error(function (response) {
                    deferred.reject(response);
                })
            ;
            return deferred.promise;
        };

        function verificaEmail(email) {

            var data = {email: email};
            var deferred = $q.defer();
            $http.post(RESOURCES.URL_PLB + 'SignUp/checarEmail', data)
                .success(function (response) {
                    deferred.resolve(response);
                })
                .error(function (response) {
                    deferred.reject(response);
                })
            ;
            return deferred.promise;
        };


        function salvarUsuario(data) {


            var deferred = $q.defer();

            $http.post(RESOURCES.URL_PLB + 'SignUp/create', data)
                .success(function (response) {
                    deferred.resolve(response);
                })
                .error(function (response) {
                    deferred.reject(response);
                })
            ;
            return deferred.promise;
        }

        function addCurso(data) {


            var deferred = $q.defer();

            $http.post(RESOURCES.URL_PLB + 'SignUp/addUserToCourse', data)
                .success(function (response) {
                    deferred.resolve(response);
                })
                .error(function (response) {
                    deferred.reject(response);
                })
            ;
            return deferred.promise;
        }

        function salvarCCToken(data) {


            var deferred = $q.defer();

            $http.post(RESOURCES.URL_PLB + 'SignUp/salvarCCToken', data)
                .success(function (response) {
                    deferred.resolve(response);
                })
                .error(function (response) {
                    deferred.reject(response);
                })
            ;
            return deferred.promise;
        }


        function getCursos() {


            var deferred = $q.defer();

            $http.get(RESOURCES.URL_PLB + 'SignUp/cursos')
                .success(function (response) {
                    deferred.resolve(response);
                })
                .error(function (response) {
                    deferred.reject(response);
                })

            return deferred.promise;
        }

        function getSubscriptionStatus(subscriptionId) {


            var deferred = $q.defer();

            $http.get(RESOURCES.URL_PLB + 'SignUp/getSubscription/'+subscriptionId)
                .success(function (response) {
                    deferred.resolve(response);
                })
                .error(function (response) {
                    deferred.reject(response);
                })

            return deferred.promise;
        }

        function getGnToken() {


            var deferred = $q.defer();

            $http.get(RESOURCES.URL_PLB + '/SignUp/gnToken')
                .success(function (response) {
                    deferred.resolve(response);
                })
                .error(function (response) {
                    deferred.reject(response);
                });

            return deferred.promise;
        }
    }


    return new signUpService();
});
