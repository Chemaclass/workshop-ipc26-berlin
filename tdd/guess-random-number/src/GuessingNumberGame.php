<?php

declare(strict_types=1);

namespace Kata;

final class GuessingNumberGame
{
    private int $winningNumber;

    private int $attempts = 0;

    public function __construct(
        RandomNumberGeneratorInterface $randomNumberGenerator,
        private int $maxAttempts = 3
    )
    {
        $this->winningNumber = $randomNumberGenerator->generate();
    }

    public function guessNumber(int $number): string
    {
        $this->attempts++;

        if ($number === $this->winningNumber && $this->attempts <= $this->maxAttempts) {
            return 'You win!';
        }

        if ($this->attempts >= $this->maxAttempts) {
            return "You lose! The number was {$this->winningNumber}";
        }

        return $this->winningNumber > $number ? 'Higher' : 'Lower';
    }
}
