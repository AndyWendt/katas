<?php

namespace spec\Katas\LaraCasts;

use Katas\LaraCasts\RomanNumeralConverter;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RomanNumeralConverterSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(RomanNumeralConverter::class);
    }

    function it_converts_roman_numeral_constants()
    {
        $this->convert(1)->shouldReturn('I');
        $this->convert(5)->shouldReturn('V');
        $this->convert(10)->shouldReturn('X');
        $this->convert(50)->shouldReturn('L');
        $this->convert(100)->shouldReturn('C');
        $this->convert(500)->shouldReturn('D');
        $this->convert(1000)->shouldReturn('M');
    }

    function it_converts_I_correctly()
    {
        $this->convert(2)->shouldReturn('II');
        $this->convert(3)->shouldReturn('III');
        $this->convert(4)->shouldReturn('IV');
        $this->convert(6)->shouldReturn('VI');
        $this->convert(7)->shouldReturn('VII');
        $this->convert(8)->shouldReturn('VIII');
        $this->convert(9)->shouldReturn('IX');
    }

    function it_converts_X_correctly()
    {
        $this->convert(11)->shouldReturn('XI');
//        $this->convert(12)->shouldReturn('XII');
//        $this->convert(16)->shouldReturn('XVI');
    }
}
