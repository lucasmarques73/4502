<?php

namespace DexterService\Models\Entity;

use DexterService\Models\TestProvider;

class UserTest extends \PHPUnit_Framework_TestCase
{

    use TestProvider;

    /**
     * @dataProvider providerForInt
     */
    public function testShouldGetSetId($int)
    {
        $user = new User();
        $this->assertSame($user, $user->setId($int));
        $this->assertSame($int, $user->getId());
    }

    /**
     * @dataProvider providerForString
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage ID deve ser inteiro
     */
    public function testShouldNotGetSetId($notAnInt)
    {
        $user = new User();
        $user->setId($notAnInt);
    }

    /**
     * @dataProvider providerForString
     */
    public function testShouldGetSetLogin($string)
    {
        $user = new User();
        $this->assertSame($user, $user->setLogin($string));
        $this->assertSame($string, $user->getLogin());
    }

    /**
     * @dataProvider providerForString
     */
    public function testShouldGetSetSenha($string)
    {
        $user = new User();
        $this->assertSame($user, $user->setSenha($string));
        $this->assertSame($string, $user->getSenha());
    }
}
