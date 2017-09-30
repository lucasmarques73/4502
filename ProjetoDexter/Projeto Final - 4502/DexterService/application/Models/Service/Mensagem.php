<?php

namespace DexterService\Models\Service;

use DexterService\Models\Collection;
use DexterService\Models\DataMapper;
use DexterService\Models\Entity;

/**
 * Rotinas para lidar com mensagens
 */
class Mensagem
{

    private $mensagemMapper;

    public function getMensagem($mensagemId)
    {
        $mensagem = $this->getMensagemMapper()->fetchById($mensagemId);
        $mensagem->id = (int) $mensagem->id;
        return new Entity\Mensagem((array) $mensagem);
    }

    public function getMensagens()
    {
        $mensagens = $this->getMensagemMapper()->fetchAll();
        $mensagemCollection = new Collection\Mensagem();
        foreach ($mensagens as $mensagem) {
            $mensagemCollection[] = new Entity\Mensagem(array(
                'id'        => (int) $mensagem->id,
                'nome'      => $mensagem->nome,
                'email'     => $mensagem->email,
                'assunto'   => $mensagem->assunto,
                'mensagem'  => $mensagem->mensagem
            ));
        }
        return $mensagemCollection;
    }

    public function save(array $dados)
    {
        if (!isset($dados['id'])) {
            $mensagem = new Entity\Mensagem(array(
                'nome'      => $dados['nome'],
                'email'     => $dados['email'],
                'assunto'   => $dados['assunto'],
                'mensagem'  => $dados['mensagem']
            ));

            $this->getMensagemMapper()->insert($mensagem);
        } else {
            $mensagem = new Entity\Mensagem(array(
                'id'        => (int) $dados['id'],
                'nome'      => $dados['nome'],
                'email'     => $dados['email'],
                'assunto'   => $dados['assunto'],
                'mensagem'  => $dados['mensagem']
            ));
            $this->getMensagemMapper()->update($mensagem);
        }
    }

    public function getMensagemMapper()
    {
        if (!$this->mensagemMapper) {
            $this->mensagemMapper = new DataMapper\Mensagem();
        }
        return $this->mensagemMapper;
    }

    public function setmensagemMapper(DataMapper\Mensagem $mapper)
    {
        $this->mensagemMapper = $mapper;
        return $this;
    }
}
