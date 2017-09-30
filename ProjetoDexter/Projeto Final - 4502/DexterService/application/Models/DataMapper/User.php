<?php

namespace DexterService\Models\DataMapper;

use DexterService\Models\AbstractMapper;
use DexterService\Models\Entity;

class User extends AbstractMapper
{
    public function fetchAll()
    {
        return $this->getDb()->fetchAll('SELECT * FROM usuario');
    }

    public function fetchById($userId)
    {
        $result = $this->getDb()->fetchAll('SELECT * FROM usuario WHERE id = ?', array($userId));

        if (0 === count($result)) {
            throw new \InvalidArgumentException('Usuário não encontrado');
        }

        return $result[0];
    }

    public function insert(Entity\User $user)
    {
        return $this->getDb()->insert(
            'INSERT INTO usuario (login, senha) VALUES(?, ?)',
            array($user->getLogin(), $user->getSenha())
        );
    }

    public function update(Entity\User $user)
    {
        return $this->getDb()->update(
            'UPDATE usuario SET login = ? WHERE id = ?',
            array($user->getLogin(), $user->getId())
        );
    }
}
