'use strict';

/**
 * @ngdoc directive
 * @name loadingContainer
 * @id loadingContainer
 * @description Diretiva que faz efeito ao carregar itens no ngTable
 * @restrict A
 */
app.directive('loadingContainer', function () {
    return {
        restrict: 'A',
        scope: false,
        link: function(scope, element, attrs) {
            var loadingLayer = angular.element('<div class="loading">' +
            '<div class="internal"><img src="public/img/ajax-loader.gif" class="col-sm-offset-2"></div>'+
            '</div>');
            element.append(loadingLayer);
            element.addClass('loading-container');
            scope.$watch(attrs.loadingContainer, function(value) {
                loadingLayer.toggleClass('ng-hide', !value);
            });
        }
    };
});
