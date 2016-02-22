/**
 * Controller para para um CRUD simples
 * @param $scope
 * @param conteudoPrincipalConfig
 * @param modoPadrao
 * @constructor
 */
function CrudBaseController( $scope, config, modoPadrao ) {
    var self = this;

    $scope.conteudoPrincipalModo = null;
    $scope.conteudoPrincipalTitulo = null;
    $scope.conteudoPrincipalProcessando = true;


    // form de edição do CRUD
    $scope.editForm = null;

    /**
     * Armazena os resultados da validação no servidor
     * @type {{}}
     */
    $scope.resultadosValidacaoServidor = {};

    /**
     * Remapeamentos das mensagens de validação dos servidor
     * para que se adequem nomes dos campos dos formulários
     * @type {Array}
     */
    $scope.validacaoServidorRemapeamentos = [];


    /**
     * Configura os modos do conteúdo principal
     * @param config configurações dos modos do conteúdo principal
     *              Exemplo:
     *                {
     *                    listar: {
     *                        titulo: "Unidadess de Negócio cadastradas"
     *                    },
     *                    criar: {
     *                        titulo: "Criando nova Unidade de Negócios"
     *                    },
     *                }
     */
    self.crudConfig = function(config) {
        self.viewBaseUrl = config.viewBaseUrl;
        self.modosConfig = config.modos;
    }


    /**
     * Define o formulário de edicao
     * @param form
     */
    $scope.defineEditForm = function(form) {

        $scope.editForm = form;
    }


    /**
     * Alterna para o modo espeficicado
     * @param modo  modo
     */
    $scope.conteudoPrincipalModoMudar = function(modo) {




        if ( self.modosConfig.hasOwnProperty(modo) ) {
            var configModo = self.modosConfig[modo] ;

            $scope.conteudoPrincipalTitulo = configModo.titulo;
            $scope.conteudoPrincipalModo = modo;
        }

        $scope.conteudoPrincipalProcessando = false;
    };


    /**
     * Obtem as mensagens de validação do servidor e as armazena na aplicacao
     * Altera a situação dos campos do formulário.
     * @param response
     */

    $scope.obtemMensagensValidacaoServidor = function(response) {
        if ( !("detalhes" in response) ) return;

        for( var i in response.detalhes ) {
            var det = response.detalhes[i];
            var fieldName = det['campo'];
            var message = det['descricao'];

            $scope.resultadosValidacaoServidor[fieldName] = message;

            if ( $scope.editForm.hasOwnProperty(fieldName) ) {
                $scope.editForm[fieldName].$dirty = true;
                $scope.editForm[fieldName].$setValidity('server', false);
            }
        }

        // caso seja necessário realizar mapeamento das respostas
        // de validação do servidor
        //
        if ( $scope.hasOwnProperty('validacaoServidorRemapeamentos') ) {
            $scope.remapearMensagensValidacaoServidor( $scope.validacaoServidorRemapeamentos );
        }


    }


    /**
     * Ajusta o mapeamento da resposta de validação do servidor aos nomes (atributo name) dos campos do formulário
     * Utilizado quando os nomes dos campos do form são diferentes dos utilizados pela API
     */
    $scope.remapearMensagensValidacaoServidor = function(remapeamentos) {

        for(var i = 0; i < remapeamentos.length; i++ ) {
            var map = remapeamentos[i];

            var original = map[0];
            var novo = map[1];


            if ( $scope.resultadosValidacaoServidor.hasOwnProperty( original ) ) {
                $scope.resultadosValidacaoServidor[ novo ] = $scope.resultadosValidacaoServidor[ original ];

                $scope.editForm[ novo ].$dirty = true;
                $scope.editForm[ novo ].$setValidity('server', false);

                delete $scope.resultadosValidacaoServidor[ original ];
            }
        }
    }



    /**
     * Obtem a mensagem de validação pelo servidor para um certo campo,
     * caso a mesma exista.
     * @param campo
     * @returns {string}
     */
    $scope.mensagemValidacaoServidor = function(campo) {
        var message = "";
        if ( campo in $scope.resultadosValidacaoServidor ) {
            message = $scope.resultadosValidacaoServidor[campo];
        }

        return message;
    }



    /**
     * Obtem o caminho para uma certa view
     * @param template
     * @returns {string}
     */
    $scope.view = function(template ) {
        var ret = self.viewBaseUrl + "/" + template;

        return ret;
    }


    self.crudConfig(config);
    $scope.conteudoPrincipalModoMudar(modoPadrao);
}

