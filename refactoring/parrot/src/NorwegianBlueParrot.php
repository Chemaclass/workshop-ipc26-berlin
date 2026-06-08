<?php

declare(strict_types=1);

namespace Parrot;

final class NorwegianBlueParrot extends Parrot
{
    public function __construct(
        protected float $voltage,
        protected bool $isNailed
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
        return min(self::MIN_BASE_SPEED, $voltage * $this->getBaseSpeed());
    }
}
