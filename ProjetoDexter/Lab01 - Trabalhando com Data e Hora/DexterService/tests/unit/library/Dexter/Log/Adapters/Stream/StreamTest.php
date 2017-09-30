<?php

namespace Dexter\Log\Adapters\Stream;

class StreamTest extends \PHPUnit_Framework_TestCase
{
    private $stream;

    public function setUp()
    {
        $this->stream = new Stream();
    }

    public function testOpenAndClose()
    {
        $this->assertNull($this->stream->getFile());

        $this->stream->open('php://input', 'r');
        $this->assertInstanceOf('\SplFileObject', $this->stream->getFile());

        $this->stream->close();

        $this->assertNull($this->stream->getFile());
    }

    public function testWrite()
    {
        ob_start();
        $this->stream->open('php://output', 'w');
        $this->stream->write('hello!');

        $this->assertSame('hello!', ob_get_clean());
    }
}
