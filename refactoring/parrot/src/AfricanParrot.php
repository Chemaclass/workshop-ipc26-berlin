<?php

declare(strict_types=1);

namespace Parrot;

use Exception;

class AfricanParrot extends AbstractParrot
{
    public function __construct(
        protected int $numberOfCoconuts,
        protected float $voltage,
        protected bool $isNailed,
        protected float $loadFactor = 9.0,
        protected float $baseSpeed = 12.0,
    ) {
        parent::__construct($voltage, $isNailed, $loadFactor, $baseSpeed);
    }

    /**
     * @throws Exception
     */
    public function getSpeed(): float
    {
        return max(0, $this->baseSpeed - $this->loadFactor * $this->numberOfCoconuts);
    }

    /**
     * @throws Exception
     */
    public function getCry(): string
    {
        return 'Sqaark!';
    }
}
