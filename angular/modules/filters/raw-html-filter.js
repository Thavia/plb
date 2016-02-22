'use strict';

/**
 * @ngdoc filter
 * @name rawHtml
 * @id rawHtml
 * @description Remove alguns caracteres de html, não mais suportados
 * @param {input}  input Valor a ser modificado
 */
app.filter('rawHtml', ['$sce', function($sce){
    return function(val) {

        if(!angular.isString(val)) return ;

        var res = val.replace(/&amp;|&amp|amp;|amp/gi, " ");

        return $sce.trustAsHtml(res);
    };
}]);