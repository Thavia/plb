'use strict';


/**
 * @ngdoc directive
 * @name datepickerPopup
 * @id datepickerPopup
 * @description Corrige valor padrao do dataPicker
 * @restrict A
 */
app.directive('datepickerPopup', function (dateFilter, datepickerPopupConfig) {
    return {
        restrict: 'A',
        priority: 1,
        require: 'ngModel',
        link: function(scope, element, attr, ngModel) {
            var dateFormat = attr.datepickerPopup || datepickerPopupConfig.datepickerPopup;
            ngModel.$formatters.push(function (value) {
                return dateFilter(value, dateFormat);
            });
        }
    };
});
