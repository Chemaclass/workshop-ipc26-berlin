<?php

declare(strict_types=1);

namespace Parrot;

abstract class Parrot implements ParrotInterface
{
    public function __construct(
        protected ParrotTypeEnum $type,
        protected int $numberOfCoconuts,
        protected float $voltage,
        protected bool $isNailed
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

    abstract public function getSpeed(): float;

    abstract public function getCry(): string;

    protected function getBaseSpeedWith(float $voltage): float
    {
        return min(self::MIN_BASE_SPEED, $voltage * $this->getBaseSpeed());
    }

    private function getLoadFactor(): float
    {
        return self::LOAD_FACTOR;
    }

    protected function getBaseSpeed(): float
    {
        return self::BASE_SPEED;
    }
}
