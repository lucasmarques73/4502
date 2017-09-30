<?php

namespace DexterService\Controllers;

class ClienteControllerTest extends \PHPUnit_Framework_TestCase
{

    private $service;
    private $controller;
    private $request;
    private $response;

    public function setUp()
    {
        $this->service = $this->getMockBuilder('\DexterService\Models\Service\Cliente')
            ->disableOriginalConstructor()
            ->getMock();
        $this->controller = new ClienteController();
        $this->controller->setService($this->service);
        $this->request = $this->getMockBuilder('\Dexter\Router\Request')
            ->disableOriginalConstructor()
            ->getMock();
        $this->response = $this->getMockBuilder('\Dexter\Router\Response')
            ->disableOriginalConstructor()
            ->getMock();
    }

    public function testGetActionWithId()
    {
        $cliente = $this->getMockBuilder('\DexterService\Models\Entity\Cliente')
            ->disableOriginalConstructor()
            ->getMock();

        $this->request->expects($this->exactly(2))
            ->method('getParam')
            ->with($this->equalTo('id'))
            ->will($this->returnValue(1));
        $this->service->expects($this->once())
            ->method('getCliente')
            ->with($this->equalTo(1))
            ->will($this->returnValue($cliente));
        $cliente->expects($this->once())
            ->method('toArray')
            ->will($this->returnValue(array(
                'nome' => 'Joao',
                'cpfCnpj' => '123.456.789-00'
            )));
        $this->response->expects($this->once())
            ->method('setContent')
            ->with($this->equalTo(array(
                'nome' => 'Joao',
                'cpfCnpj' => '123.456.789-00',
                'cpf_cnpj' => '123.456.789-00'
            )));

        $this->controller->getAction($this->request, $this->response);
    }

    public function testGetActionWithoutId()
    {
        $clientes = $this->getMockBuilder('\DexterService\Models\Collection\Cliente')
            ->disableOriginalConstructor()
            ->getMock();

        $this->request->expects($this->once())
            ->method('getParam')
            ->with($this->equalTo('id'))
            ->will($this->returnValue(null));
        $this->service->expects($this->once())
            ->method('getClientes')
            ->will($this->returnValue($clientes));
        $clientes->expects($this->once())
            ->method('toArray')
            ->will($this->returnValue(array(array(
                'nome' => 'Joao',
                'cpfCnpj' => '123.456.789-00'
            ))));
        $this->response->expects($this->once())
            ->method('setContent')
            ->with($this->equalTo(array(array(
                'nome' => 'Joao',
                'cpfCnpj' => '123.456.789-00'
            ))));

        $this->controller->getAction($this->request, $this->response);
    }

    public function testPostAction()
    {
        $this->service->expects($this->once())
            ->method('save')
            ->with($this->equalTo(array(1, 2, 3, 4, 5)));
        $this->request->expects($this->once())
            ->method('getParams')
            ->will($this->returnValue(array(1, 2, 3, 4, 5)));

        $this->controller->postAction($this->request, $this->response);
    }

    public function testPutAction()
    {
        $this->service->expects($this->once())
            ->method('save')
            ->with($this->equalTo(array(1, 2, 3, 4, 5)));
        $this->request->expects($this->once())
            ->method('getParams')
            ->will($this->returnValue(array(1, 2, 3, 4, 5)));

        $this->controller->putAction($this->request, $this->response);
    }

    public function testPostActionWithError()
    {
        $this->service->expects($this->once())
            ->method('save')
            ->with($this->equalTo(array(1, 2, 3, 4, 5)))
            ->will($this->throwException(new \Exception('some error')));
        $this->request->expects($this->once())
            ->method('getParams')
            ->will($this->returnValue(array(1, 2, 3, 4, 5)));
        $this->response->expects($this->once())
            ->method('setContent')
            ->with($this->equalTo(array('error' => 'some error')));
        $this->response->expects($this->once())
            ->method('addHeader')
            ->with($this->equalTo('500 Internal Server Error'));

        $this->controller->postAction($this->request, $this->response);
    }

    public function testPutActionWithError()
    {
        $this->service->expects($this->once())
            ->method('save')
            ->with($this->equalTo(array(1, 2, 3, 4, 5)))
            ->will($this->throwException(new \Exception('some error')));
        $this->request->expects($this->once())
            ->method('getParams')
            ->will($this->returnValue(array(1, 2, 3, 4, 5)));
        $this->response->expects($this->once())
            ->method('setContent')
            ->with($this->equalTo(array('error' => 'some error')));
        $this->response->expects($this->once())
            ->method('addHeader')
            ->with($this->equalTo('500 Internal Server Error'));

        $this->controller->putAction($this->request, $this->response);
    }

    public function testShouldGetSetService()
    {
        $this->assertSame($this->controller, $this->controller->setService($this->service));
        $this->assertSame($this->service, $this->controller->getService());
    }
}
