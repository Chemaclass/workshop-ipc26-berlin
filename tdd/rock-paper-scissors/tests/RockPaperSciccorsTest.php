<?php

declare(strict_types=1);

namespace KataTests;

use Kata\PlayResult;
use Kata\RockPaperSciccors;
use PHPUnit\Framework\TestCase;

final class RockPaperSciccorsTest extends TestCase
{
    public function testRockWinsToScissors(): void
    {
        $rockPaperScissors = new RockPaperSciccors();

        self::assertSame(PlayResult::WIN, $rockPaperScissors->play('rock', 'scissors'));
    }

    public function testScissorsLoosesToRock(): void
    {
        $rockPaperScissors = new RockPaperSciccors();

        self::assertSame(PlayResult::LOOSE, $rockPaperScissors->play('scissors', 'rock'));
    }

    public function testPaperWinsToRock(): void
    {
        $rockPaperScissors = new RockPaperSciccors();

        self::assertTrue($rockPaperScissors->play('paper', 'rock'));
    }

    public function testRockLosesToPaper(): void
    {
        $rockPaperScissors = new RockPaperSciccors();

        self::assertFalse($rockPaperScissors->play('rock', 'paper'));
    }

    public function testScissorsWinsToPaper(): void
    {
        $rockPaperScissors = new RockPaperSciccors();

        self::assertTrue($rockPaperScissors->play('scissors', 'paper'));
    }

    public function testRockAndRockIsDraw(): void
    {
        $rockPaperScissors = new RockPaperSciccors();

    }
}
