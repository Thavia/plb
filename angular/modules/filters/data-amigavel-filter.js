'use strict';

/**
 * @ngdoc filter
 * @name dataAmigavel
 * @id dataAmigavel
 * @description Transforma a data em um formato amigavél
 * @param {dataOriginal}  dataOriginal Data no formato TimeStamp
 * @param {retornarString}  retornarString Bool
 */
app.filter('dataAmigavel', function ($filter) {
    return function (dataOriginal, retornarString) {

        var minuto = 60000;
        var dia = minuto * 60 * 24;
        var horarioVerao = 0;
        var stringTemp= [];
        stringTemp[0] = "Hoje";
        stringTemp[1] = "Ontem";
        stringTemp[2] = "Anteontem";
        stringTemp[3] = "Amanhã";
        stringTemp[4] = "Depois de amanhã";

        var dataOriginal = new Date(dataOriginal);
        var complemento = $filter("date")(dataOriginal, 'HH:mm');
        var dataRetorno = null;

        if (retornarString == true) {
            dataRetorno = $filter("date")(dataOriginal, 'fullDate');
            dataRetorno = $filter("firstUpperCase")(dataRetorno);
        }else{
            dataRetorno = $filter("date")(dataOriginal, 'dd/MM/yyyy HH:mm');
        }

        dataOriginal.setHours(0);
        dataOriginal.setMinutes(0);
        dataOriginal.setSeconds(0);

        var dataHoje = new Date();
        dataHoje.setHours(0);
        dataHoje.setMinutes(0);
        dataHoje.setSeconds(0);

        var diferenca = Math.abs(dataOriginal.getTime() - dataHoje.getTime());

        // determina o fuso horário de cada objeto Date
        var fh1 = dataOriginal.getTimezoneOffset();
        var fh2 = dataHoje.getTimezoneOffset();

        // retira a diferença do horário de verão
        if(dataHoje > dataOriginal){
            horarioVerao = (fh2 - fh1) * minuto;
        }
        else{
            horarioVerao = (fh1 - fh2) * minuto;
        }

        var total = Math.round((diferenca/dia)) - horarioVerao;

        var saida =  null;
        if(total <= 2 && dataOriginal.getTime() > dataHoje.getTime()) {

            saida = stringTemp[(total + 2)] + " às " + complemento;

        }else if(total <= 2 && dataOriginal.getTime() < dataHoje.getTime()) {
            saida = stringTemp[total] + " às " + complemento;
        }else{
            saida =  dataRetorno;
        }
        return saida;
    };
});


/**
 * @ngdoc filter
 * @name dataAmigavel
 * @id dataAmigavel
 * @description Transforma a data em um formato amigavél
 * @param {dataOriginal}  dataOriginal Data no formato TimeStamp
 */
app.filter('dataRelevante', function ($filter) {
    return function (dataOriginal) {
        if ( dataOriginal == null ) return "";

        var original = moment.unix(dataOriginal);
        var hoje = moment().hours(0).minutes(0).seconds(0);
        var originalDia = moment.unix(dataOriginal).hours(0).minutes(0).seconds(0);

        var diferencaDias = originalDia.diff( hoje , 'days');

        var dataAmigavel;

        if ( diferencaDias == 0 ) {
            dataAmigavel = original.format('HH:mm');
        } else if ( diferencaDias == -1 ) {
            dataAmigavel = 'ontem, ' + original.format('HH:mm');
        } else if ( diferencaDias == -2 ) {
            dataAmigavel = 'anteontem, ' + original.format('HH:mm');
        } else if ( diferencaDias == 1 ) {
            dataAmigavel = 'amanhã, ' + original.format('HH:mm');
        } else {
            dataAmigavel = original.format('DD/MM/YY');
        }
        return dataAmigavel;
    };
});

app.filter('eventoAtrasado', function ($filter) {
    return function (dataOriginal) {


        var dataHoje = moment().unix();
        if(dataHoje <= dataOriginal)
            return false;

        return true;
    };
});

app.filter('datediff', function()
{

    return function(date)


    {
        var data = moment.unix(date);
        var dataHoje = moment();
        var diferencaDias = data.diff( dataHoje );

       moment.locale('pt-br');
        if(dataHoje <= date)

        return moment.duration(diferencaDias).humanize(true);

        else
            return moment.duration(diferencaDias).humanize(true);

    };
});

app.filter('pagamentoStatus', function () {

    return function (status) {
        var saida = '';


        if (status == 'new') {
            saida =  'Cobrança Gerada';
        }
        if (status == 'waiting') {
            saida =  'Aguardando Confirmação de Pagamento';
        }

        if (status == 'paid') {
            saida =  'Pago';
        }

        if (status == 'unpaid') {
            saida =  'Pagamento não identidicado';
        }

        if (status == 'refunded') {
            saida =  'Reembolsado';
        }
        if (status == 'contested') {
            saida =  'Pagamento em processo de contestação';
        }
        if (status == 'canceled') {
            saida =  'Cobrança cancelada';
        }


        return saida;
    };








});