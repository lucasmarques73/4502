<?php

namespace Dexter\Log\Adapters;

class StreamTest extends \PHPUnit_Framework_TestCase
{
    public function testWrite()
    {
        $file = 'file.txt';
        $mode = 'w';
        $data = 'something to write';

        $stream = $this->getMock('\Dexter\Log\Adapters\Stream\Stream');

        $stream->expects($this->once())
            ->method('open')
            ->with($this->equalTo($file), $this->equalTo($mode));
        $stream->expects($this->once())
            ->method('write')
            ->with($this->equalTo($data));
        $stream->expects($this->once())
            ->method('close');

        $adapter = new Stream($file, $mode, $stream);

        $adapter->write($data);
    }
}
