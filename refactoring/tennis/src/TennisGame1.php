<?php

declare(strict_types=1);

namespace TennisGame;

class TennisGame1 implements TennisGame
{
    private int $player1Score = 0;

    private int $player2Score = 0;

    public function __construct(

    ) {
    }

    public function wonPoint(string $playerName): void
    {
        if ($playerName === 'player1') {
            $this->player1Score++;
        } else {
            $this->player2Score++;
        }
    }

    public function getScore(): string
    {
        $score = '';
        if ($this->player1Score === $this->player2Score) {
            return $this->handleCaseSameScore();
        } elseif ($this->player1Score >= 4 || $this->player2Score >= 4) {
            return $this->handleCaseAdvantage();
        } else {
            for ($i = 1; $i < 3; $i++) {
                if ($i === 1) {
                    $tempScore = $this->player1Score;
                } else {
                    $score .= '-';
                    $tempScore = $this->player2Score;
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

    private function handleCaseSameScore():string{
        return match ($this->player1Score) {
                0 => 'Love-All',
                1 => 'Fifteen-All',
                2 => 'Thirty-All',
                default => 'Deuce',
            };
    }

    private function handleCaseAdvantage():string{
        $minusResult = $this->player1Score - $this->player2Score;
        if ($minusResult === 1) {
            return 'Advantage player1';
        } elseif ($minusResult === -1) {
            return 'Advantage player2';
        } elseif ($minusResult >= 2) {
            return 'Win for player1';
        } else {
            return 'Win for player2';
        }

    }
}
