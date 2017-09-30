<?php

namespace Dexter\ContentNegotiation;

class Accept
{

    private $server;
    private $available;
    private $format;
    private $isParsed = false;

    public function __construct($server, array $available)
    {
        $this->server    = $server;
        $this->available = $available;
    }

    public function getFormat()
    {
        if (!$this->isParsed) {
            $this->parse();
            $this->isParsed = true;
        }

        return $this->format;
    }

    private function parse()
    {
        $priorities = array();
        $acceptable = explode(',', $this->server['HTTP_ACCEPT']);
        foreach ($acceptable as $value) {
            $pairs = explode(';', $value);
            $value = $pairs[0];
            unset($pairs[0]);
            $parameters = array();
            foreach ($pairs as $pair) {
                // Lab 8 - Expressões Regulares
            }
            $quality = 1.0;
            if (isset($parameters['q'])) {
                $quality = $parameters['q'];
                unset($parameters['q']);
            }

            $priorities[$quality][] = trim($value);
        }

        krsort($priorities);

        foreach (new \RecursiveIteratorIterator(new \RecursiveArrayIterator($priorities)) as $format) {
            foreach ($this->available as $available) {
                if (preg_match('@^' . addslashes(str_replace('*', '.+?', $format)) . '$@', $available)) {
                    $this->format = $available;
                    return;
                }
            }
        }

        header('HTTP/1.1 406 Not Acceptable');
    }
}
