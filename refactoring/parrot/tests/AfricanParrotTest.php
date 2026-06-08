<?php

declare(strict_types=1);

namespace ParrotTests;

use Parrot\AfricanParrot;
use PHPUnit\Framework\TestCase;

class AfricanParrotTest extends TestCase
{
    public function testSpeedOfAfricanParrotWithOneCoconut(): void
    {
        $parrot = new AfricanParrot(1, 0, false);
        self::assertSame(3.0, $parrot->getSpeed());
    }

    public function testSpeedOfAfricanParrotWithTwoCoconuts(): void
    {
        $parrot = new AfricanParrot(2, 0, false);
        self::assertSame(0.0, $parrot->getSpeed());
    }

    public function testSpeedOfAfricanParrotWithNoCoconuts(): void
    {
        $parrot = new AfricanParrot(0, 0, false);
        self::assertSame(12.0, $parrot->getSpeed());
    }

    public function testGetCryOfAfricanParrot(): void
    {
        $parrot = new AfricanParrot(1, 0, false);
        self::assertSame('Sqaark!', $parrot->getCry());
    }
}
