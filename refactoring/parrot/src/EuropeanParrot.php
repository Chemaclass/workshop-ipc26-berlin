<?php

declare(strict_types=1);

namespace Parrot;

class EuropeanParrot extends Parrot
{
    public function __construct(
        int $numberOfCoconuts,
        float $voltage,
        bool $isNailed
    ) {
        parent::__construct(ParrotTypeEnum::EUROPEAN, $numberOfCoconuts, $voltage, $isNailed);
    }


    public function getSpeed(): float
    {
        return $this->getBaseSpeed();
    }

    public function getCry(): string
    {
        return 'Sqoork!';
    }
}
