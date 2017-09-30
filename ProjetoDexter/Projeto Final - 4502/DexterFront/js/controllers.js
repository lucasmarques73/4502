var dexterControllers = angular.module('dexterControllers', ['Dexter.config']);

dexterControllers.controller(
    'HomeController',
    ['$scope', '$http', '$timeout', 'cfg', 'Banner', 'Vantagem', 'Funcionalidade',
    function ($scope, $http, $timeout, cfg, Banner, Vantagem, Funcionalidade) {
        // cfg.ws
        $scope.banners = Banner.query();

        $scope.vantagens = Vantagem.query({showHome: 'Y'});

        $scope.funcionalidades = Funcionalidade.query();

        $scope.$watch('banners', function() {
            $timeout(function () {
                $('#destaque_home ul').bxSlider({
                    pager: false
                });
            }, 300);
        });
    }
]);

//dexterControllers.controller('PhoneDetailCtrl', ['$scope', '$routeParams', function ($scope, $routeParams) {
//    $scope.phoneId = $routeParams.phoneId;
//}]);

dexterControllers.controller('QuemSomosController', ['$scope', '$http', function ($scope, $http) {}]);
dexterControllers.controller('NossosValoresController', ['$scope', '$http', function ($scope, $http) {}]);
dexterControllers.controller('LinhaDoTempoController', ['$scope', '$http', function ($scope, $http) {}]);
dexterControllers.controller('ServicosController', ['$scope', '$http', 'Vantagem', function ($scope, $http, Vantagem) {
    $scope.servicos = Vantagem.query({showHome: 'N'});
}]);
dexterControllers.controller('CadastreSeController', ['$scope', '$http', 'Estado', 'Cadastro',
  function ($scope, $http, Estado, Cadastro) {
    $scope.estados = Estado.query();
    $scope.validaCadastro = validaCadastro;
    $scope.cadastreSe = function() {
        Cadastro.save($scope.cadastro, function() {
            $scope.form_message = 'Dados salvos com sucesso!';
        }, function(response) {
            $scope.form_message = response.data.error;
        });
    }
}]);
dexterControllers.controller('ContatoController', ['$scope', '$http', 'Contato', function ($scope, $http, Contato) {
    $scope.validaContato = validaContato;
    $scope.saveContato = function() {
        Contato.save($scope.contato, function() {
            $scope.form_message = 'Dados salvos com sucesso!';
        }, function (response) {
            $scope.form_message = response.data.error;
        });
    }
}]);
