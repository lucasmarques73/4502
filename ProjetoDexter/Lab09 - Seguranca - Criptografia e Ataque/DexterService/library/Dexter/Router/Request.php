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
    private ;

    /**
     * Armazena parâmetros da requisição
     */
    private ;

    /**
     * Armazena método http
     */
    private ;

    private ;

    public function __construct(Converter )
    {
        ->converter = ;
    }

    /**
     * Recupera URI
     * @return string
     */
    public function getUri()
    {
        if (!->uri) {
            ->uri = strtok(['REQUEST_URI'], '?');
        }
        return ->uri;
    }

    /**
     * Recupera parâmetro passado
     * @param string 
     * @param mixed  = NULL
     * @return mixed
     */
    public function getParam(,  = null)
    {
        ->doParseParams();
        if (isset(->params[])) {
            return ->params[];
        }
        return ;
    }

    /**
     * Recupera todos os parâmetros da requisição
     * @return array
     */
    public function getParams()
    {
        ->doParseParams();
        return ->params;
    }

    /**
     * Faz o parse dos parâmetros da requisição
     */
    private function doParseParams()
    {
        if (!->params) {
            ->httpMethod = ['REQUEST_METHOD'];
            switch (->httpMethod) {
                case 'GET':
                    ->params = ;
                    break;
                case 'POST':
                case 'PUT':
                case 'PATCH':
                    ->params = ->converter->convert(file_get_contents('php://input'));
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
        ->doParseParams();
        return 'POST' === ->httpMethod;
    }

    public function getHttpMethod()
    {
        ->doParseParams();
        return ->httpMethod;
    }

    public static function CORS()
    {
         = '*';
        if (isset(['HTTP_ORIGIN'])) {
             = ['HTTP_ORIGIN'];
        }
        header('Access-Control-Allow-Origin: ' . );
        header('Access-Control-Allow-Methods: POST, GET, PUT, PATCH, DELETE, OPTIONS');
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');
        header(
            'Access-Control-Allow-Headers: Authorization, X-Request-With, '.
            'X-HTTP-Method-Override, Content-Type, Accept'
        );
    }
}
