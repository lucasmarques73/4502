<?php

namespace DexterService\Controllers;

use Dexter\Router\RequestInterface;
use Dexter\Router\ResponseInterface;
use DexterService\Models\Service;

class EstadoController
{

    private $service;

    public function getAction(RequestInterface $request, ResponseInterface $response)
    {
        $response->setContent($this->getService()->getEstados());
    }

    public function getService()
    {
        if (!$this->service) {
            $this->service = new Service\Estado();
        }

        return $this->service;
    }

    public function setService(Service\Estado $service)
    {
        $this->service = $service;
        return $this;
    }
}
