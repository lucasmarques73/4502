<?php

namespace DexterService\Models\Service;

use DexterService\Models\DataMapper;

class UserTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldGetUserById()
    {
        $model = new User();

        $data = array(
            'id' => 1,
            'login' => 'dexter'
        );

        $mapperMock = $this->getMock('DexterService\\Models\\DataMapper\\User');
        $mapperMock->expects($this->once())
            ->method('fetchById')
            ->with($this->equalTo(1))
            ->will($this->returnValue((object) $data));

        $expected = new \DexterService\Models\Entity\User($data);

        $model->setUserMapper($mapperMock);

        $user = $model->getUser(1);
        $this->assertEquals($expected, $user);
    }

    public function testShouldGetAllUsers()
    {
        $model = new User();

        $data = array(
            (object) array(
                'id' => 1,
                'login' => 'dexter',
                'senha' => '123456'
            )
        );

        $mapperMock = $this->getMock('DexterService\\Models\\DataMapper\\User');
        $mapperMock->expects($this->once())
            ->method('fetchAll')
            ->will($this->returnValue($data));

        $expected = new \DexterService\Models\Collection\User();
        $expected[] = new \DexterService\Models\Entity\User((array) $data[0]);

        $model->setUserMapper($mapperMock);

        $userCollection = $model->getUsers();
        $this->assertEquals($expected, $userCollection);
    }

    public function testShouldGetSetUserMapper()
    {
        $model = new User();
        $mapperMock = $this->getMock('DexterService\\Models\\DataMapper\\User');

        $this->assertSame($model, $model->setUserMapper($mapperMock));
        $this->assertSame($mapperMock, $model->getUserMapper());
    }

    public function testShouldGetDefaultUserMapper()
    {
        $model = new User();
        $this->assertInstanceOf(
            'DexterService\\Models\\DataMapper\\User',
            $model->getUserMapper()
        );
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Senhas não batem
     */
    public function testShouldNotSaveWithWrongSenhaAndConfereSenha()
    {
        $model = new User();
        $dados = array(
            'login_usuario' => 'dexter',
            'senha_usuario' => '123456',
            'conf_senha_usuario' => '654321'
        );

        $model->save($dados);
    }

    public function testShouldInsert()
    {
        $model = new User();
        $dados = array(
            'login_usuario' => 'dexter',
            'senha_usuario' => '123456',
            'conf_senha_usuario' => '123456'
        );

        $user = new \DexterService\Models\Entity\User(array(
            'login' => $dados['login_usuario'],
            'senha' => md5($dados['senha_usuario'])
        ));

        $mapperMock = $this->getMock('DexterService\\Models\\DataMapper\\User');
        $mapperMock->expects($this->once())
            ->method('insert')
            ->with($this->equalTo($user));

        $model->setUserMapper($mapperMock);

        $model->save($dados);
    }

    public function testShouldUpdate()
    {
        $model = new User();
        $dados = array(
            'id' => 1,
            'login_usuario' => 'dexter',
            'senha_usuario' => '123456',
            'conf_senha_usuario' => '123456'
        );

        $user = new \DexterService\Models\Entity\User(array(
            'id' => $dados['id'],
            'login' => $dados['login_usuario']
        ));

        $mapperMock = $this->getMock('DexterService\\Models\\DataMapper\\User');
        $mapperMock->expects($this->once())
            ->method('update')
            ->with($this->equalTo($user));

        $model->setUserMapper($mapperMock);

        $model->save($dados);
    }
}
