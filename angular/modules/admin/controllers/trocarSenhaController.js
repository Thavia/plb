'use strict';

/**
 *
 * @ngdoc controller
 * @name trocarController
 * @description  Controller pela troca de senha
 */
app.controller('trocarController', ['$scope','userService','PRM_EVENTOS',
    function ($scope, userService, PRM_EVENTOS) {

        var self = this;


        $scope.troca = "ok";

        self.alterarSenha = function($form) {


            userService.trocarSenha(this.trocarSenhaForm)
                .then(function (alteracoes) {
                    $scope.$emit(PRM_EVENTOS.NOTIFICACAO_RECARREGAR_VIEW_EM_CACHE);
                },
                function (response) {

                    $scope.erroDeProcessamento = true;
                    $scope.alteraSenhaFormMessage(response, $form);

                }).finally(function () {


                });

        };

        self.cancelar = function() {

            $scope.$emit(PRM_EVENTOS.NOTIFICACAO_RECARREGAR_VIEW_EM_CACHE);
        };


        $scope.alterarSenhaFormValidatorMessage = [];
        $scope.erroDeProcessamento = false;

        /**
         * Exibe as mensagens de form de cadastro de contato a partir da resposta
         * do webservice.
         * @param object response Reposta da submissao
         * @param $form form Formulario
         */
        $scope.alteraSenhaFormMessage = function(response, $form) {
            if ( !("detalhes" in response) ) return;

            angular.forEach(response.detalhes, function(errors, field) {

                var fieldName = errors.campo;

                var message = errors.descricao;
                $scope.alterarSenhaFormValidatorMessage[fieldName] = message;

                $form[fieldName].$dirty = true;
                $form[fieldName].$pristine = false;
                $form[fieldName].$setValidity('server', false);
                $form.$setValidity('server', false);

            });

        };

        /**
         * Obtem a mensagem de erro para um campo, caso exista
         * @param campo
         * @returns {string}
         */
        self.alteraSenhaFormServerMessage = function(campo) {


            var message = "";
            if ( campo in $scope.alterarSenhaFormValidatorMessage ) {
                message = $scope.alterarSenhaFormValidatorMessage[campo];

                $scope.erroDeProcessamento = false;
            }

            return message;
        };



    }]);
