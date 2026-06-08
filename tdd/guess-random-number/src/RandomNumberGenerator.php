<?php

declare(strict_types=1);

namespace Kata;

class RandomNumberGenerator
{
    public function generate(): int
    {
        return random_int(1, 10);
    }
}
