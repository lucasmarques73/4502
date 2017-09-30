<?php

namespace Dexter\ContentNegotiation\Converters;

interface Converter
{
    public function encode($content);
    public function decode($content);
}
