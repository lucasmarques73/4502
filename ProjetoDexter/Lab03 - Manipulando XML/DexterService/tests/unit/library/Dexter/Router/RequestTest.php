<?php

namespace Dexter\Router;

class RequestTest extends \PHPUnit_Framework_TestCase
{

    private $converter;
    private $request;

    public function setUp()
    {
        $this->converter = $this->getMockBuilder('\Dexter\ContentNegotiation\Converter')
            ->disableOriginalConstructor()
            ->getMock();

        $this->request = new Request($this->converter);
    }

    public function testShouldGetUri()
    {
        $_SERVER['REQUEST_URI'] = $expected = '/minha-uri';
        $this->assertSame($expected, $this->request->getUri());
    }

    public function testShouldGetParamWithGet()
    {
        $_SERVER['REQUEST_METHOD'] = 'GET';
        $_GET = array('myParam' => $expected = 'myValue');
        $this->assertSame($expected, $this->request->getParam('myParam'));
    }

    public function testShouldGetParamWithGetAndDefault()
    {
        $_SERVER['REQUEST_METHOD'] = 'GET';
        $_GET = array();
        $this->assertSame('default', $this->request->getParam('myParam', 'default'));
    }

    public function testShouldGetAllParamsWithGet()
    {
        $_SERVER['REQUEST_METHOD'] = 'GET';
        $_GET = $expected = array('p1' => '1', 'p2' => '2', 'p3' => '3');
        $this->assertSame($expected, $this->request->getParams());
    }

    public function testShouldGetWithXss()
    {
        $_SERVER['REQUEST_METHOD'] = 'GET';
        $_GET = array(
            'evil' => '<script>alert("hacked!");</script>'
        );
        $expected = array('evil' => 'alert(&#34;hacked!&#34;);');
        $this->assertSame($expected, $this->request->getParams());
    }

    public function testShouldTestForPost()
    {
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $this->assertTrue($this->request->isPost());
        $_SERVER['REQUEST_METHOD'] = 'GET';
        $this->assertFalse($this->request->isPost());
    }
}
