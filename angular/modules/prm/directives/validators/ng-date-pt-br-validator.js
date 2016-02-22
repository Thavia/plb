/**
 *  Validaç
 *
 */
app.directive("ngDatePtBrValidator", function(){
          // requires an isloated model
          return {
           // restrict to an attribute type.
           restrict: 'A',
          // element must have ng-model attribute.
           require: 'ngModel',

           link: function(scope, ele, attrs, ctrl){

              // add a parser that will process each time the value is
              // parsed into the model when the user updates it.
              ctrl.$parsers.unshift(function(value) {

                if(value){
                    var d = moment(value, 'DDMMYYYY');
                    var valid = (value.match(/^(\d+)\/(\d+)\/(\d+)/) != null) && d.isValid() && d.year() > 1900;

                    ctrl.$setValidity('invalidDatePtBr', valid);
                }

                // if it's valid, return the value to the model,
                // otherwise return undefined.
                return valid ? value : undefined;
              });


               ctrl.$formatters.push(function (value) {
                   if ( typeof value == 'undefined' ) return "";

                   return value;
               });

           }
          }
        });