<?php

namespace DexterService\Models\DataMapper;

class DestaqueTest extends \PHPUnit_Framework_TestCase
{

    private $dbMock;
    private $mapper;

    public function setUp()
    {
        $this->mapper = new Destaque();
        $this->dbMock = $this->getMockBuilder('\\Dexter\\Db\\Conn')
            ->disableOriginalConstructor()
            ->setMethods(array('doConnect', 'fetchAll', 'insert', 'update'))
            ->getMock();

        $this->mapper->setDb($this->dbMock);
    }

    public function testShouldFetchAll()
    {
        $this->dbMock->expects($this->once())
            ->method('fetchAll')
            ->with($this->equalTo('SELECT * FROM banner'))
            ->will($this->returnValue($expected = new \stdClass()));

        $this->assertSame($expected, $this->mapper->fetchAll());
    }

    public function testShouldFetchById()
    {
        $this->dbMock->expects($this->once())
            ->method('fetchAll')
            ->with(
                $this->equalTo('SELECT * FROM banner WHERE id = ?'),
                $this->equalTo(array(1))
            )
            ->will($this->returnValue(array($expected = new \stdClass())));

        $result = $this->mapper->fetchById(1);

        $this->assertSame($expected, $result);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testShouldFetchByIdThrowingNotFoundException()
    {
        $this->dbMock->expects($this->once())
            ->method('fetchAll')
            ->will($this->returnValue(array()));
        $this->mapper->fetchById(1);
    }

    public function testShouldInsert()
    {
        $this->dbMock->expects($this->once())
            ->method('insert');
        $this->mapper->insert(new \DexterService\Models\Entity\Destaque());
    }

    public function testShouldUpdate()
    {
        $this->dbMock->expects($this->once())
            ->method('update');
        $this->mapper->update(new \DexterService\Models\Entity\Destaque());
    }
}
