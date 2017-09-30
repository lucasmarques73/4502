<?php

namespace Dexter\Router;

class RouteTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldMatch()
    {
        $route = new \Dexter\Router\Route("@/[a-z]{4}@", function() {
            echo 'do something here!';
        });

        $requestMock = $this->getMockBuilder('\\Dexter\\Router\\Request')
            ->disableOriginalConstructor()
            ->getMock();

        $requestMock->expects($this->once())
            ->method('getUri')
            ->will($this->returnValue('/abcd'));

        $this->assertTrue($route->match($requestMock));
    }

    public function testShouldRun()
    {
        $route = new \Dexter\Router\Route("@/([a-z]{4})@", function ($param) {
            return "Hello {$param}!";
        });

        $requestMock = $this->getMockBuilder('\\Dexter\\Router\\Request')
            ->disableOriginalConstructor()
            ->getMock();

        $requestMock->expects($this->once())
            ->method('getUri')
            ->will($this->returnValue('/john'));

        $route->match($requestMock);
        $this->assertSame('Hello john!', $route->run($route->argsUrl));
    }
}
