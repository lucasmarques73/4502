<?php

namespace DexterService\Models\Entity;

use DexterService\Models\AbstractEntity;

class Servico extends AbstractEntity
{
    private $servicoId;
    private $imagem;
    private $titulo;
    private $descricao;
    private $showHome;

    public function getId()
    {
        return $this->servicoId;
    }

    public function setId($servicoId)
    {
        if (!is_int($servicoId)) {
            throw new \InvalidArgumentException('ID tem que ser inteiro');
        }

        $this->servicoId = $servicoId;
        return $this;
    }

    public function getImagem()
    {
        return $this->imagem;
    }

    public function setImagem($imagem)
    {
        if (!preg_match("@\.(jpg|png|gif|jpeg)$@", $imagem)) {
            throw new \InvalidArgumentException('IMAGEM deve ter extensão: jpg, jpeg, png ou gif');
        }

        $this->imagem = $imagem;
        return $this;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo)
    {
        if (strlen($titulo) > 50) {
            throw new \InvalidArgumentException('TITULO tem que ter no máximo 50 caracteres');
        }

        $this->titulo = $titulo;
        return $this;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
        return $this;
    }

    public function getShowHome()
    {
        return $this->showHome ?: false;
    }

    public function setShowHome($showHome)
    {
        $this->showHome = ($showHome === 'Y');
        return $this;
    }
}
