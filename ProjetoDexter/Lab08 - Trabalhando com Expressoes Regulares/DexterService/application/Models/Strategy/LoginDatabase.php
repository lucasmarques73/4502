<?php

namespace DexterService\Models\Strategy;

use DexterService\Models\Exceptions\InvalidUserOrPasswordException;

/**
 * Estratégia para logar usando banco de dados
 */
class LoginDatabase implements LoginStrategy
{

    private $database;

    /**
     * Usado sempre que precisamos pegar o banco de dados
     */
    public function getDb()
    {
        if (!$this->database) {
            $this->database = \Dexter\Db\Factory::getInstance()->getDb();
        }
        return $this->database;
    }

    /**
     * Mocking
     */
    public function setDb(\Dexter\Db\Conn $database)
    {
        $this->database = $database;
        return $this;
    }

    /**
     * Loga o usuário usando como estratégia verificação no banco de dados.
     * Deste modo, deixamos flexível a troca do modo de autenticação.
     */
    public function login($user, $pass)
    {

        $result = $this->getDb()->fetchAll(
            'SELECT * FROM usuario WHERE login = ? AND senha = ?',
            array($user, md5($pass))
        );
        if (count($result) === 0) {
            throw new InvalidUserOrPasswordException('Usuário e/ou senha inválidos');
        }
    }
}
