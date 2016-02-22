'use strict';

app.controller('schoolAppController', ['$scope', '$location',
    function ($scope,  $location ) {
        $scope.conteudoPrincipalModo = 'dashboard';
        $scope.conteudoPrincipalProcessando = false;

        $scope.conteudoPrincipalTitulo = null;
        $scope.conteudoAuxiliarTemplate = null;

        $scope.conteudoPrincipalModoMudar = function(modo) {
            var modosConfig = {
                dashboard: {
                    titulo: "Dashboard"
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

        $scope.conteudoPrincipalModoMudar('dashboard');


    }
]);

