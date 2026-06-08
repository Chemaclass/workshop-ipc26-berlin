<?php

declare(strict_types=1);

namespace Kata;

final class RandomNumberGenerator implements RandomNumberGeneratorInterface
{
    public function generate(): int
    {
        return rand(1, 10);
    }
}
