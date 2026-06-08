<?php

declare(strict_types=1);

namespace Parrot;

abstract class Parrot implements ParrotInterface
{
    public function __construct(
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
            ParrotTypeEnum::EUROPEAN => new EuropeanParrot($numberOfCoconuts, $voltage, $isNailed),
            ParrotTypeEnum::AFRICAN => new AfricanParrot($numberOfCoconuts, $voltage, $isNailed),
            ParrotTypeEnum::NORWEGIAN_BLUE => new NorwegianBlueParrot($numberOfCoconuts, $voltage, $isNailed),
        };
    }

    abstract public function getSpeed(): float;

    abstract public function getCry(): string;

    protected function getBaseSpeed(): float
    {
        return self::BASE_SPEED;
    }
}
