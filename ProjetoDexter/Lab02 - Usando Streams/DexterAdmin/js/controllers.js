var dexterControllers = angular.module('dexterControllers', ['Dexter.config']);

dexterControllers.controller(
    'HomeController',
    ['$scope', '$http', 'cfg',
    function ($scope, $http, cfg) {
        $scope.front = cfg.front;
    }
]);

dexterControllers.controller('UsuariosController', ['$scope', '$http', 'Usuario', function ($scope, $http, Usuario) {
    $scope.usuarios = Usuario.query();
}]);
dexterControllers.controller('UsuariosNewController', ['$scope', '$http', 'Usuario', function ($scope, $http, Usuario) {
    $scope.saveUser = function() {
        Usuario.save($scope.usuario, function() {
            $scope.form_message = 'Dados salvos com sucesso!';
        }, function (response) {
            $scope.form_message = response.data.error;
        });
    }
}]);
dexterControllers.controller('UsuariosEditController', ['$scope', '$http', 'Usuario', '$routeParams', function ($scope, $http, Usuario, $routeParams) {
    $scope.saveUser = function() {
        Usuario.update({id: $scope.user.id, login_usuario: $scope.user.login}, function() {
            $scope.form_message = 'Dados salvos com sucesso!';
        }, function (response) {
            $scope.form_message = response.data.error;
        });
    }
    if ($routeParams.id) {
        $scope.user = Usuario.find({id: $routeParams.id});
    }
}]);
dexterControllers.controller('ClientesController', ['$scope', '$http', 'Cliente', function ($scope, $http, Cliente) {
    $scope.clientes = Cliente.query();
}]);
dexterControllers.controller('ClientesNewController', ['$scope', '$http', 'Cliente', function ($scope, $http, Cliente) {
    $scope.saveCliente = function() {
        Cliente.save($scope.cliente, function() {
            $scope.form_message = 'Dados salvos com sucesso!';
        }, function (response) {
            $scope.form_message = response.data.error;
        });
    }
}]);
dexterControllers.controller('ClientesEditController', ['$scope', '$http', 'Cliente', '$routeParams', function ($scope, $http, Cliente, $routeParams) {
    $scope.saveCliente = function() {
        Cliente.update($scope.cliente, function() {
            $scope.form_message = 'Dados salvos com sucesso!';
        }, function (response) {
            $scope.form_message = response.data.error;
        });
    }
    if ($routeParams.id) {
        $scope.cliente = Cliente.find({id: $routeParams.id});
    }
}]);
dexterControllers.controller('MensagensController', ['$scope', '$http', 'Mensagem', function ($scope, $http, Mensagem) {
    $scope.mensagens = Mensagem.query();
}]);
dexterControllers.controller('MensagensNewController', ['$scope', '$http', 'Mensagem', function ($scope, $http, Mensagem) {
    $scope.saveMensagem = function() {
        Mensagem.save($scope.mensagem, function() {
            $scope.form_message = 'Dados salvos com sucesso!';
        }, function (response) {
            $scope.form_message = response.data.error;
        });
    }
}]);
dexterControllers.controller('MensagensEditController', ['$scope', '$http', 'Mensagem', '$routeParams', function ($scope, $http, Mensagem, $routeParams) {
    $scope.saveMensagem = function() {
        Mensagem.update($scope.mensagem, function() {
            $scope.form_message = 'Dados salvos com sucesso!';
        }, function (response) {
            $scope.form_message = response.data.error;
        });
    }
    if ($routeParams.id) {
        $scope.mensagem = Mensagem.find({id: $routeParams.id});
    }
}]);
dexterControllers.controller('ServicosController', ['$scope', '$http', 'Servico', function ($scope, $http, Servico) {
    $scope.servicos = Servico.query();
}]);
dexterControllers.controller('ServicosNewController', ['$scope', '$http', 'Servico', function ($scope, $http, Servico) {
    $scope.saveServico = function() {
        Servico.save($scope.servico, function() {
            $scope.form_message = 'Dados salvos com sucesso!';
        }, function (response) {
            $scope.form_message = response.data.error;
        });
    }
}]);
dexterControllers.controller('ServicosEditController', ['$scope', '$http', 'Servico', '$routeParams', function ($scope, $http, Servico, $routeParams) {
    $scope.saveServico = function() {
        Servico.update($scope.servico, function() {
            $scope.form_message = 'Dados salvos com sucesso!';
        }, function (response) {
            $scope.form_message = response.data.error;
        });
    }
    if ($routeParams.id) {
        $scope.servico = Servico.find({id: $routeParams.id});
    }
}]);
dexterControllers.controller('DestaquesController', ['$scope', '$http', 'Destaque', function ($scope, $http, Destaque) {
    $scope.destaques = Destaque.query();
}]);
dexterControllers.controller('DestaquesNewController', ['$scope', '$http', 'Destaque', function ($scope, $http, Destaque) {
    $scope.saveDestaque = function() {
        Destaque.save($scope.destaque, function() {
            $scope.form_message = 'Dados salvos com sucesso!';
        }, function (response) {
            $scope.form_message = response.data.error;
        });
    }
}]);
dexterControllers.controller('DestaquesEditController', ['$scope', '$http', 'Destaque', '$routeParams', function ($scope, $http, Destaque, $routeParams) {
    $scope.saveDestaque = function() {
        Destaque.update($scope.destaque, function() {
            $scope.form_message = 'Dados salvos com sucesso!';
        }, function (response) {
            $scope.form_message = response.data.error;
        });
    }
    if ($routeParams.id) {
        $scope.destaque = Destaque.find({id: $routeParams.id});
    }
}]);
dexterControllers.controller('FuncionalidadesController', ['$scope', '$http', 'Funcionalidade', function ($scope, $http, Funcionalidade) {
    $scope.funcionalidades = Funcionalidade.query();
}]);
dexterControllers.controller('FuncionalidadesNewController', ['$scope', '$http', 'Funcionalidade', function ($scope, $http, Funcionalidade) {
    $scope.saveFuncionalidade = function() {
        Funcionalidade.save($scope.funcionalidade, function() {
            $scope.form_message = 'Dados salvos com sucesso!';
        }, function (response) {
            $scope.form_message = response.data.error;
        });
    }
}]);
dexterControllers.controller('FuncionalidadesEditController', ['$scope', '$http', 'Funcionalidade', '$routeParams', function ($scope, $http, Funcionalidade, $routeParams) {
    $scope.saveFuncionalidade = function() {
        Funcionalidade.update($scope.funcionalidade, function() {
            $scope.form_message = 'Dados salvos com sucesso!';
        }, function (response) {
            $scope.form_message = response.data.error;
        });
    }
    if ($routeParams.id) {
        $scope.funcionalidade = Funcionalidade.find({id: $routeParams.id});
    }
}]);
