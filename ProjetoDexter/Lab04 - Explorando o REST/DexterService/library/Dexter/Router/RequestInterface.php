<?php

namespace Dexter\Router;

/**
 * Interface para objeto que encapsula a requisição
 */
interface RequestInterface
{

    /**
     * Pega a URI da requisição
     * @return string
     */
    public function getUri();

    /**
     * Pega o parâmetro $param da requisição (e.g. $_GET, $_POST etc.)
     * @param string $param Nome do parâmetro
     * @param mixed $default = NULL
     * @return mixed
     */
    public function getParam($param, $default = null);

    /**
     * Pega todos os parâmetros da requisição
     * @return array
     */
    public function getParams();
}
