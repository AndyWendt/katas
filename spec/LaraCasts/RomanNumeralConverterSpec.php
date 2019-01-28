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
        $this->convert(12)->shouldReturn('XII');
        $this->convert(16)->shouldReturn('XVI');
        $this->convert(31)->shouldReturn('XXXI');
        $this->convert(38)->shouldReturn('XXXVIII');
        $this->convert(39)->shouldReturn('XXXIX');
        $this->convert(49)->shouldReturn('XLIX');
        $this->convert(59)->shouldReturn('LIX');
        $this->convert(69)->shouldReturn('LXIX');
        $this->convert(83)->shouldReturn('LXXXIII');
        $this->convert(86)->shouldReturn('LXXXVI');
        $this->convert(88)->shouldReturn('LXXXVIII');
        $this->convert(93)->shouldReturn('XCIII');
        $this->convert(94)->shouldReturn('XCIV');
        $this->convert(99)->shouldReturn('XCIX');
    }

    function it_converts_C_correctly()
    {
        $this->convert(101)->shouldReturn('CI');
        $this->convert(444)->shouldReturn('CDXLIV');
        $this->convert(555)->shouldReturn('DLV');
        $this->convert(666)->shouldReturn('DCLXVI');
        $this->convert(999)->shouldReturn('CMXCIX');
    }

    function it_converts_m_correctly()
    {
        $this->convert(1001)->shouldReturn('MI');
        $this->convert(3961)->shouldReturn('MMMCMLXI');
        $this->convert(10001)->shouldReturn('MMMMMMMMMMI');
    }
}
