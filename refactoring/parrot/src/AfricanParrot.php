<?php

declare(strict_types=1);

namespace Parrot;

class AfricanParrot implements Parrot
{
    public function __construct(
        private int $numberOfCoconuts,
    ) {
    }

    public function getSpeed(): float
    {
        return max(0, self::BASE_SPEED - $this->getLoadFactor() * $this->numberOfCoconuts);
    }

    public function getCry(): string
    {
        return 'Sqaark!';
    }

    private function getLoadFactor(): float
    {
        return 9.0;
    }
}
