<?php

declare(strict_types=1);

namespace Parrot;

abstract class Parrot implements ParrotInterface
{
    public static function makeParrot(
        ParrotTypeEnum $type,
        int $numberOfCoconuts,
        float $voltage,
        bool $isNailed
    ): self {
        return match ($type) {
            ParrotTypeEnum::EUROPEAN => new EuropeanParrot(),
            ParrotTypeEnum::AFRICAN => new AfricanParrot($numberOfCoconuts),
            ParrotTypeEnum::NORWEGIAN_BLUE => new NorwegianBlueParrot($voltage, $isNailed),
        };
    }

    abstract public function getSpeed(): float;

    abstract public function getCry(): string;

    protected function getBaseSpeed(): float
    {
        return self::BASE_SPEED;
    }
}
