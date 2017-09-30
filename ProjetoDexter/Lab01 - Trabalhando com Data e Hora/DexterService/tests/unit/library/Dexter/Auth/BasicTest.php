<?php

namespace Dexter\Auth;

class BasicTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider aclValid
     */
    public function testShouldLoginWithoutCredentialsBecauseOfAcl($controller, $action)
    {
        $database = $this->getMockBuilder('\Dexter\Auth\Algo\Database')
            ->disableOriginalConstructor()
            ->getMock();
        $basic = new Basic($database, array());

        $this->assertTrue($basic->login($controller, $action));
    }

    public function testShouldPresentBasicWithInvalidCredentials()
    {
        $user = 'dexter';
        $pass = '654321';

        $database = $this->getMockBuilder('\Dexter\Auth\Algo\Database')
            ->disableOriginalConstructor()
            ->getMock();
        $basic = $this->getMockBuilder('\Dexter\Auth\Basic')
            ->setConstructorArgs(array(
                $database, array(
                    'PHP_AUTH_USER' => $user,
                    'PHP_AUTH_PW'   => $pass
                )
            ))
            ->setMethods(array('presentBasic'))
            ->getMock();

        $database->expects($this->once())
            ->method('login')
            ->with($this->equalTo($user), $this->equalTo($pass))
            ->will($this->throwException(new \InvalidArgumentException('error')));

        $basic->expects($this->once())
            ->method('presentBasic');

        $basic->login('SomeController', 'SomeAction');
    }

    public function testShouldPresentBasicWithNoUserSent()
    {
        $basic = $this->getMockBuilder('\Dexter\Auth\Basic')
            ->disableOriginalConstructor()
            ->setMethods(array('presentBasic'))
            ->getMock();

        $basic->expects($this->once())
            ->method('presentBasic');

        $basic->login('SomeController', 'SomeAction');
    }

    public function testShouldLoginSuccessfully()
    {
        $user = 'dexter';
        $pass = '123456';

        $database = $this->getMockBuilder('\Dexter\Auth\Algo\Database')
            ->disableOriginalConstructor()
            ->getMock();
        $basic = new Basic($database, array(
            'PHP_AUTH_USER' => $user,
            'PHP_AUTH_PW'   => $pass
        ));

        $database->expects($this->once())
            ->method('login')
            ->with($this->equalTo($user), $this->equalTo($pass));

        $basic->login('SomeController', 'SomeAction');
    }

    public function aclValid()
    {
        return array(
            array('BlablablaController', 'options'),
            array('BlablablaController', 'get'),
            array('ContatoController', 'post'),
            array('ClienteController', 'post')
        );
    }
}
