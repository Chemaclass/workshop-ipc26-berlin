<?php

declare(strict_types=1);

namespace Parrot;

abstract class AbstractParrot
{
    public function __construct(
        protected int $numberOfCoconuts,
        protected float $voltage,
        protected bool $isNailed,
        protected float $loadFactor = 9.0,
        protected float $baseSpeed = 12.0,
    ) {}

    abstract public function getSpeed(): float;

    abstract public function getCry(): string;

    protected function getBaseSpeedWith(float $voltage): float
    {
        return min($this->baseSpeed * 2, $voltage * $this->baseSpeed);
    }

    protected function getLoadFactor(): float
    {
        return $this->loadFactor;
    }

    protected function getBaseSpeed(): float
    {
        return $this->baseSpeed;
    }
}
