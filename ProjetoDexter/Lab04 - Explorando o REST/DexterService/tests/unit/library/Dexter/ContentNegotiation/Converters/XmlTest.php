<?php

namespace Dexter\ContentNegotiation\Converters;

class XmlTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldDecode()
    {
        $xml = new Xml();
        $this->assertSame(array('k1' => 'v1'), $xml->decode('<root><k1>v1</k1></root>'));
    }

    public function testShouldEncode()
    {
        $xml = new Xml();
        $encoded = $xml->encode(array(
            'k1' => array(
                'k2' => array(
                    array(
                        'k3' => 'v3'
                    ),
                    array(
                        'k4' => 'v4'
                    )
                )
            )
        ));
        $expected = <<<'XML'
<?xml version="1.0"?>
<response><k1><k2><item0><k3>v3</k3></item0><item1><k4>v4</k4></item1></k2></k1></response>

XML;
        $this->assertSame($expected, $encoded);
    }
}
