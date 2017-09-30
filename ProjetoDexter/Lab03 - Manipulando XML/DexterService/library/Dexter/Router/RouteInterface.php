<?php

namespace Dexter\Router;

/**
 * Interface para rotas seguirem
 */
interface RouteInterface
{

    /**
     * Verifica se bate ROTA == REQUEST
     */
    public function match(RequestInterface $request);

    /**
     * Executa a rota passando parâmetros adicionais
     * @var array $args
     * @return mixed
     */
    public function run(array $args);
}
