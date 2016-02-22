'use strict';

/**
 * @ngdoc service
 * @name stringUtils
 * @module stringUtils
 * @description Funções simples para tratamento de string
 */
app.service('stringUtils', function () {


    function stringUtils() {
        var self = this;

        /**
         * @ngdoc interface
         * @name self
         * @object self
         * @methodOf stringUtils
         * @description Interface de definição de metodos e variaveis que serão abordados pela classe
         */
        self = {
            currentUser: {},
            sprintf: sprintf,
            encodeUriSegment: encodeUriSegment,
            transformLink: transformLink,
            geraUsername: geraUsername,
            removeAcentos: removeAcentos
        };
        return self;


        /**
         * @ngdoc method
         * @name sprintf
         * @methodOf stringUtils
         * @description Implementacao sptrintf for angularjs
         * @returns {object} string
         */
        function sprintf() {
            var args = arguments,
                string = args[0],
                i = 1;
            return string.replace(/%((%)|s|d)/g, function (m) {
                // m is the matched format, e.g. %s, %d
                var val = null;
                if (m[2]) {
                    val = m[2];
                } else {
                    val = args[i];
                    // A switch statement so that the formatter can be extended. Default is %s
                    switch (m) {
                        case '%d':
                            val = parseFloat(val);
                            if (isNaN(val)) {
                                val = 0;
                            }
                            break;
                    }
                    i++;
                }
                return val;
            });
        }

        /**
         * @ngdoc method
         * @name encodeUriSegment
         * @methodOf stringUtils
         * @description Atraves dos paramentros passado fatia o objeto transformando-o em uma string
         * @returns {object} string
         */
        function encodeUriSegment(obj, prefix){

            if(obj == null)
                return null;

            var str = [];
            for (var p in obj) {
                var k = prefix ? prefix + "[" + p + "]" : p,
                    v = obj[k];

                // Elimina os itens com undefined, seja string ou objeto, caso select2
                if(typeof v == "undefined" ||  v == "undefined"  ||  v == "null" ||  v == null ||  v == "" )
                    continue;

                str.push(angular.isObject(v) ? encodeUriSegment(v, k) : (k) + "=" + encodeURIComponent(v));

            }
            return str.join("&");
        };

        /**
         * @ngdoc method
         * @name transformLink
         * @methodOf stringUtils
         * @description Incrementa queryString em uma URI
         * @returns {object} string
         */
        function transformLink(link, filter, params){

            var sort = null;
            var perPage = null;

            var parametros = "";
            if(typeof params === "object" && typeof params.orderBy() === "object") {
                sort = "sort=" + params.orderBy();
            }else{
                sort = "sort=1";
            }

            if(sort != null)
                parametros = sort;

            if(typeof params === "object" && typeof params.count() === "number")
                perPage = "perPage="+ params.count();


            if(perPage != null)
                parametros = parametros + "&" + perPage;

            var page =  null;
            if(typeof params === "object" && typeof params.page() === "number") {
                page = 'page=' + params.page();
            }else{
                page = 'page=1';
            }

            if(page != null && page.length > 0)
                parametros = parametros + "&" + page;
            //var total = params.count();


            var urlFiltro = null;
            if(typeof params === "object")
                urlFiltro = self.encodeUriSegment(filter) ;

            if(urlFiltro != null && urlFiltro.length > 0)
                parametros = parametros + "&" + urlFiltro;


            return link + "?" + parametros;

        };

        /**
         * Cria um username a partir de certa string
         * @param nome
         * @returns {string}
         */
        function geraUsername(nome) {
            var str = nome;

            str = this.removeAcentos(str);
            str = str.toLowerCase();

            var p = str.split(/\s+/);

            var ret = "";
            ret += p[0];

            if (p.length>1) {
                ret += '.' + p[p.length-1];
            }

            return ret;
        };

        /**
         * Remove os acentos de uma string
         * @param paragraph
         * @returns {*}
         */
        function removeAcentos(paragraph) {
            var r = paragraph;

            r = r.replace(new RegExp(/[àáâãäå]/g),"a");
            r = r.replace(new RegExp(/[ÀÁÂÃÄ]/g),"A");
            r = r.replace(new RegExp(/æ/g),"ae");
            r = r.replace(new RegExp(/ç/g),"c");
            r = r.replace(new RegExp(/Ç/g),"c");
            r = r.replace(new RegExp(/[èéêë]/g),"e");
            r = r.replace(new RegExp(/[ÈÉÊË]/g),"E");
            r = r.replace(new RegExp(/[ìíîï]/g),"i");
            r = r.replace(new RegExp(/[ÌÍÎÏ]/g),"I");
            r = r.replace(new RegExp(/ñ/g),"n");
            r = r.replace(new RegExp(/Ñ/g),"n");
            r = r.replace(new RegExp(/[òóôõö]/g),"o");
            r = r.replace(new RegExp(/[ÓÓÔÕÖ]/g),"O");
            r = r.replace(new RegExp(/œ/g),"oe");
            r = r.replace(new RegExp(/[ùúûü]/g),"u");
            r = r.replace(new RegExp(/[ÙÚÛÜ]/g),"U");
            r = r.replace(new RegExp(/[ýÿ]/g),"y");

            return r;
        }



    }


    return new stringUtils();

});