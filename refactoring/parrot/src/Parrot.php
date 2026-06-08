<?php

declare(strict_types=1);

namespace Parrot;

class Parrot
{
    public function __construct(
        private ParrotTypeEnum $type,
        private int $numberOfCoconuts,
        private float $voltage,
        private bool $isNailed
    ) {
    }

    public function getSpeed(): float
    {
        return match ($this->type) {
            ParrotTypeEnum::EUROPEAN => $this->getBaseSpeed(),
            ParrotTypeEnum::AFRICAN => max(0, $this->getBaseSpeed() - $this->getLoadFactor() * $this->numberOfCoconuts),
            ParrotTypeEnum::NORWEGIAN_BLUE => $this->isNailed ? 0 : $this->getBaseSpeedWith($this->voltage),
        };
    }

    public function getCry(): string
    {
        return match ($this->type) {
            ParrotTypeEnum::EUROPEAN => 'Sqoork!',
            ParrotTypeEnum::AFRICAN => 'Sqaark!',
            ParrotTypeEnum::NORWEGIAN_BLUE => $this->voltage > 0 ? 'Bzzzzzz' : '...',
        };
    }

    private function getBaseSpeedWith(float $voltage): float
    {
        return min(24.0, $voltage * $this->getBaseSpeed());
    }

    private function getLoadFactor(): float
    {
        return 9.0;
    }

    private function getBaseSpeed(): float
    {
        return 12.0;
    }
}
