<?php

declare(strict_types=1);

namespace Parrot;

class AfricanParrot extends Parrot
{
    public function __construct(
        int $numberOfCoconuts,
        float $voltage,
        bool $isNailed
    ) {
        parent::__construct($numberOfCoconuts, $voltage, $isNailed);
    }

    public function getSpeed(): float
    {
        return max(0, $this->getBaseSpeed() - $this->getLoadFactor() * $this->numberOfCoconuts);
    }

    public function getCry(): string
    {
        return 'Sqaark!';
    }
}
