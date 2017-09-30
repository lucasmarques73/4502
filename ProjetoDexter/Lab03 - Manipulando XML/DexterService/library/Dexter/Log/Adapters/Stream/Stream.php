<?php

namespace Dexter\Log\Adapters\Stream;

class Stream
{
    private $file;

    public function open($file, $mode = 'a')
    {
        $this->file = new \SplFileObject($file, $mode);
    }

    public function close()
    {
        $this->file = null;
    }

    public function write($data)
    {
        $this->file->fwrite($data);
    }

    public function getFile()
    {
        return $this->file;
    }
}
