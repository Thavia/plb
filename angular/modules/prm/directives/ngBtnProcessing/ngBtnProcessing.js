'use strict';

app.directive('ngBtnProcessing', ['$timeout', function($timeout){
    return {
        restrict: 'A',
        scope: {
            ngBtnProcessing: '='
        },
        link: function($scope, element, $attrs, ngModel) {
            $scope.$watch('ngBtnProcessing',
                function( processing ) {
                    if ( processing ) {
                        $(element).prepend(' <i class="fa fa-gear fa-spin animated"></i>');
                        element.attr("disabled", "disabled");
                    } else {
                        $(element).find('i:first').remove();
                        element.removeAttr("disabled");
                    }
                }
            );
        }
    };
}]);


