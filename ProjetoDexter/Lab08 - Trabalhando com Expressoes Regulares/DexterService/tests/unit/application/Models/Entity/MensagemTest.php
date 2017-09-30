<?php

namespace DexterService\Models\Entity;

use DexterService\Models\TestProvider;

class MensagemTest extends \PHPUnit_Framework_TestCase
{

    use TestProvider;

    /**
     * @dataProvider providerForInt
     */
    public function testShouldGetSetId($int)
    {
        $mensagem = new Mensagem();
        $this->assertSame($mensagem, $mensagem->setId($int));
        $this->assertSame($int, $mensagem->getId());
    }

    /**
     * @dataProvider providerForString
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage ID tem que ser inteiro
     */
    public function testShouldNotGetSetId($notAnInt)
    {
        $mensagem = new Mensagem();
        $mensagem->setId($notAnInt);
    }

    /**
     * @dataProvider providerForString
     */
    public function testShouldGetSetNome($string)
    {
        $mensagem = new Mensagem();
        $this->assertSame($mensagem, $mensagem->setNome($string));
        $this->assertSame($string, $mensagem->getNome());
    }

    /**
     * @dataProvider providerForBigString50
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage NOME não pode ser maior que 50 caracteres
     */
    public function testShouldNotGetSetNome($bigString)
    {
        $mensagem = new Mensagem();
        $mensagem->setNome($bigString);
    }

    /**
     * @dataProvider providerForEmail
     */
    public function testShouldGetSetEmail($email)
    {
        $mensagem = new Mensagem();
        $this->assertSame($mensagem, $mensagem->setEmail($email));
        $this->assertSame($email, $mensagem->getEmail());
    }

    /**
     * @dataProvider providerForString
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage EMAIL em formato inválido
     */
    public function testShouldNotGetSetEmail($notAnEmail)
    {
        $mensagem = new Mensagem();
        $mensagem->setEmail($notAnEmail);
    }

    /**
     * @dataProvider providerForString
     */
    public function testShouldGetSetAssunto($assunto)
    {
        $mensagem = new Mensagem();
        $this->assertSame($mensagem, $mensagem->setAssunto($assunto));
        $this->assertSame($assunto, $mensagem->getAssunto());
    }

    /**
     * @dataProvider providerForString
     */
    public function testShouldGetSetMensagem($msg)
    {
        $mensagem = new Mensagem();
        $this->assertSame($mensagem, $mensagem->setMensagem($msg));
        $this->assertSame($msg, $mensagem->getMensagem());
    }
}
