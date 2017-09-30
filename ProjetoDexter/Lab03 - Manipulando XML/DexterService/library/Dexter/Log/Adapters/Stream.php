<?php

namespace Dexter\Log\Adapters;

class Stream implements Adapter
{
    private $file;
    private $mode;

    public function __construct($file, $mode = 'a', Stream\Stream $stream = null)
    {
        $this->file     = $file;
        $this->mode     = $mode;
        $this->stream   = $stream;
    }

    public function write($data)
    {
        $stream = ($this->stream) ? $this->stream : new Stream\Stream();
        $stream->open($this->file, $this->mode);
        $stream->write($data);
        $stream->close();
    }
}
