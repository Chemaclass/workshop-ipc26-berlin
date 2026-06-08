<?php

declare(strict_types=1);

namespace Kata;

final class RandomGeneratorGame
{
    private const int WINNER_NUMBER = 3;

    public function play(int $guessedNumber): string
    {
        if ($guessedNumber > self::WINNER_NUMBER) {
            return RandomGeneratorGameResult::LOWER->value;
        }

        if ($guessedNumber < self::WINNER_NUMBER) {
            return RandomGeneratorGameResult::HIGHER->value;
        }

        return RandomGeneratorGameResult::WIN->value;
    }
}
