<?php

namespace Dexter\Router;

use Dexter\ContentNegotiation\Converter;

/**
 * Encapsula dados da requisição
 */
class Request implements RequestInterface
{

    /**
     * Armazena URI
     */
    private $uri;

    /**
     * Armazena parâmetros da requisição
     */
    private $params;

    /**
     * Armazena método http
     */
    private $httpMethod;

    private $converter;

    public function __construct(Converter $converter)
    {
        $this->converter = $converter;
    }

    /**
     * Recupera URI
     * @return string
     */
    public function getUri()
    {
        if (!$this->uri) {
            $this->uri = strtok($_SERVER['REQUEST_URI'], '?');
			$this->uri = preg_replace('@.*?~.+?/@', '', $this->uri);
        }
        return '/' . ltrim($this->uri, '/');
    }

    /**
     * Recupera parâmetro passado
     * @param string $param
     * @param mixed $default = NULL
     * @return mixed
     */
    public function getParam($param, $default = null)
    {
        $this->doParseParams();
        if (isset($this->params[$param])) {
            return $this->params[$param];
        }
        return $default;
    }

    /**
     * Recupera todos os parâmetros da requisição
     * @return array
     */
    public function getParams()
    {
        $this->doParseParams();
        return $this->params;
    }

    /**
     * Faz o parse dos parâmetros da requisição
     */
    private function doParseParams()
    {
        if (!$this->params) {
            $this->httpMethod = $_SERVER['REQUEST_METHOD'];
            switch ($this->httpMethod) {
                case 'GET':
                    $this->params = array();
                    foreach ($_GET as $key => $value) {
                        $this->params[$key] = filter_var($value, FILTER_SANITIZE_STRING);
                    }
                    break;
                case 'POST':
                case 'PUT':
                case 'PATCH':
                    $this->params = $this->converter->convert(file_get_contents('php://input'));
                    break;
                case 'OPTIONS':
                    self::CORS();
                    header('HTTP/1.1 200 OK');
                    die();
                    break;
                default:
                    header('HTTP/1.1 501 Not Implemented');
                    break;
            }
        }
    }

    /**
     * Verifica se é POST
     * @return bool
     */
    public function isPost()
    {
        $this->doParseParams();
        return 'POST' === $this->httpMethod;
    }

    public function getHttpMethod()
    {
        $this->doParseParams();
        return $this->httpMethod;
    }

    public static function CORS()
    {
        $origin = '*';
        if (isset($_SERVER['HTTP_ORIGIN'])) {
            $origin = $_SERVER['HTTP_ORIGIN'];
        }
        header('Access-Control-Allow-Origin: ' . $origin);
        header('Access-Control-Allow-Methods: POST, GET, PUT, PATCH, DELETE, OPTIONS');
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');
        header(
            'Access-Control-Allow-Headers: Authorization, X-Request-With, '.
            'X-HTTP-Method-Override, Content-Type, Accept'
        );
    }
}
