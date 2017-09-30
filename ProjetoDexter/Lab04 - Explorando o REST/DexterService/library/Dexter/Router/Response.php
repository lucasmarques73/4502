<?php

namespace Dexter\Router;

use Dexter\ContentNegotiation\Converter;

class Response implements ResponseInterface
{

    const HTTP = 'HTTP/1.0';

    /**
     * Responsável pelo envio dos headers
     * @var \Dexter\Http\Header
     */
    private $headerSender;

    /**
     * Armazena headers de resposta
     */
    private $headers = array();

    private $converter;

    private $content;

    public function __construct(Converter $converter)
    {
        $this->converter = $converter;
    }

    /**
     * Adiciona 1 header
     * @param string $header
     * @return $this
     */
    public function addHeader($header)
    {
        $this->headers[] = $header;
        return $this;
    }

    /**
     * Adiciona N headers
     * @param array $headers
     * @return $this
     */
    public function addHeaders(array $headers)
    {
        foreach ($headers as $header) {
            $this->addHeader($header);
        }
        return $this;
    }

    /**
     * Recupera os headers armazenados
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * Envia headers
     */
    public function send()
    {
        $headers = array();
        foreach ($this->headers as $header) {
            if (false === strpos($header, ':')) {
                $headers[] = self::HTTP . ' ' . $header;
            } else {
                $headers[] = $header;
            }
        }
        $this->getHeaderSender()->send($headers);
        // Lab 4 - REST
    }

    /**
     * @return \Dexter\Http\Header
     */
    public function getHeaderSender()
    {
        if (!$this->headerSender) {
            $this->headerSender = new \Dexter\Http\Header();
        }
        return $this->headerSender;
    }

    /**
     * Cadastro o headerSender (mais para injetar o mock)
     * @param \Dexter\Http\Header $headerSender
     */
    public function setHeaderSender(\Dexter\Http\Header $headerSender)
    {
        $this->headerSender = $headerSender;
        return $this;
    }
}
