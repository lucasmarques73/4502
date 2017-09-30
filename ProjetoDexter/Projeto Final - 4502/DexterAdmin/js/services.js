var dexterServices = angular.module('dexterServices', ['ngResource', 'Dexter.config']);

dexterServices.factory('Usuario', ['$resource', 'cfg',
  function($resource, cfg){
    return $resource(cfg.ws + 'usuario', {}, {
      query: {method:'GET', isArray:true},
      find: {method:'GET', isArray:false},
      save: {method: 'POST', withCredentials: true},
      update: {method: 'PATCH', withCredentials: true}
    });
  }]);
dexterServices.factory('Cliente', ['$resource', 'cfg',
  function($resource, cfg){
    return $resource(cfg.ws + 'cliente', {}, {
      query: {method:'GET', isArray:true},
      find: {method:'GET', isArray:false},
      save: {method: 'POST', withCredentials: true},
      update: {method: 'PUT', withCredentials: true}
    });
  }]);
dexterServices.factory('Mensagem', ['$resource', 'cfg',
  function($resource, cfg){
    return $resource(cfg.ws + 'mensagem', {}, {
      query: {method:'GET', isArray:true},
      find: {method:'GET', isArray:false},
      save: {method: 'POST', withCredentials: true},
      update: {method: 'PUT', withCredentials: true}
    });
  }]);
dexterServices.factory('Servico', ['$resource', 'cfg',
  function($resource, cfg){
    return $resource(cfg.ws + 'servico', {all:true}, {
      query: {method:'GET', isArray:true},
      find: {method:'GET', isArray:false},
      save: {method: 'POST', withCredentials: true},
      update: {method: 'PUT', withCredentials: true}
    });
  }]);
dexterServices.factory('Destaque', ['$resource', 'cfg',
  function($resource, cfg){
    return $resource(cfg.ws + 'destaque', {all:true}, {
      query: {method:'GET', isArray:true},
      find: {method:'GET', isArray:false},
      save: {method: 'POST', withCredentials: true},
      update: {method: 'PUT', withCredentials: true}
    });
  }]);
dexterServices.factory('Funcionalidade', ['$resource', 'cfg',
  function($resource, cfg){
    return $resource(cfg.ws + 'funcionalidade', {all:true}, {
      query: {method:'GET', isArray:true},
      find: {method:'GET', isArray:false},
      save: {method: 'POST', withCredentials: true},
      update: {method: 'PUT', withCredentials: true}
    });
  }]);
