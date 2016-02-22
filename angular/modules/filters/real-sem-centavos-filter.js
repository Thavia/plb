'use strict';

function formatReal(int) {
    var tmp = int + '';
    var res = tmp.replace('.', '');
    tmp = res.replace(',', '');
    var neg = false;
    if (tmp.indexOf('-') === 0) {
        neg = true;
        tmp = tmp.replace('-', '');
    }
    if (tmp.length === 1) {
        tmp = '0' + tmp;
    }
    tmp = tmp.replace(/([0-9]{2})$/g, ',$1');
    if (tmp.length > 6) {
        tmp = tmp.replace(/([0-9]{3}),([0-9]{2}$)/g, '.$1,$2');
    }
    if (tmp.length > 9) {
        tmp = tmp.replace(/([0-9]{3}).([0-9]{3}),([0-9]{2}$)/g, '.$1.$2,$3');
    }
    if (tmp.length > 12) {
        tmp = tmp.replace(/([0-9]{3}).([0-9]{3}).([0-9]{3}),([0-9]{2}$)/g, '.$1.$2.$3,$4');
    }
    if (tmp.indexOf('.') === 0) {
        tmp = tmp.replace('.', '');
    }
    if (tmp.indexOf(',') === 0) {
        tmp = tmp.replace(',', '0,');
    }
    return neg ? '-' + tmp : tmp;
}

/**
 * @ngdoc filter
 * @name realSemCentavos
 * @id real
 * @description Transforma um decimal no formato real R$ 10 (sem centavos)
 * @param {input}  input Valor a ser modificado
 */
app.filter('realSemCentavos', function () {
    return function (input) {
        return input;
        //return 'R$ ' + formatReal(input);
    };
});

