/**
 * @ngdoc object
 * @name templates
 * @module templates
 * @description Templates utilizado no layout status: 1 => ativo, status: 0 => inativo
 */
var templates = [
                { name: 'header', url: 'modules/admin/views/header.html', status:1, grupo: 'admin' },
                { name: 'leftSidebar', url: 'modules/admin/views/left-sidebar.html', status:1, grupo: 'admin' },
                { name: 'ajaxBusyIndicator', url: 'modules/admin/views/ajaxBusyIndicator.html', status:1, grupo: 'admin' },
                { name: 'foraDoAr', url: 'modules/admin/views/500.html', status:1, grupo: 'admin' },
                { name: 'popoverTemplatePath', url: 'modules/admin/views/popOver/popoverTemplate.html', status:1, grupo: 'admin' },
                { name: 'trocarSenha', url: 'modules/admin/views/admin/trocarSenha.html', status:1, grupo: 'admin' },
                { name: 'relatorios', url: 'modules/admin/views/admin/relatorios.html', status:1, grupo: 'admin' },
                { name: 'navbar', url: 'modules/admin/diretive/views/navbar.html', status:1, grupo: 'admin' },
                { name: 'popUpEventos', url: 'modules/prm/diretive/views/popUpEvento/popUpEventos.html', status:1, grupo: 'admin' },
                { name: 'eventoEdicao', url: 'modules/prm/diretive/views/popUpEvento/eventoEdicao.html', status:1, grupo: 'admin' },
                { name: 'eventoNovo', url: 'modules/prm/diretive/views/popUpEvento/eventoNovo.html', status:1, grupo: 'admin' },
                { name: 'eventoRealizar', url: 'modules/prm/diretive/views/popUpEvento/eventoRealizar.html', status:1, grupo: 'admin' },
                { name: 'eventoCancelar', url: 'modules/prm/diretive/views/popUpEvento/eventoCancelar.html', status:1, grupo: 'admin' },
                { name: 'bashoardTabs', url: 'modules/prm/views/oportunidade/dashboardTabs.html', status:1, grupo: 'prm' },
                { name: 'dashboardGeral', url: 'modules/prm/views/oportunidade/dashboardGeral.html', status:1, grupo: 'prm' },
                { name: 'dashboardOportunidades', url: 'modules/prm/views/oportunidade/dashboardOportunidades.html', status:1, grupo: 'prm' },
                { name: 'dashboardEventos', url: 'modules/prm/views/oportunidade/dashboardEvento.html', status:1, grupo: 'prm' },
                { name: 'oportunidadeFiltroAvancado', url: 'modules/prm/views/oportunidade/oportunidadeFiltroAvancado.html', status:1, grupo: 'prm' },
                { name: 'acaoEmMassaFormAtribuirVendedor', url: 'modules/prm/diretive/views/acoesEmMassa/forms/atribuirVendores.html', status:1, grupo: 'prm' },
                { name: 'acaoEmMassaFormRemoverVendedor', url: 'modules/prm/diretive/views/acoesEmMassa/forms/removerVendores.html', status:1, grupo: 'prm' },
                { name: 'acaoEmMassaFormAtribuirUnidadeNegocios', url: 'modules/prm/diretive/views/acoesEmMassa/forms/atribuirUnidadeNegocios.html', status:1, grupo: 'prm' },
                { name: 'acaoEmMassaFormArquivarOportunidade', url: 'modules/prm/diretive/views/acoesEmMassa/forms/arquivarOportunidade.html', status:1, grupo: 'prm' },
                { name: 'acaoEmMassaFormEnviarParaNutricao', url: 'modules/prm/diretive/views/acoesEmMassa/forms/enviarParaNutricao.html', status:1, grupo: 'prm' },
                { name: 'acaoEmMassaFormRemoverOportunidade', url: 'modules/prm/diretive/views/acoesEmMassa/forms/removerOportunidade.html', status:1, grupo: 'prm' },
                { name: 'acaoEmMassaFormEnviarEmail', url: 'modules/prm/diretive/views/acoesEmMassa/forms/enviarEmail.html', status:1, grupo: 'prm' },
                { name: 'acaoEmMassaAtribuirMetaDados', url: 'modules/prm/diretive/views/acoesEmMassa/forms/atribuirMetaDados.html', status:1, grupo: 'prm' },
                { name: 'acaoEmMassaFormultiOperacoes', url: 'modules/prm/diretive/views/acoesEmMassa/forms/atribuirMultiOperacoes.html', status:1, grupo: 'prm' },
                { name: 'alterarStatus', url: 'modules/prm/diretive/views/acoesEmMassa/forms/alterarStatus.html', status:1, grupo: 'prm' },
                { name: 'alterarFonte', url: 'modules/prm/diretive/views/acoesEmMassa/forms/alterarFonte.html', status:1, grupo: 'prm' },
                { name: 'atribuirTags', url: 'modules/prm/diretive/views/acoesEmMassa/forms/atribuirTags.html', status:1, grupo: 'prm' },
                { name: 'removerTags', url: 'modules/prm/diretive/views/acoesEmMassa/forms/removerTags.html', status:1, grupo: 'prm' },



                // ----------- GESTÃO DE OPORTUNIDADE INDIVIDUALMENTE ------

                { name: 'novaOportunidadeFormCadastro', url: 'modules/prm/views/oportunidade/criar/formCadastro.html', status:1, grupo: 'prm' },
                { name: 'novaOportunidade', url: 'modules/prm/views/oportunidade/criar/novaOportunidade.html', status:1, grupo: 'prm' },
                { name: 'importarOportunidades', url: 'modules/prm/views/oportunidade/criar/importarOportunidades.html', status:1, grupo: 'prm' },
                { name: 'oportunidadeEmpresaInfosBasicas', url: 'modules/prm/views/oportunidadeGerenciar/empresa/infosBasicas.html', status:1, grupo: 'prm' },
                { name: 'oportunidadeClassificacao', url: 'modules/prm/diretive/rating/view/lista.html', status:1, grupo: 'prm' },
                { name: 'oportunidadeEmpresaEdit', url: 'modules/prm/views/oportunidadeGerenciar/empresa/edit.html', status:1, grupo: 'prm' },
                { name: 'oportunidadeContatos', url: 'modules/prm/views/oportunidadeGerenciar/contatos/index.html', status:1, grupo: 'prm' },
                { name: 'oportunidadeContatosGerenciar', url: 'modules/prm/diretive/oportunidadeContatos/view/contatosGerenciar.html', status:1, grupo: 'prm' },
                { name: 'oportunidadeContatosLista', url: 'modules/prm/diretive/oportunidadeContatos/view/listar.html', status:1, grupo: 'prm' },
                { name: 'oportunidadeCriarNovoContato', url: 'modules/prm/diretive/oportunidadeContatos/view/criarNovo.html', status:1, grupo: 'prm' },
                { name: 'oportunidadeEditarContato', url: 'modules/prm/diretive/oportunidadeContatos/view/editar.html', status:1, grupo: 'prm' },
                { name: 'oportunidadeDemaisContatosLista', url: 'modules/prm/diretive/oportunidadeContatos/view/demaisContatos.html', status:1, grupo: 'prm' },
                { name: 'oportunidadeContatoEditarForm', url: 'modules/prm/diretive/oportunidadeContatos/view/contatoEditar.html', status:1, grupo: 'prm' },
                { name: 'oportunidadeEmpresaRamosAtividade', url: 'modules/prm/views/oportunidadeGerenciar/ramosAtividade/lista.html', status:1, grupo: 'prm' },
                { name: 'oportunidadeProdutosInteresse', url: 'modules/prm/views/oportunidadeGerenciar/produtosInteresse/lista.html', status:1, grupo: 'prm' },
                { name: 'oportunidadeConteudoPrincipal', url: 'modules/prm/views/oportunidadeGerenciar/conteudoPrincipal.html', status:1, grupo: 'prm' },
                { name: 'oportunidadeEsforcosComerciais', url: 'modules/prm/views/oportunidadeGerenciar/esforcosComerciais/index.html', status:1, grupo: 'prm' },
                { name: 'oportunidadeEsforcosComerciaisAcoesMenu', url: 'modules/prm/views/oportunidadeGerenciar/acoesMenu.html', status:1, grupo: 'prm' },
                { name: 'oportunidadeFunilEvolucao', url: 'modules/prm/views/oportunidadeGerenciar/funilEvolucao.html', status:1, grupo: 'prm' },
                { name: 'oportunidadeEtiquetas', url: 'modules/prm/views/oportunidadeGerenciar/etiquetas/lista.html', status:1, grupo: 'prm' },
                { name: 'oportunidadeMetaDados', url: 'modules/prm/views/oportunidadeGerenciar/metaDados/lista.html', status:1, grupo: 'prm' },
                { name: 'oportunidadeCamposCustom', url: 'modules/prm/views/oportunidadeGerenciar/camposCustomizaveis/lista.html', status:1, grupo: 'prm' },
                { name: 'oportunidadeVendedores', url: 'modules/prm/views/oportunidadeGerenciar/vendedores/lista.html', status:1, grupo: 'prm' },
                { name: 'oportunidadeInfoGeral', url: 'modules/prm/views/oportunidadeGerenciar/infoGeral.html', status:1, grupo: 'prm' },
                { name: 'oportunidadeEventosLista', url: 'modules/prm/diretive/oportunidadeEventos/view/lista.html', status:1, grupo: 'prm' },
                { name: 'oportunidadePropostaBase', url: 'modules/prm/diretive/oportunidadeProposta/view/oportunidadePropostaBase.html', status:1, grupo: 'prm' },

                { name: 'oportunidadeSituacaoMudarSeletor', url: 'modules/prm/diretive/oportunidadeSituacao/view/seletor.html', status:1, grupo: 'prm' },

                { name: 'oportunidadeGerenciarEmail', url: 'modules/prm/diretive/oportunidadeEmail/view/index.html', status:1, grupo: 'prm' },
                { name: 'oportunidadeGerenciarProposta', url: 'modules/prm/diretive/oportunidadeProposta/view/index.html', status:1, grupo: 'prm' },
                { name: 'oportunidadeGerenciarProdutosBase', url: 'modules/prm/diretive/oportunidadeGerenciarProdutosBase/view/index.html', status:1, grupo: 'prm' },
                { name: 'oportunidadeGerenciarContrato', url: 'modules/prm/diretive/oportunidadeContrato/view/index.html', status:1, grupo: 'prm' },
                { name: 'oportunidadeGerenciarVenda', url: 'modules/prm/diretive/oportunidadeVenda/view/index.html', status:1, grupo: 'prm' },
                { name: 'oportunidadeGerenciarMesclar', url: 'modules/prm/diretive/oportunidadeMesclar/view/index.html', status:1, grupo: 'prm' },
                { name: 'oportunidadeGerenciarArquivar', url: 'modules/prm/diretive/oportunidadeArquivar/view/index.html', status:1, grupo: 'prm' },
                { name: 'oportunidadeGerenciarDesarquivar', url: 'modules/prm/diretive/oportunidadeDesarquivar/view/index.html', status:1, grupo: 'prm' },
                { name: 'oportunidadeCamposCustomizaveis', url: 'modules/prm/diretive/oportunidadeCamposCustomizaveis/view/lista.html', status:1, grupo: 'prm' },

                // ----------- CONFIGURRAÇÕES DO PRM ------

                { name: 'organizacao', url: 'modules/prm/configApp/directives/organizacao/views/index.html', status:1, grupo: 'prm' },
                { name: 'unidadesNegocio', url: 'modules/prm/configApp/directives/unidadesNegocio/views/index.html', status:1, grupo: 'prm' },
                { name: 'produtos', url: 'modules/prm/configApp/directives/produtos/views/index.html', status:1, grupo: 'prm' },
                { name: 'funilVendas', url: 'modules/prm/configApp/directives/funilVendas/views/index.html', status:1, grupo: 'prm' },
                { name: 'fontes', url: 'modules/prm/configApp/directives/fontes/views/index.html', status:1, grupo: 'prm' },
                { name: 'motivosArquivamento', url: 'modules/prm/configApp/directives/motivosArquivamento/views/index.html', status:1, grupo: 'prm' },
                { name: 'tiposEvento', url: 'modules/prm/configApp/directives/tiposEvento/views/index.html', status:1, grupo: 'prm' },
                { name: 'ramos', url: 'modules/prm/configApp/directives/ramos/views/index.html', status:1, grupo: 'prm' },
                { name: 'usuarios', url: 'modules/prm/configApp/directives/usuarios/views/index.html', status:1, grupo: 'prm' },
                { name: 'camposCustomizaveis', url: 'modules/prm/configApp/camposCustomizaveis/organizacao/views/index.html', status:1, grupo: 'prm' },
                { name: 'integracaoAPI', url: 'modules/prm/configApp/directives/integracaoDominio/views/index.html', status:1, grupo: 'prm' }

];


/**
 * @ngdoc method
 * @name setTemplates
 * @methodOf templates
 * @description Seta os o template que irá para cache
 * @param {$templateCache} $templateCache Template
 */
templates.setTemplates = function($templateCache) {

    templates.forEach(function(template) {
        // debugger; // Debugar no angular
        if (template.hasOwnProperty('status') && template.status == 1 )
             $templateCache.put(template.name,template.url);

    })
};

/**
 * @ngdoc method
 * @name getTemplates
 * @methodOf templates
 * @description Obtem o template compilado e no cache
 * @param  {$rootScope} $rootScope Escopo {$templateCache} $templateCache Template
 */
templates.getTemplates = function($rootScope, $templateCache) {
    templates.forEach(function(template) {
        // debugger; // Debugar no angular
        if (template.hasOwnProperty('status') && template.status == 1 )
             $rootScope[template.name] =  $templateCache.get(template.name);

    })
};