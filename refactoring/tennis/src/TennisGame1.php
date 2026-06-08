<?php

declare(strict_types=1);

namespace TennisGame;

class TennisGame1 implements TennisGame
{
    const SCORE_NAMES = ['Love', 'Fifteen', 'Thirty', 'Forty'];

    private int $m_score1 = 0;

    private int $m_score2 = 0;

    public function __construct(
        private string $player1Name,
        private string $player2Name
    ) {
    }

    public function wonPoint(string $playerName): void
    {
        if ($playerName === 'player1') {
            $this->m_score1++;
        } else {
            $this->m_score2++;
        }
    }

    public function getScore(): string
    {
        if ($this->m_score1 === $this->m_score2) {
            return $this->getEqualScoreName();
        } elseif ($this->m_score1 >= 4 || $this->m_score2 >= 4) {
            return $this->getEndGame();
        } else {
            return $this->getBaseGame();
        }
    }

    private function getEqualScoreName(): string
    {
        return match ($this->m_score1) {
            0 => 'Love-All',
            1 => 'Fifteen-All',
            2 => 'Thirty-All',
            default => 'Deuce',
        };
    }

    public function getEndGame(): string
    {
        $difference = $this->m_score1 - $this->m_score2;

        if ($difference === 1) {
            return 'Advantage player1';
        } elseif ($difference === -1) {
            return 'Advantage player2';
        } elseif ($difference >= 2) {
            return 'Win for player1';
        }

        return 'Win for player2';
    }

    public function getBaseGame(): string
    {
        return self::SCORE_NAMES[$this->m_score1] . '-' . self::SCORE_NAMES[$this->m_score2];
    }
}
