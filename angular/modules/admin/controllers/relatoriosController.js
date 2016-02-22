'use strict';

/**
 *
 * @ngdoc controller
 * @name relaotirosController
 * @description  Controller pela troca de senha
 */
app.controller('relatoriosController', ['$scope','gestaoCache','CACHE_KEYS','RESOURCES','stringUtils',
    function ($scope, gestaoCache, CACHE_KEYS,RESOURCES,stringUtils) {

        var self = this;
        angular.extend(self, stringUtils);




        var organizacaoId = gestaoCache.sessionGet(CACHE_KEYS.ORGANIZACAO_ID);

        self.urlEsforcosCount = self.sprintf(RESOURCES.URL_RELATORIOS_ESFORCOS_COUNT, organizacaoId);
        self.urlContatos = self.sprintf(RESOURCES.URL_RELATORIOS_CONTATOS, organizacaoId);
        self.urlEsforcosHistorico = self.sprintf(RESOURCES.URL_RELATORIOS_ESFORCOS_HISTORICO, organizacaoId);


        console.log(self.urlEsforcosCount);


    }]);
