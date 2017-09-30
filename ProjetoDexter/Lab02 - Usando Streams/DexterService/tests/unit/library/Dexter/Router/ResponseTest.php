<?php

namespace Dexter\Router;

class ResponseTest extends \PHPUnit_Framework_TestCase
{

    private $converter;
    private $response;

    public function setUp()
    {
        $this->converter = $this->getMockBuilder('\Dexter\ContentNegotiation\Converter')
            ->disableOriginalConstructor()
            ->getMock();

        $this->response = new Response($this->converter);
    }

    public function testAddHeader()
    {
        $header = 'Content-type: text/html';

        $this->response->addHeader($header);

        $this->assertSame(array($header), $this->response->getHeaders());

        $outroHeader = 'Content-length: 1000';
        $this->response->addHeader($outroHeader);

        $this->assertSame(array($header, $outroHeader), $this->response->getHeaders());
    }

    public function testAddHeaders()
    {
        $header = 'Content-type: text/xml';
        $outroHeader = 'Content-length: 1000';

        $this->response->addHeaders($expected = array($header, $outroHeader));

        $this->assertSame($expected, $this->response->getHeaders());
    }

    public function testGetHeaders()
    {
        $this->response->addHeader($expected = 'teste');
        $this->assertSame(array($expected), $this->response->getHeaders());
    }

    /**
     * @runInSeparateProcess
     */
    public function testSendHeadersWithColon()
    {
        $content = array(1, 2, 3, 4, 5);
        $output = '[1,2,3,4,5]';

        $headerSenderMock = $this->getMock('\\Dexter\\Http\\Header');
        $headerSenderMock->expects($this->once())
            ->method('send')
            ->with($this->equalTo($headers = array(
                'Content-type: text/xml',
                'Content-length: 1000'
            )));
        $this->converter->expects($this->once())
            ->method('convert')
            ->with($this->equalTo($content))
            ->will($this->returnValue($output));
        
        ob_start();

        $this->response->setHeaderSender($headerSenderMock)
            ->addHeaders($headers)
            ->setContent($content)
            ->send();

        $this->assertSame($output, ob_get_clean());
    }

    public function testSendHeadersWithoutColon()
    {
        $content = array(1, 2, 3, 4, 5);
        $output = '[1,2,3,4,5]';

        $headerSenderMock = $this->getMock('\\Dexter\\Http\\Header');
        $headerSenderMock->expects($this->once())
            ->method('send')
            ->with($this->equalTo(array('HTTP/1.0 404 Not Found')));

        $this->converter->expects($this->once())
            ->method('convert')
            ->with($this->equalTo($content))
            ->will($this->returnValue($output));
        
        ob_start();

        $this->response->setHeaderSender($headerSenderMock)
                 ->addHeader('404 Not Found')
                 ->setContent($content)
                 ->send();

        $this->assertSame($output, ob_get_clean());
    }

    public function testShouldGetSetHeaderSender()
    {
        $headerSenderMock = $this->getMock('\\Dexter\\Http\\Header');

        $this->assertSame($this->response, $this->response->setHeaderSender($headerSenderMock));
        $this->assertSame($headerSenderMock, $this->response->getHeaderSender());
    }

    public function testShouldGetDefaultHeaderSender()
    {
        $this->assertInstanceOf(
            '\\Dexter\\Http\\Header',
            $this->response->getHeaderSender()
        );
    }
}
