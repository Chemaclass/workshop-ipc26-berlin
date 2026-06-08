<?php

declare(strict_types=1);

namespace Parrot;

use Exception;

class EuropeanParrot extends AbstractParrot
{
    /**
     * @throws Exception
     */
    public function getSpeed(): float
    {
        return $this->getBaseSpeed();
    }

    /**
     * @throws Exception
     */
    public function getCry(): string
    {
        return 'Sqoork!';
    }
}
