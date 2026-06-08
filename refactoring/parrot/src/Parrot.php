<?php

declare(strict_types=1);

namespace Parrot;

use Exception;

abstract class Parrot
{
    public function __construct(
        /**
         * @var int ParrotTypeEnum
         */
        private int $type,
        protected int $numberOfCoconuts,
        protected float $voltage,
        protected bool $isNailed
    ) {
    }

    abstract public function getSpeed(): float;

    /**
     * @throws Exception
     */
    public function getCry(): string
    {
        return match ($this->type) {
            ParrotTypeEnum::EUROPEAN => 'Sqoork!',
            ParrotTypeEnum::AFRICAN => 'Sqaark!',
            ParrotTypeEnum::NORWEGIAN_BLUE => $this->voltage > 0 ? 'Bzzzzzz' : '...',
            default => throw new Exception('Should be unreachable'),
        };
    }

    protected function getBaseSpeedWith(float $voltage): float
    {
        return min(24.0, $voltage * $this->getBaseSpeed());
    }

    protected function getLoadFactor(): float
    {
        return 9.0;
    }

    protected function getBaseSpeed(): float
    {
        return 12.0;
    }
}
