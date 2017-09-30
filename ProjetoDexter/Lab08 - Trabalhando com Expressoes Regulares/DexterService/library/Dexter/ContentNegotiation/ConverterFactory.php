<?php

namespace Dexter\ContentNegotiation;

class ConverterFactory
{
    private static $map = array(
        'application/json' => 'Json',
        'application/xml'  => 'Xml'
    );

    public function create($format)
    {
        if (!isset(static::$map[$format])) {
            header('HTTP/1.1 406 Not Acceptable');
            die();
        }

        $class = __NAMESPACE__ . '\\Converters\\' . static::$map[$format];

        return new $class;
    }
}
