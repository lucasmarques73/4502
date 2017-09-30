<?php

namespace DexterService\Models\Service;

use DexterService\Models\DataMapper;

class DestaqueTest extends \PHPUnit_Framework_TestCase
{

    private $model;

    public function setUp()
    {
        $this->model = new Destaque();
    }

    public function testShouldGetSetDestaqueMapper()
    {
        $mapper = new DataMapper\Destaque();

        $this->assertSame($this->model, $this->model->setDestaqueMapper($mapper));
        $this->assertSame($mapper, $this->model->getDestaqueMapper());
    }

    public function testShouldGetDefaultDestaqueMapper()
    {
        $this->assertInstanceOf(
            'DexterService\\Models\\DataMapper\\Destaque',
            $this->model->getDestaqueMapper()
        );
    }

    public function testShouldInsert()
    {
        $dados = array(
            'titulo'    => 'Titulo',
            'descricao' => 'Descrição',
            'imagem'    => 'imagem.jpg'
        );

        $mapperMock = $this->getMock('DexterService\\Models\\DataMapper\\Destaque');
        $mapperMock->expects($this->once())
            ->method('insert')
            ->with($this->equalTo(new \DexterService\Models\Entity\Destaque($dados)));

        $this->model->setDestaqueMapper($mapperMock);
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

        $mapperMock = $this->getMock('DexterService\\Models\\DataMapper\\Destaque');
        $mapperMock->expects($this->once())
            ->method('update')
            ->with($this->equalTo(new \DexterService\Models\Entity\Destaque($dados)));

        $this->model->setDestaqueMapper($mapperMock);
        $this->model->save($dados);
    }

    public function testShouldGetDestaques()
    {
        $dados = array(
            'id'        => 1,
            'titulo'    => 'Titulo',
            'descricao' => 'Descrição',
            'imagem'    => 'imagem.jpg'
        );

        $mapperMock = $this->getMock('DexterService\\Models\\DataMapper\\Destaque');
        $mapperMock->expects($this->once())
            ->method('fetchAll')
            ->will($this->returnValue(array((object) $dados)));

        $this->model->setDestaqueMapper($mapperMock);

        $result = $this->model->getDestaques();

        $this->assertCount(1, $result);
        $this->assertSame(1, $result[0]->getId());
        $this->assertSame('Titulo', $result[0]->getTitulo());
        $this->assertSame('Descrição', $result[0]->getDescricao());
    }

    public function testShouldGetDestaque()
    {
        $dados = array(
            'id'        => 1,
            'titulo'    => 'Titulo',
            'descricao' => 'Descrição',
            'imagem'    => 'imagem.jpg'
        );

        $mapperMock = $this->getMock('DexterService\\Models\\DataMapper\\Destaque');
        $mapperMock->expects($this->once())
            ->method('fetchById')
            ->with($this->equalTo(1))
            ->will($this->returnValue((object) $dados));

        $this->model->setDestaqueMapper($mapperMock);

        $result = $this->model->getDestaque(1);

        $this->assertEquals(new \DexterService\Models\Entity\Destaque($dados), $result);
    }
}
