<?php

namespace DexterService\Models\Exceptions;

class InvalidUserOrPasswordExceptionTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @expectedException \DexterService\Models\Exceptions\InvalidUserOrPasswordException
     * @expectedExceptionMessage teste
     */
    public function testShouldThrowAnException()
    {
        throw new \DexterService\Models\Exceptions\InvalidUserOrPasswordException('teste');
    }
}
