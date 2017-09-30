<?php

namespace DexterService\Controllers;

use Dexter\Router\RequestInterface;
use Dexter\Router\ResponseInterface;
use DexterService\Models\Service;

class ContatoController
{

    private $service;

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
