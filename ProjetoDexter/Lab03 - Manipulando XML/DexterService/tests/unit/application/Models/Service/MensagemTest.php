<?php

namespace DexterService\Models\Service;

use DexterService\Models\DataMapper;

class MensagemTest extends \PHPUnit_Framework_TestCase
{

    private $model;

    public function setUp()
    {
        $this->model = new Mensagem();
    }

    public function testShouldGetSetMensagemMapper()
    {
        $mapper = new DataMapper\Mensagem();

        $this->assertSame($this->model, $this->model->setMensagemMapper($mapper));
        $this->assertSame($mapper, $this->model->getMensagemMapper());
    }

    public function testShouldGetDefaultMensagemMapper()
    {
        $this->assertInstanceOf(
            'DexterService\\Models\\DataMapper\\Mensagem',
            $this->model->getMensagemMapper()
        );
    }

    public function testShouldInsert()
    {
        $dados = array(
            'nome'      => 'Nome',
            'email'     => 'teste@teste.com.br',
            'assunto'   => 'Assunto',
            'mensagem'  => 'Mensagem'
        );

        $mapperMock = $this->getMock('DexterService\\Models\\DataMapper\\Mensagem');
        $mapperMock->expects($this->once())
            ->method('insert')
            ->with($this->equalTo(new \DexterService\Models\Entity\Mensagem($dados)));

        $this->model->setMensagemMapper($mapperMock);
        $this->model->save($dados);
    }

    public function testShouldUpdate()
    {
        $dados = array(
            'id'        => 1,
            'nome'      => 'Nome',
            'email'     => 'teste@teste.com.br',
            'assunto'   => 'Assunto',
            'mensagem'  => 'Mensagem'
        );

        $mapperMock = $this->getMock('DexterService\\Models\\DataMapper\\Mensagem');
        $mapperMock->expects($this->once())
            ->method('update')
            ->with($this->equalTo(new \DexterService\Models\Entity\Mensagem($dados)));

        $this->model->setMensagemMapper($mapperMock);
        $this->model->save($dados);
    }

    public function testShouldGetMensagens()
    {
        $dados = array(
            'id'        => 1,
            'nome'      => 'Nome',
            'email'     => 'teste@teste.com.br',
            'assunto'   => 'Assunto',
            'mensagem'  => 'Mensagem'
        );

        $mapperMock = $this->getMock('DexterService\\Models\\DataMapper\\Mensagem');
        $mapperMock->expects($this->once())
            ->method('fetchAll')
            ->will($this->returnValue(array((object) $dados)));

        $this->model->setMensagemMapper($mapperMock);

        $result = $this->model->getMensagens();

        $this->assertCount(1, $result);
        $this->assertSame(1, $result[0]->getId());
        $this->assertSame('Nome', $result[0]->getNome());
        $this->assertSame('teste@teste.com.br', $result[0]->getEmail());
    }

    public function testShouldgetMensagem()
    {
        $dados = array(
            'id'        => 1,
            'nome'      => 'Nome',
            'email'     => 'teste@teste.com.br',
            'assunto'   => 'Assunto',
            'mensagem'  => 'Mensagem'
        );

        $mapperMock = $this->getMock('DexterService\\Models\\DataMapper\\Mensagem');
        $mapperMock->expects($this->once())
            ->method('fetchById')
            ->with($this->equalTo(1))
            ->will($this->returnValue((object) $dados));

        $this->model->setMensagemMapper($mapperMock);

        $result = $this->model->getMensagem(1);

        $this->assertEquals(new \DexterService\Models\Entity\Mensagem($dados), $result);
    }
}
