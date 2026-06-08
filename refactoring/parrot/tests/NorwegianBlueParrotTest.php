<?php

declare(strict_types=1);

namespace ParrotTests;

use Parrot\NorwegianBlueParrot;
use PHPUnit\Framework\TestCase;

class NorwegianBlueParrotTest extends TestCase
{
    public function testSpeedNorwegianBlueParrotNailed(): void
    {
        $parrot = new NorwegianBlueParrot(1.5, true);
        self::assertSame(0.0, $parrot->getSpeed());
    }

    public function testSpeedNorwegianBlueParrotNotNailed(): void
    {
        $parrot = new NorwegianBlueParrot(1.5, false);
        self::assertSame(18.0, $parrot->getSpeed());
    }

    public function testSpeedNorwegianBlueParrotNotNailedHighVoltage(): void
    {
        $parrot = new NorwegianBlueParrot(4, false);
        self::assertSame(24.0, $parrot->getSpeed());
    }

    public function testGetCryOfNorwegianBlueHighVoltage(): void
    {
        $parrot = new NorwegianBlueParrot(4, false);
        self::assertSame('Bzzzzzz', $parrot->getCry());
    }

    public function testGetCryOfNorwegianBlueNoVoltage(): void
    {
        $parrot = new NorwegianBlueParrot(0, false);
        self::assertSame('...', $parrot->getCry());
    }
}
