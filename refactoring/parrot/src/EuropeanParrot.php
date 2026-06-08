<?php

declare(strict_types=1);

namespace Parrot;

final class EuropeanParrot extends Parrot
{
    public function getSpeed(): float
    {
        return $this->getBaseSpeed();
    }

    public function getCry(): string
    {
        return 'Sqoork!';
    }
}
