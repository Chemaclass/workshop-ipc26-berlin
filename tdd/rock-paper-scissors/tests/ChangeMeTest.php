<?php

declare(strict_types=1);

namespace KataTests;

use Kata\ChangeMe;
use PHPUnit\Framework\TestCase;

final class ChangeMeTest extends TestCase
{


    public function test_rock_beats_scissors(): void{
        $changeMe = new ChangeMe();
        
        
        self::assertTrue($changeMe->changeMe('Rock','Scissors'));
    }

        public function test_scissors_loses_rock(): void{
        $changeMe = new ChangeMe();
        
        
        self::assertFalse($changeMe->changeMe('Scissors','Rock'));
    }
}
