<?php

declare(strict_types=1);

namespace Parrot;

class NorwegianBlueParrot extends Parrot
{
    public function __construct(
        int $numberOfCoconuts,
        float $voltage,
        bool $isNailed
    ) {
        parent::__construct(ParrotTypeEnum::NORWEGIAN_BLUE, $numberOfCoconuts, $voltage, $isNailed);
    }

    public function getSpeed(): float
    {
        return $this->isNailed ? 0 : $this->getBaseSpeedWith($this->voltage);
    }

    public function getCry(): string
    {
        return $this->voltage > 0 ? 'Bzzzzzz' : '...';
    }
}
