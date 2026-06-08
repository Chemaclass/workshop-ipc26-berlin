<?php

declare(strict_types=1);

namespace Kata;

final class RandomNumberGame
{
    private int $answer;

    public function __construct(private StubGenerator $stubGenerator)
    {
        $this->answer = $this->stubGenerator->generate();
    }

    public function guessNumber(int $guess): string
    {

        if ($guess === $this->answer) {
            return 'You win!';
        }
        if ($guess < $this->answer) {
            return 'Higher';
        }
        if ($guess > $this->answer) {
            return 'Lower';
        }

        return 'You lose!';
    }
}
