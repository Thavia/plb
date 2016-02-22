'use strict';

/**
 * @ngdoc filter
 * @name truncar
 * @id truncar
 * @description Trunca a string para o tamanho definido
 * @param {texto}  texto a ser truncado String
 * @param {qtdMaxCaracteres}  qtdMaxCaracteres Number
 * @param {indicadorDeTruncamento}  indicadorDeTruncamento String
 */
app.filter('truncar', function ($filter) {
    return function (texto, qtdMaxCaracteres, indicadorDeTruncamento) {

        if (typeof texto == 'undefined' || texto == null) {
            texto = '';
        }

        if (typeof indicadorDeTruncamento == 'undefined' || indicadorDeTruncamento == null) {
            indicadorDeTruncamento = '...';
        }

        if (texto.length <= qtdMaxCaracteres) {
            return texto;
        }

        var saida = '';
        saida = $filter("limitTo")(texto, qtdMaxCaracteres);
        saida += indicadorDeTruncamento;
        return saida;
    };
});



app.filter('options', function ($filter) {
    return function (texto) {

        if (typeof texto == 'undefined' || texto == null) {
            texto = '';
        }


       var options = [];
        options = texto.split(';');
        var saida = '';
        //options.forEach(function(entry) {
        //
        //    saida +='<option value='+ entry +'>' + entry + '</option>';
        //
        //
        //        }
        //
        //);

        console.log(saida);

        return options;

    };
});