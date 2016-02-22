'use strict';

/**
 * @ngdoc filter
 * @name firstUpperCase
 * @id firstUpperCase
 * @description Transforma a primeira letra de string em maiusculo
 * @param {input}  input Valor a ser modificado
 */
app.filter('firstUpperCase', function () {
    return function (input) {
        var fragmento = input;

        var res = fragmento[0].toUpperCase();
        res = res  + fragmento.slice(1,fragmento.lenght);
        return res;
    };
});
