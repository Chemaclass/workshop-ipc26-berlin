<?php

declare(strict_types=1);

namespace Parrot;

readonly class NorwegianBlueParrot implements Parrot
{
    public function __construct(
        private float $voltage,
        private bool $isNailed
    ) {
    }

    public function getSpeed(): float
    {
        return $this->isNailed ? 0 : $this->getBaseSpeedWith($this->voltage);
    }

    public function getCry(): string
    {
        return $this->voltage > 0 ? 'Bzzzzzz' : '...';
    }

    private function getBaseSpeedWith(float $voltage): float
    {
        return min(24.0, $voltage * self::BASE_SPEED);
    }
}
