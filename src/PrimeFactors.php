<?php

namespace Katas;

class PrimeFactors
{
    public function generate(int $number)
    {
        return $this->calculateFactors($number);
    }

    private function calculateFactors(int $number, array $factors = [])
    {
        if ($number === 1) {
            return $factors;
        }

        if ($number === 2) {
            array_push($factors, 2);
            return $factors;
        }

        if ($this->isPrime($number)) {
            array_push($factors, $number);
            return $factors;
        }

        $basePrimeDivisibleBy = $this->checkBasePrimes($number);
        array_push($factors, $basePrimeDivisibleBy);
        $remainder = $number / $basePrimeDivisibleBy;

        return $this->calculateFactors($remainder, $factors);
    }

    private function isPrime(int $number): bool
    {
        /*
         *  If 59 were not a prime number, then it would be divisible by at
         * least one prime number less than or equal to √59 ≈ 7.7. Since 59
         * cannot be divided evenly by 2, 3, 5, or 7, we know that 59 is a prime number.
         */

        /*
         * "Prime Factorization" is finding
         * which prime numbers multiply together to make the original number.
         * How to find prime numbers?
         */

        /*
         * A Prime Number can be divided exactly only by 1 or itself.
         * And it must be a whole number greater than 1.
         */

        for ($i = 9; $i > 1; $i--) {
            if ($this->numberIsDivisible($number, $i)) {
                return false;
            }
        }

        return true;
    }

    private function checkBasePrimes(int $number): int
    {
        foreach ([2, 3, 5, 7] as $basePrime) {
            if ($this->numberIsDivisible($number, $basePrime)) {
                return $basePrime;
            }
        }

        throw new \InvalidArgumentException("Number is not divisible: " . $number);
    }

    private function numberIsDivisible(int $denominator, int $numerator): bool
    {
        return ($denominator % $numerator) === 0;
    }
}
