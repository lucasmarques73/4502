<?php

namespace Dexter\Router;

/**
 * Roteador
 */
class Router implements RouterInterface
{

    /**
     * Armazena as rotas do roteador
     * @var array
     */
    private $routes = array();

    /**
     * Possibilita adicionar 1 rota ao roteador
     * @param Dexter\Router\RouteInterface $route
     * @return $this
     */
    public function addRoute(RouteInterface $route)
    {
        $this->routes[] = $route;
        return $this;
    }

    /**
     * Possibilita adicionar N rotas ao roteador
     * @param array $routes
     * @return $this
     */
    public function addRoutes(array $routes)
    {
        foreach ($routes as $route) {
            $this->addRoute($route);
        }
        return $this;
    }

    /**
     * Recupera rotas cadastradas
     * @return array
     */
    public function getRoutes()
    {
        return $this->routes;
    }

    /**
     * Faz roteamento
     * @param Dexter\Router\RequestInterface $request
     * @param Dexter\Router\ResponseInterface $response
     * @return Dexter\Router\RouteInterface
     */
    public function route(RequestInterface $request, ResponseInterface $response)
    {
        foreach ($this->getRoutes() as $route) {
            if ($route->match($request)) {
                return $route;
            }
        }
        $response->addHeader('404 Page not found');
        $response->send();
        throw new \RuntimeException('No route matched the current URI');
    }
}
