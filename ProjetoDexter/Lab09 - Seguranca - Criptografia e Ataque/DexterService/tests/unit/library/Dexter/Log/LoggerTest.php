<?php

namespace Dexter\Log;

class LoggerTest extends \PHPUnit_Framework_TestCase
{
    private $logger;
    private $adapter;

    public function setUp()
    {
        $this->logger   = new Logger();
        $this->adapter  = $this->getMockBuilder('\Dexter\Log\Adapters\Stream')
            ->disableOriginalConstructor()
            ->getMock();
    }

    public function testAddAdapter()
    {
        $this->assertSame($this->logger, $this->logger->addAdapter($this->adapter));
    }

    public function testLog()
    {
        $this->adapter->expects($this->once())
            ->method('write')
            ->with($this->equalTo('hello!'));

        $log = $this->getMockBuilder('\Dexter\Log\Log')
            ->disableOriginalConstructor()
            ->getMock();
        $log->expects($this->once())
            ->method('__toString')
            ->will($this->returnValue('hello!'));

        $this->logger
             ->addAdapter($this->adapter)
             ->log($log);
    }
}
