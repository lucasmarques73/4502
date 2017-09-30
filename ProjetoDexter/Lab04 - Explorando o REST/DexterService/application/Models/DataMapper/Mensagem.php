<?php

namespace DexterService\Models\DataMapper;

use DexterService\Models\AbstractMapper;
use DexterService\Models\Entity;

class Mensagem extends AbstractMapper
{
    public function fetchAll()
    {
        return $this->getDb()->fetchAll('SELECT * FROM mensagem');
    }

    public function fetchById($mensagemId)
    {
        $result = $this->getDb()->fetchAll('SELECT * FROM mensagem WHERE id = ?', array($mensagemId));

        if (0 === count($result)) {
            throw new \InvalidArgumentException('Mensagem não encontrada');
        }

        return $result[0];
    }

    public function insert(Entity\Mensagem $mensagem)
    {
        return $this->getDb()->insert(
            'INSERT INTO mensagem (nome, email, assunto, mensagem) VALUES(?, ?, ?, ?)',
            array($mensagem->getNome(), $mensagem->getEmail(), $mensagem->getAssunto(), $mensagem->getMensagem())
        );
    }

    public function update(Entity\Mensagem $mensagem)
    {
        return $this->getDb()->update(
            'UPDATE mensagem SET nome = ?, email = ?, assunto = ?, mensagem = ? WHERE id = ?',
            array(
                $mensagem->getNome(),
                $mensagem->getEmail(),
                $mensagem->getAssunto(),
                $mensagem->getMensagem(),
                $mensagem->getId()
            )
        );
    }
}
