<?php

declare(strict_types=1);

namespace Kata;

final class Game
{
    public function play(string $player1Choice, string $player2Choice): string
    {
        if ($player1Choice === $player2Choice) {
            return 'Draw';
        }

        return match ([$player1Choice, $player2Choice]) {
            ['rock', 'scissors'] => 'Player 1',
            ['scissors', 'rock'] => 'Player 2',

            ['paper', 'scissors'] => 'Player 2',
            ['scissors', 'paper'] => 'Player 1',

            ['paper', 'rock'] => 'Player 1',
            ['rock', 'paper'] => 'Player 2',

            default => throw new \Exception('Invalid choice'),
        };
    }
}
