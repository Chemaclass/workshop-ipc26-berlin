<?php

declare(strict_types=1);

namespace KataTests;

use Kata\GuessingNumberGame;
use Kata\RandomNumberGenerator;
use Kata\RandomNumberGeneratorInterface;
use PHPUnit\Framework\TestCase;

final class GuessingNumberGameTest extends TestCase
{
    private RandomNumberGeneratorInterface $randomNumberGenerator;

    protected function setUp(): void
    {
        parent::setUp();

        $this->randomNumberGenerator = new class implements RandomNumberGeneratorInterface {
            public function generate(): int
            {
                return 5;
            }
        };
    }

    public function test_win_on_first_try(): void
    {
        $game = new GuessingNumberGame($this->randomNumberGenerator);

        self::assertSame(
            'You win!',
            $game->guessNumber(5),
        );
    }

    public function test_player_wins_after_multiple_guesses(): void
    {
        $game = new GuessingNumberGame($this->randomNumberGenerator);

        self::assertSame('Lower', $game->guessNumber(10));
        self::assertSame('Higher', $game->guessNumber(3));
        self::assertSame('You win!', $game->guessNumber(5));
    }

    public function test_player_loses_after_three_guesses(): void
    {
        $game = new GuessingNumberGame($this->randomNumberGenerator);

        self::assertSame('Higher', $game->guessNumber(1));
        self::assertSame('Lower', $game->guessNumber(10));
        self::assertSame('You lose! The number was 5', $game->guessNumber(3));
    }

    public function test_player_wins_after_two_guesses(): void
    {
        $game = new GuessingNumberGame($this->randomNumberGenerator);

        self::assertSame('Higher', $game->guessNumber(1));
        self::assertSame('You win!', $game->guessNumber(5));
    }

    public function test_player_wins_after_three_guesses(): void
    {
        $game = new GuessingNumberGame($this->randomNumberGenerator);

        self::assertSame('Higher', $game->guessNumber(1));
        self::assertSame('Lower', $game->guessNumber(10));
        self::assertSame('You win!', $game->guessNumber(5));
    }

    public function test_player_loses_after_multiple_guesses(): void
    {
        $game = new GuessingNumberGame($this->randomNumberGenerator);

        self::assertSame('Higher', $game->guessNumber(1));
        self::assertSame('Lower', $game->guessNumber(10));
        self::assertSame('You lose! The number was 5', $game->guessNumber(3));
    }

    public function test_no_more_guessing_after_losing(): void
    {
        $game = new GuessingNumberGame($this->randomNumberGenerator, 3);

        self::assertSame('Higher', $game->guessNumber(1));
        self::assertSame('Lower', $game->guessNumber(10));
        self::assertSame('You lose! The number was 5', $game->guessNumber(99));
        self::assertSame('You reached your max attempts!', $game->guessNumber(5));
    }

    public function test_max_attempts_are_configurable(): void
    {
        $game = new GuessingNumberGame($this->randomNumberGenerator, 4);

        self::assertSame('Higher', $game->guessNumber(1));
        self::assertSame('Lower', $game->guessNumber(10));
        self::assertSame('Lower', $game->guessNumber(9));
        self::assertSame('You win!', $game->guessNumber(5));
    }

    public function test_after_win_there_are_no_more_guesses(): void
    {
        $game = new GuessingNumberGame($this->randomNumberGenerator, 3);

        self::assertSame('Higher', $game->guessNumber(1));
        self::assertSame('You win!', $game->guessNumber(5));
        self::assertSame('You already won!', $game->guessNumber(5));
    }
}
