<?php

namespace Dexter\Router;

class RouterTest extends \PHPUnit_Framework_TestCase
{
    public function testAddRoute()
    {
        $router = new \Dexter\Router\Router();
        $route = $this->getMockBuilder('\\Dexter\\Router\\Route')
            ->disableOriginalConstructor()
            ->getMock();
        $this->assertSame($router, $router->addRoute($route));
        $this->assertSame(array($route), $router->getRoutes());
    }

    public function testAddRoutes()
    {
        $router = new \Dexter\Router\Router();
        $route = $this->getMockBuilder('\\Dexter\\Router\\Route')
            ->disableOriginalConstructor()
            ->getMock();
        $this->assertSame($router, $router->addRoutes(array($route)));
        $this->assertSame(array($route), $router->getRoutes());
    }

    public function testShouldRouterCorrectly()
    {
        $router = new \Dexter\Router\Router();

        $routeMock = $this->getMockBuilder('\\Dexter\\Router\\Route')
            ->disableOriginalConstructor()
            ->getMock();
        $requestMock = $this->getMockBuilder('\\Dexter\\Router\\Request')
            ->disableOriginalConstructor()
            ->getMock();
        $responseMock = $this->getMockBuilder('\\Dexter\\Router\\Response')
            ->disableOriginalConstructor()
            ->getMock();

        $routeMock->expects($this->once())
            ->method('match')
            ->with($this->equalTo($requestMock))
            ->will($this->returnValue(true));

        $router->addRoute($routeMock);
        $this->assertSame($routeMock, $router->route($requestMock, $responseMock));
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testShouldNotRouteAndSend404Exception()
    {
        $router = new \Dexter\Router\Router();

        $routeMock = $this->getMockBuilder('\\Dexter\\Router\\Route')
            ->disableOriginalConstructor()
            ->getMock();
        $requestMock = $this->getMockBuilder('\\Dexter\\Router\\Request')
            ->disableOriginalConstructor()
            ->getMock();
        $responseMock = $this->getMockBuilder('\\Dexter\\Router\\Response')
            ->disableOriginalConstructor()
            ->getMock();

        $routeMock->expects($this->once())
            ->method('match')
            ->with($this->equalTo($requestMock))
            ->will($this->returnValue(false));

        $responseMock->expects($this->once())
            ->method('addHeader')
            ->with($this->equalTo('404 Page not found'))
            ->will($this->returnValue($responseMock));
        $responseMock->expects($this->once())
            ->method('send');

        $router->addRoute($routeMock);
        $this->assertSame($routeMock, $router->route($requestMock, $responseMock));
    }
}
