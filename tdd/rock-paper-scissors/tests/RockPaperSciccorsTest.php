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

        self::assertTrue($changeMe->play());
    }
}
