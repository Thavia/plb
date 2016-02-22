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
 * @name real
 * @id real
 * @description Transforma um decimal no formato real R$ 10,00
 * @param {input}  input Valor a ser modificado
 */
app.filter('real', function () {
    return function (input) {
        return 'R$ ' + formatReal(input);
    };
});

app.filter('realthavia', function () {
    return function (input) {
        return 'R$ ' + input.formatMoney(2);
    };
});




Number.prototype.formatMoney = function(c, d, t){
    var n = this,
        c = isNaN(c = Math.abs(c)) ? 2 : c,
        d = d == undefined ? "," : d,
        t = t == undefined ? "." : t,
        s = n < 0 ? "-" : "",
        i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "",
        j = (j = i.length) > 3 ? j % 3 : 0;
    return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
};

