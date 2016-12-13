<?php namespace Test;

use Wat\Wat;

class WatTest extends \PHPUnit_Framework_TestCase
{
    public function test_wat_it_does()
    {
        $w = new Wat();

        $s1 = 'GOAT';
        $s2 = 'Purple';

        $res1 = $w->_string_shift($s1, 1);
        $res2 = $w->_string_shift($s2, 3);

        $this->assertEquals('G', $res1);
        $this->assertEquals('OAT', $s1);

        $this->assertEquals('Pur', $res2);
        $this->assertEquals('ple', $s2);
    }
}
