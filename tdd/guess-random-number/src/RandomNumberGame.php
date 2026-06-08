<?php

declare(strict_types=1);

namespace Kata;

final class RandomNumberGame
{
    public function getRandomNumber(): int
    {
        return rand(1, 10);
    }
}
