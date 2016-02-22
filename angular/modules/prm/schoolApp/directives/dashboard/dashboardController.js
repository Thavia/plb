'use strict';

app.directive('schoolAppDashboard', ['$rootScope', 'signUpService', 'EVENTOS', '$locale', function ($rootScope, signUpService, $locale) {
    return {
        restrict: 'E',
        templateUrl: 'modules/prm/schoolApp/directives/dashboard/views/index.html',

        controller: ['$scope', '$locale', '$window','$location',function ($scope, $locale,$window,$location) {
            //
            // ---> configura e inicializa o crud
            //

            $locale.NUMBER_FORMATS.CURRENCY_SYM = "R$";
            var crudConfig = {
                viewBaseUrl: 'modules/prm/schoolApp/directives/dashboard/views',
                modos: {
                    dashboard: {
                        titulo: "Dashboard"
                    },
                    curso: {
                        titulo: "Escolha seu curso"
                    },
                    login: {
                        titulo: "Login do Usuario"
                    },
                    pagamento: {
                        titulo: "Pagamento"
                    },
                    confirmation: {
                        titulo: "Confirmação de matrícula"
                    }

                }
            };
            angular.extend(this, new CrudBaseController($scope, crudConfig, 'confirmation'));
            /**
             * Modelo para edição
             */
            var self = this;
            // --> item que está sendo editado


            self.verificaEmail = function (email) {

                $scope.emailEmUso = false;
                signUpService.verificaEmail(email)
                    .then(
                    function (response) {

                        console.log(response);

                        if (response.status != 'sucesso') {

                            $scope.emailEmUso = true;


                        }
                        else {

                            $scope.emailEmUso = false;
                        }

                    },
                    function (response) {
                    }
                );


            };

            $scope.formEditarModel = {};

            self.buscaCEP = function () {

                $.get("http://apps.widenet.com.br/busca-cep/api/cep.json", {code: $scope.formEditarModel.cep},

                    function (result) {
                        if (result.status != 1) {

                        }

                        else {

                            $scope.formEditarModel.estado = result.state;
                            $scope.formEditarModel.cidade = result.city;
                            $scope.formEditarModel.bairro = result.district;
                            $scope.formEditarModel.endereco = result.address;


                        }
                        });

            };



                self.salvarUsuario = function () {


                    signUpService.salvarUsuario($scope.formEditarModel)
                        .then(
                        function (response) {

                            $scope.usuarioSalvo = response.usuario;
                            $scope.conteudoPrincipalModoMudar('curso');

                        },
                        function (response) {

                            console.log(response);
                        }
                    );


                };

                self.login = function () {

                    $scope.conteudoPrincipalModoMudar('login');

                };

                $scope.cursoModel = {};

                $scope.cursosList = [];
                $scope.duracaoList = [

                    {
                        nome: '32 aulas ou 6 meses',
                        id: 32
                    },
                    {
                        nome: '64 aulas ou 12 meses',
                        id: 64
                    }


                ];

                $scope.formasDePagamento = [

                    {
                        nome: 'Cartao de Crédito',
                        id: 1
                    },
                    {
                        nome: 'Boleto Bancário',
                        id: 2
                    }


                ];

                self.getCursosList = function () {


                    signUpService.getCursos().then(
                        function (response) {
                            $scope.cursosList = response;


                        },

                        function (response) {

                            console.log(response);


                        }
                    )

                };

                self.carregaCursoDescricao = function (item) {

                    $scope.cursoSelecionado = item;

                };


                self.addCurso = function () {

                    var info = {

                        curso: $scope.cursoModel.curso,
                        usuario: $scope.usuarioSalvo.fk_user,
                        duracao: $scope.cursoModel.duracao


                    };

                    if ($scope.cursoModel.duracao == 32)

                        $scope.cursoSelecionado.valor = '399,00';
                    else
                        $scope.cursoSelecionado.valor = '359,00';


                    signUpService.addCurso(info)
                        .then(
                        function (response) {

                            console.log(response);
                            $scope.cursoModel.matriculaId = response.id;
                            $scope.conteudoPrincipalModoMudar('pagamento');

                        },
                        function (response) {

                            console.log(response);
                        }
                    );


                };


                self.getCursosList();

                $scope.pagamentoModel = {};

                self.getGnToken = function () {

                    signUpService.getGnToken().then(
                        function (response) {
                            self.gnToken = response;
                            $('body').append(response);
                            $gn.ready(function (checkout) {
                                self.checkout = checkout;
                                self.callback = function (error, response) {
                                    if (error) {
                                        // Trata o erro ocorrido
                                        console.error(error);
                                        if(error.error == 'invalid_brand'){

                                            $scope.erroBandeira = 'A bandeira informada está incorreta.'

                                        }

                                        if(error.error == 'invalid_card_number'){

                                            $scope.erroCcNumber = 'O número informado está incorreto'

                                        }

                                        else {

                                            $scope.dadosInvalidos = 'Os dados informados estao incorretos'

                                        }
                                    } else {
                                        // Trata a resposta


                                        var infoSalvar = {

                                            user: $scope.usuarioSalvo.fk_user,
                                            matricula:  $scope.cursoModel.matriculaId,
                                            token:  response.data.payment_token,
                                            cardmask: response.data.card_mask

                                        };

                                        self.salvarCCToken(infoSalvar);

                                    }
                                };
                            });
                        },

                        function (response) {

                            console.log(response);

                        }
                    )};

                self.processarPagamento = function () {

                    var expirationDate = $scope.pagamentoModel.cc.expiration;
                    console.log($scope.pagamentoModel.cc.brand);
                    console.log(expirationDate.substring(0, 2));
                    console.log(expirationDate.substring(2));
                    self.checkout.getPaymentToken({
                        brand: $scope.pagamentoModel.cc.brand,
                        number: $scope.pagamentoModel.cc.number,
                        cvv: $scope.pagamentoModel.cc.cvv,
                        expiration_month: expirationDate.substring(0, 2),
                        expiration_year: expirationDate.substring(2)
                    }, self.callback);

                };

                self.salvarCCToken = function (cc) {

                    signUpService.salvarCCToken(cc).then(
                        function(response){

                            self.subscriptionId = response.data.subscription_id;

                            self.getSubscriptionStatus(self.subscriptionId);
                            $scope.conteudoPrincipalModoMudar('confirmation');

                        },

                        function(response){


                            console.log(response);


                        }


                    );



                };

            self.getSubscriptionStatus = function (subscriptionId) {

                signUpService.getSubscriptionStatus(subscriptionId).then(

                   function (response){
                       console.log(response);
                       $scope.subscription = response.data;

                   },

                    function (response) {

                        console.log(response);

                    }


                );




            };

            self.login =function () {

                $window.location.href = '/login';

            };


                self.getGnToken();

            }],
            controllerAs: 'dashboardController'
        };
}]);

