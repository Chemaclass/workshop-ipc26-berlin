<?php

declare(strict_types=1);

namespace Parrot;

use Exception;

class NorwegianBlueParrot extends AbstractParrot
{
    public function getSpeed(): float
    {
        return $this->isNailed ? 0 : $this->getBaseSpeedWith($this->voltage);
    }

    public function getCry(): string
    {
        return $this->voltage > 0 ? 'Bzzzzzz' : '...';
    }
}
