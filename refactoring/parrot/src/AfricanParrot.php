<?php

declare(strict_types=1);

namespace Parrot;

final class AfricanParrot extends Parrot
{
    public function getSpeed(): float
    {
        return max(0, $this->getBaseSpeed() - self::LOAD_FACTOR * $this->numberOfCoconuts);
    }

    public function getCry(): string
    {
        return 'Sqaark!';
    }
}
