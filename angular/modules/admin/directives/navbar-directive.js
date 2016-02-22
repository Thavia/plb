'use strict';

/**
 * @ngdoc directive
 * @name navbar
 * @id navbar
 * @description Diretiva que faz a logica de aparição do Nav Top e Nav menu Left
 * @restrict E
 */
app.directive('navBar', function() {



    return {
        restrict: 'E',
        templateUrl: "modules/admin/diretive/views/navbar.html",
        controller: function($rootScope,$scope,  CACHE_KEYS, PRM_EVENTOS){

            var self = this;

            /**
             * @ngdoc method
             * @name logout
             * @methodOf navbar
             * @description Realiza o logout do piao
             */

            var navItems = [
                {"titulo": "Configurações" , "icone": "fa fa-cog", "class": null, "link": "/config", "template": null, "roles": [], ordem:1, method: null },
                {"titulo": "Trocar senha" , "icone": "fa fa-key", "class": null, "link": "javascript:void(0);", "template": null, "roles": [], ordem:2, method: 'trocarSenha' },
                {"titulo": "divider", "class": "divider" , "roles": [], ordem: 3, method: null},
                {"titulo": "Relatórios", "icone": "icon-bar-chart", "class": null, "link": "javascript:void(0);", "template": null, "roles": ['ROLE_VENDAS-GESTOR_COMERCIAL'], ordem:7, method: 'relatorios' },
                {"titulo": "Administração", "icone": "fa fa-dashboard", "class": null, "link": "/admin", "template": null, "roles": ['ROLE_ADMIN-ORGANIZACAO_VER_TODAS'], ordem:8, method: null },
                {"titulo": "divider", "class": "divider" , "roles": [], ordem: 8, method: null},
                {"titulo": "Oportunidades", "icone": "fa fa-filter", "path":"/oportunidades", ordem:2, "roles": [] }

            ];


        },
        controllerAs: 'navCtrl',
        scope: {
            navAtivo: '@'

        }
    };
});