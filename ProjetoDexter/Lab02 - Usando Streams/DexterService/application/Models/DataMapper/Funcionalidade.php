<?php

namespace DexterService\Models\DataMapper;

use DexterService\Models\AbstractMapper;
use DexterService\Models\Entity;

class Funcionalidade extends AbstractMapper
{
    public function fetchAll()
    {
        return $this->getDb()->fetchAll('SELECT * FROM funcionalidade');
    }

    public function fetchById($funcionalidadeId)
    {
        $result = $this->getDb()->fetchAll('SELECT * FROM funcionalidade WHERE id = ?', array($funcionalidadeId));

        if (0 === count($result)) {
            throw new \InvalidArgumentException('Funcionalidade não encontrada');
        }

        return $result[0];
    }

    public function insert(Entity\Funcionalidade $funcionalidade)
    {
        return $this->getDb()->insert(
            'INSERT INTO funcionalidade (titulo, descricao, imagem) VALUES(?, ?, ?)',
            array(
                $funcionalidade->getTitulo(),
                $funcionalidade->getDescricao(),
                $funcionalidade->getImagem()
            )
        );
    }

    public function update(Entity\Funcionalidade $funcionalidade)
    {
        return $this->getDb()->update(
            'UPDATE funcionalidade SET titulo = ?, descricao = ?, imagem = ? WHERE id = ?',
            array(
                $funcionalidade->getTitulo(),
                $funcionalidade->getDescricao(),
                $funcionalidade->getImagem(),
                $funcionalidade->getId()
            )
        );
    }
}
