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

    function it_converts_1()
    {
        $this->convert(1)->shouldReturn('I');
    }

    function it_converts_5()
    {
        $this->convert(5)->shouldReturn('V');
    }

    function it_converts_10()
    {
        $this->convert(10)->shouldReturn('X');
    }

    function it_converts_50()
    {
        $this->convert(50)->shouldReturn('L');
    }

    function it_converts_100()
    {
        $this->convert(100)->shouldReturn('C');
    }

    function it_converts_500()
    {
        $this->convert(500)->shouldReturn('D');
    }

    function it_converts_1000()
    {
        $this->convert(1000)->shouldReturn('M');
    }
}
