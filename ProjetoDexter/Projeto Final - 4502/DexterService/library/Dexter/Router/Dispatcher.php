<?php

namespace Dexter\Router;

class Dispatcher implements DispatcherInterface
{
 
    /**
     * Executa a rota e cospe o resultado
     * @param Dexter\Router\RouteInterface $route
     * @param Dexter\Router\RequestInterface $request
     * @param Dexter\Router\ResponseInterface $response
     */
    public function dispatch(
        RouteInterface      $route,
        RequestInterface    $request,
        ResponseInterface   $response
    ) {
        $route->run(array($request, $response));
    }
}
