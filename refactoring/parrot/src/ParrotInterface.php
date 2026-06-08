<?php

declare(strict_types=1);

namespace Parrot;

interface ParrotInterface
{
    public const float BASE_SPEED = 12.0;
    public const float LOAD_FACTOR = 9.0;
    public const float MIN_BASE_SPEED = 24.0;

    public function getSpeed(): float;

    public function getCry(): string;
}
