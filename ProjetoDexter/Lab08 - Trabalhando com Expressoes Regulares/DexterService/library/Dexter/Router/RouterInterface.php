<?php

namespace Dexter\Router;

/**
 * Interface do Roteador
 */
interface RouterInterface
{

    /**
     * Possibilita adicionar 1 rota ao roteador
     * @param Dexter\Router\RouteInterface $route
     * @return $this
     */
    public function addRoute(RouteInterface $route);

    /**
     * Possibilita adicionar N rotas ao roteador
     * @param array $routes
     * @return $this
     */
    public function addRoutes(array $routes);

    /**
     * Recupera rotas cadastradas
     * @return array
     */
    public function getRoutes();

    /**
     * Faz roteamento
     * @param Dexter\Router\RequestInterface $request
     * @param Dexter\Router\ResponseInterface $response
     * @return Dexter\Router\RouteInterface
     */
    public function route(RequestInterface $request, ResponseInterface $response);
}
