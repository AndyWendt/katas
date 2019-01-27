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
}
