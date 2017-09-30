<?php

namespace DexterService\Controllers;

use Dexter\Router\RequestInterface;
use Dexter\Router\ResponseInterface;
use DexterService\Models\Service;

class ServicoController
{

    private $service;

    public function getAction(RequestInterface $request, ResponseInterface $response)
    {
        if ($request->getParam('id')) {
            $servico = $this->getService()->getServico($request->getParam('id'))->toArray();
            $servico['show_home'] = ($servico['showHome']) ? 'Y' : 'N';
            $response->setContent($servico);
        } else {
            $method = 'getServicos';
            if ($request->getParam('all')) {
                $method = 'getAllServicos';
            }
            $response->setContent($this->getService()->$method($request->getParam('show_home', 'Y'))->toArray());
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
            $this->service = new Service\Servico();
        }

        return $this->service;
    }

    public function setService(Service\Servico $service)
    {
        $this->service = $service;
        return $this;
    }
}
