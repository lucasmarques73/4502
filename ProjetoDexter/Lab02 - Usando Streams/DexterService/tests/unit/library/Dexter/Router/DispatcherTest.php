<?php

namespace Dexter\Router;

class DispatcherTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldDispatch()
    {
        $dispatcher = new \Dexter\Router\Dispatcher();

        $routeMock = $this->getMockBuilder('\\Dexter\\Router\\Route')
            ->disableOriginalConstructor()
            ->getMock();
        $reqMock = $this->getMockBuilder('\\Dexter\\Router\\Request')
            ->disableOriginalConstructor()
            ->getMock();
        $responseMock = $this->getMockBuilder('\\Dexter\\Router\\Response')
            ->disableOriginalConstructor()
            ->getMock();

        $routeMock->expects($this->once())
            ->method('run')
            ->with($this->equalTo(array($reqMock, $responseMock)));

        $dispatcher->dispatch($routeMock, $reqMock, $responseMock);
    }
}
