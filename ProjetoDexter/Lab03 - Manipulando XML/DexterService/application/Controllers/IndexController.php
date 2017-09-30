<?php

namespace DexterService\Controllers;

use Dexter\Router\RequestInterface;
use Dexter\Router\ResponseInterface;

class IndexController
{
    public function getAction(RequestInterface $request, ResponseInterface $response)
    {
        $response->setContent(array('message' => 'Hi! ' . $this->getName($request)));
    }

    public function postAction(RequestInterface $request, ResponseInterface $response)
    {
        $response->setContent(array('message' => 'Hi! ' . $this->getName($request)));
    }

    private function getName(RequestInterface $request)
    {
        $params = $request->getParams();
        $name = 'guest';
        if (isset($params['name'])) {
            $name = $params['name'];
        }
        return $name;
    }
}
