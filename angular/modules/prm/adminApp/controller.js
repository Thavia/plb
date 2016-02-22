'use strict';

app.controller('adminAppController', ['$scope', '$location',
    function ($scope,  $location ) {
        $scope.conteudoPrincipalModo = 'pagamento';
        $scope.conteudoPrincipalProcessando = false;

        $scope.conteudoPrincipalTitulo = null;
        $scope.conteudoAuxiliarTemplate = null;

        $scope.conteudoPrincipalModoMudar = function(modo) {
            var modosConfig = {
                signUp: {
                    titulo: "Configurando sua conta"
                }
            };


            if ( modosConfig.hasOwnProperty(modo) ) {
                var configModo = modosConfig[modo];

                $scope.conteudoPrincipalAcoes = null;
                $scope.conteudoPrincipalTitulo = configModo.titulo;
            }

            $scope.conteudoPrincipalModo = modo;
            $scope.$emit('ADMIN_APP_MODO_MUDOU', {modo: modo} );
        };

        $scope.conteudoPrincipalModoMudar('signUp');


    }
]);

