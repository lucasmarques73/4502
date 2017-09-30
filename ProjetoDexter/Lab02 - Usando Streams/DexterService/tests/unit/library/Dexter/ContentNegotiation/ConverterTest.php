<?php

namespace Dexter\ContentNegotiation;

class ConverterTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldEncode()
    {
        $format = 'application/json';
        $content = array(1, 2, 3, 4, 5);
        $jsonContent = '[1, 2, 3, 4, 5]';

        $converterFactory = $this->getMock('\Dexter\ContentNegotiation\ConverterFactory');
        $json = $this->getMock('\Dexter\ContentNegotiation\Converters\Json');
        $converter = new Converter($format, $converterFactory, Converter::OUT);

        $converterFactory->expects($this->once())
            ->method('create')
            ->with($this->equalTo($format))
            ->will($this->returnValue($json));
        $json->expects($this->once())
            ->method('encode')
            ->with($this->equalTo($content))
            ->will($this->returnValue($jsonContent));

        $this->assertSame($jsonContent, $converter->convert($content));
    }

    public function testShouldDecode()
    {
        $format = 'application/json';
        $content = array(1, 2, 3, 4, 5);
        $jsonContent = '[1, 2, 3, 4, 5]';

        $converterFactory = $this->getMock('\Dexter\ContentNegotiation\ConverterFactory');
        $json = $this->getMock('\Dexter\ContentNegotiation\Converters\Json');
        $converter = new Converter($format, $converterFactory, Converter::IN);

        $converterFactory->expects($this->once())
            ->method('create')
            ->with($this->equalTo($format))
            ->will($this->returnValue($json));
        $json->expects($this->once())
            ->method('decode')
            ->with($this->equalTo($jsonContent))
            ->will($this->returnValue($content));

        $this->assertSame($content, $converter->convert($jsonContent));
    }
}
