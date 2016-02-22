'use strict';

app.directive('icheck', ['$timeout', function($timeout){
    return {
        link: function($scope, element, $attrs, ngModel) {
            return $timeout(function() {
                var value = $attrs['value'];

                $scope.$watch($attrs['ngModel'], function(newValue){
                    $(element).iCheck('update');
                })

                var self = $(element),
                    label = self.next(),
                    label_text = label.text();

                label.remove();

                return $(element).iCheck({
                    checkboxClass: 'icheckbox_line-grey icheckbox-option',
                    radioClass: 'iradio_line-grey',
                    insert: '<div class="icheck_line-icon"></div>' + label_text
                }).on('ifChanged', function(event) {
                    $scope.$emit('icheckChanged', event.target );
                });
            });
        }
    };
}]);


app.directive('icheckboxList', function($timeout) {
  return {
    restrict: 'E',

      link: function($scope, element, attrs) {
          $scope.type = 'radio';
          $scope.multiple = false;

          $scope.id = "ichecboxlist" + parseInt( Math.random() * 1000000 );

          attrs.$observe('multiple', function() {
              if ( typeof attrs.multiple == 'string') {
                  $scope.type = 'checkbox';
                  $scope.multiple = true;
              }
          });
      },

    scope: {
        ngModel: '@',
        choices: '=',
        multiple: '@',          // boolean
        required: '@',
        name: '@',
        class: '='
    },

    templateUrl: 'modules/prm/diretive/icheckbox/view/list.html',

    controller: ['$scope', function($scope){

        /**
         * Is the value selected in the model?
         */
        $scope.isValueSelected = function(v) {
            var ngModel = $scope.ngModel;
            var modelValue = eval('$scope.$parent.' + ngModel);

            if ( angular.isArray(modelValue ) ) {  // use methods of angularjs
                // in case of model be an array value...
                if (modelValue.indexOf(v) != -1) return true;

            }else if ( angular.equals(modelValue, v ) )  { // fix objects equals
                return true;

            } else {
                // in case of model be an scalar value...
                if ( modelValue == v ) return true;
            }

            return false;
        }



        /**
         * When some of the checkbox/radio is clicked...
         */
        $scope.$on('icheckChanged',
            function(event,target) {
                var item;
                var ngModel = $scope.ngModel;

                if ( $scope.name == target.name ) {

                    var value = [];
                    $('INPUT[name=' + $scope.name + ']:checked').each(
                        function() {
                            value.push(this.value);
                        }
                    )

                    if ( value.length == 0 ) return;

                    if ( ! $scope.multiple ) {
                        value = value[0];
                    }

                    // ---> disponibiliza o valor no escopo pai
                    $scope.$apply(function () {
                        var proc = '$scope.$parent.' + ngModel + '=' + JSON.stringify(value);
                        eval(proc);
                    });
                }
            }
        );
    } ]
  }
} );


