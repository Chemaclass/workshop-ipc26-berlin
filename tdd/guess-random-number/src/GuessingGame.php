<?php

declare(strict_types=1);

namespace Kata;

final class GuessingGame
{
 
    
    public function __construct(private int $systemNumber=5)  {
        
    }
    public function playRound(int $guess): bool
    {
        return true;
    }

    public function getSystemNumber(): int{
        return $this->systemNumber;
    }
}
