
app.service('RESOURCES', function(ENV) {

    var resource = ENV.resource || 'http://templum.dev/app_vagrant.php/api/prm/v1';
    var resource_api_publica = ENV.resource_api_publica|| 'http://templum.dev/app_vagrant.php';

    return {

        PRM:'http://prm.prm.net.br',
        DOMAIN: resource,
        PLATAFORMA: "http://templum.dev/app_vagrant.php",
        URL_GET_PERFIL: resource + '/usuarios/perfil?incluir=avatar,unidades,assinaturaEmail',
        URL_ALTERAR_SENHA: resource + '/usuarios/perfil/altera-senha',
        URL_LOGIN: resource + '/login',
        URL_GET_OPORTUNIDADES: resource + '/oportunidades',
        URL_GET_OPORTUNIDADES_FILTROS_SELECT_SIMPLES: resource + '/oportunidades/filtro',
        URL_GET_OPORTUNIDADES_FILTROS_TAGS_ASYNC: resource + '/oportunidades/tags?select=1&perPage=10',
        URL_GET_OPORTUNIDADES_TAGS_MAIS_USADAS: resource + '/oportunidades/tags?select=1&perPage=10',
        URL_GET_OPORTUNIDADES_FILTROS_CIDADES_ASYNC: resource + '/locais/cidades?select=1',
        URL_GET_OPORTUNIDADES_FILTROS_CLIENTES_ASYNC: resource + '/clientes?select=1',
        URL_GET_OPORTUNIDADES_FILTROS_VENDEDORES_ASYNC: resource + '/usuarios/vendedores?select=1&perPage=10',
        URL_GET_INDICADORES_RESUMO: resource + '/indicadores/resumo',
        URL_GET_EVENTOS: resource + '/eventos',
        URL_GET_EVENTOS_PROIXMOS: resource + '/eventos/proximos',
        URL_GET_EVENTOS_TIPOS: resource + '/eventos/tipos?sort=+titulo',
        URL_GET_EVENTOS_PARTICIPANTES: resource + '/eventos/participantes/candidatos?&page=1',
        URL_GET_EVENTOS_ACAO: resource + '/eventos',
        URL_GET_EVENTOS_ACAO_DELETA_ANEXO: resource + '/eventos/anexo/apagar',
        URL_GET_EVENTOS_ACAO_ADIAR: resource + '/eventos/%d/adia-notificacoes',

        URL_API_PUBLICA_CIDADES_OPERACOES: resource_api_publica + '/cliente/api/cidade/autocomplete',

        //
        //  ---> Oportunidade, gestão de contatos
        //
        URL_OPORTUNIDADE_OPERACOES: resource + '/oportunidades',
        URL_OPORTUNIDADE_ADICIONAR_CONTATO_EXISTENTE: resource + '/oportunidades',
        URL_OPORTUNIDADE_ADICIONAR_CONTATO_NOVO: resource + '/oportunidades',
        URL_OPORTUNIDADE_ADICIONAR_CONTATO_EDITAR: resource + '/oportunidades',
        URL_OPORTUNIDADE_REMOVER_CONTATO: resource + '/oportunidades',
        URL_OPORTUNIDADE_MARCAR_CONTATO_PRINCIPAL: resource + '/oportunidades',


        URL_GET_RAMO_ATIVIDADE_ASYNC: resource + '/ramos-atividade',

        URL_EMPRESA_OPERACOES: resource + '/clientes',

        URL_POST_EMPRESA_SALVAR_RAMO_ATIVIDADE: resource + '/clientes',
        URL_EMPRESA_EXCLUIR_RAMO_ATIVIDADE: resource + '/clientes',

        URL_POST_OPORTUNIDADE_SALVAR_PRODUTO_INTERESSE: resource + '/oportunidades',
        URL_POST_OPORTUNIDADE_EXCLUIR_PRODUTO_INTERESSE: resource + '/oportunidades',

        URL_POST_OPORTUNIDADE_SALVAR_TAG: resource + '/oportunidades',
        URL_DELETE_OPORTUNIDADE_EXCLUIR_TAG: resource + '/oportunidades',


        URL_GET_PRODUTOS_ASYNC: resource + '/produtos/comercial',

        URL_OPORTUNIDADE_ADICIONAR_VENDEDORES: resource + '/oportunidades/atribuicoes',
        URL_OPORTUNIDADE_ADICIONAR_VENDEDORES_NA_OPORTUNIDADE: resource + '%d/atribuicoes',
        URL_OPORTUNIDADE_BUSCAR_VENDEDORES_DE_OPORTUNIDADES: resource + '/usuarios/vendedores?select=1&perPage=1000',
        URL_OPORTUNIDADE_BUSCAR_REGRAS_DE_COMISSOES: resource + '/regras-comissao',
        URL_OPORTUNIDADE_REMOVER_VENDEDORES: resource + '/oportunidades/atribuicoes?_method=delete',
        URL_OPORTUNIDADE_ATRIBUIR_UNIDADE_NEGOCIOS: resource + '/oportunidades/unidades/define',
        URL_OPORTUNIDADE_ALTERAR_STATUS_EM_MASSA: resource + '/oportunidades/status/define',
        URL_OPORTUNIDADE_ALTERAR_FONTES_EM_MASSA: resource + '/oportunidades/fontes/define',
        URL_OPORTUNIDADE_ADICIONAR_TAGS_EM_MASSA: resource + '/oportunidades/tags',
        URL_OPORTUNIDADE_REMOVE_TAGS_EM_MASSA: resource + '/oportunidades/tags?_method=delete',
        URL_OPORTUNIDADE_ENVIAR_PARA_NUTRICAO: resource + '/oportunidades/',
        URL_OPORTUNIDADE_ENVIAR_ENVIAR_EMAIL_EM_MASSA: resource + '/oportunidades/emails/enviar-em-massa',
        URL_OPORTUNIDADE_ARQUIVAR_OPORTUNIDADES_EM_MASSA: resource + '/oportunidades/arquivar',
        URL_OPORTUNIDADE_DESARQUIVAR_OPORTUNIDADES_EM_MASSA: resource + '/oportunidades/desarquivar',
        URL_OPORTUNIDADE_ENVIAR_ARQUIVO_IMPORTAR: resource + '/oportunidades/importar/enviar',
        URL_OPORTUNIDADE_ENVIAR_ARQUIVO_FILA: resource + '/oportunidades/importar/fila',

        URL_OPORTUNIDADE_BUSCAR_MOTIVOS_ARQUIVAMENTO: resource + '/oportunidades/arquivamentos/motivos?select=1',
        URL_OPORTUNIDADE_MOTIVOS_ARQUIVAMENTO: resource + '/oportunidades/arquivamentos/motivos',

        URL_OPORTUNIDADE_REMOVER_OPORTUNIDADES: resource + '/oportunidades?_method=delete',
        URL_OPORTUNIDADE_SALVAR_MULTI_ACOES: resource + '/oportunidades/',

        URL_LISTA_UNIDADES_ORGANIZACAO: resource + '/unidades?select=1',
        URL_LISTA_EMAIL_DE_CONTATO_DE_OPORTUNIDADES: resource + '/oportunidades/%s/contatos/emails',
        URL_LISTA_VENDEDORES_DE_OPORTUNIDADES: resource + '/oportunidades/vendedores?%s',
        URL_LISTA_METADADOS_DE_UMA_OPORTUNIDADE: resource + '/oportunidades/%s/metadados',
        URL_LISTA_METADADOS_VALORES_DE_OPORTUNIDADES: resource + '/oportunidades/filtros/metainfo/%s',
        URL_REMOVE_METADADOS_DE_UMA_OPORTUNIDADE: resource + '/oportunidades/%s/metadados',
        URL_OPORTUNIDADE_SALVAR_METADADOS: resource + '/oportunidades/metadados',
        URL_OPORTUNIDADE_BUSCA_STATUS_POSSIVEIS: resource + '/oportunidades/status?select=1',
        URL_OPORTUNIDADE_BUSCA_FONTE_POSSIVEIS: resource + '/oportunidades/fontes?select=1',
        URL_OPORTUNIDADE_CRIAR: resource + '/oportunidades',

        URL_USUARIO_SESSAO_OPERACAO: resource + '/usuarios/perfil',
        URL_UNIDADE_NEGOCIO_OPERACAO: resource + '/unidades',
        URL_UNIDADE_ORGANIZACAO_OPERACAO: resource + '/organizacoes',
        URL_ORGANIZAO_OPERACAO: resource + '/organizacoes',
        URL_OPORTUNIDADE_STATUS_OPERACAO: resource + '/oportunidades/status',
        URL_EVENTO_TIPO_OPERACAO: resource + '/eventos/tipos',
        URL_PRODUTO_OPERACAO: resource + '/produtos',
        URL_USUARIO_VENDEDOR_OPERACAO: resource + '/usuarios/vendedores',
        URL_USUARIO_OPERACAO: resource + '/usuarios',
        URL_USUARIO_LISTA_ORGANIZACOES: resource + '/usuarios/listar_organizacoes',
        URL_USUARIO_TROCA_ORGANIZACAO: resource + '/usuarios/troca_organizacao/',
        URL_USUARIO_OPERACAO_PERFIL: resource + '/usuarios/perfil',
        URL_OPORTUNIDADES_FONTES: resource + '/oportunidades/fontes',
        URL_ORGANIZACAO_RAMO_GRANDE_AREA: resource + '/ramos-atividade',
        URL_ORGANIZACAO_MAILCHIMP: resource + '/mailchimp',
        URL_ADMIN_CONFIGURACAO_PRESET: resource + '/admin/preset',
        URL_PLB: 'http://plb.dev/index.php/',


        URL_CRIA_PROPOSTA: resource + '/oportunidades/%d/propostas',
        URL_ATUALIZA_PROPOSTA: resource + '/oportunidades/propostas/%d',
        URL_OBTEM_PROPOSTA: resource + '/oportunidades/propostas/%d',
        URL_PROPOSTA_REMOVE_ANEXO: resource + '/oportunidades/propostas/%d/anexos?_method=delete',
        URL_PROPOSTA_ADD_ANEXO: resource + '/oportunidades/propostas/%d/anexos',
        URL_PROPOSTA_ENVIAR: resource + '/oportunidades/propostas/%d/enviar',
        URL_PROPOSTA_PREVIEW: resource + '/oportunidades/propostas/%d/preview',
        URL_PROPOSTA_REMOVE_PRODUTO: resource + '/oportunidades/propostas/%d/itens/%d',
        URL_PROPOSTA_ADD_PRODUTO: resource + '/oportunidades/propostas/%d/itens',
        URL_TEMPLATES_PROPOSTA: resource + '/config/propostas',
        URL_PROPOSTA_MODOS_PAGAMENTO: resource + '/config/modos-pagamento',

        URL_CRIA_CONTRATO: resource + '/oportunidades/%d/contratos',
        URL_ATUALIZA_CONTRATO: resource + '/oportunidades/contratos/%d',
        URL_OBTEM_CONTRATO: resource + '/oportunidades/contratos/%d',
        URL_CONTRATO_ENVIAR: resource + '/oportunidades/contratos/%d/enviar',
        URL_CONTRATO_PREVIEW: resource + '/oportunidades/contratos/%d/preview',
        URL_CONTRATO_REMOVE_PRODUTO: resource + '/oportunidades/contratos/%d/itens/%d',
        URL_CONTRATO_ADD_PRODUTO: resource + '/oportunidades/contratos/%d/itens',

        URL_CRIA_PEDIDO: resource + '/oportunidades/%d/pedidos',
        URL_ATUALIZA_PEDIDO: resource + '/oportunidades/pedidos/%d',
        URL_OBTEM_PEDIDO: resource + '/oportunidades/pedidos/%d',
        URL_PEDIDO_REMOVE_VENDEDOR: resource + '/oportunidades/pedidos/%d/anexos?_method=delete',
        URL_PEDIDO_ADD_VENDEDOR: resource + '/oportunidades/pedidos/%d/anexos',
        URL_PEDIDO_ENVIAR: resource + '/oportunidades/pedidos/%d/enviar',
        URL_PEDIDO_ENVIAR_FORMULARIO: resource + '/oportunidades/pedidos/%d/enviar',
        URL_PEDIDO_PREVIEW: resource + '/oportunidades/pedidos/%d/preview',

        URL_PEDIDO_REMOVE_PRODUTO: resource + '/oportunidades/pedidos/%d/itens/%d',
        URL_PEDIDO_ADD_PRODUTO: resource + '/oportunidades/pedidos/%d/itens',

        URL_CAMPOS_CUSTOMIZAVEIS: resource + '/campos-customizaveis',
        URL_CAMPOS_CUSTOMIZAVEIS_DA_OPORTUNIDADE: resource + '/campos-customizaveis/oportunidade/',
        URL_CAMPOS_CUSTOMIZAVEIS_DA_EMPRESA: resource + '/campos-customizaveis/empresa/',
        URL_CAMPOS_CUSTOMIZAVEIS_DO_CONTATO: resource + '/campos-customizaveis/contato/',
        URL_CAMPOS_CUSTOMIZAVEIS_DA_UNIDADE_DE_NEGOCIO: resource + '/campos-customizaveis/unidadeNegocio/',

        URL_INTEGRACAO_DOMINIO: resource + '/integracao-dominio',
        URL_GET_OPORTUNIDADES_CLASSIFICACAO: resource + '/oportunidades/rating',
        URL_RELATORIOS_ESFORCOS_COUNT: resource + '/relatorios/%d',
        URL_RELATORIOS_CONTATOS: resource + '/relatorios/contatos/%d',
        URL_RELATORIOS_ESFORCOS_HISTORICO: resource + '/relatorios/esforcos/%d'

    }

});


app.constant('EVENTOS', {
    GET_NOTIFICATION_ERROR: 'event:getNotificacaoError',
    GET_NOTIFICATION_REQUISICAO_ERROR: 'event:eventoErroNaRequisicaoHttp',
    GET_NOTIFICATION_REQUISICAO_400: 'event:eventoErroNaRequisicaoHttp400',
    GET_NOTIFICATION_REQUISICAO_OK: 'event:eventoSuccessNaRequisicaoHttp',
    NOTIFICACAO_LOGIN: 'event:getTelaDeLogin'
});

app.constant('PRM_EVENTOS', {
    NOTIFICACAO_EVENTO_GESTAO: 'event:eventoGestao',
    NOTIFICACAO_MODAL_FECHAR: 'event:modalFechar',
    NOTIFICACAO_CARREGAR_INTERIO_LAYOUT: 'event:carregarNovoInteriorNoLayout',
    NOTIFICACAO_RECARREGAR_VIEW_EM_CACHE: 'event:recarregaViewNoQueEstaNoCache',
    NOTIFICACAO_OPORTUNIDADE_FILTRO_AVANCADO: 'event:oportunidadeFiltroAvancado',

    OPORTUNIDADE_DADOS_GERAIS_EDIT_ENTRAR: 'event:oportunidadeDadosGeraisEditEntar',

    OPORTUNIDADE_CONTATO_ADICIONAR: 'event:oportunidadeContatoAdicionar',
    OPORTUNIDADE_FILTRO_EXTERNO: 'event:oportunidadeFiltrarComFiltroExterno',
    EVENTOS_FILTRO_EXTERNO: 'event:eventoFiltrarComFiltroExterno',
    OPORTUNIDADE_CONTATO_ADICIONAR_EXISTENTE: 'event:oportunidadeContatoAdicionarExistente',
    OPORTUNIDADE_CONTATO_ADICIONAR_NOVO: 'event:oportunidadeContatoAdicionarNovo',
    OPORTUNIDADE_CONTATO_EDITAR: 'event:oportunidadeContatoEditar',
    OPORTUNIDADE_CONTATO_LISTAGEM: 'event:oportunidadeContatoAdicionarListagem',
    OPORTUNIDADE_GERENCIAR_MUDAR_CONTEUDO_PRINCIPAL: 'event:oportunidadeConteudoPrincipalModoMudar',

    OPORTUNIDADE_GERENCIAR_CARREGAMENTO_CONCLUIDO: 'event:oportunidadeGerenciarCarregamentoConcluido',
    OPORTUNIDADE_GERENCIAR_ACAO_EVENTOS: 'event:oportunidadeGerenciarEventosConcluido',

    // --- disparar quando houver uma modificação nos conjunto de contatos de uma oportunidade
    OPORTUNIDADE_CONTATOS_MODIFICADOS: 'event:oportunidadeContatosModificados',

    // ---> ramos de atividade
    OPORTUNIDADE_RAMO_ATIVIDADE_ADICIONAR_CLICADO: 'event:oportunidadeRamoAtividadeAdicionarAbrir',
    OPORTUNIDADE_RAMO_ATIVIDADE_EDITAR_CANCELADO: 'event:oportunidadeRamoAtividadeEditarCancelado',
    OPORTUNIDADE_EMPRESA_EDITAR_CANCELADO: 'event:oportunidadeEmpresaEditarCancelado',

    // ---> oportunidade/produtos de interesse
    'OPORTUNIDADE_PRODUTO_INTERESSE_ADICIONAR_CLICADO': 'event:oportunidadeProdutoInteresseAdicionarClicado',
    'OPORTUNIDADE_PRODUTO_INTERESSE_EDITAR_CANCELADO': 'event:oportunidadeProdutoInteresseEditarCancelado',
    'OPORTUNIDADE_PRODUTO_INTERESSE_SALVAR_CONCLUIDO': 'event:oportunidadeProdutoInteresseSalvarConcluido',
    'OPORTUNIDADE_PRODUTO_INTERESSE_EXCLUIR_CONCLUIDO': 'event:oportunidadeProdutoInteresseExcluirConcluido',

    // ---> oportunidade/vendedores
    'OPORTUNIDADE_VENDEDOR_ADICIONAR_CLICADO': 'event:oportunidadeVendedorAdicionarClicado',
    'OPORTUNIDADE_VENDEDOR_EDITAR_CANCELADO': 'event:oportunidadeVendedorEditarCancelado',
    'OPORTUNIDADE_VENDEDOR_SALVAR_CONCLUIDO': 'event:oportunidadeVendedorSalvarConcluido',
    'OPORTUNIDADE_VENDEDOR_EXCLUIR_CONCLUIDO': 'event:oportunidadeVendedorExcluirConcluido',

    'OPORTUNIDADE_ETIQUETA_SALVAR_CONCLUIDO': 'event:oportunidadeEtiquetaSalvarConcluido',
    'OPORTUNIDADE_ETIQUETA_EXCLUIR_CONCLUIDO': 'event:oportunidadeEtiquetaExcluirConcluido',
    'OPORTUNIDADE_NOVO': 'event:novaOportunidade',

    OPORTUNIDADE_GERENCIAR_CONTEUDO_PRINCIPAL_ENTROU_MODO: 'event:oportunidadeGerenciarConteudoPrincipalEntrouModo',

    ACAO_EVENTO_GESTAO_CANCELAR: 'event:eventoCancelar',
    ACAO_EVENTO_GESTAO_REALIZAR: 'event:eventoRealizar',
    ACAO_EVENTO_GESTAO_NOVO: 'event:eventoNovo',
    ACAO_EVENTO_GESTAO_ADIAR: 'event:eventoAdiar',
    ACAO_EVENTO_GESTAO_ATUALIZAR_GRID: 'event:atualizarGridEvento',
    ACAO_EVENTO_GESTAO_ATUALIZAR_DASHBOARD: 'event:atualizarBoardEvento',
    ACAO_OPORTUNIDADE_ACAO_EM_MASSA_PROCESSADA: 'event:acaoEmMassaOportunidadeProcessada',
    ACAO_EM_MASSA_GESTAO_ABRIR: 'event:abrirGestorDeAcoesEmMassa',
    ACAO_GESTAO_EVENTO_MODIFICADO: 'event:gestaoEventoModificado',
    ACAO_GESTAO_EVENTO_FECHAR_MODAL: 'event:gestaoEventoFecharModal',


    // ---> relacionados a eventos que fazem parte de uma atividade
    OPORTUNIDADE_EVENTO_SALVAR_INICIOU: 'event:oportunidadeEventoSalvarIniciou',
    OPORTUNIDADE_EVENTO_SALVAR_SUCESSO: 'event:oportunidadeEventoSalvarSucesso',
    OPORTUNIDADE_EVENTO_SALVAR_ERRO: 'event:oportunidadeEventoSalvarErro',
    OPORTUNIDADE_EVENTO_EDITAR_CANCELADO: 'event:oportunidadeEventoEditarCancelado',

    OPORTUNIDADE_PROPOSTA_UPDATE: 'event:oportunidadeEventoPropostaUpdate',
    OPORTUNIDADE_PRELOAD: 'event:oportunidadeEventoPreload'
});

app.constant('CACHE_KEYS', {
    TOKEN: '_token',
    USUARIO_CONTA: 'user',
    JWT: 'templum_jwt',
    SESSION_ID: 'PHPSESSID',
    DASHBOARD_TAB_CACHE: '_tabCache',
    OPORTUNIDADES_MOTIVO_ARQUIVAMENTO: '_motivoArquivamento',
    OPORTUNIDADES_FONTES: '_fontesPossiveis',
    OPORTUNIDADES_STATUS: '_statusPossiveis',
    DASHBOARD_OPORTUNIDADE_FILTRO: '_oportunidadeFiltro',
    DASHBOARD_OPORTUNIDADE_FUNIL_SELECIONADO: '_funilSelecionado',
    DASHBOARD_OPORTUNIDADE_FUNIL_SITUACAO: '_funilSelecionadoSituacao',
    DASHBOARD_RESUMO: '_dashboard-resumo',
    DASHBOARD_EVENTOS: '_dashboard-eventos',
    OPORTUNIDADES_FILTROS_SELECT_SIMPLES: '_filtros_select_simples',
    EVENTOS_FILTROS_PARA_O_MODAL: '_filtros_tipos_eventos',
    MENU_LEFT: '_menuLeft',
    MENU_SELECIONADO: '_menuSelecionado',
    ORGANIZACAO_NICK: 'organizacao_nick',
    ORGANIZACAO_RAZAO: 'organizacao_razao',
    ORGANIZACAO_ID: 'organizacao_id'


});

app.constant('USER_ROLES', {

    'ROLE_CONTRATO-VER': 'contratoVer',
    'ROLE_VENDAS-ACESSO': 'vendasAcesso',
    'ROLE_VENDAS-GESTOR_COMERCIAL': 'gestorComercial',
    'ROLE_ADMIN-ORGANIZACAO_VER_TODAS': 'admin'

});