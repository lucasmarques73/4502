<?php

namespace Dexter\Db;

class Conn
{
    private static $config;
    private $pdo;
    private $isConnected = false;

    public static function setConfig(array $config)
    {
        self::$config = $config;
    }

    protected function doConnect()
    {
        if (!$this->isConnected) {
            if (empty(self::$config)) {
                throw new \RuntimeException(
                    'Configuração do banco de dados não passada, use Dexter\Db\Conn::setConfig(array $config)'
                );
            }
            $this->pdo = new \PDO(
                self::$config['db']['dsn'],
                self::$config['db']['user'],
                self::$config['db']['pass']
            );
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }
    }

    /**
     * Lazy connection + Proxy to PDO
     */
    public function __call($name, array $args)
    {
        if (in_array($name, array('fetchAll', 'fetch', 'insert', 'update', 'delete'))) {
            $this->doConnect();
            return call_user_func_array(array($this, $name), $args);
        } elseif ((new \ReflectionClass('\\PDO'))->hasMethod($name)) {
            $this->doConnect();
            return call_user_func_array(array($this->pdo, $name), $args);
        }

        throw new \InvalidArgumentException("Invalid method: {$name}");
    }

    /**
     * Recupera os dados do banco de dados (chamado via __call)
     */
    protected function fetchAll($query, array $replacements = array())
    {
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($replacements);

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    /**
     * Insere dados no banco (chamado via __call)
     */
    protected function insert($query, array $replacements)
    {
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($replacements);

        return $this->pdo->lastInsertId();
    }

    /**
     * Atualiza (chamado via __call)
     */
    protected function update($query, array $replacements)
    {
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($replacements);

        return $stmt->rowCount();
    }

    /**
     * Deleta (chamado via __call)
     */
    protected function delete($query, array $replacements = array())
    {
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($replacements);

        return $stmt->rowCount();
    }
}
