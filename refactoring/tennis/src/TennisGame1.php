<?php

declare(strict_types=1);

namespace TennisGame;

class TennisGame1 implements TennisGame
{
    private int $score1 = 0;

    private int $score2 = 0;

    public function __construct(
        private string $player1Name,
        private string $player2Name
    ) {
    }

    public function wonPoint(string $playerName): void
    {
        if ($playerName === 'player1') {
            $this->score1++;
        } else {
            $this->score2++;
        }
    }

    public function getScore(): string
    {
        $score = '';
        if ($this->score1 === $this->score2) {
            $score = match ($this->score1) {
                0 => 'Love-All',
                1 => 'Fifteen-All',
                2 => 'Thirty-All',
                default => 'Deuce',
            };
        } elseif ($this->score1 >= 4 || $this->score2 >= 4) {
            $minusResult = $this->score1 - $this->score2;
            if ($minusResult === 1) {
                $score = 'Advantage player1';
            } elseif ($minusResult === -1) {
                $score = 'Advantage player2';
            } elseif ($minusResult >= 2) {
                $score = 'Win for player1';
            } else {
                $score = 'Win for player2';
            }
        } else {
            for ($i = 1; $i < 3; $i++) {
                if ($i === 1) {
                    $tempScore = $this->score1;
                } else {
                    $score .= '-';
                    $tempScore = $this->score2;
                }
                switch ($tempScore) {
                    case 0:
                        $score .= 'Love';
                        break;
                    case 1:
                        $score .= 'Fifteen';
                        break;
                    case 2:
                        $score .= 'Thirty';
                        break;
                    case 3:
                        $score .= 'Forty';
                        break;
                }
            }
        }
        return $score;
    }
}
