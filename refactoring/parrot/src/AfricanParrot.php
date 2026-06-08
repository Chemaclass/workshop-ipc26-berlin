<?php

declare(strict_types=1);

namespace Parrot;

use Exception;

class AfricanParrot extends AbstractParrot
{
    /**
     * @throws Exception
     */
    public function getSpeed(): float
    {
        return max(0, $this->getBaseSpeed() - $this->getLoadFactor() * $this->numberOfCoconuts);
    }

    /**
     * @throws Exception
     */
    public function getCry(): string
    {
        return 'Sqaark!';
    }
}
