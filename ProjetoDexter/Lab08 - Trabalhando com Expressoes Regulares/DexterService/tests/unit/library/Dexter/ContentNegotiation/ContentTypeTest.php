<?php

namespace Dexter\ContentNegotiation;

class ContentTypeTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider getFormats
     */
    public function testShouldGetFormat($contentTypeHeader, $result)
    {
        $contentType = new ContentType(array('CONTENT_TYPE' => $contentTypeHeader));
        $this->assertSame($result, $contentType->getFormat());
    }

    public function getFormats()
    {
        return array(
            array('text/html; charset=ISO-8859-4', 'text/html'),
            array('application/json', 'application/json'),
        );
    }
}
