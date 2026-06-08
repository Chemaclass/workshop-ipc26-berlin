<?php

declare(strict_types=1);

namespace Parrot;

class EuropeanParrot implements Parrot
{
    public function getSpeed(): float
    {
        return self::BASE_SPEED;
    }

    public function getCry(): string
    {
        return 'Sqoork!';
    }
}
