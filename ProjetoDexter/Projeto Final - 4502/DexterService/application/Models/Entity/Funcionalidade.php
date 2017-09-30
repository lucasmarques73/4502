<?php

namespace DexterService\Models\Entity;

use DexterService\Models\AbstractEntity;

class Funcionalidade extends AbstractEntity
{
    private $funcionalidadeId;
    private $imagem;
    private $titulo;
    private $descricao;

    public function getId()
    {
        return $this->funcionalidadeId;
    }

    public function setId($funcionalidadeId)
    {
        if (!is_int($funcionalidadeId)) {
            throw new \InvalidArgumentException('ID tem que ser inteiro');
        }

        $this->funcionalidadeId = $funcionalidadeId;
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
}
