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

        return $this->findNumeral($number);
    }

    private function findNumeral(int $number)
    {
        // need to map 2 to II
        // if number is divisible by 10 or 5 then there will be no I
        // if number is one less than number divisible by 5 or 10 then
        // It will go in front of the number
        // solve for digit, tens, hundreds, thousands?
        $numberArray = str_split((string) $number);

        $digit = array_pop($numberArray);
        $tens = array_pop($numberArray);
        $hundreds = array_pop($numberArray);
        $thousands = $numberArray;

        $digitNumeral = $this->mapNumberToNumeral($digit, 1);
        return $digitNumeral;
    }

    private function mapNumberToNumeral(int $digit, int $denominator): string
    {
        $mid = $denominator * 5;
        $max = $denominator * 10;
        $numeral = self::NUMERAL_MAP[$denominator];

        if (($mid - $denominator) === $digit) {
            return $this->formatNumber($denominator, $mid);
        }

        if (($max - $denominator) === $digit) {
            return $this->formatNumber($denominator, $max);
        }

        return str_repeat($numeral, $digit);
    }

    private function formatNumber(...$indexes): string
    {
        $string = '';

        foreach ($indexes as $index) {
            $string .= self::NUMERAL_MAP[$index];
        }

        return $string;
    }
}
