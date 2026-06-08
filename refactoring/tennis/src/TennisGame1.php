<?php

declare(strict_types=1);

namespace TennisGame;

class TennisGame1 implements TennisGame
{
    const SCORE_NAMES = ['Love', 'Fifteen', 'Thirty', 'Forty'];

    private int $player1score = 0;

    private int $player2score = 0;

    public function wonPoint(string $playerName): void
    {
        if ($playerName === 'player1') {
            $this->player1score++;
        } else {
            $this->player2score++;
        }
    }

    public function getScore(): string
    {
        if ($this->player1score === $this->player2score) {
            return $this->getEqualScoreName();
        }

        if ($this->player1score >= 4 || $this->player2score >= 4) {
            return $this->getEndGame();
        }

        return $this->getBaseGame();
    }

    private function getEqualScoreName(): string
    {
        return match ($this->player1score) {
            0 => 'Love-All',
            1 => 'Fifteen-All',
            2 => 'Thirty-All',
            default => 'Deuce',
        };
    }

    public function getEndGame(): string
    {
        $difference = $this->player1score - $this->player2score;

        if ($difference === 1) {
            return 'Advantage player1';
        }

        if ($difference === -1) {
            return 'Advantage player2';
        }

        if ($difference >= 2) {
            return 'Win for player1';
        }

        return 'Win for player2';
    }

    public function getBaseGame(): string
    {
        return self::SCORE_NAMES[$this->player1score] . '-' . self::SCORE_NAMES[$this->player2score];
    }
}
