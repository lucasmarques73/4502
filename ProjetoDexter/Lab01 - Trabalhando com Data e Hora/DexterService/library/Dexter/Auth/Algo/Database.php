<?php

namespace Dexter\Auth\Algo;

use Dexter\Auth\Algo as AlgoInterface;
use Dexter\Db\Conn;

class Database implements AlgoInterface
{

    private $database;
    private $table;
    private $userColumn;
    private $hashColumn;

    public function __construct(Conn $database, $table, $userColumn, $hashColumn)
    {
        $this->database     = $database;
        $this->table        = $table;
        $this->userColumn   = $userColumn;
        $this->hashColumn   = $hashColumn;
    }

    public function login($user, $password)
    {
        $userRecord = $this->database->fetchAll(
            sprintf('SELECT %s FROM %s WHERE %s = ?', $this->hashColumn, $this->table, $this->userColumn),
            array($user)
        );

        if ($userRecord) {
            if (password_verify($password, $userRecord[0]->{$this->hashColumn})) {
                return;
            }
        }

        throw new \InvalidArgumentException('Usuário inválido');
    }
}
