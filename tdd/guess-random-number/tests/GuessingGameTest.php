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

        $changeMe = new GuessingGame($mock);

        self::assertSame(5,$changeMe->getSystemNumber());
    }
}
