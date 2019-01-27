<?php

namespace spec\Katas;

use Katas\PrimeFactors;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PrimeFactorsSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(PrimeFactors::class);
    }

    function it_returns_an_empty_array_for_1()
    {
        $this->generate(1)->shouldReturn([]);
    }

    function it_should_return_2_for_2()
    {
        $this->generate(2)->shouldReturn([2]);
    }

    function it_should_return_3_for_3()
    {
        $this->generate(3)->shouldReturn([3]);
    }

    function it_should_return_5_for_5()
    {
        $this->generate(5)->shouldReturn([5]);
    }

    function it_should_return_2_2_for_4()
    {
        $this->generate(4)->shouldReturn([2,2]);
    }

    function it_should_return_5_5_for_25()
    {
        $this->generate(25)->shouldReturn([5,5]);
    }

    function it_should_return_2_2_2_2_5_5_5_5_for_10000()
    {
        $this->generate(10000)->shouldReturn([2,2,2,2,5,5,5,5]);
    }
}
