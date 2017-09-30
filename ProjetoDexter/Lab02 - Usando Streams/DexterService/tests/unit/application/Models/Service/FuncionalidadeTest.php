<?php

namespace DexterService\Models\Service;

use DexterService\Models\DataMapper;

class FuncionalidadeTest extends \PHPUnit_Framework_TestCase
{

    private $model;

    public function setUp()
    {
        $this->model = new Funcionalidade();
    }

    public function testShouldGetSetFuncionalidadeMapper()
    {
        $mapper = new DataMapper\Funcionalidade();

        $this->assertSame($this->model, $this->model->setFuncionalidadeMapper($mapper));
        $this->assertSame($mapper, $this->model->getFuncionalidadeMapper());
    }

    public function testShouldGetDefaultFuncionalidadeMapper()
    {
        $this->assertInstanceOf(
            'DexterService\\Models\\DataMapper\\Funcionalidade',
            $this->model->getFuncionalidadeMapper()
        );
    }

    public function testShouldInsert()
    {
        $dados = array(
            'titulo'    => 'Titulo',
            'descricao' => 'Descrição',
            'imagem'    => 'imagem.jpg'
        );

        $mapperMock = $this->getMock('DexterService\\Models\\DataMapper\\Funcionalidade');
        $mapperMock->expects($this->once())
            ->method('insert')
            ->with($this->equalTo(new \DexterService\Models\Entity\Funcionalidade($dados)));

        $this->model->setFuncionalidadeMapper($mapperMock);
        $this->model->save($dados);
    }

    public function testShouldUpdate()
    {
        $dados = array(
            'id'        => 1,
            'titulo'    => 'Titulo',
            'descricao' => 'Descrição',
            'imagem'    => 'imagem.jpg'
        );

        $mapperMock = $this->getMock('DexterService\\Models\\DataMapper\\Funcionalidade');
        $mapperMock->expects($this->once())
            ->method('update')
            ->with($this->equalTo(new \DexterService\Models\Entity\Funcionalidade($dados)));

        $this->model->setFuncionalidadeMapper($mapperMock);
        $this->model->save($dados);
    }

    public function testShouldGetFuncionalidades()
    {
        $dados = array(
            'id'        => 1,
            'titulo'    => 'Titulo',
            'descricao' => 'Descrição',
            'imagem'    => 'imagem.jpg'
        );

        $mapperMock = $this->getMock('DexterService\\Models\\DataMapper\\Funcionalidade');
        $mapperMock->expects($this->once())
            ->method('fetchAll')
            ->will($this->returnValue(array((object) $dados)));

        $this->model->setFuncionalidadeMapper($mapperMock);

        $result = $this->model->getFuncionalidades();

        $this->assertCount(1, $result);
        $this->assertSame(1, $result[0]->getId());
        $this->assertSame('Titulo', $result[0]->getTitulo());
        $this->assertSame('Descrição', $result[0]->getDescricao());
    }

    public function testShouldGetFuncionalidade()
    {
        $dados = array(
            'id'        => 1,
            'titulo'    => 'Titulo',
            'descricao' => 'Descrição',
            'imagem'    => 'imagem.jpg'
        );

        $mapperMock = $this->getMock('DexterService\\Models\\DataMapper\\Funcionalidade');
        $mapperMock->expects($this->once())
            ->method('fetchById')
            ->with($this->equalTo(1))
            ->will($this->returnValue((object) $dados));

        $this->model->setFuncionalidadeMapper($mapperMock);

        $result = $this->model->getFuncionalidade(1);

        $this->assertEquals(new \DexterService\Models\Entity\Funcionalidade($dados), $result);
    }
}
