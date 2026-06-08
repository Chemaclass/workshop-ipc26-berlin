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

        self::assertSame(5, $game->getSystemNumber());
        self::assertSame(3, $game->getTriesRemaining());
    }

    public function test_Guess_Number_Correct_First_Try(): void
    {
        $mock = $this->createMock(RandomNumberGenerator::class);
        $mock
            ->method('generate')
            ->willReturn(5);

        $game = new GuessingGame($mock);

        $result = $game->playRound(5);

        self::assertSame('You win!', $result);
    }

    public function test_Guess_Number_Incorrect_First_Try(): void
    {
        $mock = $this->createMock(RandomNumberGenerator::class);
        $mock
            ->method('generate')
            ->willReturn(6);

        $game = new GuessingGame($mock);

        $result = $game->playRound(5);

        self::assertSame('You guessed too low', $result);
    }


    public function test_Guess_Number_More_Than_Three_Attempts(): void
    {
        $mock = $this->createMock(RandomNumberGenerator::class);
        $mock
            ->method('generate')
            ->willReturn(6);

        $game = new GuessingGame($mock);

        $result = $game->playRound(5);
        self::assertSame('You guessed too low', $result);

        $result = $game->playRound(5);
        self::assertSame('You guessed too low', $result);

        $result = $game->playRound(5);
        self::assertSame('You lose', $result);
    }

    public function test_Guess_Number_Correct_Second_Try(): void{
        $mock = $this->createMock(RandomNumberGenerator::class);
        $mock
            ->method('generate')
            ->willReturn(6);

        $game = new GuessingGame($mock);

        $result = $game->playRound(5);
        self::assertSame('You guessed too low', $result);

        $result = $game->playRound(6);
        self::assertSame('You win!', $result);
    }

    public function test_Guess_Number_Correct_Third_Try(): void{
        $mock = $this->createMock(RandomNumberGenerator::class);
        $mock
            ->method('generate')
            ->willReturn(6);

        $game = new GuessingGame($mock);

        $result = $game->playRound(5);
        self::assertSame('You guessed too low', $result);

        $result = $game->playRound(5);
        self::assertSame('You guessed too low', $result);

        $result = $game->playRound(6);
        self::assertSame('You win!', $result);
    }

    public function test_Guess_Is_Too_High(): void{
          $mock = $this->createMock(RandomNumberGenerator::class);
        $mock
            ->method('generate')
            ->willReturn(6);

        $game = new GuessingGame($mock);
        
        $result = $game->playRound(7);
        self::assertSame('You guessed too high', $result);
    }
}
