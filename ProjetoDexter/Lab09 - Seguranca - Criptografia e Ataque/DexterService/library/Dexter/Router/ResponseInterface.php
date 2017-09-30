<?php

namespace Dexter\Router;

/**
 * Interface para objeto de resposta
 */
interface ResponseInterface
{

    /**
     * Adiciona 1 header
     * @param string $header
     * @return $this
     */
    public function addHeader($header);

    /**
     * Adiciona N headers
     * @param array $headers
     * @return $this
     */
    public function addHeaders(array $headers);

    /**
     * Envia headers
     */
    public function send();
}
