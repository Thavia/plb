'use strict';

/**
 * @ngdoc service
 * @name gestaoCache
 * @module gestaoCache
 * @description  Cuida da sistematica de cache, seja cookie ou sessionStore;
 */
app.factory('gestaoCache', function($cookies, $cookieStore, $window) {


    function gestaoCache() {

        var self = this;
        /**
         * @ngdoc interface
         * @name self
         * @object self
         * @methodOf gestaoCache
         * @description Interface de definição de metodos e variaveis que serão abordados pela classe
         */
        self = {

            cookieGet: cookieGet,
            cookiePut: cookiePut,
            sessionGet: sessionGet,
            sessionPut: sessionPut,
            sessionRemove: sessionRemove,
            cookieRemove: cookieRemove

        };

        var storage = $window.sessionStorage;

        return self;

        /**
         * @ngdoc method
         * @name cookieGet
         * @methodOf gestaoCache
         * @description Metodo que obtem o valor de uma chave em cookie
         * @param {chave}  chave Chave a ser buscada
         * @returns {String} Valor da chave requirida
         * @example cookieGet('usuario_conta')
         */
        function cookieGet(chave, object) {

            if(object != null )
                return JSON.parse($cookies[chave]);
            return $cookies[chave];
        };

        /**
         * @ngdoc method
         * @name cookiePut
         * @methodOf gestaoCache
         * @description Metodo que salva uma chave com um valor no cookie
         * @param {chave}  chave Chave a ser salva
         * @param  {valor}  valor Valor a ser salvo
         * @returns {String} Valor da chave recem criada/atualizada
         * @example cookiePut('usuario_conta','{id:1....}')
         */
        function cookiePut(chave, valor, object) {

            cookieRemove(chave);
            if(object != null )
                valor = JSON.stringify(valor);

            $cookieStore.put(chave, valor, {'domain':'.templum.dev'});

            return $cookies[chave];
        };

        /**
         * @ngdoc method
         * @name sessionGet
         * @methodOf gestaoCache
         * @description Metodo que obtem o valor de uma chave no sessionStore
         * @param {chave}  chave Chave a ser buscada
         * @returns {String} Valor da chave requirida
         * @example cookieGet('usuario_conta')
         */
        function sessionGet(chave, object) {

            if(object != null )
                return JSON.parse(storage.getItem(chave));

            return storage.getItem(chave);
        };

        /**
         * @ngdoc method
         * @name sessionPut
         * @methodOf gestaoCache
         * @description Metodo que salva uma chave com um valor na sessionStore
         * @param {string}  chave Chave a ser salva
         * @param  {valor}  valor Valor a ser salvo
         * @returns {String} Valor da chave recem criada/atualizada
         * @example cookiePut('usuario_conta','{id:1....}')
         */
        function sessionPut(chave, valor, object) {

            sessionRemove(chave);

            if(object != null )
                valor = JSON.stringify(valor);

            storage.setItem(chave,valor);

            return sessionGet(chave);
        };

        /**
         * @ngdoc method
         * @name sessionRemove
         * @methodOf gestaoCache
         * @description Metodo que remove chave do sessioStore
         * @param {chave}  chave Chave a ser removida
         * @param  {valor}  valor Valor a ser removida
         * @returns {String} Valor da chave recem criada/atualizada
         * @example sessionRemove('usuario_conta')
         */
        function sessionRemove(chave) {

            storage.removeItem(chave);

        };

        /**
         * @ngdoc method
         * @name cookieRemove
         * @methodOf gestaoCache
         * @description Metodo que remove chave do cookie
         * @param {chave}  chave Chave a ser removida
         * @param  {valor}  valor Valor a ser removida
         * @returns {String} Valor da chave recem criada/atualizada
         * @example cookieRemove('usuario_conta')
         */
        function cookieRemove(chave) {

            $cookieStore.remove(chave);


        }
    }

    return new gestaoCache();

});



