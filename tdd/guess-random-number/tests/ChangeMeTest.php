<?php

declare(strict_types=1);

namespace KataTests;

use Kata\GuessingNumberGame;
use Kata\RandomNumberGenerator;
use Kata\RandomNumberGeneratorInterface;
use PHPUnit\Framework\TestCase;

final class ChangeMeTest extends TestCase
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
            true,
            $game->guessNumber(5),
        );
    }

    public function test_player_wins_after_multiple_guesses(): void
    {
        $game = new GuessingNumberGame($this->randomNumberGenerator);

        self::assertSame(false, $game->guessNumber(10));
        self::assertSame(false, $game->guessNumber(3));
        self::assertSame(true, $game->guessNumber(5));
    }

    public function test_player_loses_after_multiple_guesses(): void
    {
        $game = new GuessingNumberGame($this->randomNumberGenerator);

        self::assertSame(false, $game->guessNumber(1));
        self::assertSame(false, $game->guessNumber(10));
        self::assertSame(false, $game->guessNumber(3));
    }
}
