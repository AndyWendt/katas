<?php

namespace Katas\LaraCasts;

class RomanNumeralConverter
{
    const NUMERAL_MAP = [
        1 => "I",
        5 => "V",
        10 => "X",
        50 => 'L',
        100 => 'C',
        500 => 'D',
        1000 => 'M',
    ];

    public function convert(int $number): string
    {
        $found = self::NUMERAL_MAP[$number] ?? false;

        if ($found) {
            return self::NUMERAL_MAP[$number];
        }
    }
}
