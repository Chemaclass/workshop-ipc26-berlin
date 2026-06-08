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
            return $this->getScoreAboveThree();
        }

        return $this->getScoreName($this->player1Score) . '-' . $this->getScoreName($this->player2Score);
    }

    private function getScoreForEqualStanding(int $score): string
    {
        return match ($score) {
            0, 1, 2 => $this->getScoreName($score) . '-All',
            default => 'Deuce',
        };
    }

    private function getScoreAboveThree(): string
    {
        $diff = $this->player1Score - $this->player2Score;

        $prefix = abs($diff) >= 2 ? 'Win for' : 'Advantage';

        $player = $diff < 0 ? 'player2' : 'player1';

        return $prefix . ' ' . $player;
    }

    private function getScoreName(int $score): string
    {
        return Score::fromInt($score)->name;
    }
}
