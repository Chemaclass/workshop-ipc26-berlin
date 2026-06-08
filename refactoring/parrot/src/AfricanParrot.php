<?php

declare(strict_types=1);

namespace Parrot;

class AfricanParrot extends Parrot
{
    public function __construct(
        private int $numberOfCoconuts,
    ) {
        parent::__construct();
    }

    public function getSpeed(): float
    {
        return max(0, $this->getBaseSpeed() - $this->getLoadFactor() * $this->numberOfCoconuts);
    }

    public function getCry(): string
    {
        return 'Sqaark!';
    }

    private function getLoadFactor(): float
    {
        return 9.0;
    }
}
