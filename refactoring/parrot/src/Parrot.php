<?php

declare(strict_types=1);

namespace Parrot;

use Exception;

abstract class Parrot
{
    public function __construct(
        protected int $numberOfCoconuts,
        protected float $voltage,
        protected bool $isNailed
    ) {
    }

    abstract public function getSpeed(): float;

    abstract public function getCry(): string;

    protected function getLoadFactor(): float
    {
        return 9.0;
    }

    protected function getBaseSpeed(): float
    {
        return 12.0;
    }
}
