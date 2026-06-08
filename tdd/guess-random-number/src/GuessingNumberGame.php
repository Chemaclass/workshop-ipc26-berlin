<?php

declare(strict_types=1);

namespace Kata;

final class GuessingNumberGame
{
    private int $winningNumber;

    private int $attempts = 0;

    private const MAX_ATTEMPTS = 3;

    public function __construct(RandomNumberGeneratorInterface $randomNumberGenerator)
    {
        $this->winningNumber = $randomNumberGenerator->generate();
    }

    public function guessNumber(int $number): string
    {
        $this->attempts++;

        if ($number === $this->winningNumber && $this->attempts <= self::MAX_ATTEMPTS) {
            return 'You win!';
        }

        if ($this->attempts >= self::MAX_ATTEMPTS) {
            return "You lose! The number was {$this->winningNumber}";
        }

        return $this->winningNumber > $number ? 'Higher' : 'Lower';
    }
}
