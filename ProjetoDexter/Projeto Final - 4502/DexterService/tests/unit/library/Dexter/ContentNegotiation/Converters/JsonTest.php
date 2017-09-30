<?php

namespace Dexter\ContentNegotiation\Converters;

class JsonTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldEncode()
    {
        $json = new Json();
        $this->assertSame('[1,2,3,4,5]', $json->encode(array(1, 2, 3, 4, 5)));
    }

    public function testShouldDecode()
    {
        $json = new Json();
        $this->assertSame(array(1, 2, 3, 4, 5), $json->decode('[1,2,3,4,5]'));
    }
}
