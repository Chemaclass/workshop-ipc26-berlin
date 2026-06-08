<?php

declare(strict_types=1);

namespace Kata;

final class RandomNumberGame
{
    public function getRandomNumber(): int
    {
        return rand(1, 10);
    }

    public function guessNumber(int $guess): string
    {
        $anwer = 5;

        if ($guess === $anwer) {
            return 'You win!';
        }
        if ($guess < $anwer) {
            return 'Higher';
        }
        if ($guess > $anwer) {
            return 'Lower';
        }

        return 'You lose!';
    }
}
