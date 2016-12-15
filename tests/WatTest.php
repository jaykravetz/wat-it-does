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


    /**
     * @test
     *
     * @param string $input
     * @param int    $expectedYear
     * @param string $expectedMonth
     *
     * @testWith ["20161", 2016, "January"]
     *  ["201612", 2016, "December"]
     */
    public function test_that_it_can_parse_year_month($input, $expectedYear, $expectedMonth)
    {
        $w = new Wat();

        // Copy the variables because the shift method uses a reference
        $inputString = $input;

        $yearValue  = $w->_string_shift($inputString, 4);
        $monthValue =  $inputString;

        $monthDate = \DateTime::createFromFormat('n', $monthValue);

        $actualMonth = $monthDate->format('F');

        $this->assertEquals($expectedYear, $yearValue, sprintf('Actual year is not %s as expected', $expectedYear));
        $this->assertEquals($expectedMonth, $actualMonth, sprintf('Actual year is not %s as expected', $expectedMonth));

    }
}
