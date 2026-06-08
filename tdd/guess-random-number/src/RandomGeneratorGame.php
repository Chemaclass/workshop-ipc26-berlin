<?php

declare(strict_types=1);

namespace Kata;

final class RandomGeneratorGame
{
    private const int WINNER_NUMBER = 3;
    private const int MAX_ATTEMPTS = 3;
    private int $attemptsCounter;

    public function __construct()
    {
        $this->attemptsCounter = 0;
    }

    public function play(int $guessedNumber): string
    {
        $this->attemptsCounter++;
        if ($this->attemptsCounter > self::MAX_ATTEMPTS) {
            return RandomGeneratorGameResult::LOSE->value;
        }

        if ($guessedNumber > self::WINNER_NUMBER) {
            return RandomGeneratorGameResult::LOWER->value;
        }

        if ($guessedNumber < self::WINNER_NUMBER) {
            return RandomGeneratorGameResult::HIGHER->value;
        }

        return RandomGeneratorGameResult::WIN->value;
    }
}
