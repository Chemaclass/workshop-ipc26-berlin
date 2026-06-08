<?php

declare(strict_types=1);

namespace KataTests;

use Kata\RandomNumberGame;
use PHPUnit\Framework\TestCase;

final class RandomNumberTest extends TestCase
{
    public function testGetRandomNumber(): void
    {
        $randomNumberGame = new RandomNumberGame();

        $result = $randomNumberGame->getRandomNumber();
        self::assertIsInt($result);
    }

    public function testGuessNumber(): void
    {
        $randomNumberGame = new RandomNumberGame();

        self::assertTrue($randomNumberGame->guessNumber(5) === 'You win!');
    }
}
