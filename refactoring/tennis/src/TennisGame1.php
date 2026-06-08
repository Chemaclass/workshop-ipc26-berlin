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
        if ($this->player1Score === $this->player2Score) {
            return $this->handleCaseSameScore();
        } elseif ($this->player1Score >= 4 || $this->player2Score >= 4) {
            return $this->handleCaseAdvantage();
        } else {
            return $this->handleCaseDifferentScore();
        }
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

       return match (true) {
            $minusResult === 1 => 'Advantage player1',
            $minusResult === -1 => 'Advantage player2',
            $minusResult >= 2 => 'Win for player1',
            default => 'Win for player2',
        };

    }

private function handleCaseDifferentScore():string{

    return $this->handleIntToStringScore($this->player1Score)
        . '-'
        . $this->handleIntToStringScore($this->player2Score);
    ;
}

    private function handleIntToStringScore(int $tempScore):string{

        return match ($tempScore) {
            0 => 'Love',
            1 => 'Fifteen',
            2 => 'Thirty',
            3 => 'Forty',
            default => throw new Exception('Should be unreachable'),
        };
    }
}
