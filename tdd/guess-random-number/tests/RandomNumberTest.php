<?php

declare(strict_types=1);

namespace KataTests;

use Kata\RandomNumberGame;
use PHPUnit\Framework\TestCase;
use Kata\StubGenerator;

final class RandomNumberTest extends TestCase
{

    public function testGuessNumber(): void
    {
        $randomNumberGame = new RandomNumberGame(new StubGenerator(5));

        self::assertSame($randomNumberGame->guessNumber(5),'You win!');
    }

    public function testGuessNumberHigherLower(): void
    {
        $randomNumberGame = new RandomNumberGame(new StubGenerator(7));

        self::assertSame($randomNumberGame->guessNumber(4), 'Higher');
        self::assertSame($randomNumberGame->guessNumber(8), 'Lower');
    }
}
