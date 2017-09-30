<?php

namespace Dexter\Router;

class FrontControllerTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldRun()
    {
        $routerMock = $this->getMockBuilder('\\Dexter\\Router\\Router')
            ->disableOriginalConstructor()
            ->getMock();
        $dispatcherMock = $this->getMockBuilder('\\Dexter\\Router\\Dispatcher')
            ->disableOriginalConstructor()
            ->getMock();
        $requestMock = $this->getMockBuilder('\\Dexter\\Router\\Request')
            ->disableOriginalConstructor()
            ->getMock();
        $responseMock = $this->getMockBuilder('\\Dexter\\Router\\Response')
            ->disableOriginalConstructor()
            ->getMock();
        $routeMock = $this->getMockBuilder('\\Dexter\\Router\\Route')
            ->disableOriginalConstructor()
            ->getMock();

        // expects
        $routerMock->expects($this->once())
            ->method('route')
            ->with($this->equalTo($requestMock), $this->equalTo($responseMock))
            ->will($this->returnValue($routeMock));
        $dispatcherMock->expects($this->once())
            ->method('dispatch')
            ->with(
                $this->equalTo($routeMock),
                $this->equalTo($requestMock),
                $this->equalTo($responseMock)
            );

        // run
        $frontController = new \Dexter\Router\FrontController(
            $routerMock,
            $dispatcherMock
        );
        $frontController->run($requestMock, $responseMock);
    }
}
