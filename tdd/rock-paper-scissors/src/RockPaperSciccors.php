<?php

declare(strict_types=1);

namespace Kata;

final class RockPaperSciccors
{
    /**
     * @returns true if player 1 wins, false if player 2 wins
     */
    public function play(string $player1, string $player2): bool
    {
        if ($player1 === 'rock' && $player2 === 'scissors') {
            return true;
        }

        return false;
    }
}
