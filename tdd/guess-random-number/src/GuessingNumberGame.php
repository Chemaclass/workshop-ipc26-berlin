<?php

declare(strict_types=1);

namespace Kata;

final class GuessingNumberGame
{
    private int $winningNumber;

    public function __construct(RandomNumberGeneratorInterface $randomNumberGenerator)
    {
        $this->winningNumber = $randomNumberGenerator->generate();
    }

    public function guessNumber(int $number): bool
    {
        return $number === $this->winningNumber;
    }
}
