<?php

declare(strict_types=1);

namespace Parrot;

abstract class Parrot implements ParrotInterface
{
    public function __construct(
        private ParrotTypeEnum $type,
        private int $numberOfCoconuts,
        private float $voltage,
        private bool $isNailed
    ) {
    }

    public static function makeParrot(
        ParrotTypeEnum $type,
        int $numberOfCoconuts,
        float $voltage,
        bool $isNailed
    ): self {
        return match ($type) {
            ParrotTypeEnum::EUROPEAN => new EuropeanParrot($type, $numberOfCoconuts, $voltage, $isNailed),
            ParrotTypeEnum::AFRICAN => new AfricanParrot($type, $numberOfCoconuts, $voltage, $isNailed),
            ParrotTypeEnum::NORWEGIAN_BLUE => new NorwegianBlueParrot($type, $numberOfCoconuts, $voltage, $isNailed),
        };
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
        return min(self::MIN_BASE_SPEED, $voltage * $this->getBaseSpeed());
    }

    private function getLoadFactor(): float
    {
        return self::LOAD_FACTOR;
    }

    private function getBaseSpeed(): float
    {
        return self::BASE_SPEED;
    }
}
