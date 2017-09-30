<?php

namespace DexterService\Models\Entity;

use DexterService\Models\AbstractEntity;

class User extends AbstractEntity
{
    private $userId;
    private $login;
    private $senha;

    public function getId()
    {
        return $this->userId;
    }

    public function setId($userId)
    {
        if (!is_int($userId)) {
            throw new \InvalidArgumentException('ID deve ser inteiro');
        }

        $this->userId = $userId;
        return $this;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function setLogin($login)
    {
        $this->login = $login;
        return $this;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
        return $this;
    }
}
