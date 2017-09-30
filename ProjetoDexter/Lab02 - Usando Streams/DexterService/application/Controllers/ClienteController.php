<?php

namespace DexterService\Controllers;

use Dexter\Router\RequestInterface;
use Dexter\Router\ResponseInterface;
use DexterService\Models\Service;

class ClienteController
{

    private $service;

    public function getAction(RequestInterface $request, ResponseInterface $response)
    {
        if ($request->getParam('id')) {
            $user = $this->getService()->getCliente($request->getParam('id'))->toArray();
            $user['cpf_cnpj'] = $user['cpfCnpj'];
            $response->setContent($user);
        } else {
            $response->setContent($this->getService()->getClientes()->toArray());
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

    public function putAction(RequestInterface $request, ResponseInterface $response)
    {
        $this->postAction($request, $response);
    }

    public function getService()
    {
        if (!$this->service) {
            $this->service = new Service\Cliente();
        }

        return $this->service;
    }

    public function setService(Service\Cliente $service)
    {
        $this->service = $service;
        return $this;
    }
}
