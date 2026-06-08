<?php

declare(strict_types=1);

namespace Parrot;

interface Parrot
{
    const float BASE_SPEED = 12;

    public function getSpeed(): float;

    public function getCry(): string;
}
