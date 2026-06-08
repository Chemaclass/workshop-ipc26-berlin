<?php

declare(strict_types=1);

namespace KataTests;

use Kata\GuessingGame;
use Kata\RandomNumberGenerator;
use PHPUnit\Framework\TestCase;

final class GuessingGameTest extends TestCase
{
    private function setupDependency(int $number): RandomNumberGenerator
    {
        $mock = $this->createMock(RandomNumberGenerator::class);
        $mock
            ->method('generate')
            ->willReturn($number);

        return $mock;
    }

    public function test_initialization(): void
    {
        $randomNumberGenerator = $this->createMock(RandomNumberGenerator::class);
        $randomNumberGenerator->method('generate')->willReturn(5);
        $tries = 5;

        $game = new GuessingGame($randomNumberGenerator, $tries);

        self::assertSame(5, $game->getSystemNumber());
        self::assertSame(5, $game->getTriesRemaining());
    }

    public function test_Guess_Number_Correct_First_Try(): void
    {
        $mock = $this->setupDependency(5);

        $game = new GuessingGame($mock);

        $result = $game->playRound(5);

        self::assertSame('You win!', $result);
    }

    public function test_Guess_Number_Incorrect_First_Try(): void
    {
        $mock = $this->setupDependency(6);

        $game = new GuessingGame($mock);

        $result = $game->playRound(5);

        self::assertSame('You guessed too low', $result);
    }


    public function test_Guess_Number_More_Than_Three_Attempts(): void
    {
        $mock = $this->setupDependency(6);

        $game = new GuessingGame($mock);

        $result = $game->playRound(5);
        self::assertSame('You guessed too low', $result);

        $result = $game->playRound(5);
        self::assertSame('You guessed too low', $result);

        $result = $game->playRound(5);
        self::assertSame('You lose', $result);
    }

    public function test_Guess_Number_Correct_Second_Try(): void
    {
        $mock = $this->setupDependency(6);

        $game = new GuessingGame($mock);

        $result = $game->playRound(5);
        self::assertSame('You guessed too low', $result);

        $result = $game->playRound(6);
        self::assertSame('You win!', $result);
    }

    public function test_Guess_Number_Correct_Third_Try(): void
    {
        $mock = $this->setupDependency(6);

        $game = new GuessingGame($mock);

        $result = $game->playRound(5);
        self::assertSame('You guessed too low', $result);

        $result = $game->playRound(5);
        self::assertSame('You guessed too low', $result);

        $result = $game->playRound(6);
        self::assertSame('You win!', $result);
    }

    public function test_Guess_Is_Too_High(): void
    {
        $mock = $this->setupDependency(6);

        $game = new GuessingGame($mock);

        $result = $game->playRound(7);
        self::assertSame('You guessed too high', $result);
    }
}
