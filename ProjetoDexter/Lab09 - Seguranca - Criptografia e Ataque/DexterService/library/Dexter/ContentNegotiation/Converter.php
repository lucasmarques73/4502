<?php

namespace Dexter\ContentNegotiation;

class Converter
{

    const IN    = 1;
    const OUT   = 2;

    private $format;
    private $converterFactory;

    public function __construct($format, ConverterFactory $converterFactory, $type)
    {
        $this->format           = $format;
        $this->converterFactory = $converterFactory;
        $this->type             = $type;
    }

    public function convert($content)
    {
        $converter = $this->converterFactory->create($this->format);
        if ($this->type === self::IN) {
            return $converter->decode($content);
        }
        return $converter->encode($content);
    }
}
