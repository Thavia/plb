'use strict';

/**
 * @ngdoc directive
 * @name rawAjaxBusyIndicator
 * @id rawAjaxBusyIndicator
 * @description Indicado shadown ativado como haver uma requisição ajax
 */
app.directive("rawAjaxBusyIndicator", function () {
    return {
        link: function ( $scope, element, attributes) {
            var requests = 0;
            $scope.$on("ajax-start", function (event, args) {
                if (!requests) {
                    element.html('<div class="ajax-busy-indicator-text">' +
                    '<div id="squaresWaveG">' +
                    '<div id="squaresWaveG_1" class="squaresWaveG">' +
                    '</div>' +
                    '<div id="squaresWaveG_2" class="squaresWaveG">' +
                    '</div>' +
                    '<div id="squaresWaveG_3" class="squaresWaveG">' +
                    '</div>' +
                    '<div id="squaresWaveG_4" class="squaresWaveG">' +
                    '</div>' +
                    '<div id="squaresWaveG_5" class="squaresWaveG">' +
                    '</div>' +
                    '<div id="squaresWaveG_6" class="squaresWaveG">' +
                    '</div>' +
                    '<div id="squaresWaveG_7" class="squaresWaveG">' +
                    '</div>' +
                    '<div id="squaresWaveG_8" class="squaresWaveG">' +
                    '</div><br/><br/>' + args +
                    '</div>');
                    element.addClass("ajax-busy-indicator-show");
                    element.removeClass("ajax-busy-indicator-hide");
                }
                requests++;
            });
            $scope.$on("ajax-stop", function (event, args) {
                requests--;
                if (!requests) {
                    element.removeClass("ajax-busy-indicator-text");
                    element.html('<div class="ajax-busy-indicator-text">' + args.status + ' => ' + args.statusText + '</div>');
                    element.removeClass("ajax-busy-indicator-show");
                    element.addClass("ajax-busy-indicator-hide");
                }

            });
            $scope.$on("ajax-error", function (event, args) {
                requests--;
                if (!requests) {
                    element.removeClass("ajax-busy-indicator-text");

                    if(args != null)
                        element.html('<div class="ajax-busy-indicator-text">'+args.status+' => '+args.statusText+'</div>');
                    // element.removeClass("ajax-busy-indicator-show");
                    //element.addClass("ajax-busy-indicator-hide");
                }

            });
        }
    };
});
