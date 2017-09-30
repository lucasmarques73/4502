<?php

namespace Dexter\Router;

class Route implements RouteInterface
{

    /**
     * Padrão da rota
     * @var string
     */
    protected $pattern;

    /**
     * O que será executado
     * @var callable
     */
    protected $exec;

    /**
     * Argumentos recuperados da URL
     * @var array
     */
    protected $argsUrl = array();

    /**
     * Constrói a rota com um padrão de URI e o que será executado
     * @param string $pattern
     * @param callable $exec
     */
    public function __construct($pattern, $exec)
    {
        $this->pattern  = $pattern;
        $this->exec     = $exec;
    }
 
    /**
     * Verifica se bate ROTA == REQUEST
     * @return bool
     */
    public function match(RequestInterface $request)
    {
        $params = null;
        $result = preg_match($this->pattern, $request->getUri(), $params);
        $result && $this->argsUrl = array_slice($params, 1);
        return (bool) $result;
    }

    /**
     * Executa a rota passando os devidos argumentos
     * @param array $args
     * @return mixed
     */
    public function run(array $args)
    {
        return call_user_func_array($this->exec, $args);
    }

    /**
     * Getter para propriedades privates
     */
    public function __get($name)
    {
        return $this->$name;
    }
}
