<?php

namespace DexterService\Models\Collection;

class ClienteTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldBeInstanceOfArrayObject()
    {
        $this->assertInstanceOf('\\ArrayObject', new \DexterService\Models\Collection\Cliente());
    }
}
