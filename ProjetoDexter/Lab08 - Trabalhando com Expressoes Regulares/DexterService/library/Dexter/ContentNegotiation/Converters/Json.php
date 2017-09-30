<?php

namespace Dexter\ContentNegotiation\Converters;

class Json implements Converter
{
    public function decode($content)
    {
        return json_decode($content, true);
    }

    public function encode($content)
    {
        return json_encode($content);
    }
}
