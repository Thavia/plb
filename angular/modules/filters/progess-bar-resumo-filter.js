'use strict';

/**
 * @ngdoc filter
* @name progessBarResumo
* @id progessBarResumo
* @description Transforma dados em elementos do progressBar do resumo geral
* @param {inpvendasut}  vendas Venda Oportunidade
* @param {tipo}  tipo  Tipo de saida ex.: valor ou status
*/
app.filter('progessBarResumo', function () {
    return function (vendas, tipo) {

        if(tipo == null )
            tipo = "valor";

        if(!vendas.hasOwnProperty("meta"))
            return null;

        if(!vendas.hasOwnProperty("realizado"))
            return null;

        var meta  = vendas.meta;
        var realizado = vendas.realizado;
        var valor_final = 0;

        if(meta > 0 )
            valor_final = Math.ceil(((realizado / meta) * 100))  ;

        var status = "progress-bar-danger";
        if(valor_final >= 25  && valor_final < 50){
            status = "progress-bar-warning";
        }else if(valor_final >= 50  && valor_final < 75){
            status = "progress-bar-info";
        }else if(valor_final >= 75){
            status = "progress-bar-success";
        }
        if( tipo == "valor")
            return valor_final;

        if( tipo == "status")
            return status;

    };
});
