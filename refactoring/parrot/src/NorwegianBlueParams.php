<?php

declare(strict_types=1);

namespace Parrot;

class NorwegianBlueParams{
    public function __construct(
        public readonly float $voltage,
        public readonly bool $isNailed
    ){}
}