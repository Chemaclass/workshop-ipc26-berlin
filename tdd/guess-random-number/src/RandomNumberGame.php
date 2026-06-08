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
        $answer = 5;

        if ($guess === $answer) {
            return 'You win!';
        }
        if ($guess < $answer) {
            return 'Higher';
        }
        if ($guess > $answer) {
            return 'Lower';
        }

        return 'You lose!';
    }
}
