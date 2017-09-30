<?php

namespace Dexter\Auth\Algo;

class DatabaseTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldLoginSuccessfully()
    {
        $user = 'dexter';
        $pass = '123456';
        $hash = '$2y$10$jYnXXKgiET8JZXc7pEfGf.5H0o59Ql9N1tx8xx05ejqDpWiUEsUfe';

        $conn = $this->getMockBuilder('\Dexter\Db\Conn')
            ->disableOriginalConstructor()
            ->getMock();
        $database = new Database($conn, 'tabela', 'usuario', 'senha');

        $conn->expects($this->once())
            ->method('__call')
            ->with(
                $this->equalTo('fetchAll'),
                $this->equalTo(array(
                    'SELECT senha FROM tabela WHERE usuario = ?',
                    array($user)
                ))
            )
            ->will($this->returnValue(array((object) array('senha' => $hash))));

        $database->login($user, $pass);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Usuário inválido
     */
    public function testShouldNotLogin()
    {
        $user = 'dexter';
        $pass = '654321';
        $hash = '$2y$10$jYnXXKgiET8JZXc7pEfGf.5H0o59Ql9N1tx8xx05ejqDpWiUEsUfe';

        $conn = $this->getMockBuilder('\Dexter\Db\Conn')
            ->disableOriginalConstructor()
            ->getMock();
        $database = new Database($conn, 'tabela', 'usuario', 'senha');

        $conn->expects($this->once())
            ->method('__call')
            ->with(
                $this->equalTo('fetchAll'),
                $this->equalTo(array(
                    'SELECT senha FROM tabela WHERE usuario = ?',
                    array($user)
                ))
            )
            ->will($this->returnValue(array((object) array('senha' => $hash))));

        $database->login($user, $pass);
    }
}
