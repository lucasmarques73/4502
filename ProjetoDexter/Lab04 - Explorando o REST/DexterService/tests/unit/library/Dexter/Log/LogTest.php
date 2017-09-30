<?php

namespace Dexter\Log;

class LogTest extends \PHPUnit_Framework_TestCase
{
    public function testToString()
    {
        $log = new Log('Name', 'Data', \DateTime::createFromFormat('d/m/Y H:i:s', '01/02/2003 04:05:06'));
        $string = (string) $log;
        $this->assertSame('[Saturday, 01-Feb-03 04:05:06 BRST] (Name) Data', $string);
    }
}
