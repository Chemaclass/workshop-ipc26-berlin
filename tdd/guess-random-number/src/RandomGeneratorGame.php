<?php

declare(strict_types=1);

namespace Kata;

final class RandomGeneratorGame
{
    public function play(int $guessedNumber): string
    {
        if ($guessedNumber === 3) {
            return 'you win';
        }

        return "lower";
    }
}
