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
    }
}
