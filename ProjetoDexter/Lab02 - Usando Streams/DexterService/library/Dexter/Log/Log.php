<?php

namespace Dexter\Log;

class Log
{

    private $name;
    private $data;
    private $dateTime;

    public function __construct($name, $data, \DateTime $dateTime = null)
    {
        $this->name     = $name;
        $this->data     = $data;
        $this->dateTime = $dateTime;
    }

    public function __toString()
    {
        $dateTime = ($this->dateTime) ? $this->dateTime : new \DateTime();
        return sprintf("[%s] (%s) %s", $dateTime->format(\DateTime::RFC850), $this->name, $this->data);
    }
}
