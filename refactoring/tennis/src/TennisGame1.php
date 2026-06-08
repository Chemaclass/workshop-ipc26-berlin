<?php

declare(strict_types=1);

namespace TennisGame;

class TennisGame1 implements TennisGame
{
    private int $player1Score = 0;

    private int $player2Score = 0;

    public function __construct() {
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
            return $this->getScoreForEqualStanding($this->player1Score);
        }

        if ($this->player1Score >= 4 || $this->player2Score >= 4) {
            return $this->getScoreAboveThree($this->player1Score - $this->player2Score);
        }

        return $this->getScoreName($this->player1Score) . '-' . $this->getScoreName($this->player2Score);
    }

    private function getScoreForEqualStanding(int $score): string
    {
        return match ($score) {
            0 => 'Love-All',
            1 => 'Fifteen-All',
            2 => 'Thirty-All',
            default => 'Deuce',
        };
    }

    private function getScoreAboveThree(int $minusResult): string
    {
        $minusResult = $this->player1Score - $this->player2Score;

        if ($minusResult === 1) {
            $score = 'Advantage player1';
        } elseif ($minusResult === -1) {
            $score = 'Advantage player2';
        } elseif ($minusResult >= 2) {
            $score = 'Win for player1';
        } else {
            $score = 'Win for player2';
        }

        return $score;
    }

    private function getScoreName(int $score): string
    {
        switch ($score) {
            case 0:
                return 'Love';
            case 1:
                return 'Fifteen';
            case 2:
                return 'Thirty';
            case 3:
                return 'Forty';
        }

        throw new \Exception('Invalid score');
    }
}
