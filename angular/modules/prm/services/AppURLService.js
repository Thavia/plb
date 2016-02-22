'use strict';

app.factory('AppURLService', function( ENV, $location ) {
    function AppURLService() {

        var self = this;

        self = {
            getUrlLogin: getUrlLogin,
            getUrlOrg: getUrlOrg
        };
        return self;


        /**
         * Obtem a URL para a página de login com base nas configurações do ambiente
         * e na URL informada ao navegador.
         * @returns {string}
         */
        function getUrlLogin( org ) {
            var url_login;
            var org;

            // Se a organização foi fornecida, gera a URL para a mesma
            if ( typeof(org) != 'undefined' && org != null ) {
                url_login = ENV.app_login_protocolo + '://';
                url_login += org + '.' + ENV.app_login_dominio + '/' + ENV.app_login_script;

                return url_login
            }


            // ... caso contrário, constroi a URL com base no endereço atual
            //
            var urlAtual = $location.absUrl();
            var r;

            org = "";
            url_login = ENV.app_login_dominio + '/' + ENV.app_login_script;

            // obtem os componentes da URL atual
            if ( r = urlAtual.match(/^(http[s]{0,1}):\/\/([^\/]+)/) ) {
                var protocolo = r[1];
                var dominio = r[2];

                var dominioComps = dominio.split('.');

                // componente relativo a organização
                var org = dominioComps[0];
            }

            url_login = ( org != "" ? org + '.' : org) + url_login;
            url_login = ENV.app_login_protocolo + '://' + url_login;

            return url_login;
        }

        function getUrlOrg( orgNIck ) {
            var urlOrg;

                        // Se a organização foi fornecida, gera a URL para a mesma
            if ( typeof(orgNIck) != 'undefined' && orgNIck != null ) {
                urlOrg = ENV.app_login_protocolo + '://';
                urlOrg += orgNIck + '.' + ENV.domain;

                return urlOrg
            }

            else
            return '/';


        }

    }
    return new AppURLService();

});

