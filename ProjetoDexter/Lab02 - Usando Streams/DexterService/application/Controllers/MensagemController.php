<?php

namespace DexterService\Controllers;

use Dexter\Router\RequestInterface;
use Dexter\Router\ResponseInterface;
use DexterService\Models\Service;

class MensagemController
{

    private $service;

    public function getAction(RequestInterface $request, ResponseInterface $response)
    {
        if ($request->getParam('id')) {
            $response->setContent($this->getService()->getMensagem($request->getParam('id'))->toArray());
        } else {
            $response->setContent($this->getService()->getMensagens()->toArray());
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
            $this->service = new Service\Mensagem();
        }

        return $this->service;
    }

    public function setService(Service\Mensagem $service)
    {
        $this->service = $service;
        return $this;
    }
}
