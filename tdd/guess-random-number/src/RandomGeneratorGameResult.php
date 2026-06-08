<?php

declare(strict_types=1);

namespace Kata;

enum RandomGeneratorGameResult: string
{
    case HIGHER = 'higher';
    case LOWER = 'lower';
    case WIN = 'you win';
    case LOSE = 'you lose';
}
