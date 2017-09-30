<?php

namespace DexterService\Controllers;

class ServicoControllerTest extends \PHPUnit_Framework_TestCase
{

    private $service;
    private $controller;
    private $request;
    private $response;

    public function setUp()
    {
        $this->service = $this->getMockBuilder('\DexterService\Models\Service\Servico')
            ->disableOriginalConstructor()
            ->getMock();
        $this->controller = new ServicoController();
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
        $servico = $this->getMockBuilder('\DexterService\Models\Entity\Servico')
            ->disableOriginalConstructor()
            ->getMock();

        $this->request->expects($this->atLeastOnce())
            ->method('getParam')
            ->with($this->equalTo('id'))
            ->will($this->returnValue(1));
        $this->service->expects($this->once())
            ->method('getServico')
            ->with($this->equalTo(1))
            ->will($this->returnValue($servico));
        $servico->expects($this->once())
            ->method('toArray')
            ->will($this->returnValue($array = array(
                'titulo' => 'Titulo',
                'descricao' => 'Descricao',
                'imagem' => 'Imagem',
                'showHome' => 'Y'
            )));
        $this->response->expects($this->once())
            ->method('setContent')
            ->with($this->equalTo(array_merge($array, array('show_home' => 'Y'))));

        $this->controller->getAction($this->request, $this->response);
    }

    public function testGetActionWithoutId()
    {
        $servicos = $this->getMockBuilder('\DexterService\Models\Collection\Servico')
            ->disableOriginalConstructor()
            ->getMock();

        $this->request->expects($this->atLeastOnce())
            ->method('getParam')
            ->with($this->logicalOr($this->equalTo('id'), $this->equalTo('show_home'), $this->equalTo('all')))
            ->will($this->returnCallback(function ($param) {
                if ($param === 'show_home') {
                    return 'Y';
                }
            }));
        $this->service->expects($this->once())
            ->method('getServicos')
            ->with($this->equalTo('Y'))
            ->will($this->returnValue($servicos));
        $servicos->expects($this->once())
            ->method('toArray')
            ->will($this->returnValue($array = array(array(
                'titulo' => 'Titulo',
                'descricao' => 'Descricao',
                'imagem' => 'Imagem'
            ))));
        $this->response->expects($this->once())
            ->method('setContent')
            ->with($this->equalTo($array));

        $this->controller->getAction($this->request, $this->response);
    }

    public function testGetActionWithoutIdAndWithAll()
    {
        $servicos = $this->getMockBuilder('\DexterService\Models\Collection\Servico')
            ->disableOriginalConstructor()
            ->getMock();

        $this->request->expects($this->atLeastOnce())
            ->method('getParam')
            ->with($this->logicalOr($this->equalTo('id'), $this->equalTo('show_home'), $this->equalTo('all')))
            ->will($this->returnCallback(function ($param) {
                if ($param === 'all') {
                    return true;
                }
            }));
        $this->service->expects($this->once())
            ->method('getAllServicos')
            ->will($this->returnValue($servicos));
        $servicos->expects($this->once())
            ->method('toArray')
            ->will($this->returnValue($array = array(array(
                'titulo' => 'Titulo',
                'descricao' => 'Descricao',
                'imagem' => 'Imagem'
            ))));
        $this->response->expects($this->once())
            ->method('setContent')
            ->with($this->equalTo($array));

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
