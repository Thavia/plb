/**
 * @ngdoc directive
 * @name menuLeft
 * @id navbar
 * @description Diretiva que faz a logica de aparição do Menu Left
 * @restrict E
 */
app.directive('menuLeft', function() {

    return {
        restrict: 'E',
        templateUrl: "modules/admin/diretive/views/menu-left.html",
        controller: function($rootScope, $scope, securityContext, $templateCache, gestaoCache, PRM_EVENTOS,userService, CACHE_KEYS){

            var self = this;

            self.usuarioConta = $rootScope.usuarioConta;
            self.organizacaoAtiva = gestaoCache.sessionGet(CACHE_KEYS.ORGANIZACAO_RAZAO);

            var contexto = securityContext;


            $scope.isGrant = function(privilegio){



                if(privilegio == null) return ;

                return userService.isGrant(privilegio);
            };



            function testaPermissao(itens) {

                var $ret = true;
                if (itens.roles.length > 0){

                    $ret = false;
                    angular.forEach(itens.roles, function (value, key) {
                        if ($scope.isGrant(value) == true)
                            $ret = true;
                    });
                }

                return $ret;
            }
            self.menuItems = [];
            self.menuAtivo = {};
            self.breadCumb = [];
            angular.extend( self.menuItems, gestaoCache.sessionGet(CACHE_KEYS.MENU_LEFT, true));
            angular.extend( self.menuAtivo, gestaoCache.sessionGet(CACHE_KEYS.MENU_SELECIONADO, true));



            self.addBreadcumb = function (breadCumb, limpar) {

                if(limpar == true)
                    self.breadCumb = [];

                self.breadCumb.push(breadCumb);
            };

            self.setMenuAtivo = function (menuAtivo) {

                menuAtivo.active = true;
                self.mainTemplate = $templateCache.get(menuAtivo.template);
                self.menuAtivo = menuAtivo;
                gestaoCache.sessionPut(CACHE_KEYS.MENU_SELECIONADO,  self.menuAtivo, true);
                gestaoCache.sessionPut(CACHE_KEYS.MENU_LEFT, self.menuItems , true);

                self.addBreadcumb( self.menuAtivo, true);
            };





            self.toggleMenuAtivo = function (menu) {

                if(!menu == null)
                    self.addBreadcumb(menu, true);

                if (menu == null){
                    var primeiroElemento = self.menuItems[0];
                    self.setMenuAtivo(primeiroElemento);

                }else {

                    angular.forEach(self.menuItems, function (item) {

                        item.active = false;

                        if (menu != null && menu.apelido == item.apelido) {
                            self.setMenuAtivo(item);

                        }

                    }, self.menuItems);
                }

                gestaoCache.sessionPut(CACHE_KEYS.MENU_LEFT, self.menuItems , true);
            };


            if(self.menuAtivo != null) {
               // self.toggleMenuAtivo(self.menuAtivo);
                self.setMenuAtivo(self.menuAtivo);

            }

            if(self.menuItems.length == 0) {
                self.menuItems = items.filter(testaPermissao);
                gestaoCache.sessionPut(CACHE_KEYS.MENU_LEFT, self.menuItems, true);
                self.toggleMenuAtivo(null);
            }

            self.trataEventosExternos = function(event, menuItem){

                angular.forEach(self.menuItems, function (item) {

                    item.active = false;

                    if (menuItem != null && menuItem == item.apelido) {

                        self.setMenuAtivo(item);

                    }

                }, self.menuItems);
            };

            self.alteraConteudoInterno = function(menuAtivo, inCache){

                self.mainTemplate = $templateCache.get(menuAtivo.template);

                self.menuAtivo = menuAtivo;

                if(inCache == true)
                    gestaoCache.sessionPut(CACHE_KEYS.MENU_SELECIONADO, self.menuAtivo , true);

                self.addBreadcumb(self.menuAtivo, true);

            };

            $rootScope.$on(PRM_EVENTOS.OPORTUNIDADE_NOVO, function (event, menuItem) {

               var novaOportunidadeItem = {
                       "titulo": "Nova Oportunidade" ,
                       "apelido": "novaOportunidade",
                       "breadCumb": "Nova Oportunidade",
                       "icone": "fa fa-plus",
                       "class": null,
                       "link": null,
                       "template": "novaOportunidade",
                       "roles": [],
                       "subItems": [],
                       ordem: 3,
                       active: false
                   };

                //self.menuItems.push(novaOportunidadeItem);
                self.setMenuAtivo(novaOportunidadeItem);
                //self.toggleMenuAtivo(novaOportunidadeItem);
            });

            $rootScope.$on(PRM_EVENTOS.EVENTOS_FILTRO_EXTERNO, function (event, menuItem) {

                self.trataEventosExternos(event, menuItem);

            });

            $rootScope.$on(PRM_EVENTOS.NOTIFICACAO_CARREGAR_INTERIO_LAYOUT, function (event, menuItem) {

                self.alteraConteudoInterno( menuItem , false);

            });
            $rootScope.$on(PRM_EVENTOS.OPORTUNIDADE_FILTRO_EXTERNO, function (event, menuItem) {

                    self.trataEventosExternos(event, menuItem);

            });

            $rootScope.$on(PRM_EVENTOS.NOTIFICACAO_RECARREGAR_VIEW_EM_CACHE, function () {

                self.menuItems = {};
                self.menuAtivo = {};
                angular.extend( self.menuItems, gestaoCache.sessionGet(CACHE_KEYS.MENU_LEFT, true));
                angular.extend( self.menuAtivo, gestaoCache.sessionGet(CACHE_KEYS.MENU_SELECIONADO, true));

                self.mainTemplate = $templateCache.get(self.menuAtivo.template);

                self.addBreadcumb(self.menuAtivo, true);
            });


            /***
             * @note
             * Futuramente criar outra key de cache para armazenar o ultimo menu acessao, caso tenhamos que
             * Salvar um item em cache utilizar alguma funcionalidade de voltar,
             * Precisamos saber quem foi o anterior
             */


        },
        controllerAs: 'menuCtrl'

    };
});