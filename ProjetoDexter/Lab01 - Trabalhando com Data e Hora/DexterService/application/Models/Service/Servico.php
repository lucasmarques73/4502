<?php

namespace DexterService\Models\Service;

use DexterService\Models\Collection;
use DexterService\Models\DataMapper;
use DexterService\Models\Entity;

/**
 * Rotinas para lidar com servicos
 */
class Servico
{

    private $servicoMapper;

    public function getServico($servicoId)
    {
        $servico = $this->getServicoMapper()->fetchById($servicoId);
        $servico->id = (int) $servico->id;
        return new Entity\Servico((array) $servico);
    }

    public function getAllServicos()
    {
        $servicos = $this->getServicoMapper()->fetchAll();
        $servicoCollection = new Collection\Servico();
        foreach ($servicos as $servico) {
            $servicoCollection[] = new Entity\Servico(array(
                'id'        => (int) $servico->id,
                'titulo'    => $servico->titulo,
                'descricao' => $servico->descricao,
                'imagem'    => $servico->imagem,
                'show_home' => $servico->show_home
            ));
        }
        return $servicoCollection;
    }

    public function getServicos($showHome)
    {
        $servicos = $this->getServicoMapper()->fetchAll();
        $servicoCollection = new Collection\Servico();
        foreach ($servicos as $servico) {
            if ($servico->show_home === $showHome) {
                $servicoCollection[] = new Entity\Servico(array(
                    'id'        => (int) $servico->id,
                    'titulo'    => $servico->titulo,
                    'descricao' => $servico->descricao,
                    'imagem'    => $servico->imagem,
                    'show_home' => $servico->show_home
                ));
            }
        }
        return $servicoCollection;
    }

    public function save(array $dados)
    {
        if (!isset($dados['id'])) {
            $servico = new Entity\Servico(array(
                'titulo'    => $dados['titulo'],
                'descricao' => $dados['descricao'],
                'imagem'    => $dados['imagem'],
                'show_home' => $dados['show_home']
            ));

            $this->getServicoMapper()->insert($servico);
        } else {
            $servico = new Entity\Servico(array(
                'id'        => (int) $dados['id'],
                'titulo'    => $dados['titulo'],
                'descricao' => $dados['descricao'],
                'imagem'    => $dados['imagem'],
                'show_home' => $dados['show_home']
            ));
            $this->getServicoMapper()->update($servico);
        }
    }

    public function getServicoMapper()
    {
        if (!$this->servicoMapper) {
            $this->servicoMapper = new DataMapper\Servico();
        }
        return $this->servicoMapper;
    }

    public function setServicoMapper(DataMapper\Servico $mapper)
    {
        $this->servicoMapper = $mapper;
        return $this;
    }
}
