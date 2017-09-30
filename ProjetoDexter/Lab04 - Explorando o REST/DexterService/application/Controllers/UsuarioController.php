<?php

namespace DexterService\Controllers;

use Dexter\Router\RequestInterface;
use Dexter\Router\ResponseInterface;
use DexterService\Models\Service;

class UsuarioController
{

    private $service;

    public function getAction(RequestInterface $request, ResponseInterface $response)
    {
        if ($request->getParam('id')) {
            $response->setContent($this->getService()->getUser($request->getParam('id'))->toArray());
        } else {
            $response->setContent($this->getService()->getUsers()->toArray());
        }
    }

    public function postAction(RequestInterface $request, ResponseInterface $response)
    {
        try {
            $this->getService()->save($request->getParams());
        } catch (\Exception $e) {
            $response->setContent(array('error' => $e->getMessage()));
            $response->addHeader('500 Internal Server Error');
        }
    }

    public function patchAction(RequestInterface $request, ResponseInterface $response)
    {
        $this->postAction($request, $response);
    }

    public function getService()
    {
        if (!$this->service) {
            $this->service = new Service\User();
        }

        return $this->service;
    }

    public function setService(Service\User $service)
    {
        $this->service = $service;
        return $this;
    }
}
