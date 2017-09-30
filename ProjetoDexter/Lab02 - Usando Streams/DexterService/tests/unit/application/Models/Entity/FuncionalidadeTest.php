<?php

namespace DexterService\Models\Entity;

use DexterService\Models\TestProvider;

class FuncionalidadeTest extends \PHPUnit_Framework_TestCase
{

    use TestProvider;

    /**
     * @dataProvider providerForInt
     */
    public function testShouldGetSetId($int)
    {
        $funcionalidade = new Funcionalidade();
        $this->assertSame($funcionalidade, $funcionalidade->setId($int));
        $this->assertSame($int, $funcionalidade->getId());
    }

    /**
     * @dataProvider providerForString
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage ID tem que ser inteiro
     */
    public function testShouldNotGetSetId($notAnInt)
    {
        $funcionalidade = new Funcionalidade();
        $funcionalidade->setId($notAnInt);
    }

    /**
     * @dataProvider providerForImagens
     */
    public function testShouldGetSetImagem($imagem)
    {
        $funcionalidade = new Funcionalidade();
        $this->assertSame($funcionalidade, $funcionalidade->setImagem($imagem));
        $this->assertSame($imagem, $funcionalidade->getImagem());
    }

    /**
     * @dataProvider providerForString
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage IMAGEM deve ter extensão: jpg, jpeg, png ou gif
     */
    public function testShouldNotGetSetImagem($notAnImagem)
    {
        $funcionalidade = new Funcionalidade();
        $funcionalidade->setImagem($notAnImagem);
    }

    /**
     * @dataProvider providerForString
     */
    public function testShouldGetSetTitulo($string)
    {
        $funcionalidade = new Funcionalidade();
        $this->assertSame($funcionalidade, $funcionalidade->setTitulo($string));
        $this->assertSame($string, $funcionalidade->getTitulo());
    }

    /**
     * @dataProvider providerForBigString50
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage TITULO tem que ter no máximo 50 caracteres
     */
    public function testShouldNotGetSetTitulo($bigString)
    {
        $funcionalidade = new Funcionalidade();
        $funcionalidade->setTitulo($bigString);
    }

    /**
     * @dataProvider providerForString
     */
    public function testShouldGetSetDescricao($string)
    {
        $funcionalidade = new Funcionalidade();
        $this->assertSame($funcionalidade, $funcionalidade->setDescricao($string));
        $this->assertSame($string, $funcionalidade->getDescricao());
    }
}
