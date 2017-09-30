<?php

namespace Dexter\Auth;

class Basic implements Auth
{

    private $algo;
    private $server;

    public function __construct(Algo $algo, $server)
    {
        $this->algo     = $algo;
        $this->server   = $server;
    }

    public function login($controller, $action)
    {
        if ($this->acl($controller, $action)) {
            return true;
        }
        if (!isset($this->server['PHP_AUTH_USER'])) {
            $this->presentBasic();
        } else {
            try {
                $this->algo->login($this->server['PHP_AUTH_USER'], $this->server['PHP_AUTH_PW']);
            } catch (\InvalidArgumentException $e) {
                $this->presentBasic();
            }
        }
    }

    private function acl($controller, $action)
    {
        if (substr($action, 0, 7) === 'options') {
            return true;
        }
        if (substr($action, 0, 3) === 'get') {
            return true;
        }
        if (substr($action, 0, 4) === 'post' && false !== stripos($controller, 'Contato')) {
            return true;
        }
        if (substr($action, 0, 4) === 'post' && false !== stripos($controller, 'Cliente')) {
            return true;
        }
        return false;
    }

    protected function presentBasic()
    {
        header('WWW-Authenticate: Basic realm="Protected area"');
        header('HTTP/1.0 401 Unauthorized');
        echo 'Access denied';
        exit;
    }
}
