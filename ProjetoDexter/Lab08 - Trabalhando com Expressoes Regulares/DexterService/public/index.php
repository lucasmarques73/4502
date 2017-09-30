<?php

require __DIR__ . '/../vendor/autoload.php';

use Dexter\Router\FrontController;
use Dexter\Router\Router;
use Dexter\Router\Dispatcher;
use Dexter\Router\Request;
use Dexter\Router\Response;
use Dexter\Router\DefaultRoute;
use Dexter\Db\Conn;
use Dexter\Db\Factory;
use Dexter\Auth\Basic;
use Dexter\Auth\Algo\Database;
use Dexter\ContentNegotiation\Converter;
use Dexter\ContentNegotiation\ConverterFactory;
use Dexter\ContentNegotiation\ContentType;
use Dexter\ContentNegotiation\Accept;

set_error_handler(function ($errno, $errstr, $errfile, $errline) {
    throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
});

Dexter\Router\Request::CORS();

$env = (getenv('APP_ENV')) ? getenv('APP_ENV') : 'live';

Conn::setConfig(parse_ini_file(__DIR__ . "/../application/configs/{$env}.ini", true));

$databaseAuth = new Database(Factory::getInstance()->getDb(), 'usuario', 'login', 'senha');
$router = (new Router())
    ->addRoute(new DefaultRoute(new Basic($databaseAuth, $_SERVER)));

# inicia front controller
$frontController = new FrontController(
    $router,
    new Dispatcher()
);

# roda front controller
$converterFactory = new ConverterFactory();
$contentType = new ContentType($_SERVER);

$accept = new Dexter\ContentNegotiation\Accept($_SERVER, array(
    'application/json',
    'application/xml'
));
try {
    $frontController->run(
        new Request(new Converter($contentType->getFormat(), $converterFactory, Converter::IN)),
        $response = new Response(new Converter($accept->getFormat(), $converterFactory, Converter::OUT))
    );
} catch (Exception $e) {
    header('HTTP/1.1 500 Internal Server Error');
    echo $e;
}

$response->send();
