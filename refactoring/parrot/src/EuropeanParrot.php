<?php

declare(strict_types=1);

namespace Parrot;

use Exception;

class EuropeanParrot extends AbstractParrot
{
    public function getSpeed(): float
    {
        return $this->baseSpeed;
    }

    public function getCry(): string
    {
        return 'Sqoork!';
    }
}
