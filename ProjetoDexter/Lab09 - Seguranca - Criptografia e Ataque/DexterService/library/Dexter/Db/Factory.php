<?php

namespace Dexter\Db;

/**
 * Cria objeto de conexão com banco de dados
 */
class Factory
{

    use \Dexter\Singleton;

    private $database;

    /**
     * Cria o objeto de conexão ao banco de dados
     */
    public function getDb()
    {
        if ($this->database) {
            return $this->database;
        }

        $this->database = new Conn();
        return $this->database;
    }
}
