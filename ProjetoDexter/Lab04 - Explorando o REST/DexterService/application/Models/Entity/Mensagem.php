<?php

namespace DexterService\Models\Entity;

use DexterService\Models\AbstractEntity;

class Mensagem extends AbstractEntity
{
    private $mensagemId;
    private $nome;
    private $email;
    private $assunto;
    private $mensagem;

    public function getId()
    {
        return $this->mensagemId;
    }

    public function setId($mensagemId)
    {
        if (!is_int($mensagemId)) {
            throw new \InvalidArgumentException('ID tem que ser inteiro');
        }

        $this->mensagemId = $mensagemId;
        return $this;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        if (strlen($nome) > 50) {
            throw new \InvalidArgumentException('NOME não pode ser maior que 50 caracteres');
        }

        $this->nome = $nome;
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException('EMAIL em formato inválido');
        }

        $this->email = $email;
        return $this;
    }

    public function getAssunto()
    {
        return $this->assunto;
    }

    public function setAssunto($assunto)
    {
        $this->assunto = $assunto;
        return $this;
    }

    public function getMensagem()
    {
        return $this->mensagem;
    }

    public function setMensagem($mensagem)
    {
        $this->mensagem = $mensagem;
        return $this;
    }
}
