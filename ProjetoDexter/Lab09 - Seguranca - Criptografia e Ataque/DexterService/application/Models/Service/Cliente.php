<?php

namespace DexterService\Models\Service;

use DexterService\Models\Collection;
use DexterService\Models\DataMapper;
use DexterService\Models\Entity;

/**
 * Rotinas para lidar com clientes
 */
class Cliente
{

    private $clienteMapper;

    public function getCliente($clienteId)
    {
        $cliente = $this->getClienteMapper()->fetchById($clienteId);
        $cliente->id = (int) $cliente->id;
        return new Entity\Cliente((array) $cliente);
    }

    public function getClientes()
    {
        $clientes = $this->getClienteMapper()->fetchAll();
        $clienteCollection = new Collection\Cliente();
        foreach ($clientes as $dados) {
            $dados = (array) $dados;
            $clienteCollection[] = new Entity\Cliente(array(
                'id'        => (int) $dados['id'],
                'nome'      => $dados['nome'],
                'cpf_cnpj'  => $dados['cpf_cnpj'],
                'telefone'  => $dados['telefone'],
                'celular'   => $dados['celular'],
                'email'     => $dados['email'],
                'cep'       => $dados['cep'],
                'estado'    => $dados['estado'],
                'bairro'    => $dados['bairro'],
                'endereco'  => $dados['endereco'],
                'cidade'    => $dados['cidade']
            ));
        }
        return $clienteCollection;
    }

    public function save(array $dados)
    {
        if (!isset($dados['cpf_cnpj'])) {
            $dados['cpf_cnpj'] = empty($dados['cpf']) ? $dados['cnpj'] : $dados['cpf'];
        }
        if (!isset($dados['id'])) {
            $cliente = new Entity\Cliente(array(
                'nome'      => $dados['nome'],
                'cpf_cnpj'  => $dados['cpf_cnpj'],
                'telefone'  => $dados['telefone'],
                'celular'   => $dados['celular'],
                'email'     => $dados['email'],
                'cep'       => $dados['cep'],
                'estado'    => $dados['estado'],
                'bairro'    => $dados['bairro'],
                'endereco'  => $dados['endereco'],
                'cidade'    => $dados['cidade']
            ));

            $this->getClienteMapper()->insert($cliente);
        } else {
            $cliente = new Entity\Cliente(array(
                'id'        => (int) $dados['id'],
                'nome'      => $dados['nome'],
                'cpf_cnpj'  => $dados['cpf_cnpj'],
                'telefone'  => $dados['telefone'],
                'celular'   => $dados['celular'],
                'email'     => $dados['email'],
                'cep'       => $dados['cep'],
                'estado'    => $dados['estado'],
                'bairro'    => $dados['bairro'],
                'endereco'  => $dados['endereco'],
                'cidade'    => $dados['cidade']
            ));
            $this->getClienteMapper()->update($cliente);
        }
    }

    public function getClienteMapper()
    {
        if (!$this->clienteMapper) {
            $this->clienteMapper = new DataMapper\Cliente();
        }
        return $this->clienteMapper;
    }

    public function setClienteMapper(DataMapper\Cliente $mapper)
    {
        $this->clienteMapper = $mapper;
        return $this;
    }
}
