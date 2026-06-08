<?php

declare(strict_types=1);

namespace KataTests;

use Kata\RandomGeneratorGame;
use Kata\RandomGeneratorGameResult;
use PHPUnit\Framework\TestCase;

final class RandomGeneratorGameTest extends TestCase
{
    public function testPlayUserWinsFirstTry(): void
    {
        $randomGeneratorGame = new RandomGeneratorGame();

        self::assertSame("you win", $randomGeneratorGame->play(3));
    }

    public function testPlayerWinsAfterTwoAttemptsFirstLower(): void
    {
        $randomGeneratorGame = new RandomGeneratorGame();

        self::assertSame(RandomGeneratorGameResult::LOWER->value, $randomGeneratorGame->play(4));
        self::assertSame(RandomGeneratorGameResult::WIN->value, $randomGeneratorGame->play(3));
    }

    public function testPlayerWinsAfterTwoAttemptsFirstHigher(): void
    {
        $randomGeneratorGame = new RandomGeneratorGame();

        self::assertSame(RandomGeneratorGameResult::HIGHER->value, $randomGeneratorGame->play(1));
        self::assertSame(RandomGeneratorGameResult::WIN->value, $randomGeneratorGame->play(3));
    }

    public function testPlayerWinsAfterThreeAttemptsBothHigher(): void
    {
        $randomGeneratorGame = new RandomGeneratorGame();

        self::assertSame(RandomGeneratorGameResult::HIGHER->value, $randomGeneratorGame->play(1));
        self::assertSame(RandomGeneratorGameResult::HIGHER->value, $randomGeneratorGame->play(2));
        self::assertSame(RandomGeneratorGameResult::WIN->value, $randomGeneratorGame->play(3));
    }

    public function testPlayerWinsAfterThreeAttemptsBothLower(): void
    {
        $randomGeneratorGame = new RandomGeneratorGame();

        self::assertSame(RandomGeneratorGameResult::LOWER->value, $randomGeneratorGame->play(5));
        self::assertSame(RandomGeneratorGameResult::LOWER->value, $randomGeneratorGame->play(4));
        self::assertSame(RandomGeneratorGameResult::WIN->value, $randomGeneratorGame->play(3));
    }
}
