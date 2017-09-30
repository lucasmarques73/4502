<?php

namespace Dexter\Log;

class Logger
{
    private $adapters;

    public function addAdapter(Adapters\Adapter $adapter)
    {
        $this->adapters[] = $adapter;
        return $this;
    }

    public function log(Log $log)
    {
        foreach ($this->adapters as $adapter) {
            $adapter->write((string) $log);
        }
    }
}
