<?php

declare(strict_types=1);

namespace Parrot;

use Exception;

class NorwegianBlueParrot extends Parrot
{
    public function __construct(
        int $numberOfCoconuts,
        float $voltage,
        bool $isNailed
    )
    {
        parent::__construct(ParrotTypeEnum::NORWEGIAN_BLUE, $numberOfCoconuts, $voltage, $isNailed);
    }
}
