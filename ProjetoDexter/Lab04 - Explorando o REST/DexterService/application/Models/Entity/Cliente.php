<?php

namespace DexterService\Models\Entity;

use DexterService\Models\AbstractEntity;

class Cliente extends AbstractEntity
{
    private $clienteId;
    private $nome;
    private $cpfCnpj;
    private $telefone;
    private $celular;
    private $email;
    private $cep;
    private $estado;
    private $bairro;
    private $endereco;
    private $cidade;

    public function getId()
    {
        return $this->clienteId;
    }

    public function setId($clienteId)
    {
        if (!is_int($clienteId)) {
            throw new \InvalidArgumentException('ID tem que ser inteiro');
        }

        $this->clienteId = $clienteId;
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

    public function getCpfCnpj()
    {
        return $this->cpfCnpj;
    }

    public function setCpfCnpj($cpfCnpj)
    {
        $this->cpfCnpj = $cpfCnpj;
        return $this;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }

    public function setTelefone($telefone)
    {
        if (strlen($telefone) !== 14) {
            throw new \InvalidArgumentException('TELEFONE com tamanho inválido');
        }

        $this->telefone = $telefone;
        return $this;
    }

    public function getCelular()
    {
        return $this->celular;
    }

    public function setCelular($celular)
    {
        if (!in_array(strlen($celular), array(14, 15))) {
            throw new \InvalidArgumentException('CELULAR com tamanho inválido');
        }

        $this->celular = $celular;
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

    public function getCep()
    {
        return $this->cep;
    }

    public function setCep($cep, $error = false)
    {
        if (strlen($cep) !== 9) {
            if ($error) {
                throw new \InvalidArgumentException('CEP em formato inválido' . $cep);
            }
            $this->setCep(preg_replace('@([0-9]{5})([0-9]{3})@', '\1-\2', $cep), true);
        }

        $this->cep = $cep;
        return $this;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        if (strlen($estado) !== 2) {
            throw new \InvalidArgumentException('ESTADO com tamanho inválido');
        }

        $this->estado = $estado;
        return $this;
    }

    public function getBairro()
    {
        return $this->bairro;
    }

    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
        return $this;
    }

    public function getEndereco()
    {
        return $this->endereco;
    }

    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
        return $this;
    }

    public function getCidade()
    {
        return $this->cidade;
    }

    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
        return $this;
    }
}
