<?php

declare(strict_types=1);

namespace Kata;

final class ChangeMe
{
    public function changeMe(string $myInput, string $opponentInput): bool
    {
        if($myInput === 'Rock' && $opponentInput === 'Scissors'){
            return true;
        }

         if($myInput === 'Scissors' && $opponentInput === 'Rock'){
            return false;
        }

    return false;
    }
}
