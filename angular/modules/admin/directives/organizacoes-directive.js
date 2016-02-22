'use strict';

/**
 * @ngdoc directive
 * @name navbar
 * @id navbar
 * @description Diretiva que faz a logica de aparição do Nav Top e Nav menu Left
 * @restrict E
 */
app.directive('organizacoesSwitcher', function() {



    return {
        restrict: 'E',
        templateUrl: "modules/admin/diretive/views/organizacaoSwitcher.html",
        controller: function($rootScope,$scope, $window, usuarioService, encerrarSessao, CACHE_KEYS, PRM_EVENTOS, EVENTOS, AppURLService, gestaoCache){

            var self = this;

            self.organizacaoAtiva = {
                id: gestaoCache.sessionGet(CACHE_KEYS.ORGANIZACAO_ID),
                texto:  gestaoCache.sessionGet(CACHE_KEYS.ORGANIZACAO_NICK)

            };

            self.usuarioConta = {

                privilegios: null
            };

            if($rootScope.hasOwnProperty("usuarioConta"))

            {
                self.usuarioConta =  $rootScope.usuarioConta;
            }

            else {

                $rootScope.$on('USUARIO_PERFIL_ARMAZENADO', function () {

                    self.usuarioConta = $rootScope.usuarioConta;

                });

            }


            self.testaPermissao = function() {

                var  value = "ROLE_ADMIN-ORGANIZACAO_VER_TODAS";
                var $ret = false;
                angular.forEach( self.usuarioConta.privilegios , function (privilegio) {

                    if (privilegio == value)
                        $ret = true;
                });

                return $ret;

            };

            $scope.organizacoes = [];
            self.listaOrganizacoes = function (busca){

                if(busca != null && busca.length > 1 ) {


                    usuarioService.listaOrganizacoesUsuarioMestre(busca).then(

                        function (organizacoes) {       // usuário encontrado!


                            $scope.organizacoes = organizacoes.data;
                            console.log($scope.organizacoes);
                        },
                        function (err) {

                        }

                    );
                }
            };

            self.trocaOrganizacao = function(organizacaoAtiva)

            {


                usuarioService.trocaOrganizacaoUsuarioMestre(organizacaoAtiva).then(

                    function (response) {


                        $scope.$emit(EVENTOS.GET_NOTIFICATION_REQUISICAO_OK, response.response);


                        angular.forEach(CACHE_KEYS, function(value, key) {

                            gestaoCache.cookieRemove(value);
                            gestaoCache.sessionRemove(value);

                        });


                        gestaoCache.sessionPut(CACHE_KEYS.JWT, response.jwt);
                        gestaoCache.sessionPut(CACHE_KEYS.TOKEN, response.jwt, false);
                        gestaoCache.sessionPut(CACHE_KEYS.ORGANIZACAO_NICK, response.organizacaoNick);
                        gestaoCache.sessionPut(CACHE_KEYS.ORGANIZACAO_RAZAO, response.organizacaoRazao);
                        gestaoCache.sessionPut(CACHE_KEYS.ORGANIZACAO_ID, response.organizacaoId);


                        $rootScope.redirectPosLogin();



                    },
                    function (err) {

                    }


                )


            };






        },
        controllerAs: 'organizacoesCtrl',
        scope: {
            navAtivo: '@'

        }
    };
});






