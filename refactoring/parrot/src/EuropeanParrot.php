<?php

declare(strict_types=1);

namespace Parrot;

class EuropeanParrot extends Parrot
{
    public function __construct() {
        parent::__construct();
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
