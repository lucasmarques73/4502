var dexterServices = angular.module('dexterServices', ['ngResource', 'Dexter.config']);

dexterServices.factory('Banner', ['$resource', 'cfg',
  function($resource, cfg){
    return $resource(cfg.ws + 'destaque', {}, {
      query: {method:'GET', isArray:true}
    });
  }]);

dexterServices.factory('Vantagem', ['$resource', 'cfg',
  function($resource, cfg){
    return $resource(cfg.ws + 'servico?show_home=:showHome', {}, {
        query: {method:'GET', params: {showHome:'@showHome'}, isArray:true}
    });
  }]);

dexterServices.factory('Funcionalidade', ['$resource', 'cfg',
  function($resource, cfg){
    return $resource(cfg.ws + 'funcionalidade', {}, {
      query: {method:'GET', isArray:true}
    });
  }]);

dexterServices.factory('Estado', ['$resource', 'cfg',
  function($resource, cfg){
    return $resource(cfg.ws + 'estado', {}, {
      query: {method:'GET', isArray:true}
    });
  }]);

dexterServices.factory('Cadastro', ['$resource', 'cfg',
  function($resource, cfg){
    return $resource(cfg.ws + 'cliente', {}, {});
  }]);

dexterServices.factory('Contato', ['$resource', 'cfg',
  function($resource, cfg){
    return $resource(cfg.ws + 'contato', {}, {});
  }]);
