<?php

namespace Dexter\Router;

/**
  * Classe onde todas as requisições batem. É o único ponto de entrada
  * da aplicação, responsável pelo roteamento e envio das respostas, deixando
  * uma estrutura simples e organizada para escalar sua aplicação.
 */
class FrontController
{

    /**
     * @var Dexter\Router\RouterInterface
     */
    private $router;

    /**
     * @var Dexter\Router\DispatcherInterface
     */
    private $dispatcher;

    /**
     * Inicia Roteador e Despachante
     * @param Dexter\Router\RouterInterface $router
     * @param Dexter\Router\DispatcherInterface $dispatcher
     */
    public function __construct(
        RouterInterface     $router,
        DispatcherInterface $dispatcher
    ) {
        $this->router = $router;
        $this->dispatcher = $dispatcher;
    }

    /**
     * Faz o roteamento e envia o resultado
     * @param Dexter\Router\RequestInterface $request
     * @param Dexter\Router\ResponseInterface $response
     */
    public function run(RequestInterface $request, ResponseInterface $response)
    {
        $route = $this->router->route($request, $response);
        $this->dispatcher->dispatch($route, $request, $response);
    }
}
