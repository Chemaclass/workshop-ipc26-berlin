<?php

declare(strict_types=1);

namespace Kata;

final class GuessingNumberGame
{
    private int $winningNumber;

    private int $attempts = 0;

    private bool $won = false;

    public function __construct(
        RandomNumberGeneratorInterface $randomNumberGenerator,
        private int $maxAttempts = 3
    )
    {
        $this->winningNumber = $randomNumberGenerator->generate();
    }

    public function guessNumber(int $number): string
    {
        if ($this->won) {
            return 'You already won!';
        }

        if ($this->attempts >= $this->maxAttempts) {
            return 'You reached your max attempts!';
        }

        $this->attempts++;

        if ($number === $this->winningNumber && $this->attempts <= $this->maxAttempts) {
            $this->won = true;
            return 'You win!';
        }

        if ($this->attempts >= $this->maxAttempts) {
            return "You lose! The number was {$this->winningNumber}";
        }

        return $this->winningNumber > $number ? 'Higher' : 'Lower';
    }
}
