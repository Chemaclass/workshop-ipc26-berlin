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

    public function testPlayerWinsAfterTwoAttemptsFirstLower(): void
    {
        $changeMe = new RandomGeneratorGame();

        self::assertSame("lower", $changeMe->play(4));
        self::assertSame("you win", $changeMe->play(3));
    }

    public function testPlayerWinsAfterTwoAttemptsFirstHigher(): void
    {
        $changeMe = new RandomGeneratorGame();

        self::assertSame("higher", $changeMe->play(1));
        self::assertSame("you win", $changeMe->play(3));
    }

    public function testPlayerWinsAfterThreeAttemptsBothHigher(): void
    {
        $changeMe = new RandomGeneratorGame();

        self::assertSame("higher", $changeMe->play(1));
        self::assertSame("higher", $changeMe->play(2));
        self::assertSame("you win", $changeMe->play(3));
    }

    public function testPlayerWinsAfterThreeAttemptsBothLower(): void
    {
        $changeMe = new RandomGeneratorGame();

        self::assertSame("lower", $changeMe->play(5));
        self::assertSame("lower", $changeMe->play(4));
        self::assertSame("you win", $changeMe->play(3));
    }
}
