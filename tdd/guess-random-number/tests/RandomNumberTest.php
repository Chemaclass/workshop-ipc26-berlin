<?php

declare(strict_types=1);

namespace KataTests;

use Kata\RandomNumberGame;
use PHPUnit\Framework\TestCase;

final class RandomNumberTest extends TestCase
{
    public function test_get_random_number(): void
    {
        $randomNumberGame = new RandomNumberGame();

        $result = $randomNumberGame->getRandomNumber();
        self::assertIsInt($result);

    }


}
