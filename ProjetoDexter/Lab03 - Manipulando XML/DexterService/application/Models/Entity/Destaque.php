<?php

namespace DexterService\Models\Entity;

use DexterService\Models\AbstractEntity;

class Destaque extends AbstractEntity
{
    private $destaqueId;
    private $imagem;
    private $titulo;
    private $descricao;

    public function getId()
    {
        return $this->destaqueId;
    }

    public function setId($destaqueId)
    {
        if (!is_int($destaqueId)) {
            throw new \InvalidArgumentException('ID tem que ser inteiro');
        }

        $this->destaqueId = $destaqueId;
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
