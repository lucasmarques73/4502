<?php

namespace DexterService\Models\DataMapper;

use DexterService\Models\AbstractMapper;
use DexterService\Models\Entity;

class Servico extends AbstractMapper
{
    public function fetchAll()
    {
        return $this->getDb()->fetchAll('SELECT * FROM vantagem');
    }

    public function fetchById($servicoId)
    {
        $result = $this->getDb()->fetchAll('SELECT * FROM vantagem WHERE id = ?', array($servicoId));

        if (0 === count($result)) {
            throw new \InvalidArgumentException('Serviço não encontrado');
        }

        return $result[0];
    }

    public function insert(Entity\Servico $servico)
    {
        return $this->getDb()->insert(
            'INSERT INTO vantagem (titulo, descricao, imagem, show_home) VALUES(?, ?, ?, ?)',
            array(
                $servico->getTitulo(),
                $servico->getDescricao(),
                $servico->getImagem(),
                $servico->getShowHome() ? 'Y' : 'N'
            )
        );
    }

    public function update(Entity\Servico $servico)
    {
        return $this->getDb()->update(
            'UPDATE vantagem SET titulo = ?, descricao = ?, imagem = ?, show_home = ? WHERE id = ?',
            array(
                $servico->getTitulo(),
                $servico->getDescricao(),
                $servico->getImagem(),
                $servico->getShowHome() ? 'Y' : 'N',
                $servico->getId()
            )
        );
    }
}
