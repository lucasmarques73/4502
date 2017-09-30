<?php

namespace DexterService\Models\DataMapper;

use DexterService\Models\AbstractMapper;
use DexterService\Models\Entity;

class Destaque extends AbstractMapper
{
    public function fetchAll()
    {
        return $this->getDb()->fetchAll('SELECT * FROM banner');
    }

    public function fetchById($destaqueId)
    {
        $result = $this->getDb()->fetchAll('SELECT * FROM banner WHERE id = ?', array($destaqueId));

        if (0 === count($result)) {
            throw new \InvalidArgumentException('Banner não encontrado');
        }

        return $result[0];
    }

    public function insert(Entity\Destaque $destaque)
    {
        return $this->getDb()->insert(
            'INSERT INTO banner (titulo, descricao, imagem) VALUES(?, ?, ?)',
            array(
                $destaque->getTitulo(),
                $destaque->getDescricao(),
                $destaque->getImagem()
            )
        );
    }

    public function update(Entity\Destaque $destaque)
    {
        return $this->getDb()->update(
            'UPDATE banner SET titulo = ?, descricao = ?, imagem = ? WHERE id = ?',
            array(
                $destaque->getTitulo(),
                $destaque->getDescricao(),
                $destaque->getImagem(),
                $destaque->getId()
            )
        );
    }
}
