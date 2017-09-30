<?php

namespace DexterService\Models\Entity;

use DexterService\Models\TestProvider;

class ClienteTest extends \PHPUnit_Framework_TestCase
{

    use TestProvider;

    /**
     * @dataProvider providerForInt
     */
    public function testShouldGetSetId($int)
    {
        $cliente = new Cliente();
        $this->assertSame($cliente, $cliente->setId($int));
        $this->assertSame($int, $cliente->getId());
    }

    /**
     * @dataProvider providerForString
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage ID tem que ser inteiro
     */
    public function testShouldNotGetSetId($notAnInt)
    {
        $cliente = new Cliente();
        $cliente->setId($notAnInt);
    }

    /**
     * @dataProvider providerForString
     */
    public function testShouldGetSetNome($string)
    {
        $cliente = new Cliente();
        $this->assertSame($cliente, $cliente->setNome($string));
        $this->assertSame($string, $cliente->getNome());
    }

    /**
     * @dataProvider providerForBigString50
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage NOME não pode ser maior que 50 caracteres
     */
    public function testShouldNotGetSetNome($bigString)
    {
        $cliente = new Cliente();
        $cliente->setNome($bigString);
    }

    /**
     * @dataProvider providerForString
     */
    public function testShouldGetSetCpfCnpj($string)
    {
        $cliente = new Cliente();
        $this->assertSame($cliente, $cliente->setCpfCnpj($string));
        $this->assertSame($string, $cliente->getCpfCnpj());
    }

    /**
     * @dataProvider providerForTelefone
     */
    public function testShouldGetSetTelefone($telefone)
    {
        $cliente = new Cliente();
        $this->assertSame($cliente, $cliente->setTelefone($telefone));
        $this->assertSame($telefone, $cliente->getTelefone());
    }

    /**
     * @dataProvider providerForString
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage TELEFONE com tamanho inválido
     */
    public function testShouldNotGetSetTelefone($notATelefone)
    {
        $cliente = new Cliente();
        $cliente->setTelefone($notATelefone);
    }

    /**
     * @dataProvider providerForCelular
     */
    public function testShouldGetSetCelular($celular)
    {
        $cliente = new Cliente();
        $this->assertSame($cliente, $cliente->setCelular($celular));
        $this->assertSame($celular, $cliente->getCelular());
    }

    /**
     * @dataProvider providerForString
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage CELULAR com tamanho inválido
     */
    public function testShouldNotGetSetCelular($notACelular)
    {
        $cliente = new Cliente();
        $cliente->setCelular($notACelular);
    }

    /**
     * @dataProvider providerForEmail
     */
    public function testShouldGetSetEmail($email)
    {
        $cliente = new Cliente();
        $this->assertSame($cliente, $cliente->setEmail($email));
        $this->assertSame($email, $cliente->getEmail());
    }

    /**
     * @dataProvider providerForString
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage EMAIL em formato inválido
     */
    public function testShouldNotGetSetEmail($notAnEmail)
    {
        $cliente = new Cliente();
        $cliente->setEmail($notAnEmail);
    }

    /**
     * @dataProvider providerForCep
     */
    public function testShouldGetSetCep($cep)
    {
        $cliente = new Cliente();
        $this->assertSame($cliente, $cliente->setCep($cep));
        $this->assertSame($cep, $cliente->getCep());
    }

    /**
     * @dataProvider providerForString
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage CEP em formato inválido
     */
    public function testShouldNotGetSetCep($notACep)
    {
        $cliente = new Cliente();
        $cliente->setCep($notACep);
    }

    /**
     * @dataProvider providerForEstado
     */
    public function testShouldGetSetEstado($estado)
    {
        $cliente = new Cliente();
        $this->assertSame($cliente, $cliente->setEstado($estado));
        $this->assertSame($estado, $cliente->getEstado());
    }

    /**
     * @dataProvider providerForString
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage ESTADO com tamanho inválido
     */
    public function testShouldNotGetSetEstado($notAnEstado)
    {
        $cliente = new Cliente();
        $cliente->setEstado($notAnEstado);
    }

    /**
     * @dataProvider providerForString
     */
    public function testShouldGetSetBairro($bairro)
    {
        $cliente = new Cliente();
        $this->assertSame($cliente, $cliente->setBairro($bairro));
        $this->assertSame($bairro, $cliente->getBairro());
    }

    /**
     * @dataProvider providerForString
     */
    public function testShouldGetSetEndereco($endereco)
    {
        $cliente = new Cliente();
        $this->assertSame($cliente, $cliente->setEndereco($endereco));
        $this->assertSame($endereco, $cliente->getEndereco());
    }

    /**
     * @dataProvider providerForString
     */
    public function testShouldGetSetCidade($cidade)
    {
        $cliente = new Cliente();
        $this->assertSame($cliente, $cliente->setCidade($cidade));
        $this->assertSame($cidade, $cliente->getCidade());
    }
}
