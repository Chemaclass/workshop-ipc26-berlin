<?php

declare(strict_types=1);

namespace ParrotTests;

use Parrot\EuropeanParrot;
use PHPUnit\Framework\TestCase;

class EuropeanParrotTest extends TestCase
{
    public function testSpeedOfEuropeanParrot(): void
    {
        $parrot = new EuropeanParrot(0, false);
        self::assertSame(12.0, $parrot->getSpeed());
    }

    public function testGetCryOfEuropeanParrot(): void
    {
        $parrot = new EuropeanParrot(0, false);
        self::assertSame('Sqoork!', $parrot->getCry());
    }
}
