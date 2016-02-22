'use strict';

/**
 *
 * @ngdoc directive
 * @name infoPopup
 * @description  Diretiva com mensagens personalizadas com pnotify
 * @restrict E
 */
app.directive('infoPopup',
    ['RESOURCES','notificationService','$window','EVENTOS', function(RESOURCES, notificationService, $window, EVENTOS) {
        var showErrors, linkFn, falhaNaOperacao, successNaOperacao, estouraException;

        /**
         * @ngdoc method
         * @name showErrors
         * @methodOf infoPopup
         * @deprecated
         * @description Exibe popOver de erro
         */
        showErrors = function () {


            notificationService.notify({
                title: 'Autenticação',
                text: 'Você deseja se autenticar?',
                hide: false,
                type: "error",
                icon: true,
                confirm: {
                    confirm: true
                },
                buttons: {
                    closer: false,
                    sticker: false
                },
                history: {
                    history: true
                }



            }).get().on('pnotify.confirm', function () {
                window.location.assign(RESOURCES.PLATAFORMA);
            }).on('pnotify.cancel', function () {

            });

        };

        /**
         * @ngdoc method
         * @name falhaNaOperacao
         * @methodOf infoPopup
         * @description Exibe popOver de erro de falha de oporacao
         */
        falhaNaOperacao = function (titulo, texto) {

            var header = titulo ||'Falha na requisicao!';
            var text = texto || 'Houve um problema em sua requisição, tente novamente em instantes!';


            notificationService.notify({
                title: header,
                text: text,
                type: "error",
                delay: 4000,
                icon: true,
                confirm: {
                    confirm: false
                },
                buttons: {
                    closer: true,
                    sticker: true
                },
                addclass: "stack-bar-top",
                cornerclass: "prm",
                opacity: 1
            });


        };

        /**
         * @ngdoc method
         * @name estouraException
         * @methodOf infoPopup
         * @description Exibe popOver de erro de falha 404
         */
        estouraException = function (titulo, texto) {

            notificationService.notify({
                title: header,
                text: header,
                type: "error",
                delay: 6000,
                icon: true,
                confirm: {
                    confirm: false
                },
                buttons: {
                    closer: true,
                    sticker: false
                }

            });

        };

        /**
        * @ngdoc method
        * @name successNaOperacao
        * @methodOf infoPopup
        * @description Exibe popOver de infor para operações realizadas com sucesso
        */
        successNaOperacao = function (msg) {

            notificationService.notify({
                title: 'Operação realizada com sucesso',
                text: msg,
                hide: true,
                type: "info",
                addclass: "fundo-cinza",
                delay: 3000,
                icon: true,
                confirm: {
                    confirm: false
                },
                buttons: {
                    closer: true,
                    sticker: true
                }

            });

        };

        linkFn = function (scope, el, attrs, form) {

            /**
             * @ngdoc method
             * @name EVENTOS.GET_NOTIFICATION_ERROR
             * @methodOf infoPopup
             * @description Evento que aguarda uma notificação de erro
             */
            scope.$on(EVENTOS.GET_NOTIFICATION_ERROR, function () {

                return showErrors();
            });

            /**
             * @ngdoc method
             * @name EVENTOS.GET_NOTIFICATION_REQUISICAO_ERROR
             * @methodOf infoPopup
             * @description Evento que aguarda uma notificação de requisição HTTP de  erro
             */
            scope.$on(EVENTOS.GET_NOTIFICATION_REQUISICAO_ERROR, function (event, header, texto) {

                return falhaNaOperacao(header, texto);
            });

            /**
             * @ngdoc method
             * @name EVENTOS.GET_NOTIFICATION_REQUISICAO_OK
             * @methodOf infoPopup
             * @description Evento que aguarda uma notificação de requisição HTTP com sucesso
             */
            scope.$on(EVENTOS.GET_NOTIFICATION_REQUISICAO_OK, function (event, msg) {

                return successNaOperacao(msg);
            });

            /**
             * @ngdoc method
             * @name EVENTOS.GET_NOTIFICATION_REQUISICAO_400
             * @methodOf infoPopup
             * @description Evento que aguarda uma notificação de requisição HTTP com erro 404(informaçoes invalidas)
             */
            scope.$on(EVENTOS.GET_NOTIFICATION_REQUISICAO_400, function (event, titulo, descricao) {

                return estouraException(titulo, descricao);
            });

        };
        return {
            restrict: "E",
            compile: function (elem, attrs) {
                return linkFn;
            }
        };
    }]);
