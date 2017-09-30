<?php

namespace DexterService\Models\Service;

use DexterService\Models\Collection;
use DexterService\Models\DataMapper;
use DexterService\Models\Entity;

/**
 * Rotinas para lidar com destaques
 */
class Destaque
{

    private $destaqueMapper;

    public function getDestaque($destaqueId)
    {
        $destaque = $this->getDestaqueMapper()->fetchById($destaqueId);
        $destaque->id = (int) $destaque->id;
        return new Entity\Destaque((array) $destaque);
    }

    public function getDestaques()
    {
        $destaques = $this->getDestaqueMapper()->fetchAll();
        $destaqueCollection = new Collection\Destaque();
        foreach ($destaques as $destaque) {
            $destaqueCollection[] = new Entity\Destaque(array(
                'id'        => (int) $destaque->id,
                'titulo'    => $destaque->titulo,
                'descricao' => $destaque->descricao,
                'imagem'    => $destaque->imagem
            ));
        }
        return $destaqueCollection;
    }

    public function save(array $dados)
    {

        if (!isset($dados['id'])) {
            $destaque = new Entity\Destaque(array(
                'titulo'    => $dados['titulo'],
                'descricao' => $dados['descricao'],
                'imagem'    => $dados['imagem']
            ));

            $this->getDestaqueMapper()->insert($destaque);
        } else {
            $destaque = new Entity\Destaque(array(
                'id'        => (int) $dados['id'],
                'titulo'    => $dados['titulo'],
                'descricao' => $dados['descricao'],
                'imagem'    => $dados['imagem']
            ));
            $this->getDestaqueMapper()->update($destaque);
        }
    }

    public function getDestaqueMapper()
    {
        if (!$this->destaqueMapper) {
            $this->destaqueMapper = new DataMapper\Destaque();
        }
        return $this->destaqueMapper;
    }

    public function setDestaqueMapper(DataMapper\Destaque $mapper)
    {
        $this->destaqueMapper = $mapper;
        return $this;
    }
}
