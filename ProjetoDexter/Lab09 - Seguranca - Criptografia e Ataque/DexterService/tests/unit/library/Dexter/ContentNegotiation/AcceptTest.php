<?php

namespace Dexter\ContentNegotiation;

class AcceptTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider getAccepts
     */
    public function testShouldGetFormat($acceptHeader, $available, $result)
    {
        $accept = new Accept(array('HTTP_ACCEPT' => $acceptHeader), $available);
        $this->assertSame($result, $accept->getFormat());
    }

    public function getAccepts()
    {
        return array(
            array(
                'application/xml',
                array('application/xml'),
                'application/xml'
            ),
            array(
                'application/*',
                array('application/json', 'application/xml'),
                'application/json'
            ),
            array(
                '*',
                array('text/json', 'application/json', 'application/xml'),
                'text/json'
            ),
            array(
                'application/xml;q=0.5, application/json;q=0.8, text/xml',
                array('text/json', 'application/json', 'text/xml'),
                'text/xml'
            )
        );
    }
}
