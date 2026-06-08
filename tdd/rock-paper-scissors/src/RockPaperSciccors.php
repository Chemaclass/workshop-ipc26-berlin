<?php

declare(strict_types=1);

namespace Kata;

final class RockPaperSciccors
{
    /**
     * @returns true if player 1 wins, false if player 2 wins
     */
    public function play(string $player1, string $player2): PlayResult
    {
        if ($player1 === 'rock' && $player2 === 'scissors') {
            return PlayResult::WIN;
        }

        if ($player1 === 'paper' && $player2 === 'rock') {
            return PlayResult::WIN;
        }

        if ($player1 === 'scissors' && $player2 === 'paper') {
            return PlayResult::WIN;
        }

        return PlayResult::LOOSE;
    }
}

enum PlayResult: int {
    case WIN = 1;
    case LOOSE = 2;
    case DRAW = 3;
}
