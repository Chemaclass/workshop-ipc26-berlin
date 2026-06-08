<?php

declare(strict_types=1);

namespace KataTests;

use Kata\RandomGeneratorGame;
use PHPUnit\Framework\TestCase;

final class RandomGeneratorGameTest extends TestCase
{
    public function testPlay(): void
    {
        $changeMe = new RandomGeneratorGame();

        self::assertSame("you win", $changeMe->play(1));
    }
}
