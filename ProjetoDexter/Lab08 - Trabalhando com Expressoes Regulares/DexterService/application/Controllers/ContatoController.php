<?php

namespace DexterService\Controllers;

use Dexter\Router\RequestInterface;
use Dexter\Router\ResponseInterface;
use DexterService\Models\Service;

class ContatoController
{

    private $service;

    public function postAction(RequestInterface $request, ResponseInterface $response)
    {
        try {
            $this->getService()->save($request->getParams());
        } catch (\Exception $e) {
            $response->setContent(array('error' => $e->getMessage()));
            $response->addHeader('500 Internal Server Error');
        }
    }

    public function getService()
    {
        if (!$this->service) {
            $this->service = new Service\Contato();
        }

        return $this->service;
    }

    public function setService(Service\Contato $service)
    {
        $this->service = $service;
        return $this;
    }
}
