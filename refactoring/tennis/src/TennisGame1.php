<?php

declare(strict_types=1);

namespace TennisGame;

class TennisGame1 implements TennisGame
{
    private int $m_score1 = 0;

    private int $m_score2 = 0;

    public function wonPoint(string $playerName): void
    {
        if ($playerName === 'player1') {
            $this->m_score1++;
        } else {
            $this->m_score2++;
        }
    }

    public function isScoreEquals(): string
    {
        return match ($this->m_score1) {
            0 => 'Love-All',
            1 => 'Fifteen-All',
            2 => 'Thirty-All',
            default => 'Deuce',
        };
    }

    public function advantageOrWin(): string
    {
        $minusResult = $this->m_score1 - $this->m_score2;

        if ($minusResult === 1) {
            return 'Advantage player1';
        }
        if ($minusResult === -1) {
            return 'Advantage player2';
        }
        if ($minusResult >= 2) {
            return 'Win for player1';
        }

        return 'Win for player2';
    }

    public function getScore(): string
    {
        $score = '';

        if ($this->m_score1 === $this->m_score2) {
            return $this->isScoreEquals();
        }

        if ($this->m_score1 >= 4 || $this->m_score2 >= 4) {
            return $this->advantageOrWin();
        }

        for ($i = 1; $i < 3; $i++) {
            if ($i === 1) {
                $tempScore = $this->m_score1;
            } else {
                $score .= '-';
                $tempScore = $this->m_score2;
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

        return $score;
    }
}
