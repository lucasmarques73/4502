<?php

namespace DexterService\Models\DataMapper;

use DexterService\Models\AbstractMapper;
use DexterService\Models\Entity;

class Cliente extends AbstractMapper
{
    public function fetchAll()
    {
        return $this->getDb()->fetchAll('SELECT * FROM cliente');
    }

    public function fetchById($clienteId)
    {
        $result = $this->getDb()->fetchAll('SELECT * FROM cliente WHERE id = ?', array($clienteId));

        if (0 === count($result)) {
            throw new \InvalidArgumentException('Cliente não encontrado');
        }

        return $result[0];
    }

    public function insert(Entity\Cliente $cliente)
    {
        return $this->getDb()->insert(
            'INSERT INTO cliente (nome, cpf_cnpj, telefone, celular, email, cep, estado, bairro, endereco, cidade) 
                VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)',
            array(
                $cliente->getNome(),
                $cliente->getCpfCnpj(),
                $cliente->getTelefone(),
                $cliente->getCelular(),
                $cliente->getEmail(),
                $cliente->getCep(),
                $cliente->getEstado(),
                $cliente->getBairro(),
                $cliente->getEndereco(),
                $cliente->getCidade()
            )
        );
    }

    public function update(Entity\Cliente $cliente)
    {
        return $this->getDb()->update(
            'UPDATE cliente SET nome = ?, cpf_cnpj = ?, telefone = ?, celular = ?, 
                    email = ?, cep = ?, estado = ?, bairro = ?, endereco = ?, cidade = ? WHERE id = ?',
            array(
                $cliente->getNome(),
                $cliente->getCpfCnpj(),
                $cliente->getTelefone(),
                $cliente->getCelular(),
                $cliente->getEmail(),
                $cliente->getCep(),
                $cliente->getEstado(),
                $cliente->getBairro(),
                $cliente->getEndereco(),
                $cliente->getCidade(),
                $cliente->getId()
            )
        );
    }
}
