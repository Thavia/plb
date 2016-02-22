var items = [
    {
        "titulo": "Oportunidades" ,
        "apelido": "oportunidade",
        "breadCumb": "Oportunidades",
        "icone": "fa fa-briefcase",
        "class": null,
        "link": null,
        "template": 'dashboardOportunidades',
        "roles": [],
        "subItems": [],
        ordem: 1,
        active: false
    },
    //{
    //    "titulo": "Dashboard G" ,
    //    "apelido": "dashboard-gestor",
    //    "breadCumb": "Dashboard Gestor",
    //    "icone": "fa fa-fw fa-tachometer",
    //    "class": null,
    //    "link": null,
    //    "template": 'dashboardGeral',
    //    "roles": [],
    //    "subItems": [],
    //    ordem: 1,
    //    active: false
    //},
    //{
    //    "titulo": "Oportunidades" ,
    //    //"tituloAdicional": "<a class=\"btn btn-default btn\" href=\"#\" ng-click=\"oportunidade.novaOportunidade()\"><i class=\"fa fa-plus\"></i> nova</a>",
    //    "apelido": "oportunidades",
    //    "breadCumb": "Gestão Oportunidades",
    //    "icone": "fa fa-briefcase",
    //    "class": null,
    //    "link": null,
    //    "template": "dashboardOportunidades",
    //    "roles": [],
    //    "subItems": [],
    //    ordem: 1,
    //    active: false
    //},
    {
        "titulo": "Nova oportunidade" ,
        //"tituloAdicional": "<a class=\"btn btn-default btn\" href=\"#\" ng-click=\"oportunidade.novaOportunidade()\"><i class=\"fa fa-plus\"></i> nova</a>",
        "apelido": "novaOportunidade",
        "breadCumb": "Nova oportunidade",
        "icone": "fa fa-plus",
        "class": null,
        "link": null,
        "template": "novaOportunidade",
        "roles": [],
        "subItems": [],
        ordem: 3,
        active: false
    },
    {
        "titulo": "Importar oportunidades" ,
        "apelido": "importarOportunidades",
        "breadCumb": "Importar oportunidades",
        "icone": "fa fa-cloud-upload",
        "class": null,
        "link": null,
        "template": "importarOportunidades",
        "roles": [],
        "subItems": [],
        ordem: 4,
        active: false
    },
    {
        "titulo": "Esforços Agendados" ,
        "apelido": "eventos",
        "breadCumb": "Esforços Agendados",
        "icone": "icon-calendar",
        "class": null,
        "link": null,
        "template": "dashboardEventos",
        "roles": [],
        "subItems": [],
        ordem: 5,
        active: false
    }



    //{
    //    "titulo": "Configurações do Sistema" ,
    //    "apelido": "configuracoes",
    //    "breadCumb": "Configurações",
    //    "icone": "fa fa-cog",
    //    "class": "dropdown-toggle",
    //    "link": null,
    //    "template": null,
    //    "path": '/config',
    //    "roles": ["ROLE_VENDAS-GESTOR_COMERCIAL"],
    //    "subItems": [
    //        {
    //            "titulo": "Organização" ,
    //            "apelido": "organizacao",
    //            "breadCumb": "Organização",
    //            "icone": "fa fa-building-o",
    //            "class": null,
    //            "link": null,
    //            "template": "organizacao",
    //            "roles": ["ROLE_VENDAS-GESTOR_COMERCIAL"],
    //            "subItems": [],
    //            ordem: 1,
    //            active: false
    //        },
    //
    //        {
    //            "titulo": "Unidade de Negócio" ,
    //            "apelido": "unidadesNegocio",
    //            "breadCumb": "Unidade de Negócio",
    //            "icone": "fa fa-sitemap",
    //            "class": null,
    //            "link": null,
    //            "template": "unidadesNegocio",
    //            "roles": ["ROLE_VENDAS-GESTOR_COMERCIAL"],
    //            "subItems": [],
    //            ordem: 2,
    //            active: false
    //        },
    //
    //        {
    //            "titulo": "Produtos" ,
    //            "apelido": "produtos",
    //            "breadCumb": "Produtos",
    //            "icone": "fa fa-shopping-cart",
    //            "class": null,
    //            "link": null,
    //            "template": "produtos",
    //            "roles": ["ROLE_VENDAS-GESTOR_COMERCIAL"],
    //            "subItems": [],
    //            ordem: 3,
    //            active: false
    //        },
    //        {
    //            "titulo": "Funil" ,
    //            "apelido": "funilVendas",
    //            "breadCumb": "Funil de Vendas",
    //            "icone": "fa fa-filter",
    //            "class": null,
    //            "link": null,
    //            "template": "funilVendas",
    //            "roles": ["ROLE_VENDAS-GESTOR_COMERCIAL"],
    //            "subItems": [],
    //            ordem: 4,
    //            active: false
    //        },
    //
    //        {
    //            "titulo": "Fontes" ,
    //            "apelido": "fontes",
    //            "breadCumb": "Fontes",
    //            "icone": "fa fa-bullhorn",
    //            "class": null,
    //            "link": null,
    //            "template": "fontes",
    //            "roles": ["ROLE_VENDAS-GESTOR_COMERCIAL"],
    //            "subItems": [],
    //            ordem: 5,
    //            active: false
    //        },
    //
    //        {
    //            "titulo": "Tipos de Evento" ,
    //            "apelido": "tiposEvento",
    //            "breadCumb": "Tipos de Evento",
    //            "icone": "fa fa-calendar",
    //            "class": null,
    //            "link": null,
    //            "template": "tiposEvento",
    //            "roles": ["ROLE_VENDAS-GESTOR_COMERCIAL"],
    //            "subItems": [],
    //            ordem: 6,
    //            active: false
    //        },
    //
    //        {
    //            "titulo": "Ramos de atividade" ,
    //            "apelido": "ramos",
    //            "breadCumb": "Ramos de atividade",
    //            "icone": "fa fa-briefcase",
    //            "class": null,
    //            "link": null,
    //            "template": "ramos",
    //            "roles": ["ROLE_VENDAS-GESTOR_COMERCIAL"],
    //            "subItems": [],
    //            ordem: 7,
    //            active: false
    //        },
    //
    //        {
    //            "titulo": "Usuários" ,
    //            "apelido": "usuarios",
    //            "breadCumb": "Usuários",
    //            "icone": "fa fa-users",
    //            "class": null,
    //            "link": null,
    //            "template": "usuarios",
    //            "roles": ["ROLE_VENDAS-GESTOR_COMERCIAL"],
    //            "subItems": [],
    //            ordem: 8,
    //            active: false
    //        },
    //        {
    //            "titulo": "Campos Customizáveis" ,
    //            "apelido": "camposCustomizaveis",
    //            "breadCumb": "Campos Customizáveis",
    //            "icone": "fa fa-toggle-off",
    //            "class": null,
    //            "link": null,
    //            "template": "camposCustomizaveis",
    //            "roles": ["ROLE_VENDAS-GESTOR_COMERCIAL"],
    //            "subItems": [],
    //            ordem: 9,
    //            active: false
    //        }
    //        ,{
    //            "titulo": "Integração API" ,
    //            "apelido": "integracaoAPI",
    //            "breadCumb": "Integração API",
    //            "icone": "fa fa-code",
    //            "class": null,
    //            "link": null,
    //            "template": "integracaoAPI",
    //            "roles": ["ROLE_VENDAS-GESTOR_COMERCIAL"],
    //            "subItems": [],
    //            ordem: 10,
    //            active: false
    //        }
    //
    //
    //
    //
    //
    //
    //    ],
    //    ordem: 6,
    //    active: false
    //}
];
