<?php

declare(strict_types=1);

namespace KataTests;

use Kata\RockPaperSciccors;
use PHPUnit\Framework\TestCase;

final class RockPaperSciccorsTest extends TestCase
{
    public function testPlay(): void
    {
        $changeMe = new RockPaperSciccors();

        self::assertTrue($changeMe->play('rock', 'scissors'));
    }

    public function testScissorsLoosesToRock(): void
    {
        $changeMe = new RockPaperSciccors();

        self::assertFalse($changeMe->play('scissors', 'rock'));
    }
}
