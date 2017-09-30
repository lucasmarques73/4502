<?php

namespace Dexter\ContentNegotiation;

class ContentType
{
    private $server;

    public function __construct($server)
    {
        $this->server = $server;
    }

    public function getFormat()
    {
        if (isset($this->server['CONTENT_TYPE'])) {
            $parts = explode(';', $this->server['CONTENT_TYPE']);
            return $parts[0];
        }
    }
}
