<?php

namespace Katas;

class PrimeFactors
{
    public function generate(int $number)
    {
        $result = $this->calculateFactors($number);

        var_dump($result);
        return $result;
    }

    private function calculateFactors(int $number, array $factors = [])
    {
//        var_dump($number, $factors);

        if ($number === 1) {
            return $factors;
        }

        if ($this->numberIsPrime($number)) {
            array_push($factors, $number);
            return $factors;
        }

        array_push($factors, 2);
        $remainder = $number / 2;

        return $this->calculateFactors($remainder, $factors);
    }

    private function numberIsPrime(int $number): bool
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

//        sqrt($number);

        return in_array($number % 2, [1]);
    }
}
