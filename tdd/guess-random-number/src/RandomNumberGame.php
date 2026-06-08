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
        if ($guess === 5) {
            return 'You win!';
        }

        return 'You lose!';
    }
}
