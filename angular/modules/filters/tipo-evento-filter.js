'use strict';

/**
 * @ngdoc filter
 * @name tipoEvento
 * @id tipoEvento
 * @param {evento}  evento Evento
 * @description Retorna o icone do evento
 */
app.filter('tipoEvento', function () {
    return function (evento) {

        var tipoEvento = null;
        if( evento.hasOwnProperty("tipo") || evento.tipo.hasOwnProperty("data") || evento.tipo.data.hasOwnProperty("apelido"))
            tipoEvento = evento.tipo.data;


        if( evento.hasOwnProperty("tipo") || evento.tipo.hasOwnProperty("apelido"))
            tipoEvento = evento.tipo;

        if(tipoEvento == null )
            return ;

        var fa_icon = null;


        switch (tipoEvento.apelido) {

            case 'telefonema':
                fa_icon = "fa fa-phone fa-lg";
                break;

            case 'fone':
                fa_icon = "fa fa-phone fa-lg";
                break;

            case 'email':
                fa_icon = "fa fa-envelope-o fa-lg";
                break;

            case 'email':
                fa_icon = "fa fa-envelope-o fa-lg";
                break;

            case 'arquivamento':
                fa_icon = "fa fa-file-archive-o";
                break;

            case 'reuniao':
                fa_icon = "fa fa-comments-o";
                break;

            case 'chat':
                fa_icon = "fa fa-weixin";
                break;

            default:
                fa_icon = "fa fa-exclamation";
                break;
        }

        return fa_icon;
    };
});
