<?php

namespace DexterService\Models;

/**
 * Classe base para outros mappers
 */
abstract class AbstractMapper
{

    private $database;

    /**
     * Usado sempre que precisamos pegar o banco de dados
     */
    public function getDb()
    {
        if (!$this->database) {
            $this->database = \Dexter\Db\Factory::getInstance()->getDb();
        }
        return $this->database;
    }

    /**
     * Mocking
     */
    public function setDb(\Dexter\Db\Conn $database)
    {
        $this->database = $database;
        return $this;
    }
}
