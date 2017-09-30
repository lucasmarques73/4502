<?php

namespace Dexter\Http;

/**
 * Abstrai envio de cabeçalhos
 */
class Header
{

    /**
     * Envia cabeçalhos
     */
    public function send(array $headers)
    {
        foreach ($headers as $header) {
            header($header);
        }
    }
}
