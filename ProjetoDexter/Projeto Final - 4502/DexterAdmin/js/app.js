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
      when('/usuarios', {
        templateUrl: 'partials/usuarios.html',
        controller: 'UsuariosController'
      }).
      when('/usuarios/new', {
        templateUrl: 'partials/usuario/new.html',
        controller: 'UsuariosNewController'
      }).
      when('/usuarios/edit/:id', {
        templateUrl: 'partials/usuario/edit.html',
        controller: 'UsuariosEditController'
      }).
      when('/clientes', {
        templateUrl: 'partials/clientes.html',
        controller: 'ClientesController'
      }).
      when('/clientes/new', {
        templateUrl: 'partials/cliente/new.html',
        controller: 'ClientesNewController'
      }).
      when('/clientes/edit/:id', {
        templateUrl: 'partials/cliente/edit.html',
        controller: 'ClientesEditController'
      }).
      when('/mensagens', {
        templateUrl: 'partials/mensagens.html',
        controller: 'MensagensController'
      }).
      when('/mensagens/new', {
        templateUrl: 'partials/mensagem/new.html',
        controller: 'MensagensNewController'
      }).
      when('/mensagens/edit/:id', {
        templateUrl: 'partials/mensagem/edit.html',
        controller: 'MensagensEditController'
      }).
      when('/servicos', {
        templateUrl: 'partials/servicos.html',
        controller: 'ServicosController'
      }).
      when('/servicos/new', {
        templateUrl: 'partials/servico/new.html',
        controller: 'ServicosNewController'
      }).
      when('/servicos/edit/:id', {
        templateUrl: 'partials/servico/edit.html',
        controller: 'ServicosEditController'
      }).
      when('/destaques', {
        templateUrl: 'partials/destaques.html',
        controller: 'DestaquesController'
      }).
      when('/destaques/new', {
        templateUrl: 'partials/destaque/new.html',
        controller: 'DestaquesNewController'
      }).
      when('/destaques/edit/:id', {
        templateUrl: 'partials/destaque/edit.html',
        controller: 'DestaquesEditController'
      }).
      when('/funcionalidades', {
        templateUrl: 'partials/funcionalidades.html',
        controller: 'FuncionalidadesController'
      }).
      when('/funcionalidades/new', {
        templateUrl: 'partials/funcionalidade/new.html',
        controller: 'FuncionalidadesNewController'
      }).
      when('/funcionalidades/edit/:id', {
        templateUrl: 'partials/funcionalidade/edit.html',
        controller: 'FuncionalidadesEditController'
      }).
      otherwise({
        redirectTo: '/home'
      });
  }]);

