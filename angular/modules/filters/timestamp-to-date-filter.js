'use strict';

/**
 * @ngdoc filter
 * @name timestampToDate
 * @id timestampToDate
 * @description Transforma um timeStamp em date
 * @param {timestamp}  timestamp Data no formato TimeStamp
 * @param {format}  format Formato de output não obrigatorio para ver as derivações http://momentjs.com/docs/#/parsing/string-format/
 */
app.filter('timestampToDate', function () {
    return function (timestamp, format) {
        if(timestamp == null || timestamp == false || timestamp == "")
            return null;

        if(format == null)
            format = "fullDate";

        var timestamp = moment.unix(timestamp);

        return   timestamp.format(format);
    };
});



