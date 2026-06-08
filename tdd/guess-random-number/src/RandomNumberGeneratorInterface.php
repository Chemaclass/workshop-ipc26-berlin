<?php

declare(strict_types=1);

namespace Kata;

interface RandomNumberGeneratorInterface
{
    public function generate(): int;
}
