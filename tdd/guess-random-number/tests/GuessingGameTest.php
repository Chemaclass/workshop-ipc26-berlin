<?php

declare(strict_types=1);

namespace KataTests;

use Kata\GuessingGame;
use PHPUnit\Framework\TestCase;

final class GuessingGameTest extends TestCase
{
    public function test_initialization(): void
    {
        $changeMe = new GuessingGame();

        self::assertSame(5,$changeMe->getSystemNumber());
    }
}
