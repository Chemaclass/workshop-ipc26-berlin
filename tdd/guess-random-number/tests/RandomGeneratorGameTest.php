<?php

declare(strict_types=1);

namespace KataTests;

use Kata\RandomGeneratorGame;
use PHPUnit\Framework\TestCase;

final class RandomGeneratorGameTest extends TestCase
{
    public function testPlayUserWinsFirstTry(): void
    {
        $changeMe = new RandomGeneratorGame();

        self::assertSame("you win", $changeMe->play(3));
    }

    public function tetsPlayerWinsAfterTwoAttempts(): void
    {
        $changeMe = new RandomGeneratorGame();

        self::assertSame("lower", $changeMe->play(4));
        self::assertSame("you win", $changeMe->play(3));
    }
}
