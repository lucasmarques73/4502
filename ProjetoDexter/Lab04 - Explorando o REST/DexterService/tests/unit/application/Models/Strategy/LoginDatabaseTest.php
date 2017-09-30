<?php

namespace DexterService\Models\Strategy;

class LoginDatabaseTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldLogin()
    {
        $login = 'dexter';
        $senha = '123456';

        $loginStrategy = new \DexterService\Models\Strategy\LoginDatabase();
        $dbMock = $this->getMockBuilder('\\Dexter\\Db\\Conn')
            ->setMethods(array('doConnect', 'fetchAll'))
            ->disableOriginalConstructor()
            ->getMock();

        $dbMock->expects($this->once())
            ->method('doConnect');
        $dbMock->expects($this->once())
            ->method('fetchAll')
            ->with(
                $this->equalTo('SELECT * FROM usuario WHERE login = ? AND senha = ?'),
                $this->equalTo(array($login, md5($senha)))
            )
            ->will($this->returnValue(array(1)));

        $loginStrategy->setDb($dbMock);

        $loginStrategy->login($login, $senha);
    }

    /**
     * @expectedException \DexterService\Models\Exceptions\InvalidUserOrPasswordException
     * @expectedExceptionMessage Usuário e/ou senha inválidos
     */
    public function testShouldNotLogin()
    {
        $login = 'dexter';
        $senha = '123456';

        $loginStrategy = new \DexterService\Models\Strategy\LoginDatabase();
        $dbMock = $this->getMockBuilder('\\Dexter\\Db\\Conn')
            ->setMethods(array('doConnect', 'fetchAll'))
            ->disableOriginalConstructor()
            ->getMock();

        $dbMock->expects($this->once())
            ->method('doConnect');
        $dbMock->expects($this->once())
            ->method('fetchAll')
            ->with(
                $this->equalTo('SELECT * FROM usuario WHERE login = ? AND senha = ?'),
                $this->equalTo(array($login, md5($senha)))
            )
            ->will($this->returnValue(array()));

        $loginStrategy->setDb($dbMock);

        $loginStrategy->login($login, $senha);
    }

    public function testShouldGetDefaultDatabase()
    {
        $loginStrategy = new \DexterService\Models\Strategy\LoginDatabase();
        $this->assertInstanceOf('\\Dexter\\Db\\Conn', $loginStrategy->getDb());
    }
}
