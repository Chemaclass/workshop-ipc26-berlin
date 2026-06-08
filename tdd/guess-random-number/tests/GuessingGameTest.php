<?php

declare(strict_types=1);

namespace KataTests;

use Kata\GuessingGame;
use Kata\RandomNumberGenerator;
use PHPUnit\Framework\TestCase;

final class GuessingGameTest extends TestCase
{
    public function test_initialization(): void
    {
        $mock = $this->createMock(RandomNumberGenerator::class);
        $mock->method('generate')->willReturn(5);

        $game = new GuessingGame($mock);

        self::assertSame(5,$game->getSystemNumber());
    }

    public function test_guess_Number_First_Try(): void
    {
        $mock = $this->createMock(RandomNumberGenerator::class);
        $mock
            ->method('generate')
            ->willReturn(5);

        $game = new GuessingGame($mock);

        $result = $game->playRound(5);

        self::assertTrue($result);

    }
   public function test_Guess_Number_Incorrect_First_Try(): void
    {
        $mock = $this->createMock(RandomNumberGenerator::class);
        $mock
            ->method('generate')
            ->willReturn(6);

        $game = new GuessingGame($mock);

        $result = $game->playRound(5);

        self::assertFalse($result);

    }
}
