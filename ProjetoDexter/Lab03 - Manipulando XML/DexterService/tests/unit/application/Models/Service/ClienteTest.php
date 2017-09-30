<?php

namespace DexterService\Models\Service;

use DexterService\Models\DataMapper;

class ClienteTest extends \PHPUnit_Framework_TestCase
{

    private $model;

    public function setUp()
    {
        $this->model = new Cliente();
    }

    public function testShouldGetSetClienteMapper()
    {
        $mapper = new DataMapper\Cliente();

        $this->assertSame($this->model, $this->model->setClienteMapper($mapper));
        $this->assertSame($mapper, $this->model->getClienteMapper());
    }

    public function testShouldGetDefaultClienteMapper()
    {
        $this->assertInstanceOf(
            'DexterService\\Models\\DataMapper\\Cliente',
            $this->model->getClienteMapper()
        );
    }

    public function testShouldInsert()
    {
        $dados = array(
            'nome'      => 'John',
            'cpf_cnpj'  => '123.456.789-00',
            'telefone'  => '(11) 1234-5678',
            'celular'   => '(11) 91234-5678',
            'email'     => 'teste@teste.com.br',
            'cep'       => '00000-000',
            'estado'    => 'SP',
            'bairro'    => 'Vila Teste',
            'endereco'  => 'Rua Teste',
            'cidade'    => 'São Paulo'
        );

        $mapperMock = $this->getMock('DexterService\\Models\\DataMapper\\Cliente');
        $mapperMock->expects($this->once())
            ->method('insert')
            ->with($this->equalTo(new \DexterService\Models\Entity\Cliente($dados)));

        $this->model->setClienteMapper($mapperMock);
        $this->model->save($dados);
    }

    public function testShouldUpdate()
    {
        $dados = array(
            'id'        => 1,
            'nome'      => 'John',
            'cpf_cnpj'  => '123.456.789-00',
            'telefone'  => '(11) 1234-5678',
            'celular'   => '(11) 91234-5678',
            'email'     => 'teste@teste.com.br',
            'cep'       => '00000-000',
            'estado'    => 'SP',
            'bairro'    => 'Vila Teste',
            'endereco'  => 'Rua Teste',
            'cidade'    => 'São Paulo'
        );

        $mapperMock = $this->getMock('DexterService\\Models\\DataMapper\\Cliente');
        $mapperMock->expects($this->once())
            ->method('update')
            ->with($this->equalTo(new \DexterService\Models\Entity\Cliente($dados)));

        $this->model->setClienteMapper($mapperMock);
        $this->model->save($dados);
    }

    public function testShouldGetClientes()
    {
        $dados = array(
            'id'        => 1,
            'nome'      => 'John',
            'cpf_cnpj'  => '123.456.789-00',
            'telefone'  => '(11) 1234-5678',
            'celular'   => '(11) 91234-5678',
            'email'     => 'teste@teste.com.br',
            'cep'       => '00000-000',
            'estado'    => 'SP',
            'bairro'    => 'Vila Teste',
            'endereco'  => 'Rua Teste',
            'cidade'    => 'São Paulo'
        );

        $mapperMock = $this->getMock('DexterService\\Models\\DataMapper\\Cliente');
        $mapperMock->expects($this->once())
            ->method('fetchAll')
            ->will($this->returnValue(array($dados)));

        $this->model->setClienteMapper($mapperMock);

        $result = $this->model->getClientes();

        $this->assertCount(1, $result);
        $this->assertSame(1, $result[0]->getId());
        $this->assertSame('John', $result[0]->getNome());
        $this->assertSame('teste@teste.com.br', $result[0]->getEmail());
    }

    public function testShouldGetCliente()
    {
        $dados = array(
            'id'        => 1,
            'nome'      => 'John',
            'cpf_cnpj'  => '123.456.789-00',
            'telefone'  => '(11) 1234-5678',
            'celular'   => '(11) 91234-5678',
            'email'     => 'teste@teste.com.br',
            'cep'       => '00000-000',
            'estado'    => 'SP',
            'bairro'    => 'Vila Teste',
            'endereco'  => 'Rua Teste',
            'cidade'    => 'São Paulo'
        );

        $mapperMock = $this->getMock('DexterService\\Models\\DataMapper\\Cliente');
        $mapperMock->expects($this->once())
            ->method('fetchById')
            ->with($this->equalTo(1))
            ->will($this->returnValue((object) $dados));

        $this->model->setClienteMapper($mapperMock);

        $result = $this->model->getCliente(1);

        $this->assertEquals(new \DexterService\Models\Entity\Cliente($dados), $result);
    }
}
