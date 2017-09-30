<?php

namespace DexterService\Models\Service;

use DexterService\Models\Collection;
use DexterService\Models\DataMapper;
use DexterService\Models\Entity;

/**
 * Rotinas para lidar com funcionalidades
 */
class Funcionalidade
{

    private $funcionalidadeMapper;

    public function getFuncionalidade($funcionalidadeId)
    {
        $funcionalidade = $this->getFuncionalidadeMapper()->fetchById($funcionalidadeId);
        $funcionalidade->id = (int) $funcionalidade->id;
        return new Entity\Funcionalidade((array) $funcionalidade);
    }

    public function getFuncionalidades()
    {
        $funcionalidades = $this->getFuncionalidadeMapper()->fetchAll();
        $funcCollection = new Collection\Funcionalidade();
        foreach ($funcionalidades as $funcionalidade) {
            $funcCollection[] = new Entity\Funcionalidade(array(
                'id'        => (int) $funcionalidade->id,
                'titulo'    => $funcionalidade->titulo,
                'descricao' => $funcionalidade->descricao,
                'imagem'    => $funcionalidade->imagem
            ));
        }
        return $funcCollection;
    }

    public function save(array $dados)
    {

        if (!isset($dados['id'])) {
            $funcionalidade = new Entity\Funcionalidade(array(
                'titulo'    => $dados['titulo'],
                'descricao' => $dados['descricao'],
                'imagem'    => $dados['imagem']
            ));

            $this->getFuncionalidadeMapper()->insert($funcionalidade);
        } else {
            $funcionalidade = new Entity\Funcionalidade(array(
                'id'        => (int) $dados['id'],
                'titulo'    => $dados['titulo'],
                'descricao' => $dados['descricao'],
                'imagem'    => $dados['imagem']
            ));
            $this->getFuncionalidadeMapper()->update($funcionalidade);
        }
    }

    public function getFuncionalidadeMapper()
    {
        if (!$this->funcionalidadeMapper) {
            $this->funcionalidadeMapper = new DataMapper\Funcionalidade();
        }
        return $this->funcionalidadeMapper;
    }

    public function setFuncionalidadeMapper(DataMapper\Funcionalidade $mapper)
    {
        $this->funcionalidadeMapper = $mapper;
        return $this;
    }
}
