<?php

namespace Dexter\ContentNegotiation\Converters;

class Xml implements Converter
{
    public function decode($content)
    {
        // Lab 3 - Trabalhando com XML
        return json_decode(json_encode($xml), true);
    }

    public function encode($content)
    {
        // Lab 3 - Trabalhando com XML

        $arrayToXml = function ($content, &$xml) use (&$arrayToXml) {
            foreach ($content as $key => $value) {
                if (is_array($value)) {
                    if (!is_numeric($key)) {
                        $subnode = $xml->addChild((string) $key);
                        $arrayToXml($value, $subnode);
                    } else {
                        $subnode = $xml->addChild("item$key");
                        $arrayToXml($value, $subnode);
                    }
                } else {
                    $xml->addChild((string) $key, htmlspecialchars((string) $value));
                }
            }
        };

        $arrayToXml($content, $xml);

        // Lab 3 - Trabalhando com XML
    }
}
