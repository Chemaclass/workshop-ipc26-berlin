<?php

declare(strict_types=1);

namespace KataTests;

use Kata\GuessingGame;
use PHPUnit\Framework\TestCase;

final class GuessingGameTest extends TestCase
{
    public function test_change_me(): void
    {
        $changeMe = new GuessingGame();

        self::assertTrue($changeMe->playRound(1));
    }
}
