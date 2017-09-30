<?php

namespace DexterService\Models\Entity;

use DexterService\Models\TestProvider;

class ServicoTest extends \PHPUnit_Framework_TestCase
{

    use TestProvider;

    /**
     * @dataProvider providerForInt
     */
    public function testShouldGetSetId($int)
    {
        $servico = new Servico();
        $this->assertSame($servico, $servico->setId($int));
        $this->assertSame($int, $servico->getId());
    }

    /**
     * @dataProvider providerForString
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage ID tem que ser inteiro
     */
    public function testShouldNotGetSetId($notAnInt)
    {
        $servico = new Servico();
        $servico->setId($notAnInt);
    }

    /**
     * @dataProvider providerForImagens
     */
    public function testShouldGetSetImagem($imagem)
    {
        $servico = new Servico();
        $this->assertSame($servico, $servico->setImagem($imagem));
        $this->assertSame($imagem, $servico->getImagem());
    }

    /**
     * @dataProvider providerForString
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage IMAGEM deve ter extensão: jpg, jpeg, png ou gif
     */
    public function testShouldNotGetSetImagem($notAnImagem)
    {
        $servico = new Servico();
        $servico->setImagem($notAnImagem);
    }

    /**
     * @dataProvider providerForString
     */
    public function testShouldGetSetTitulo($string)
    {
        $servico = new Servico();
        $this->assertSame($servico, $servico->setTitulo($string));
        $this->assertSame($string, $servico->getTitulo());
    }

    /**
     * @dataProvider providerForBigString50
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage TITULO tem que ter no máximo 50 caracteres
     */
    public function testShouldNotGetSetTitulo($bigString)
    {
        $servico = new Servico();
        $servico->setTitulo($bigString);
    }

    /**
     * @dataProvider providerForString
     */
    public function testShouldGetSetDescricao($string)
    {
        $servico = new Servico();
        $this->assertSame($servico, $servico->setDescricao($string));
        $this->assertSame($string, $servico->getDescricao());
    }

    /**
     * @dataProvider providerYN
     */
    public function testShouldGetSetShowHome($showHome, $booleanValue)
    {
        $servico = new Servico();
        $this->assertSame($servico, $servico->setShowHome($showHome));
        $this->assertSame($booleanValue, $servico->getShowHome());
    }
}
