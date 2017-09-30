<?php

namespace Dexter\Router;

use Dexter\Auth\Auth;

/**
 * Rota padrão sistema para carregamento dos controladores
 */
class DefaultRoute extends Route
{

    /**
     * Padrão da rota default
     */
    const PATTERN           = '@^/(?:([^/]+?)(?:/([0-9]+?))?)?$@';

    /**
     * Controller padrão
     */
    const INDEX_CONTROLLER  = 'IndexController';

    private $auth;

    /**
     * Constrói rota
     */
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
        parent::__construct(self::PATTERN, array($this, 'createController'));
    }

    /**
     * Rota padrão
     */
    protected function createController(RequestInterface $request, ResponseInterface $response)
    {

        // transforma parâmetros da URL no nome do controller
        $controller = $this->getController();
        $action = $this->getAction($request);
        $uid = $this->getId();

        // usuário logado
        if ($this->login($controller, $action)) {
            $class = "\\DexterService\\Controllers\\{$controller}";

            if (!class_exists($class)) {
                header('HTTP/1.1 404 Not Found');
                return;
            }

            $controller = $this->create($class);

            if (!method_exists($controller, $action)) {
                header('HTTP/1.1 501 Not Implemented');
                return;
            }

            // executa controller
            $controller->$action($request, $response, $uid);
        }
    }

    /**
     * Recupera o nome do controller
     */
    private function getController()
    {
        if (isset($this->argsUrl[0])) {
            return $this->camelCase($this->argsUrl[0]) . 'Controller';
        }
        return self::INDEX_CONTROLLER;
    }

    /**
     * Recupera o nome da action
     */
    private function getAction(RequestInterface $request)
    {
        return strtolower($request->getHttpMethod()) . 'Action';
    }

    /**
     * Recupera o ID
     */
    private function getId()
    {
        if (isset($this->argsUrl[1])) {
            return $this->argsUrl[1];
        }
        return null;
    }

    private function login($controller, $action)
    {
        $this->auth->login($controller, $action);
        return true;
    }

    /**
     * Transforma uma string para CamelCase
     */
    private function camelCase($string)
    {
        $string = str_replace('_', ' ', $string);
        $string = ucwords($string);
        return str_replace(' ', '', $string);
    }

    /**
     * Separado por causa de testes unitários
     */
    public function create($class)
    {
        return new $class;
    }
}
