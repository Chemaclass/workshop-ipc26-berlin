<?php

declare(strict_types=1);

namespace Kata;

final class GuessingGame
{
    private int $systemNumber;

    public function __construct(RandomNumberGenerator $randomNumberGenerator)
    {
        $this->systemNumber = $randomNumberGenerator->generate();
    }

    public function playRound(int $guess): bool
    {
        if($this->systemNumber===$guess){
            return true;
        }    
        return false;
    }

    public function getSystemNumber(): int{
        return $this->systemNumber;
    }
}
