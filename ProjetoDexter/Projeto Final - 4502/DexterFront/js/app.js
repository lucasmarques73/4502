var dexterApp = angular.module('Dexter', [
    'ngRoute',
    'dexterControllers',
    'dexterServices'
]);

dexterApp.config(['$routeProvider',
  function($routeProvider) {
    $routeProvider.
      when('/home', {
        templateUrl: 'partials/home.html',
        controller: 'HomeController'
      }).
      when('/quem_somos', {
        templateUrl: 'partials/quem_somos.html',
        controller: 'QuemSomosController'
      }).
      when('/nossos_valores', {
        templateUrl: 'partials/nossos_valores.html',
        controller: 'NossosValoresController'
      }).
      when('/linha_do_tempo', {
        templateUrl: 'partials/linha_do_tempo.html',
        controller: 'LinhaDoTempoController'
      }).
      when('/servicos', {
        templateUrl: 'partials/servicos.html',
        controller: 'ServicosController'
      }).
      when('/cadastre_se', {
        templateUrl: 'partials/cadastre_se.html',
        controller: 'CadastreSeController'
      }).
      when('/contato', {
        templateUrl: 'partials/contato.html',
        controller: 'ContatoController'
      }).
      otherwise({
        redirectTo: '/home'
      });
  }]);
