<?php

declare(strict_types=1);

namespace Kata;

class StubGenerator
{
    public function __construct(private int $number)
    {
    }

    public function generate(): int
    {
        return $this->number;
    }
}
