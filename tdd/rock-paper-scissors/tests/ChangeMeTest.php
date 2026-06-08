<?php

declare(strict_types=1);

namespace KataTests;

use Kata\ChangeMe;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class ChangeMeTest extends TestCase
{

public static function TestCaseProvider():array{
    return [
        'me rock oppo scissors'=>[
            'myInput'=>'Rock',
            'opponentInput'=>'Scissors',
            'expectedResult'=>true
            ],
        'me scissors oppo rock'=>[
            'myInput'=>'Scissors',
            'opponentInput'=>'Rock',
            'expectedResult'=>false
            ],
        ];
}

#[DataProvider('TestCaseProvider')]
    public function test_rock_and_scissors(string $myInput,
        string $opponentInput,
        bool $expectedResult): void{
            
        $changeMe = new ChangeMe();
        
        $result = $changeMe->changeMe($myInput,$opponentInput);
        self::assertSame($expectedResult, $result);
    }


}
