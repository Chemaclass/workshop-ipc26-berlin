<?php

declare(strict_types=1);

namespace Kata;

final class GuessingGame
{
    private int $systemNumber;
    private int $triesRemaining;

    public function __construct(RandomNumberGenerator $randomNumberGenerator, int $triesRemaining)
    {
        $this->systemNumber = $randomNumberGenerator->generate();
        $this->triesRemaining = $triesRemaining;
    }

    public function playRound(int $guess): string
    {
        $this->triesRemaining--;

        if ($this->systemNumber === $guess) {
            return 'You win!';
        }

        if ($this->triesRemaining === 0 ) {
            return 'You lose';
        }

        if ($guess < $this->systemNumber) {
            return 'You guessed too low';
        }

        return 'You guessed too high';
    }

    public function getSystemNumber(): int
    {
        return $this->systemNumber;
    }

    public function getTriesRemaining(): int
    {
        return $this->triesRemaining;
    }
}
